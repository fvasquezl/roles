<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Department extends Model
{
    protected $fillable = ['name','display_name','description'];



    public function users()
    {
        return BelongsToMany(User::class);
    }
}
