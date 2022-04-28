<?php
if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on'){
    $ROOT_URL = 'https://'.$_SERVER['HTTP_HOST'];
} else {
    $ROOT_URL = 'http://'.$_SERVER['HTTP_HOST'];
    $folder = array_values(array_filter(explode("/",$_SERVER['PHP_SELF'])));
    $ROOT_URL = $ROOT_URL.'/'.strtolower($folder[0]);
}
const __DIR_ROOT = __DIR__;
define('ROOT_URL', $ROOT_URL);

require_once 'Config/Middlewares.php';
require_once 'Config/Routes.php';
require_once 'Config/Session.php';
require_once 'Config/Database.php';
/*Kiểm tra config của database, nếu có thì load database, còn không báo lỗi thiếu config*/
if (!empty($config['database'])){
    $DB_Config = array_filter($config['database']);
};
