<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable=['title','file_path','division_id'];

    public function divisions(){
        return $this->belongsTo('App\Models\Division');
    }
}
