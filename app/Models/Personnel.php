<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Personnel extends Model
{
    protected $fillable=['name','lastname'];
    protected $table='personnel';

    public function divisions(){
        //Return Division Model Pivot Table with duty_id division_id and personnel_id
        return $this->belongsToMany('App\Models\Division','division_duty_personnel')->withPivot('duty_id');
    }
    public function duties(){
        //Return Duty Model and Pivot Table with duty_id division_id and personnel_id
        return $this->belongsToMany('App\Models\Duty','division_duty_personnel')->withPivot('division_id');
    }
}
