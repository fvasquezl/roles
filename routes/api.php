<?php

Route::name('api.')->group(function(){
    Route::Resource('posts','Api\PostsController');
 });
