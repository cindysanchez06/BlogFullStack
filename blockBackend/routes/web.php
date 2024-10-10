<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/api/posts/{categoryId}', 'PostController@index');
$router->post('/api/login', 'AuthController@login');
$router->group(['middleware' => 'Authenticate'], function () use ($router) {
    $router->post('/api/posts', 'PostController@create');
});
$router->post('/api/register', 'UserController@register');
