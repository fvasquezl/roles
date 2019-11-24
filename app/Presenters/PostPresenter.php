<?php
namespace App\Presenters;

use Illuminate\Support\HtmlString;

class PostPresenter extends Presenter 
{

    public function postTitle()
    {
        return new HtmlString(" <a class='text-decoration-none text-muted' href='" . route('admin.posts.show', $this->model->id) . "'>
         {$this->model->id}. {$this->model->title}</a>
        ");
    }

    public function dateForHumans()
    {
        return new HtmlString("{$this->model->published_at->diffForHumans()}");
    }   

    // public function categories()
    // {
    //     return new HtmlString("{$this->model->categories->pluck('name')->implode(', ')}");
    // }

    public function category()
    {
        return new HtmlString("{$this->model->category->name}");
    }


    public function owner()
    {
        return new HtmlString("{$this->model->user->name}");
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