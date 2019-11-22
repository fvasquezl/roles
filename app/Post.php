<?php

namespace App;

use Illuminate\Support\Str;
use App\Presenters\PostPresenter;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    protected $dates = ['published_at'];

    public function categories()
    {
        return $this->belongsTo(Category::class);
    }
    public function documents()
    {
        return $this->belongsToMany(Document::class);
    }

    public function present()
    {
        return new PostPresenter($this);
    }

    // public function setTitleAttribute($title)
    // {
    //     $this->attributes['title'] = $title;
    //     $this->attributes['slug'] = Str::slug($title);
    // }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
