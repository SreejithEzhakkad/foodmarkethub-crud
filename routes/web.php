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

$router->get('properties', [
    'as' => 'properties.index', 'uses' => 'PropertyController@index'
]);
$router->post('properties', [
    'as' => 'properties.store', 'uses' => 'PropertyController@store'
]);
$router->get('properties/{id}', [
    'as' => 'properties.show', 'uses' => 'PropertyController@show'
]);
$router->put('properties/{id}', [
    'as' => 'properties.update', 'uses' => 'PropertyController@update'
]);
$router->delete('properties/{id}', [
    'as' => 'properties.destroy', 'uses' => 'PropertyController@destroy'
]);