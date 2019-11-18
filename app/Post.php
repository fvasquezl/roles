<?php

namespace App;

use App\Presenters\PostPresenter;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title','excerpt','published_at'];

    protected $dates = ['published_at'];

    public function present()
    {
        return new PostPresenter($this);
    }


}
