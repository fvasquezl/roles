<?php

namespace App;

use App\Presenters\DepartmentPresenter;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = ['name', 'display_name', 'description'];

    public function departmentable()
    {
      return $this->morphTo();
    }



    public function users()
    {
        return $this->morphedByMany(User::class, 'departmentable');
    }

    public function posts()
    {
        return $this->morphedByMany(Post::class, 'departmentable');
    }

    public function present()
    {
        return new DepartmentPresenter($this);
    }
}
