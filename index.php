<?php
require_once "vendor/autoload.php";
require_once 'Bridge.php';
use Core\{App, Session};
Session::Start();
$app = new App();