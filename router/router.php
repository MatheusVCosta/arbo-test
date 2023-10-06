<?php

$routes = [
    // Home
    '/' => 'HomeController@index',

    // User
    '/user' => 'UserController@index',
    '/user/insert' => 'UserController@insert',
    '/user/{id}' => 'UserController@show',
];
