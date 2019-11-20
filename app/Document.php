<?php

namespace App;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = ['title', 'path'];

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    public function setTitleAttribute($title)
    {
        $this->attributes['title'] = $title;
        $this->attributes['slug'] = Str::slug($title);
    }

}
