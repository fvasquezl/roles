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



Route::middleware('auth')->group(function () {

   Route::get('/posts/{post}', 'PostsController@show')->name('posts.show'); 
   Route::get('/categories/{category}', 'CategoriesController@show')->name('categories.show'); 
   Route::get('/tags/{tag}', 'TagsController@show')->name('tags.show'); 

});


Route::prefix('/admin')
    ->namespace('Admin')
    ->middleware('auth')
    ->name('admin.')
    ->group(function(){

        /**
         * Posts
         */
        Route::resource('posts', 'PostController',['except'=>'show']);
        /**
         * Users
         */
        Route::resource('users', 'UsersController');

        /**
         * UsersRoles routes
         */

         Route:: put('users/{user}/roles', 'UsersRolesController@update')->name('users.roles.update');
         Route:: put('users/{user}/permissions', 'UsersPermissionsController@update')->name('users.permissions.update');

        //
        // ROLES
        //

        Route::post('roles/store', 'RoleController@store')
            ->name('roles.store');

        Route::get('roles', 'RoleController@index')
            ->name('roles.index');

        Route::get('roles/create', 'RoleController@create')
            ->name('roles.create');

        Route::put('roles/{role}', 'RoleController@update')
            ->name('roles.update');

        Route::get('roles/{role}', 'RoleController@show')
            ->name('roles.show');

        Route::delete('roles/{role}', 'RoleController@destroy')
            ->name('roles.destroy');

        Route::get('roles/{role}/edit', 'RoleController@edit')
            ->name('roles.edit');

        //
        // USERS
        //

        // Route::post('users/store', 'UserController@store')
        //     ->name('users.store');

        // Route::get('users', 'UserController@index')
        //     ->name('users.index');

        // Route::get('users/create', 'UserController@create')
        //     ->name('users.create');

        // Route::put('users/{user}', 'UserController@update')
        //     ->name('users.update');

        // Route::get('users/{user}', 'UserController@show')
        //     ->name('users.show');

        // Route::delete('users/{user}', 'UserController@destroy')
        //     ->name('users.destroy');

        // Route::get('users/{user}/edit', 'UserController@edit')
        //     ->name('users.edit');

        //
        // DEPARTMENTS
        //

        Route::post('departments/store', 'DepartmentController@store')
            ->name('departments.store');

        Route::get('departments', 'DepartmentController@index')
            ->name('departments.index');

        Route::get('departments/create', 'DepartmentController@create')
            ->name('departments.create');

        Route::put('departments/{department}', 'DepartmentController@update')
            ->name('departments.update');

        Route::get('departments/{department}', 'DepartmentController@show')
            ->name('departments.show');

        Route::delete('departments/{department}', 'DepartmentController@destroy')
            ->name('departments.destroy');

        Route::get('departments/{department}/edit', 'DepartmentController@edit')
            ->name('departments.edit');

        //
        // CATEGORIES
        //

        Route::post('categories/store', 'CategoryController@store')
            ->name('categories.store');

        Route::get('categories', 'CategoryController@index')
            ->name('categories.index');

        Route::get('categories/create', 'CategoryController@create')
            ->name('categories.create');

        Route::put('categories/{category}', 'CategoryController@update')
            ->name('categories.update');

        Route::get('categories/{category}', 'CategoryController@show')
            ->name('categories.show');

        Route::delete('categories/{category}', 'CategoryController@destroy')
            ->name('categories.destroy');

        Route::get('categories/{category}/edit', 'CategoryController@edit')
            ->name('categories.edit');

        //DOCUMENTS
        Route::post('posts/{post}/documents','DocumentsController@store')->name('posts.documents.store');
        Route::delete('documents/{document}','DocumentsController@destroy')->name('documents.destroy');

    });


