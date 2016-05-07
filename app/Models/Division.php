<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    protected $fillable=['parent_id','title'];
    public function personnels(){
        return $this->belongsToMany('App\Models\Personnel','division_personnels');
    }
}
