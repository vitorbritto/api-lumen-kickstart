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

// Temporary route to generate the security key.
// $router->get('/key', function () use ($router) {
//     return str_random(32);
// });


$router->group(['prefix' => 'api/v1'], function() use($router) {
    $router->get('/', function () use ($router) {
        return $router->app->version();
    });

    $router->post('/users', 'UsersController@store');
    $router->get('/users', 'UsersController@index');
    $router->get('/users/{id}', 'UsersController@show');
    $router->put('/users/{id}', 'UsersController@update');
    $router->delete('/users/{id}', 'UsersController@destroy');
});