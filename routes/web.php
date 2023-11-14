<?php

use Illuminate\Http\Request;
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

Route::middleware('web')->group(function () {
    // Public Route
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/login', 'Auth\AuthController@form')->name('login');
    Route::post('/login', 'Auth\AuthController@login')->name('doLogin');

    // Admin Route
    Route::prefix('admin')->middleware('auth')->group(function () {
        Route::get('/', 'Admin\HomeController@index')->name('admin.home');
        Route::get('/logout', 'Auth\AuthController@logout')->name('admin.logout');
        Route::get('/password', 'Admin\PasswordController@index')->name('admin.password.index');
        Route::post('/password', 'Admin\PasswordController@update')->name('admin.password.update');

        // Anggota
        Route::prefix('anggota')->group(function () {
            Route::get('json', 'Admin\AnggotaController@json')->name('admin.anggota.json');
            Route::get('{anggota}/delete', 'Admin\AnggotaController@delete')->name('admin.anggota.delete');
        });
        Route::resource('anggota', 'Admin\AnggotaController', ['as' => 'admin'])->except(['destroy']);

        // Content
        Route::prefix('content')->group(function () {
            Route::get('json', 'Admin\ContentController@json')->name('admin.content.json');
            Route::get('{content}/delete', 'Admin\ContentController@delete')->name('admin.content.delete');
        });
        Route::resource('content', 'Admin\ContentController', ['as' => 'admin'])->except(['destroy']);
    });
});