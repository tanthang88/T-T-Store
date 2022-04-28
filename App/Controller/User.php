<?php
use \Core\{Controller, Session, Response};
use JetBrains\PhpStorm\NoReturn;

class User extends Controller
{
    #[NoReturn] public function logout(){
        $logout = Session::deleteSession('account');
        if ($logout){
            $res = new Response();
            $res->Redirect();
        } else {
            echo '<script>alert("Đăng xuất không thành công")</script>';
        }
    }

}