<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable=['title','parent_id','level'];

    public function contents()
    {
        return $this->hasMany('App\Models\Content');
    }

    public function child()
    {
        return $this->hasMany('App\Models\Category','parent_id');
    }
}
