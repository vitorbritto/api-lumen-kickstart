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

// Version
$router->get('/', function () use($router) {
    return $router->app->version(); 
});

// Generate Security Key.
$router->get('/appKey', function () use($router) {
    return str_random(32); 
});

// Generate Access Token.
// $router->post('/accessToken', 'AccessTokenController@createAccessToken');

// API
$router->group(['prefix' => 'api/v1'], function() use($router) {

    /**
     * Auth Routes
     */
    // $router->group(['prefix' => 'auth'], function() use($router) {
    //     $router->post('/login', [
    //         'as'   => 'auth.login',
    //         'uses' => 'AuthController@login'
    //     ]);   

    //     $router->post('/signup', [
    //         'as'   => 'auth.signup',
    //         'uses' => 'AuthController@signup'
    //     ]);    
    // });
    

    /**
     * Users Routes
     */
    $router->group(['middleware' => [/* 'auth:api', */'throttle:60']], function() use($router) {
        $router->post('/users', [
            'as'         => 'users.store',
            'uses'       => 'UsersController@store',
            // 'middleware' => 'scope:users,users:create'
        ]);
        $router->get('/users', [
            'as'         => 'users.list',
            'uses'       => 'UsersController@index',
            // 'middleware' => 'scope:users,users:list'
        ]);
        $router->get('/users/{id}', [
            'as'         => 'users.show',
            'uses'       => 'UsersController@show',
            // 'middleware' => 'scope:users,users:show'
        ]);
        $router->put('/users/{id}', [
            'as'         => 'users.update',
            'uses'       => 'UsersController@update',
            // 'middleware' => 'scope:users,users:update'
        ]);
        $router->delete('/users/{id}', [
            'as'         => 'users.destroy',
            'uses'       => 'UsersController@destroy',
            // 'middleware' => 'scope:users,users:destroy'
        ]);
    });


});