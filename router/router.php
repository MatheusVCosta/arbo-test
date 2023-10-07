<?php

$routes = [
    // Home
    'home' => ['method' => 'GET', 'path' => '/home', 'url' => '/', 'controller' => 'HomeController@index'],

    // User CRUD
    'user_index'    => ['method' => 'GET', 'path'  => '/user', 'url' => '/user_index', 'controller'   => 'UserController@index'],
    'user_register' => ['method' => 'GET', 'path'  => '/user', 'url' => '/user_register', 'controller' => 'UserController@register'],
    'user_insert'   => ['method' => 'POST', 'path' => '/user', 'url' => '/user_insert', 'controller'   => 'UserController@insert'],
    // User Auth
    'user_login'    => ['method' => 'GET', 'path'  => '/user', 'url' => '/user_login', 'controller'   => 'UserController@login'],
    'user_auth'     => ['method' => 'POST', 'path'  => '/user', 'url' => '/user_auth', 'controller'   => 'UserController@user_auth'],
    'user_logout'   => ['method' => 'GET', 'path' => '/user', 'url' => '/user_logout', 'controller'   => 'UserController@user_logout'],

    //house CRUD
    'house_index'       => ['method' => 'GET', 'path' => '/house', 'url' => '/house_index', 'controller'   => 'HouseController@index'],
    'renderInsertHouse' => ['method' => 'GET', 'path' => '/house', 'url' => '/renderInsertHouse', 'controller'   => 'HouseController@renderInsertHouse'],
    'house_insert'      => ['method' => 'POST', 'path' => '/house', 'url' => '/house_insert', 'controller'   => 'HouseController@insert'],
    'house_update'      => ['method' => 'GET', 'path' => '/house', 'url' => '/house_update', 'controller'   => 'HouseController@update'],
    'house_delete'      => ['method' => 'GET', 'path' => '/house', 'url' => '/house_delete', 'controller'   => 'HouseController@delete'],

    // '/user/register' => 'UserController@register',
    // '/user/insert'   => 'UserController@insert',
];
