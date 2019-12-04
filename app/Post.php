<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Presenters\PostPresenter;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

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


    public function generateSlug()
    {
        $slug = Str::slug($this->title);
        if ($this::whereSlug($slug)->exists()) {
            $slug = "{$this->id}-{$slug}";
        }
        $this->slug = $slug;
        $this->save();
    }

    public function scopePublished($query)
    {
        $query->whereNotNull('published_at')
        ->where('published_at','<=', Carbon::now())
        ->latest('published_at');
    }

}
