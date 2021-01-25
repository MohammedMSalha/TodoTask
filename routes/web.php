<?php

use Illuminate\Support\Facades\Route;

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

    Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
    });


    //Midlleware group with auth
    Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    
        //Dashboard Route
        
        Route::get('/dashboard', 'App\Http\Controllers\categoryController@get_categories')->name('dashboard');
        Route::get('/dashboard/cat/{id}', 'App\Http\Controllers\taskController@get_tasks')->name('dashboard-cat');


        /**
        * Category Routes
        */
        Route::get('/cat', 'App\Http\Controllers\categoryController@index')->name('cat');
        Route::post('/cat','App\Http\Controllers\categoryController@store');
        //Edit
        Route::get('/cat/edit/{id}','App\Http\Controllers\categoryController@edit')->name('edit-cat');
        Route::put('/cat/edit/{id}','App\Http\Controllers\categoryController@update');
        //Delete
        Route::get('/cat/delete/{id}','App\Http\Controllers\categoryController@delete')->name('delete-cat');
        Route::delete('/cat/delete/{id}','App\Http\Controllers\categoryController@destroy');

        /**
        * Tasks Routes
        */
        Route::get('/tasks', 'App\Http\Controllers\taskController@index')->name('tasks');
        Route::post('/tasks','App\Http\Controllers\taskController@store');
        //Edit
        Route::get('/tasks/edit/{id}','App\Http\Controllers\taskController@edit')->name('edit-task');
        Route::put('/tasks/edit/{id}','App\Http\Controllers\taskController@update');
        //Delete
        Route::get('/tasks/delete/{id}','App\Http\Controllers\taskController@delete')->name('delete-task');
        Route::delete('/tasks/delete/{id}','App\Http\Controllers\taskController@destroy');
    
 });


