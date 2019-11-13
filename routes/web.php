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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function () {

    //roles
    Route::post('roles/store','RoleController@store')
    ->name('roles.store')->middleware('can:roles.create');

    Route::get('roles','RoleController@index')
    ->name('roles.index')->middleware('can:roles.index');

    Route::get('roles/create','RoleController@create')
    ->name('roles.create')->middleware('can:roles.create');

    Route::put('roles/{role}','RoleController@update')
    ->name('roles.update')->middleware('can:roles.edit');

    Route::get('roles/{role}','RoleController@show')
    ->name('roles.show')->middleware('can:roles.show');

    Route::delete('roles/{role}','RoleController@destroy')
    ->name('roles.destroy')->middleware('can:roles.destroy');

    Route::get('roles/{role}/edit','RoleController@edit')
    ->name('roles.edit')->middleware('can:roles.edit');


    //products
    Route::post('products/store','ProductController@store')
    ->name('products.store')->middleware('can:products.create');

    Route::get('products','ProductController@index')
    ->name('products.index')->middleware('can:products.index');

    Route::get('products/create','ProductController@create')
    ->name('products.create')->middleware('can:products.create');

    Route::put('products/{product}','ProductController@update')
    ->name('products.update')->middleware('can:products.edit');

    Route::get('products/{product}','ProductController@show')
    ->name('products.show')->middleware('can:products.show');

    Route::delete('products/{product}','ProductController@destroy')
    ->name('products.destroy')->middleware('can:products.destroy');
    
    Route::get('products/{product}/edit','ProductController@edit')
    ->name('products.edit')->middleware('can:products.edit');


    //users
    Route::post('users/store','UserController@store')
    ->name('users.store')->middleware('can:users.create');

    Route::get('users','UserController@index')
    ->name('users.index')->middleware('can:users.index');

    Route::get('users/create','UserController@create')
    ->name('users.create')->middleware('can:users.create');

    Route::put('users/{user}','UserController@update')
    ->name('users.update')->middleware('can:users.edit');

    Route::get('users/{user}','UserController@show')
    ->name('users.show')->middleware('can:users.show');

    Route::delete('users/{user}','UserController@destroy')
    ->name('users.destroy')->middleware('can:users.destroy');
    
    Route::get('users/{user}/edit','UserController@edit')
    ->name('users.edit')->middleware('can:users.edit');


    //departments
    Route::post('departments/store','DepartmentController@store')
    ->name('departments.store')->middleware('can:departments.create');

    Route::get('departments','DepartmentController@index')
    ->name('departments.index')->middleware('can:departments.index');

    Route::get('departments/create','DepartmentController@create')
    ->name('departments.create')->middleware('can:departments.create');

    Route::put('departments/{department}','DepartmentController@update')
    ->name('departments.update')->middleware('can:departments.edit');

    Route::get('departments/{department}','DepartmentController@show')
    ->name('departments.show')->middleware('can:departments.show');

    Route::delete('departments/{department}','DepartmentController@destroy')
    ->name('departments.destroy')->middleware('can:departments.destroy');
    
    Route::get('departments/{department}/edit','DepartmentController@edit')
    ->name('departments.edit')->middleware('can:departments.edit');

});
