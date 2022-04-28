<?php

namespace Core;

use JetBrains\PhpStorm\NoReturn;

class Response
{
    #[NoReturn] public function Redirect($url = ''){
        if (preg_match('~^(http|https)~is',$url)){
            $URL = $url;
        } else {
            $URL = ROOT_URL.'/'.$url;
        }
        header("Location:".$URL);
        exit();
    }
}