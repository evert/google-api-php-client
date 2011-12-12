<?php
require_once '../src/apiClient.php';
require_once "io/apiREST.php";
/**
 * Created by JetBrains PhpStorm.
 * User: chirags
 * Date: 11/10/11
 * Time: 1:58 PM
 * To change this template use File | Settings | File Templates.
 */

class RestTest extends PHPUnit_Framework_TestCase {
  private $rest;
  
  public function setUp() {
    $this->rest = new apiREST();
  }

  public function testDecodeResponse() {
    $url = 'http://localhost';
    
    $response = new apiHttpRequest($url);
    $response->setResponseHttpCode(204);
    $decoded = $this->rest->decodeHttpResponse($response);
    $this->assertEquals(null, $decoded);


    foreach (array(200, 201) as $code) {
      $headers = array('foo', 'bar');
      $response = new apiHttpRequest($url, 'GET', $headers);
      $response->setResponseBody('{"a": 1}');

      $response->setResponseHttpCode($code);
      $decoded = $this->rest->decodeHttpResponse($response);
      $this->assertEquals(array("a" => 1), $decoded);
    }

    $response = new apiHttpRequest($url);
    $response->setResponseHttpCode(500);

    $error = "";
    try {
      $this->rest->decodeHttpResponse($response);
    } catch (Exception $e) {
      $error = $e->getMessage();

    }
    $this->assertEquals(trim($error), "Error calling GET http://localhost: (500)");
  }

  public function testCreateRequestUri() {
    $basePath = "http://localhost";
    $restPath = "/plus/{u}";
    
    // Test Path
    $params = array();
    $params['u']['type'] = 'string';
    $params['u']['location'] = 'path';
    $params['u']['value'] = 'me';
    $value = $this->rest->createRequestUri($basePath, $restPath, $params);
    $this->assertEquals("http://localhost/plus/me?alt=json", $value);

    // Test Query
    $params = array();
    $params['u']['type'] = 'string';
    $params['u']['location'] = 'query';
    $params['u']['value'] = 'me';
    $value = $this->rest->createRequestUri($basePath, '/plus', $params);
    $this->assertEquals("http://localhost/plus?u=me&alt=json", $value);

    // Test Booleans
    $params = array();
    $params['u']['type'] = 'boolean';
    $params['u']['location'] = 'path';
    $params['u']['value'] = '1';
    $value = $this->rest->createRequestUri($basePath, $restPath, $params);
    $this->assertEquals("http://localhost/plus/true?alt=json", $value);

    $params['u']['location'] = 'query';
    $value = $this->rest->createRequestUri($basePath, '/plus', $params);
    $this->assertEquals("http://localhost/plus?u=true&alt=json", $value);
    
    // Test encoding
    $params = array();
    $params['u']['type'] = 'string';
    $params['u']['location'] = 'query';
    $params['u']['value'] = '@me/';
    $value = $this->rest->createRequestUri($basePath, '/plus', $params);
    $this->assertEquals("http://localhost/plus?u=%40me%2F&alt=json", $value);
  }
}
 
