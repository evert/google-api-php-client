Google APIs Client Library for PHP
=====================================

## Description
The Google API Client Library enables you to work with Google APIs such as Buzz, Moderator, Tasks, or Latitude on your server.

This is a forked version from:
* http://code.google.com/p/google-api-php-client/

Current version is hosted here:
* https://github.com/evert/google-api-php-client

## Fork information

This project was forked to modernize the google api codebase a little bit.
The following changes have been made:

* Gotted rid of all require() statements. An autoloader is now required
* Renamed all classes. Everything is now in a GoogleApi namespace.
* Added composer package information (todo)
* Gotted rid of automatically executing code.

The existing documentation applies, just keep in mind that instead of class
like `apiHttpRequest`, you must now use `\GoogleApi\Io\HttpRequest`.



## Requirements:

* PHP 5.3.x or higher (http://www.php.net/)
* PHP Curl extension (http://www.php.net/manual/en/intro.curl.php)
* PHP JSON extension (http://php.net/manual/en/book.json.php)

Project page:

* http://code.google.com/p/google-api-php-client

OAuth 2 instructions:

* http://code.google.com/p/google-api-php-client/wiki/OAuth2

Report a defect or feature request here:

* http://code.google.com/p/google-api-php-client/issues/entry

Subscribe to project updates in your feed reader:

* http://code.google.com/feeds/p/google-api-php-client/updates/basic

Supported sample applications:
* http://code.google.com/p/google-api-php-client/wiki/Samples

## Basic Example

```
<?php
include 'vendor/autoload.php';

$client = new \GoogleApi\Client();
$service = new \GoogleApi\Books\Service($client);

$optParams = array('filter' => 'free-ebooks');
$results = $service->volumes->listVolumes('Henry David Thoreau', $optParams);

foreach ($results['items'] as $item) {
  print($item['volumeInfo']['title'] . '<br>');
}
```
