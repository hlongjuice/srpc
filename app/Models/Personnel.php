<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Personnel extends Model
{
    protected $fillable=['name','lastname'];
    public function division(){
        return $this->belongsToMany('App\Models\Division','division_personnels');
    }
}
