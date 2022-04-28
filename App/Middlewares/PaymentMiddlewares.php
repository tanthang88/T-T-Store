<?php

namespace App\Middlewares;
use Core\{MiddleWares, Session, Response};

class PaymentMiddlewares extends MiddleWares
{

    function handle()
    {
        $res = new Response();
        $account = Session::data('account');
        if (!isset($account)){
            $res->Redirect('login');
        }
    }
}