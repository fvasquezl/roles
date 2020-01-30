<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Post;

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
        $posts = $tag->IntersectPosts();

        return view('home', [
            'title' => "Publicaciones de la etiqueta {$tag->name}",
            'posts' => paginateCollection($posts, 10),
        ]);
    }

}
