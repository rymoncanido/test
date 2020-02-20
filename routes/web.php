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
Route::redirect('/', '/new');

Route::get('new', function () {
    return view('new');
})->name('new');

Route::post('/paintjob/new', 'paintjobsController@insert')->name('paintjob.store');



Route::get('paintjobs', 'paintjobsController@view')->name('paintjobs');
Route::get('paintjobs/{id}', 'paintjobsController@update')->name('paintjob.update');

Route::get('paintjobsrefresh', 'paintjobsController@refresh')->name('paintjobs.show');