<?php
namespace App\Presenters;

use Illuminate\Support\HtmlString;

class PostPresenter extends Presenter 
{

    public function postTitle()
    {
        return new HtmlString(" <a href='" . route('posts.show', $this->model->id) . "'>
        <i class='fas fa-external-link-alt'></i> {$this->model->id}. {$this->model->title}</a>
            <small class='text-muted'><i class='fas fa-user-edit'></i> {$this->model->user->name}</small>
        ");
    }

    public function dateForHumans()
    {
        return new HtmlString("{$this->model->published_at->diffForHumans()}");
    }   

    public function categories()
    {
        return new HtmlString("{$this->model->categories->pluck('name')->implode(', ')}");
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