<?php
require_once "vendor/autoload.php";
require_once 'Bridge.php';
use Core\{App, Session};
Session::Start();
// echo "<pre>";
// // var_export($_SERVER["PATH_INFO"]);
// // echo "<hr>";
// // var_export($_SERVER);

// $url = 'http://benutzername:passwort@hostname:9090/pfad?argument=wert#textanker';

// var_dump(parse_url($url));
// var_dump(parse_url($url, PHP_URL_SCHEME));
// var_dump(parse_url($url, PHP_URL_USER));
// var_dump(parse_url($url, PHP_URL_PASS));
// var_dump(parse_url($url, PHP_URL_HOST));
// var_dump(parse_url($url, PHP_URL_PORT));
// var_dump(parse_url($url, PHP_URL_PATH));
// var_dump(parse_url($url, PHP_URL_QUERY));
// var_dump(parse_url($url, PHP_URL_FRAGMENT));


// print_r($_SERVER);
// echo "</pre>";
$app = new App();