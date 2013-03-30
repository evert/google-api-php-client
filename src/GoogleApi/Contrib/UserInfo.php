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

namespace GoogleApi\Contrib;

use GoogleApi\Service\Model;

class Userinfo extends Model {
    public $family_name;
    public $name;
    public $picture;
    public $locale;
    public $gender;
    public $email;
    public $birthday;
    public $link;
    public $given_name;
    public $timezone;
    public $id;
    public $verified_email;
    public function setFamily_name($family_name) {
        $this->family_name = $family_name;
    }
    public function getFamily_name() {
        return $this->family_name;
    }
    public function setName($name) {
        $this->name = $name;
    }
    public function getName() {
        return $this->name;
    }
    public function setPicture($picture) {
        $this->picture = $picture;
    }
    public function getPicture() {
        return $this->picture;
    }
    public function setLocale($locale) {
        $this->locale = $locale;
    }
    public function getLocale() {
        return $this->locale;
    }
    public function setGender($gender) {
        $this->gender = $gender;
    }
    public function getGender() {
        return $this->gender;
    }
    public function setEmail($email) {
        $this->email = $email;
    }
    public function getEmail() {
        return $this->email;
    }
    public function setBirthday($birthday) {
        $this->birthday = $birthday;
    }
    public function getBirthday() {
        return $this->birthday;
    }
    public function setLink($link) {
        $this->link = $link;
    }
    public function getLink() {
        return $this->link;
    }
    public function setGiven_name($given_name) {
        $this->given_name = $given_name;
    }
    public function getGiven_name() {
        return $this->given_name;
    }
    public function setTimezone($timezone) {
        $this->timezone = $timezone;
    }
    public function getTimezone() {
        return $this->timezone;
    }
    public function setId($id) {
        $this->id = $id;
    }
    public function getId() {
        return $this->id;
    }
    public function setVerified_email($verified_email) {
        $this->verified_email = $verified_email;
    }
    public function getVerified_email() {
        return $this->verified_email;
    }
}