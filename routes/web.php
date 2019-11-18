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

//Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function () {

    //roles
    Route::post('roles/store', 'RoleController@store')
        ->name('roles.store')->middleware('can:roles.create');

    Route::get('roles', 'RoleController@index')
        ->name('roles.index')->middleware('can:roles.index');

    Route::get('roles/create', 'RoleController@create')
        ->name('roles.create')->middleware('can:roles.create');

    Route::put('roles/{role}', 'RoleController@update')
        ->name('roles.update')->middleware('can:roles.edit');

    Route::get('roles/{role}', 'RoleController@show')
        ->name('roles.show')->middleware('can:roles.show');

    Route::delete('roles/{role}', 'RoleController@destroy')
        ->name('roles.destroy')->middleware('can:roles.destroy');

    Route::get('roles/{role}/edit', 'RoleController@edit')
        ->name('roles.edit')->middleware('can:roles.edit');

    //products
    Route::post('posts/store', 'PostController@store')
        ->name('posts.store')->middleware('can:posts.create');

    Route::get('posts', 'PostController@index')
        ->name('posts.index')->middleware('can:posts.index');

    Route::get('posts/create', 'PostController@create')
        ->name('posts.create')->middleware('can:posts.create');

    Route::put('posts/{post}', 'PostController@update')
        ->name('posts.update')->middleware('can:posts.edit');

    Route::get('posts/{post}', 'PostController@show')
        ->name('posts.show')->middleware('can:posts.show');

    Route::delete('posts/{post}', 'PostController@destroy')
        ->name('posts.destroy')->middleware('can:posts.destroy');

    Route::get('posts/{post}/edit', 'PostController@edit')
        ->name('posts.edit')->middleware('can:posts.edit');

    //users
    Route::post('users/store', 'UserController@store')
        ->name('users.store')->middleware('can:users.create');

    Route::get('users', 'UserController@index')
        ->name('users.index')->middleware('can:users.index');

    Route::get('users/create', 'UserController@create')
        ->name('users.create')->middleware('can:users.create');

    Route::put('users/{user}', 'UserController@update')
        ->name('users.update')->middleware('can:users.edit');

    Route::get('users/{user}', 'UserController@show')
        ->name('users.show')->middleware('can:users.show');

    Route::delete('users/{user}', 'UserController@destroy')
        ->name('users.destroy')->middleware('can:users.destroy');

    Route::get('users/{user}/edit', 'UserController@edit')
        ->name('users.edit')->middleware('can:users.edit');

    //departments
    Route::post('departments/store', 'DepartmentController@store')
        ->name('departments.store')->middleware('can:departments.create');

    Route::get('departments', 'DepartmentController@index')
        ->name('departments.index')->middleware('can:departments.index');

    Route::get('departments/create', 'DepartmentController@create')
        ->name('departments.create')->middleware('can:departments.create');

    Route::put('departments/{department}', 'DepartmentController@update')
        ->name('departments.update')->middleware('can:departments.edit');

    Route::get('departments/{department}', 'DepartmentController@show')
        ->name('departments.show')->middleware('can:departments.show');

    Route::delete('departments/{department}', 'DepartmentController@destroy')
        ->name('departments.destroy')->middleware('can:departments.destroy');

    Route::get('departments/{department}/edit', 'DepartmentController@edit')
        ->name('departments.edit')->middleware('can:departments.edit');

    // //categories
    // Route::post('categories/store', 'CategoryController@store')
    //     ->name('categories.store')->middleware('can:categories.create');

    // Route::get('categories', 'CategoryController@index')
    //     ->name('categories.index')->middleware('can:categories.index');

    // Route::get('categories/create', 'CategoryController@create')
    //     ->name('categories.create')->middleware('can:categories.create');

    // Route::put('categories/{category}', 'CategoryController@update')
    //     ->name('categories.update')->middleware('can:categories.edit');

    // Route::get('categories/{category}', 'CategoryController@show')
    //     ->name('categories.show')->middleware('can:categories.show');

    // Route::delete('categories/{category}', 'CategoryController@destroy')
    //     ->name('categories.destroy')->middleware('can:categories.destroy');

    // Route::get('categories/{category}/edit', 'CategoryController@edit')
    //     ->name('categories.edit')->middleware('can:categories.edit');

    Route::resource('categories','CategoryController');

});
