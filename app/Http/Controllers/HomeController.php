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
        $posts = Post::published()->publishInfrontPage()->paginate(5);
        return view('home', compact('posts'));
    }
}
