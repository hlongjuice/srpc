<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Personnel extends Model
{
    protected $fillable=['gender','name','lastname','department_id','rank','image'];
    protected $table='personnel';

    public function divisions(){
        //Return Division Model Pivot Table with duty_id division_id and personnel_id
        return $this->belongsToMany('App\Models\Division','division_duty_personnel')->withPivot('duty_id');
    }
    public function duties(){
        //Return Duty Model and Pivot Table with duty_id division_id and personnel_id
        return $this->belongsToMany('App\Models\Duty','division_duty_personnel')
            ->withPivot('division_id')
            ->withTimestamps()
            ->join('divisions','division_id','=','divisions.id')
            ->select('personnel_id','division_id','duties.id as id','duties.title as title','divisions.title as pivot_division_title','division_duty_personnel.id as pivot_ddp_id');
    }

    public function department(){
        return $this->belongsTo('App\Models\Department');
    }
}
