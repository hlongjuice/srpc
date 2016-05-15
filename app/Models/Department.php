<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable=['title'];

    public function personnel(){
        return $this->hasMany('App\Models\Personnel');
    }
}
