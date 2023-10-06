<?php

$routes = [
    // Home
    // ['method' => 'GET', 'route' => '/', 'controller_method' => 'HomeController@index'],
    'home' => [
        ['method' => 'GET', 'path' => '/home', 'url' => '/', 'controller' => 'HomeController@index'],
    ],

    // User
    'user' => [
        ['method' => 'GET', 'path' => '/user', 'url' => '/user', 'controller' => 'UserController@index'],
        ['method' => 'GET', 'path' => '/user', 'url' => '/user/insert', 'controller' => 'UserController@insert']
    ],
    // '/user/register' => 'UserController@register',
    // '/user/insert'   => 'UserController@insert',
];
