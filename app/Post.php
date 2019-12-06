<?php

namespace App;

use App\Presenters\PostPresenter;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    protected $fillable = ['title','excerpt','published_at','category_id'];

    protected $dates = ['published_at'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

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
        return $this->hasMany(Document::class);
    }

    public function present()
    {
        return new PostPresenter($this);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function setTitleAttribute($title)
    {
        $this->attributes['title'] = $title;
        $this->attributes['slug'] = Str::slug($title);
    }

    public function scopePublished($query)
    {
        $query->whereNotNull('published_at')
            ->where('published_at', '<=', Carbon::now())
            ->latest('published_at');
    }

    public function setPublishedAtAttribute($published_at)
    {
        $this->attributes['published_at'] = $published_at
        ? Carbon::createFromFormat('d/m/Y', $published_at)
        : null;
    }

    public function setCategoryIdAttribute($category)
    {
        $this->attributes['category_id'] = Category::find($category)
        ? $category
        : Category::create(['name' => $category])->id;
    }

    public function setUserIdAttribute()
    {
        $this->attributes['user_id'] = auth()->id();
    }

    public function syncTags($tags)
    {
        $tagIds = collect($tags)->map(function($tag){
            return Tag::find($tag) ? $tag : Tag::create(['name'=> $tag])->id;
        });

        return $this->tags()->sync($tagIds);
    }

}
