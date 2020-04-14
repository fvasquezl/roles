<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Post;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\Post\StoreRequest;
use App\Http\Requests\Post\UpdateRequest;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Post $post)
    {

        return response(['post'=>$post, 'status' => Response::HTTP_CREATED]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $this->authorize('create', new Post);

        $post = Post::create($request->all());

        return response(['post'=>$post, 'status' => Response::HTTP_CREATED]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Post $post)
    {

        $this->authorize('update', $post);

        $post->update($request->all());
        $post->syncTags($request->get('tags'));
        $post->departments()->detach();
        $post->roles()->detach();

        if($request->has('departments')){
            $post->departments()->sync($request->get('departments'));
        }

        if($request->has('roles')){
            $post->syncRoles($request->get('roles'));
        }

        return response('Updated', Response::HTTP_ACCEPTED)
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
