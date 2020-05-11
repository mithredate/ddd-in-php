<?php

/** @var Router $router */

use Illuminate\Routing\Router;

$router->group(
    ['prefix' => 'orders', 'namespace' => 'Order'],
    function () use ($router) {
        $router->post('/', ['as' => 'orders.store', 'uses' => 'OrderController@store']);
    }
);
