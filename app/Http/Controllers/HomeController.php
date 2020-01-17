<?php

namespace App\Http\Controllers;

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

        if (auth()->user()->hasRole('Admin') || auth()->user()->hasPermissionTo('View permissions')) {
            //Return all posts
            $posts = Post::published()->get();
        }else{
            //Return public Posts
            $posts = Post::withCount('departments')->having('departments_count',0)->get();
        }
        

        return view('home', compact('posts'));
    }
}
