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



// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
  ]);

//Route::get('/home', 'HomeController@index')->name('home');

/**
 * ApiRoutes
 */
Route::Resource('api/home','Api\HomeController');
Route::Resource('api/post','Api\PostController');

Route::middleware('auth')->group(function () {
  //  Route::get('/posts/{post}', 'PostsController@show')->name('posts.show');
    Route::get('/categories/{category}', 'CategoriesController@show')->name('categories.show');

    Route::get('/tags/{tag}', 'TagsController@show')->name('tags.show');
    Route::post('/show', 'HomeController@show')->name('home.show');
});

Route::prefix('/admin')
    ->namespace('Admin')
    ->middleware('auth')
    ->name('admin.')
    ->group(function () {

        Route::resource('posts', 'PostController', ['except' => 'show']);
        Route::resource('users', 'UsersController');
        Route::resource('roles', 'RolesController',['except' => 'show']);
        Route::resource('permissions', 'PermissionsController',['only' => ['index','edit','update']]);
        Route::resource('departments', 'DepartmentController');
        Route::resource('categories', 'CategoryController');


        Route::middleware('role:Admin')
            ->put('users/{user}/roles', 'UsersRolesController@update')
            ->name('users.roles.update');

        Route::middleware('role:Admin')
            ->put('users/{user}/permissions', 'UsersPermissionsController@update')
            ->name('users.permissions.update');

        Route::middleware('role:Admin')
            ->put('users/{user}/departments', 'UsersDepartmentsController@update')
            ->name('users.departments.update');

        Route::post('posts/{post}/documents', 'DocumentsController@store')->name('posts.documents.store');
        Route::delete('documents/{document}', 'DocumentsController@destroy')->name('documents.destroy');

    });

    Route::get('/{any?}', 'HomeController@index')->name('home')->where('any', '.*');
