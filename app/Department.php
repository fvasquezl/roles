<?php

namespace App;

use Caffeinated\Shinobi\Models\Role;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = ['name','display_name','description'];


    public function users()
    {
        return $this->belongsToMany(User::class);
    }

}
