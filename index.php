<?php

define('MAINPATH', file_get_contents('mainpath'));

$url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

define('URL_SCHEME', parse_url($url, PHP_URL_SCHEME));
define('URL_HOST', parse_url($url, PHP_URL_HOST));
define('URL_PORT', parse_url($url, PHP_URL_PORT));
define('URL_PATH', parse_url($url, PHP_URL_PATH));
define('URL_QUERY', parse_url($url, PHP_URL_QUERY));
define('URL_FRAGMENT', parse_url($url, PHP_URL_FRAGMENT));

echo URL_PATH;

echo MAINPATH === URL_PATH;

?>