<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


Route::get('/', function() use ($app)
{

    $users = new Expense\Admin\Users\UserRepository();

    $users->findByEmail('rodwinlising@gmail.com');
    $users->findByID(2);
    Profiler::addCheckpoint();
    return View::make('hello');
});

Route::get('/test', function() use ($app)
{
    Profiler::disable();
});

Route::get('users', array('uses' => 'UsersController@getIndex'));