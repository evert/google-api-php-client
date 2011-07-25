<?php
/*
 * Copyright (c) 2010 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

require_once 'service/apiModel.php';
require_once 'service/apiServiceRequest.php';


  /**
   * The "training" collection of methods.
   * Typical usage is:
   *  <code>
   *   $predictionService = new apiPredictionService(...);
   *   $training = $predictionService->training;
   *  </code>
   */
  class TrainingServiceResource extends apiServiceResource {


    /**
     * Begin training your model (training.insert)
     *
     * @param string $data mybucket%2Fmydata resource in Google Storage
     * @param $postBody the {@link PredictionTrainingInsert}
     */
    public function insert($data, PredictionTrainingInsert $postBody) {
      $params = array('data' => $data, 'postBody' => $postBody);
      return $this->__call('insert', array($params));
    }
    /**
     * Check training status of your model (training.get)
     *
     * @param string $data mybucket%2Fmydata resource in Google Storage
     */
    public function get($data) {
      $params = array('data' => $data);
      return $this->__call('get', array($params));
    }
    /**
     * Delete a trained model (training.delete)
     *
     * @param string $data mybucket%2Fmydata resource in Google Storage
     */
    public function delete($data) {
      $params = array('data' => $data);
      return $this->__call('delete', array($params));
    }
  }


  /**
   * The "predict" collection of methods.
   * Typical usage is:
   *  <code>
   *   $predictionService = new apiPredictionService(...);
   *   $predict = $predictionService->predict;
   *  </code>
   */
  class PredictServiceResource extends apiServiceResource {
    /**
     * Submit data and request a prediction (predict.predict)
     *
     * @param string $data mybucket%2Fmydata resource in Google Storage
     * @param $postBody the {@link PredictionPredictRequest}
     */
    public function predict($data, PredictionPredictRequest $postBody) {
      $params = array('data' => $data, 'postBody' => $postBody);
      return $this->__call('predict', array($params));
    }

  }


/**
 * Service definition for Prediction (v1.1).
 *
 * <p>
 * Lets you access a cloud hosted machine learning service that makes it easy to build smart apps
 * </p>
 *
 * <p>
 * For more information about this service, see the
 * <a href="http://code.google.com/apis/predict/docs/developer-guide.html" target="_blank">API Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class apiPredictionService {

  // Variables that the apiServiceResource implementation depends on.
  private $serviceName = 'prediction';
  private $version = 'v1.1';
  private $restBasePath = '/prediction/v1.1/';
  private $rpcPath = '/rpc';
  private $io;
  // apiServiceResource's that are used internally
  public $training;
  /**
   * Constructs the internal representation of the Prediction service.
   *
   * @param apiClient apiClient
   */
  public function __construct(apiClient $apiClient) {
     $apiClient->addService($this->serviceName, $this->version);
     $this->io = $apiClient->getIo();
     $this->training = new TrainingServiceResource($this, $this->serviceName, 'training', json_decode('{"methods": {"insert": {"scopes": ["https://www.googleapis.com/auth/prediction"], "parameters": {"data": {"required": true, "type": "string", "location": "query"}}, "request": {"$ref": "PredictionTrainingInsert"}, "id": "prediction.training.insert", "httpMethod": "POST", "path": "training", "response": {"$ref": "PredictionTrainingInsert"}}, "delete": {"scopes": ["https://www.googleapis.com/auth/prediction"], "parameters": {"data": {"required": true, "type": "string", "location": "path"}}, "httpMethod": "DELETE", "path": "training/{data}", "id": "prediction.training.delete"}, "get": {"scopes": ["https://www.googleapis.com/auth/prediction"], "parameters": {"data": {"required": true, "type": "string", "location": "path"}}, "id": "prediction.training.get", "httpMethod": "GET", "path": "training/{data}", "response": {"$ref": "PredictionTrainingGet"}}}}', true));
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

class PredictionPredictRequestInput extends apiModel {

  public $text;
  public $mixture;
  public $numeric;

  public function setText($text) {
    $this->text = $text;
  }

  public function getText() {
    return $this->text;
  }
  
  public function setMixture($mixture) {
    $this->mixture = $mixture;
  }

  public function getMixture() {
    return $this->mixture;
  }
  
  public function setNumeric($numeric) {
    $this->numeric = $numeric;
  }

  public function getNumeric() {
    return $this->numeric;
  }
  
}


class PredictionTrainingInsert extends apiModel {

  public $data;

  public function setData($data) {
    $this->data = $data;
  }

  public function getData() {
    return $this->data;
  }
  
}


class OutputOutputMulti extends apiModel {

  public $score;
  public $label;

  public function setScore($score) {
    $this->score = $score;
  }

  public function getScore() {
    return $this->score;
  }
  
  public function setLabel($label) {
    $this->label = $label;
  }

  public function getLabel() {
    return $this->label;
  }
  
}


class PredictionPredictRequest extends apiModel {

  public $input;

  public function setInput(PredictionPredictRequestInput $input) {
    $this->input = $input;
  }

  public function getInput() {
    return $this->input;
  }
  
}


class Output extends apiModel {

  public $kind;
  public $outputLabel;
  public $outputMulti;
  public $outputValue;

  public function setKind($kind) {
    $this->kind = $kind;
  }

  public function getKind() {
    return $this->kind;
  }
  
  public function setOutputLabel($outputLabel) {
    $this->outputLabel = $outputLabel;
  }

  public function getOutputLabel() {
    return $this->outputLabel;
  }
  
  public function setOutputMulti(OutputOutputMulti $outputMulti) {
    $this->outputMulti = $outputMulti;
  }

  public function getOutputMulti() {
    return $this->outputMulti;
  }
  
  public function setOutputValue($outputValue) {
    $this->outputValue = $outputValue;
  }

  public function getOutputValue() {
    return $this->outputValue;
  }
  
}


class PredictionTrainingGet extends apiModel {

  public $data;
  public $modelinfo;

  public function setData($data) {
    $this->data = $data;
  }

  public function getData() {
    return $this->data;
  }
  
  public function setModelinfo($modelinfo) {
    $this->modelinfo = $modelinfo;
  }

  public function getModelinfo() {
    return $this->modelinfo;
  }
  
}

