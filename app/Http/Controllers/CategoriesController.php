<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class CategoriesController extends Controller
{
    public function show(Category $category)
    {
        return view('home', [
            'title' => "Publicaciones de la categoria {$category->name}",
            'posts' => $category->posts()->paginate(10)
        ]);
    }
}
