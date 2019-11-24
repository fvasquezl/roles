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

Route::prefix('/admin')
    ->namespace('Admin')
    ->middleware('auth')
    ->name('admin.')
    ->group(function(){

        //
        // POSTS
        //

        Route::post('posts/store', 'PostController@store')
            ->name('posts.store')->middleware('can:admin.posts.create');

        Route::get('posts', 'PostController@index')
            ->name('posts.index')->middleware('can:admin.posts.index');

        Route::get('posts/create', 'PostController@create')
            ->name('posts.create')->middleware('can:admin.posts.create');

        Route::put('posts/{post}', 'PostController@update')
            ->name('posts.update')->middleware('can:admin.posts.edit');

        Route::get('posts/{post}', 'PostController@show')
            ->name('posts.show')->middleware('can:admin.posts.show');

        Route::delete('posts/{post}', 'PostController@destroy')
            ->name('posts.destroy')->middleware('can:admin.posts.destroy');

        Route::get('posts/{post}/edit', 'PostController@edit')
            ->name('posts.edit')->middleware('can:admin.posts.edit');

        //
        // ROLES
        //

        Route::post('roles/store', 'RoleController@store')
            ->name('roles.store')->middleware('can:admin.roles.create');

        Route::get('roles', 'RoleController@index')
            ->name('roles.index')->middleware('can:admin.roles.index');

        Route::get('roles/create', 'RoleController@create')
            ->name('roles.create')->middleware('can:admin.roles.create');

        Route::put('roles/{role}', 'RoleController@update')
            ->name('roles.update')->middleware('can:admin.roles.edit');

        Route::get('roles/{role}', 'RoleController@show')
            ->name('roles.show')->middleware('can:admin.roles.show');

        Route::delete('roles/{role}', 'RoleController@destroy')
            ->name('roles.destroy')->middleware('can:admin.roles.destroy');

        Route::get('roles/{role}/edit', 'RoleController@edit')
            ->name('roles.edit')->middleware('can:admin.roles.edit');

        //
        // USERS
        //

        Route::post('users/store', 'UserController@store')
            ->name('users.store')->middleware('can:admin.users.create');

        Route::get('users', 'UserController@index')
            ->name('users.index')->middleware('can:admin.users.index');

        Route::get('users/create', 'UserController@create')
            ->name('users.create')->middleware('can:admin.users.create');

        Route::put('users/{user}', 'UserController@update')
            ->name('users.update')->middleware('can:admin.users.edit');

        Route::get('users/{user}', 'UserController@show')
            ->name('users.show')->middleware('can:admin.users.show');

        Route::delete('users/{user}', 'UserController@destroy')
            ->name('users.destroy')->middleware('can:admin.users.destroy');

        Route::get('users/{user}/edit', 'UserController@edit')
            ->name('users.edit')->middleware('can:admin.users.edit');

        //
        // DEPARTMENTS
        //

        Route::post('departments/store', 'DepartmentController@store')
            ->name('departments.store')->middleware('can:admin.departments.create');

        Route::get('departments', 'DepartmentController@index')
            ->name('departments.index')->middleware('can:admin.departments.index');

        Route::get('departments/create', 'DepartmentController@create')
            ->name('departments.create')->middleware('can:admin.departments.create');

        Route::put('departments/{department}', 'DepartmentController@update')
            ->name('departments.update')->middleware('can:admin.departments.edit');

        Route::get('departments/{department}', 'DepartmentController@show')
            ->name('departments.show')->middleware('can:admin.departments.show');

        Route::delete('departments/{department}', 'DepartmentController@destroy')
            ->name('departments.destroy')->middleware('can:admin.departments.destroy');

        Route::get('departments/{department}/edit', 'DepartmentController@edit')
            ->name('departments.edit')->middleware('can:admin.departments.edit');

        //
        // CATEGORIES
        //

        Route::post('categories/store', 'CategoryController@store')
            ->name('categories.store')->middleware('can:admin.categories.create');

        Route::get('categories', 'CategoryController@index')
            ->name('categories.index')->middleware('can:admin.categories.index');

        Route::get('categories/create', 'CategoryController@create')
            ->name('categories.create')->middleware('can:admin.categories.create');

        Route::put('categories/{category}', 'CategoryController@update')
            ->name('categories.update')->middleware('can:admin.categories.edit');

        Route::get('categories/{category}', 'CategoryController@show')
            ->name('categories.show')->middleware('can:admin.categories.show');

        Route::delete('categories/{category}', 'CategoryController@destroy')
            ->name('categories.destroy')->middleware('can:admin.categories.destroy');

        Route::get('categories/{category}/edit', 'CategoryController@edit')
            ->name('categories.edit')->middleware('can:admin.categories.edit');

    });

//Route::group(['middleware' => ['auth']], function () {});
