<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $posts = Post::allowed()->published()->get();
        return view('home',[
            'posts' =>  $posts,
            'categories' => Category::pluck('name')
        ]);
    }
}
