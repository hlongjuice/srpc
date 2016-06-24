<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $fillable=['title','text'];

    public function category()
    {
        return $this->belongsTo('App\Models\Category','category_id');
    }
}
