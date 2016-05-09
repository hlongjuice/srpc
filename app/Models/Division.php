<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    protected $fillable=['parent_id','title'];
    public function personnel(){
        return $this->belongsToMany('App\Models\Personnel','division_duty_personnel')->withPivot('duty_id');
    }
    public function duties(){
        return $this->belongsToMany('App\Models\Duty','division_duty_personnel')->withPivot('personnel_id');
    }
}
