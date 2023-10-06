<?php

$routes = [
    // Home
    // ['method' => 'GET', 'route' => '/', 'controller_method' => 'HomeController@index'],
    'home' => ['method' => 'GET', 'path' => '/home', 'url' => '/', 'controller' => 'HomeController@index'],

    // User
    'user_index'    => ['method' => 'GET', 'path'  => '/user', 'url' => '/user_index', 'controller'   => 'UserController@index'],
    'user_login'    => ['method' => 'GET', 'path'  => '/user', 'url' => '/user_login', 'controller'   => 'UserController@login'],
    'user_auth'     => ['method' => 'POST', 'path'  => '/user', 'url' => '/user_auth', 'controller'   => 'UserController@user_auth'],
    'user_register' => ['method' => 'GET', 'path'  => '/user', 'url' => '/user_register', 'controller' => 'UserController@register'],
    'user_insert'   => ['method' => 'POST', 'path' => '/user', 'url' => '/user_insert', 'controller'   => 'UserController@insert'],

    // '/user/register' => 'UserController@register',
    // '/user/insert'   => 'UserController@insert',
];
