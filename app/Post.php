<?php

namespace App;

use Illuminate\Support\Str;
use App\Presenters\PostPresenter;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title','excerpt','published_at'];

    protected $dates = ['published_at'];

  
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }  
   

    public function present()
    {
        return new PostPresenter($this);
    }

    public function setTitleAttribute($title)
    {
        $this->attributes['title'] = $title;
        $this->attributes['slug'] = Str::slug($title);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
