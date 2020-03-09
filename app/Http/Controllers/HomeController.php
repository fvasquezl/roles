<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Department;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Http\Request;

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
        $categories = Category::all();
        $posts = Post::published()->publishInfrontPage();

        if(request('category')){
          
            $posts->where('category_id',request('category'));
             
        }
        if(request('search')){
          
            $posts->where('title','like','%'.request('search').'%');
             
        }
        
        
      
        return view('home', [
            'posts'=> $posts->paginate(5),
            'categories' =>$categories,
            'cat' => request('category'),
            'search'=>request('search')
            ]);
    }
}
