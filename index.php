<?php

define('MAINPATH', file_get_contents('mainpath'));

$url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

define('URL_SCHEME', parse_url($url, PHP_URL_SCHEME));
define('URL_HOST', parse_url($url, PHP_URL_HOST));
define('URL_PORT', parse_url($url, PHP_URL_PORT));
define('URL_QUERY', parse_url($url, PHP_URL_QUERY));
define('URL_FRAGMENT', parse_url($url, PHP_URL_FRAGMENT));

$url_path = parse_url($url, PHP_URL_PATH);
if (substr($url_path, -1) == '/') {
    define('URL_PATH', substr($url_path, 0, -1));
} else {
    define('URL_PATH', $url_path);
}

switch (URL_PATH) {
    case MAINPATH . '/transit':
        transit_path();
        break;

    case MAINPATH . '/transit/json':
        transit_json_path();
        break;
    
    default:
        # code...
        break;
}


function transit_path() {
    $content_json = file_get_contents('content/transit.json');
    $content = json_encode($content_json);
    var_dump(json_decode($content_json, true));
}

function transit_json_path() {
    $content_json = file_get_contents('content/transit.json');
    echo $content_json;
}


echo URL_PATH;

echo MAINPATH === URL_PATH;

?>