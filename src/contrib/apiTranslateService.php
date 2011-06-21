<?php
/*
 * Copyright 2011 Google Inc.
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


require_once 'service/apiServiceRequest.php';


  /**
   * The "languages" collection of methods.
   * Typical usage is:
   *  <code>
   *   $translateService = new apiTranslateService(...);
   *   $languages = $translateService->languages;
   *  </code>
   */
  class LanguagesServiceResource extends apiServiceResource {


    /**
     * List the source/target languages supported by the API (languages.list)
     *
     * @param  $target the language and collation in which the localized results should be returned
     */
    public function listLanguages($target = null) {
      return $this->__call('list', array(array('target' => $target)));
    }
  }

  /**
   * The "detections" collection of methods.
   * Typical usage is:
   *  <code>
   *   $translateService = new apiTranslateService(...);
   *   $detections = $translateService->detections;
   *  </code>
   */
  class DetectionsServiceResource extends apiServiceResource {


    /**
     * Detect the language of text. (detections.list)
     *
     * @param  $q The text to detect
     */
    public function listDetections($q) {
      return $this->__call('list', array(array('q' => $q)));
    }
  }

  /**
   * The "translations" collection of methods.
   * Typical usage is:
   *  <code>
   *   $translateService = new apiTranslateService(...);
   *   $translations = $translateService->translations;
   *  </code>
   */
  class TranslationsServiceResource extends apiServiceResource {


    /**
     * Returns text translations from one language to another. (translations.list)
     *
     * @param  $q The text to translate
     * @param  $source The source language of the text
     * @param  $target The target language into which the text should be translated
     * @param  $format The format of the text
     */
    public function listTranslations($q, $target, $format = null, $source = null) {
      return $this->__call('list', array(array('q' => $q, 'source' => $source, 'target' => $target, 'format' => $format)));
    }
  }



/**
 * Service definition for Translate (v2).
 *
 * <p>
 * Lets you translate text from one language to another
 * </p>
 *
 * <p>
 * For more information about this service, see the
 * <a href="" target="_blank">API Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class apiTranslateService {

  // Variables that the apiServiceResource implementation depends on.
  private $serviceName = 'translate';
  private $version = 'v2';
  private $restBasePath = '/language/translate/';
  private $rpcPath = '/rpc';
  private $io;
  // apiServiceResource's that are used internally
  public $languages;
  public $detections;
  public $translations;
  /**
   * Constructs the internal representation of the Translate service.
   *
   * @param apiClient apiClient
   */
  public function __construct(apiClient $apiClient) {
     $apiClient->addService($this->serviceName, $this->version);
     $this->io = $apiClient->getIo();
     $this->languages = new LanguagesServiceResource($this, $this->serviceName, 'languages', json_decode('{"methods": {"list": {"parameters": {"target": {"restParameterType": "query", "type": "string"}}, "rpcMethod": "language.languages.list", "httpMethod": "GET", "response": {"$ref": "LanguagesListResponse"}, "restPath": "v2/languages"}}}', true));
     $this->detections = new DetectionsServiceResource($this, $this->serviceName, 'detections', json_decode('{"methods": {"list": {"parameters": {"q": {"restParameterType": "query", "required": true, "type": "string", "repeated": true}}, "rpcMethod": "language.detections.list", "httpMethod": "GET", "response": {"$ref": "DetectionsListResponse"}, "restPath": "v2/detect"}}}', true));
     $this->translations = new TranslationsServiceResource($this, $this->serviceName, 'translations', json_decode('{"methods": {"list": {"parameters": {"q": {"restParameterType": "query", "required": true, "type": "string", "repeated": true}, "source": {"restParameterType": "query", "type": "string"}, "target": {"restParameterType": "query", "required": true, "type": "string"}, "format": {"restParameterType": "query", "enum": ["html", "text"], "type": "string"}}, "rpcMethod": "language.translations.list", "httpMethod": "GET", "response": {"$ref": "TranslationsListResponse"}, "restPath": "v2"}}}', true));
  }

  /**
   * @return $io
   */
  public function getIo() {
    return $this->io;
  }
  /**
   * @return $version
   */
  public function getVersion() {
    return $this->version;
  }

  /**
   * @return $restBasePath
   */
  public function getRestBasePath() {
    return $this->restBasePath;
  }

  /**
   * @return $rpcPath
   */
  public function getRpcPath() {
    return $this->rpcPath;
  }
}

class DetectionsListResponse {

  public $detections;

  public function setDetections( DetectionsResource $detections) {
    $this->detections = $detections;
  }

  public function getDetections() {
    return $this->detections;
  }
  
}


class LanguagesListResponse {

  public $languages;

  public function setLanguages( LanguagesResource $languages) {
    $this->languages = $languages;
  }

  public function getLanguages() {
    return $this->languages;
  }
  
}


class DetectionsResource {

  public $items;

  public function setItems( $items) {
    $this->items = $items;
  }


}


class DetectionsResourceItems {

  public $isReliable;
  public $confidence;
  public $language;

  public function setIsReliable($isReliable) {
    $this->isReliable = $isReliable;
  }

  public function getIsReliable() {
    return $this->isReliable;
  }
  
  public function setConfidence($confidence) {
    $this->confidence = $confidence;
  }

  public function getConfidence() {
    return $this->confidence;
  }
  
  public function setLanguage($language) {
    $this->language = $language;
  }

  public function getLanguage() {
    return $this->language;
  }
  
}


class LanguagesResource {

  public $name;
  public $language;

  public function setName($name) {
    $this->name = $name;
  }

  public function getName() {
    return $this->name;
  }
  
  public function setLanguage($language) {
    $this->language = $language;
  }

  public function getLanguage() {
    return $this->language;
  }
  
}


class TranslationsResource {

  public $detectedSourceLanguage;
  public $translatedText;

  public function setDetectedSourceLanguage($detectedSourceLanguage) {
    $this->detectedSourceLanguage = $detectedSourceLanguage;
  }

  public function getDetectedSourceLanguage() {
    return $this->detectedSourceLanguage;
  }
  
  public function setTranslatedText($translatedText) {
    $this->translatedText = $translatedText;
  }

  public function getTranslatedText() {
    return $this->translatedText;
  }
  
}


class TranslationsListResponse {

  public $translations;

  public function setTranslations( TranslationsResource $translations) {
    $this->translations = $translations;
  }

  public function getTranslations() {
    return $this->translations;
  }
  
}

