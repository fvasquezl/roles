<?php

namespace App\Http\Controllers;

use App\Category;

class CategoriesController extends Controller
{
    public function show(Category $category)
    {

        $posts = $category->IntersectPosts();

        return view('home', [
            'title' => "Publicaciones de la categoria {$category->name}",
            'posts' => paginateCollection($posts, 10),
        ]);
    }

}
