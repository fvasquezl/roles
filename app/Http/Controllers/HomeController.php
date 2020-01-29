<?php

namespace App\Http\Controllers;

use App\Post;
use App\Department;
use Illuminate\Database\Eloquent\Relations\MorphTo;

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
        //PublicPosts
        $pub_posts = Post::doesnthave('departments')->get();
        $dep_posts = auth()->user()->departments->map->posts->flatten();
   
        $posts = collect($pub_posts->toBase()->merge($dep_posts)->sortBy('id')->toArray())->paginate();

       

        dd($posts);

        return view('home', compact('posts'));
    }
}
