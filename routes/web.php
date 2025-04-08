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

$router->get('/student', 'StudentController@index');
$router->post('/student/create', 'StudentController@create');
$router->get('/student/{id}', 'StudentController@show');
$router->put('/student/update/{id}', 'StudentController@update');
$router->delete('/student/delete/{id}', 'StudentController@delete');
