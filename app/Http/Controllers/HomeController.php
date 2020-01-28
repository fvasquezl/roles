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
    //     $post_dep = $post->departments()->pluck('department_id')->implode(', ');

    //    return $user->departments()->pluck('department_id')->contains($post_dep)
    //    || $user->hasPermissionTo('View posts') || $post->departments()->pluck('department_id')->isEmpty();

        $departments = auth()->user()->departments()->with('posts')->get();

      // $posts = $departments->with('posts');


      //  $posts = Department::ByDepartment();
        dd($departments);

        return view('home', compact('posts'));
    }
}
