<?php

namespace App;

use App\Presenters\PostPresenter;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Spatie\Permission\Traits\HasRoles;

class Post extends Model
{
    use HasRoles;

    protected $fillable = ['title', 'excerpt', 'published_at', 'category_id', 'user_id'];

    protected $dates = ['published_at'];

    protected $guard_name = 'web';

    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($post) {
            $post->documents->each->delete();
        });

    }

    public static function create(array $attributes = [])
    {
        $attributes['user_id'] = auth()->id();
        $post = static::query()->create($attributes);
        $post->generateUrl();

        return $post;
    }

    public function generateUrl()
    {
        $slug = Str::slug($this->title);

        if ($this->whereSlug($slug)->exists()) {
            $slug = "{$slug}-{$this->id}";
        }

        $this->slug = $slug;

        $this->save();
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

    public function departments()
    {
        return $this->morphToMany(Department::class, 'departmentable');
    }

    public function present()
    {
        return new PostPresenter($this);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopePublished($query)
    {
        $query->whereNotNull('published_at')
            ->where('published_at', '<=', Carbon::now())
            ->latest('published_at');
    }

    public function scopePublishInfrontPage($posts)
    {

        if (auth()->user()->can('view', $this) || auth()->user()->hasRole('Admin')) {
            return $this->get();
        }

        return $this->getRolePost();
    }


    public function getRolePost()
    {
        $posts = $this->load('roles','departments')->get();

        $roles = auth()->user()->roles->pluck('id');
        $departments =auth()->user()->departments->pluck('id');

        $posts = $this->load('roles','departments')->get();


    //    foreach($posts as $post){
    //        //Post WhereNotIn(Departments) -- Empty(Roles)
    //      if($post->departments->whereNotIn('id',$departments)->isNotEmpty() && $post->roles->isEmpty()){
    //         $posts->forget($post);
    //      };
    //        //Post Empty(Departments) --- WhereNotIn(Roles)
    //      if($post->departments->isEmpty() && $post->roles->whereNotIn('id',$roles)->isNotEmpty()){
    //         $posts->forget($post);
    //      };
    //        //Post WhereNotIn(Departments) ---WhereNotIn(Roles)
    //     if($post->departments->whereNotIn('id',$departments)->isNotEmpty() && $post->roles->whereNotIn('id',$roles)->isNotEmpty()){
    //         $posts->forget($post);
    //      };
    //    }

       return $posts;

    }

    public function scopeAllowed($query)
    {
        if (auth()->user()->can('view', $this)) {
            return $query;
        }
        return $query->where('user_id', auth()->id());
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

    public function syncTags($tags)
    {
        $tagIds = collect($tags)->map(function ($tag) {
            return Tag::find($tag) ? $tag : Tag::create(['name' => $tag])->id;
        });

        return $this->tags()->sync($tagIds);
    }

    public function isPublished()
    {
        return !is_null($this->published_at) && $this->published_at < today();
    }

}
