<?php
namespace App\Presenters;

use Illuminate\Support\HtmlString;

class PostPresenter extends Presenter 
{

    public function postTitle()
    {
        return new HtmlString("
            <h5 class='card-title mb-1'>
            <a href='" . route('posts.show', $this->model->id) . "'>{$this->model->id}. {$this->model->title}</a>
            </h5><h6 class='subtitle mb-3 text-muted'>by: {$this->model->user->name}</h6>
        ");
    }

    public function dateForHumans()
    {
        return new HtmlString("<small class='text-muted'>{$this->model->published_at->diffForHumans()}</small>");
    }   

    // 


    // public function notes()
    // {
    //     return $this->model->note ? $this->model->note->body : '';
    // }

    // public function tags()
    // {
    //     return $this->model->tags->pluck('name')->implode(' ,');
    // }
}