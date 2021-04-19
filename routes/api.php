<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/students', 'StudentsController@index');
Route::get('/students/{student}', 'StudentsController@show')->name('students.show');
Route::post('/students', 'StudentsController@store')->name('students.store');
Route::put('/students/{student}', 'StudentsController@update')->name('students.update');
Route::delete('/students/{student}', 'StudentsController@destroy')->name('students.destroy');

Route::apiResource('classrooms', 'ClassroomController');
