<?php

namespace Core;


use JetBrains\PhpStorm\NoReturn;

class Session
{
    public static function Start(){
        session_start();
    }
    static function data($key = '', $value = ''){
        $session_key = self::isInvalid();
        if (!empty($value)){
            if (!empty($key)){
                $_SESSION[$session_key][$key] = $value; //SET SESSION
                return true;
            }
        } else {
            if (empty($key)){
                if (isset($_SESSION[$session_key])){
                    return $_SESSION[$session_key];
                }
            } else {
                if (isset($_SESSION[$session_key][$key])){
                    return $_SESSION[$session_key][$key]; //GET SESSION
                }
            }
        }
    }

    static function deleteSession($key = ''): bool
    {
        $session_key = self::isInvalid();
        if (!empty($key)){
            if (isset($_SESSION[$session_key][$key])){
                unset($_SESSION[$session_key][$key]);
                return true;
            }
            return false;
        } else {
            unset($_SESSION[$session_key]);
            return true;
        }
        return false;
    }

    static function check(){
        echo "<pre>";
        print_r($_SESSION);
        echo "</pre>";
    }

//    static function getConfig(){
//        global $config;
//        $ssConfig = $config['session'];
//        return $_SESSION[$session_key];
//    }

    #[NoReturn] static function showError($message){
        $data = array('message'=>$message);
        App::$app->loadPageErr('ExceptionError',$data);
        die();
    }
    static function isInvalid(){
        global $config;
        if (!empty($config['session'])){
            $ssConfig = $config['session'];
            if (!empty($ssConfig['session_key'])){
                return $ssConfig['session_key'];
            } else {
                self::showError('Thiếu config SESSION_KEY, vui lòng kiểm tra lại file [Config/Session.php]');
            }
        } else {
            self::showError('Thiếu config SESSION, vui lòng kiểm tra lại file [Config/Session.php]');
        }
    }
}
/*class Session{
    private static bool $_sessionStart = false;
    public static function Start(){
        if (self::$_sessionStart == false){
            session_start();
            self::$_sessionStart = true;
        }
    }
    public static function setSession($key, $value){
        $_SESSION[$key] = $value;
    }
    public static function setSessionArray($key, $value){
        $_SESSION[$key][] = $value;
    }
    public static function getSession($key){
        return $_SESSION[$key] ?? false;
    }
    public static function deleteSession($key): bool
    {
        if (!empty($key)){
            if (isset($_SESSION[$key])){
                unset($_SESSION[$key]);
                return true;
            }
            return false;
        } else {
            unset($_SESSION);
            return true;
        }
        return false;
    }
    public static function check(){
        echo '<pre>';
        print_r($_SESSION);
        echo '</pre>';
    }
}*/