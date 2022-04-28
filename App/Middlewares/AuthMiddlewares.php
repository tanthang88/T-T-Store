<?php

namespace App\Middlewares;
use Core\{App, MiddleWares, Session, Response};
class AuthMiddlewares extends MiddleWares
{

    function handle()
    {
        $res = new Response();
        $acc = Session::data('account');
        if (!empty($acc) && $acc[0]->role === 1){} else {
            $res->Redirect(ROOT_URL.'/login');
        }
    }
}