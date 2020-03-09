<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Post;
use App\Category;

class TagsController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        $categories = Category::all();
        $posts = $tag->IntersectPosts();

        return view('home', [
            'title' => "Publicaciones de la etiqueta {$tag->name}",
            'posts' => paginateCollection($posts, 10),
            'categories' => $categories,
            'search' => '',
            'cat' => 0
        ]);
    }
}
