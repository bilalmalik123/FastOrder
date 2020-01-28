<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



$router->get('/task1', 'Task1Controller@task1');

$router->get('/task2', 'Task2Controller@task2');
$router->post('show', 'Task2Controller@getshow');