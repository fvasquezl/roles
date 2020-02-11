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
        $date = optional($this->model->published_at)->format('M d Y');
        return new HtmlString("{$date}");
    }


    public function tags()
    {
        $categories = $this->model->tags
                        ->pluck('name')
                        ->map(function ($value) {
                            return "<a href='".route('tags.show',$value)."'> #$value</a>";
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

    public function departments()
    {
        $departments = $this->model->departments->pluck('name');
        return count($departments) ? $departments->implode(', ') : 'PUBLIC';
    }

    public function excerpt()
    {
        return new HtmlString(Str::limit($this->model->excerpt,50));
    }

}
