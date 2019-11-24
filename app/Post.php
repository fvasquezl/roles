<?php

namespace App;

use Illuminate\Support\Str;
use App\Presenters\PostPresenter;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    protected $dates = ['published_at'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function documents()
    {
        return $this->belongsToMany(Document::class);
    }

    public function present()
    {
        return new PostPresenter($this);
    }

//    public function setTitleAttribute($title)
//    {
//        $this->attributes['title'] = $title;
//        $this->attributes['slug'] = $this->generateSlug();
//    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function generateSlug()
    {
        $slug = Str::slug($this->title);
        if ($this::whereSlug($slug)->exists()) {
            $slug = "{$this->id}-{$slug}";
        }
        $this->slug = $slug;
        $this->save();
    }

}
