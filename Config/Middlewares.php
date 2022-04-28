<?php

use App\Middlewares\{AuthMiddlewares, PaymentMiddlewares};

$config['middlewares'] = array(
    'routerMiddleware' => array(
        /*Admin middleware*/
        'admin/dashboard' => AuthMiddlewares::class,
        'admin/add-category' => AuthMiddlewares::class,
        'admin/category/loadViewAddCategory',
        'admin/add-category/message' => AuthMiddlewares::class,
        'admin/list-category' => AuthMiddlewares::class,
        'admin/edit-category' => AuthMiddlewares::class,
        'admin/edit-category/message' => AuthMiddlewares::class,
        'admin/delete-category' => AuthMiddlewares::class,
        'admin/add-product' => AuthMiddlewares::class,
        'admin/add-product/message' => AuthMiddlewares::class,
        'admin/list-product' => AuthMiddlewares::class,
        'admin/edit-product' => AuthMiddlewares::class,
        'admin/delete-product' => AuthMiddlewares::class,
        'admin/update-product' => AuthMiddlewares::class,
        'admin/delete-related-image' => AuthMiddlewares::class,
        'admin/list-order' => AuthMiddlewares::class,
        'admin/order' => AuthMiddlewares::class,
        'admin/list-customer' =>AuthMiddlewares::class,
        'admin/edit-customer' =>AuthMiddlewares::class,
        'admin/delete-customer' =>AuthMiddlewares::class,
        /*Cart middleware*/
        'payment' => PaymentMiddlewares::class,
        'payment-check' => PaymentMiddlewares::class
    )
);