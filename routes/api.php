<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/', function () use ($app) {
    return $app->version();
});

$app->group(['prefix' => 'api'], function () use ($app) {
    $app->post('/register', [
        'uses' => 'UserController@create',
    ]);

    $app->post('/login', [
        'uses' => 'UserController@login',
    ]);

    $app->get('/users/{id:[0-9]+}', [
        'middleware' => 'auth',
        'uses'       => 'UserController@getDetail',
    ]);
});
