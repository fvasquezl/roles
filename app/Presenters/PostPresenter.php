<?php
namespace App\Presenters;

use Illuminate\Support\Str;
use Illuminate\Support\HtmlString;

class PostPresenter extends Presenter
{

    public function postTitle()
    {
        return new HtmlString(" <a class='text-decoration-none text-muted' href='" . route('admin.posts.show', $this->model->id) . "'>
         {$this->model->id}. {$this->model->title}</a>
        ");
    }

    public function publishedAt()
    {
        return new HtmlString("{$this->model->published_at->format('M d')}");
    }

    public function tags()
    {
        $categories = $this->model->tags
                        ->pluck('name')
                        ->map(function ($value) {
                            return "<a href='#'> #$value</a>"; 
                        })->implode(', ');

        return new HtmlString("{$categories}");
    }

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
