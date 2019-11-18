<?php
namespace App\Presenters;

use Illuminate\Support\HtmlString;

class PostPresenter extends Presenter 
{

    public function postTitle()
    {
        return new HtmlString("
            <h5 class='my-0 font-weight-normal'>
            <i class='fas fa-envelope-open-text'>
            </i> <a href='" . route('users.show', $this->model->id) . "'>{$this->model->id}. {$this->model->title}</a>
            </h5>
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