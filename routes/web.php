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

Route::get('/', 'HomeController');
Route::view('/test', 'teste');

// Route::resource('todo', 'TodoTestController');
/**
 * Routes created by resource
 *
 *
 * GET - /todo - index - TodoTestController.index - List The Todos
 * GET - /todo/create - create - TodoTestController.create - Form to create Todo
 * POST /todo - store - TodoTestController.store - Store the Todo
 * GET /todo/{id} - show - TodoTestController.show - Get a todo
 * GET /todo/{id}/edit - edit - TodoTestController.edit - Form to edit a Todo
 * PUT /todo/{id} - update - TodoTestController.update - Update a Todo
 * DELETE - destroy - TodoTestController.destroy - Delete a Todo
 */

Route::prefix('/todo')->group(function () {

    Route::get('/', 'TodoController@index')->name('todo.index'); // List of Todos

    Route::get('add', 'TodoController@create')->name('todo.add'); // Screen to add a new todo
    Route::post('add', 'TodoController@store'); // Action of add a new todo

    Route::get('edit/{id}', 'TodoController@update')->name('todo.edit'); // Screen to edit a todo
    Route::post('edit/{id}', 'TodoController@updateAction'); // Action of edit a todo

    Route::get('delete/{id}', 'TodoController@delete')->name('todo.del'); // Action of delete a todo

    Route::get('resolve/{id}', 'TodoController@resolve')->name('todo.done'); // Action of resolve or unresolve a todo

});

Route::prefix('/config')->group(function() {

    Route::get('/', 'Admin\ConfigController@index');
    Route::post('/', 'Admin\ConfigController@index');

    Route::get('info', 'Admin\ConfigController@info')->name('info');

    Route::get('permissoes', 'Admin\ConfigController@permissoes')->name('permissoes');

});


// Route::fallback(function() {
//     return view('404');
// });
