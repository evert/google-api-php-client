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

/**
 * This class defines attributes, valid values, and usage which is generated from
 * a given json schema. http://tools.ietf.org/html/draft-zyp-json-schema-03#section-5
 *
 * @author Chirag Shah <chirags@google.com>
 *
 */
class apiModel {
  protected $typeMap = array();

  public function __construct( /* polymorphic */ ) {
    if (func_num_args() ==  1 && 'array' == gettype(func_get_arg(0))) {
      // Initialize the model with the array's contents.
      $array = func_get_arg(0);
      $this->mapTypes($array);
    }
  }

  private function mapTypes($array) {
    foreach ($array as $key => $val) {
      $this->$key = $val;

      if ($this->useObjects()) {
        if ('items' == $key) {
          foreach ($val as $arrayIndex => $arrayItem) {
            if (isset($this->typeMap[$arrayItem['kind']])) {
              $this->items = array();
              $this->items[$arrayIndex] = $this->createObjectFromKind($arrayItem);
            }
          }
        }
        else if (isset($this->typeMap[$val['kind']])) {
          $this->$key = $this->createObjectFromKind($val);
        }
        else if (isset($this->typeMap[$key])) {
          $type = $this->typeMap[$key];
          $this->$key = new $type($val);
        }
      }
    }
  }

  private function createObjectFromKind($item) {
    $type = $this->typeMap[$item['kind']];
    return new $type($item);
  }
  
  protected function useObjects() {
    global $apiConfig;
    return (isset($apiConfig['use_objects']) && $apiConfig['use_objects']);
  }
}