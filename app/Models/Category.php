<?php

namespace App\Models;

use Baum\Node;
use Illuminate\Database\Eloquent\Model;

class Category extends Node
{
    protected $fillable=['title','parent_id','level'];
    protected $depthColumn='level';

    public function contents()
    {
        return $this->hasMany('App\Models\Content');
    }

    public function child()
    {
        return $this->hasMany('App\Models\Category','parent_id');
    }
}
