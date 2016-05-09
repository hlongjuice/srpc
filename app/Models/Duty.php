<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Duty extends Model
{
    protected $fillable=['title'];

    public function personnel(){
        return $this->belongsToMany('App\Models\Personnel','division_duty_personnel')->withPivot('division_id');
    }
    public function divisions(){
        return $this->belongsToMany('App\Models\Division','division_duty_personnel')->withPivot('personnel_id');
    }
}
