<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

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

Auth::routes();

Route::middleware('has.role')->prefix('xyz')->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');

    Route::prefix('role-and-permission')->namespace('Permissions')->group(function () {
        Route::get('assignable', 'AssignController@create')->name('assign.create');
        Route::post('assignable', 'AssignController@store');
        Route::get('assignable/{role}/edit', 'AssignController@edit')->name('assign.edit');
        Route::put('assignable/{role}/edit', 'AssignController@update');

        // User
        Route::get('assign/user', 'UserController@create')->name('assign.user.create');
        Route::post('assign/user', 'UserController@store');
        Route::get('assign/{user}/user', 'UserController@edit')->name('assign.user.edit');
        Route::put('assign/{user}/user', 'UserController@update');

        Route::prefix('roles')->group(function () {
            Route::get('', 'RoleController@index')->name('roles.index');
            Route::post('create', 'RoleController@store')->name('roles.create');
            Route::get('{role}/edit', 'RoleController@edit')->name('roles.edit');
            Route::put('{role}/edit', 'RoleController@update');
        });

        Route::prefix('permissions')->group(function () {
            Route::get('', 'PermissionController@index')->name('permissions.index');
            Route::post('create', 'PermissionController@store')->name('permissions.create');
            Route::get('{permission}/edit', 'PermissionController@edit')->name('permissions.edit');
            Route::put('{permission}/edit', 'PermissionController@update');
        });
    });

    Route::prefix('navigation')->middleware('permission:create navigation')->group(function () {
        Route::get('create', 'NavigationController@create')->name('navigation.create');
        Route::post('create', 'NavigationController@store');
    });
    
});

Route::get('/home', 'HomeController@index')->name('home');
