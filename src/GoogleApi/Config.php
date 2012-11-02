<?php
/*
 * Copyright 2010 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace GoogleApi;

/**
 * This class stores all the configuration information that is needed for running an GoogleApi/Client.
 * Since this project was shifted to PSR-0 standard, Its required to stop using "global" and use an OO method.
 *
 * @author Asaf David <asafdav@gmail.com>
 *
 */
class Config {
  protected static $apiConfig = array();

  /**
   * Initializes $apiConfig,
   * Php can't parse non-trivial expressions in data-members initializers, therefore a workaround is needed.
   * This method will be called to initialize $apiConfig with the default values.
   *
   * @static
   */
  static function init() {
    self::$apiConfig = array(
      // True if objects should be returned by the service classes.
      // False if associative arrays should be returned (default behavior).
      'use_objects' => false,

      // The application_name is included in the User-Agent HTTP header.
      'application_name' => '',

      // OAuth2 Settings, you can get these keys at https://code.google.com/apis/console
      'oauth2_client_id' => '',
      'oauth2_client_secret' => '',
      'oauth2_redirect_uri' => '',

      // The developer key, you get this at https://code.google.com/apis/console
      'developer_key' => '',

      // OAuth1 Settings.
      // If you're using the apiOAuth auth class, it will use these values for the oauth consumer key and secret.
      // See http://code.google.com/apis/accounts/docs/RegistrationForWebAppsAuto.html for info on how to obtain those
      'oauth_consumer_key'    => 'anonymous',
      'oauth_consumer_secret' => 'anonymous',

      // Site name to show in the Google's OAuth 1 authentication screen.
      'site_name' => 'www.example.org',

      // Which Authentication, Storage and HTTP IO classes to use.
      'authClass'    => 'GoogleApi\Auth\OAuth2',
      'ioClass'      => 'GoogleApi\Io\CurlIO',
      'cacheClass'   => 'GoogleApi\Cache\FileCache',

      // If you want to run the test suite (by running # phpunit AllTests.php in the tests/ directory), fill in the settings below
      'oauth_test_token' => '', // the oauth access token to use (which you can get by runing authenticate() as the test user and copying the token value), ie '{"key":"foo","secret":"bar","callback_url":null}'
      'oauth_test_user' => '', // and the user ID to use, this can either be a vanity name 'testuser' or a numberic ID '123456'

      // Don't change these unless you're working against a special development or testing environment.
      'basePath' => 'https://www.googleapis.com',

      // IO Class dependent configuration, you only have to configure the values for the class that was configured as the ioClass above
      'ioFileCache_directory'  =>
      (function_exists('sys_get_temp_dir') ?
        sys_get_temp_dir() . '/apiClient' :
        '/tmp/apiClient'),
      'ioMemCacheStorage_host' => '127.0.0.1',
      'ioMemcacheStorage_port' => '11211',

      // Definition of service specific values like scopes, oauth token URLs, etc
      'services' => array(
        'analytics' => array('scope' => 'https://www.googleapis.com/auth/analytics.readonly'),
        'calendar' => array(
          'scope' => array(
            "https://www.googleapis.com/auth/calendar",
            "https://www.googleapis.com/auth/calendar.readonly",
          )
        ),
        'books' => array('scope' => 'https://www.googleapis.com/auth/books'),
        'latitude' => array(
          'scope' => array(
            'https://www.googleapis.com/auth/latitude.all.best',
            'https://www.googleapis.com/auth/latitude.all.city',
          )
        ),
        'moderator' => array('scope' => 'https://www.googleapis.com/auth/moderator'),
        'oauth2' => array(
          'scope' => array(
            'https://www.googleapis.com/auth/userinfo.profile',
            'https://www.googleapis.com/auth/userinfo.email',
          )
        ),
        'plus' => array('scope' => 'https://www.googleapis.com/auth/plus.me'),
        'siteVerification' => array('scope' => 'https://www.googleapis.com/auth/siteverification'),
        'tasks' => array('scope' => 'https://www.googleapis.com/auth/tasks'),
        'urlshortener' => array('scope' => 'https://www.googleapis.com/auth/urlshortener')
      )
    );
  }


  /**
   * Returns an array which contains all of the variables that were declared.
   * @static
   * @return array
   */
  public static function getAll() {
    return self::$apiConfig;
  }

  /**
   * Returns the value of the wanted variable, If it doesn't exist $default will be returned.
   *
   * @static
   * @param $variable
   * @param null $default
   * @return string|array
   */
  public static function get($variable, $default = null) {
    return isset(self::$apiConfig[$variable]) ? self::$apiConfig[$variable] : $default;
  }

  /**
   * Checks whether a variable exists
   * @static
   * @param $variable
   * @return bool
   */
  public static function has($variable) {
    return isset(self::$apiConfig[$variable]);
  }

  /**
   * Sets the value of the wanted variable
   * @static
   * @param $variable
   * @param $value
   */
  public static function set($variable, $value)
  {
    self::$apiConfig[$variable] = $value;
  }

}
Config::init(); // Workaround to initialize the static data-member