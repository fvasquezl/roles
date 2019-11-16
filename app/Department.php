<?php

namespace App;

use App\Presenters\DepartmentPresenter;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = ['name', 'display_name', 'description'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function present()
    {
        return new DepartmentPresenter($this);
    }
}
