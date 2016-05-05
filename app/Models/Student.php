<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable=['student_id','gender','name','lastname','level',
        'grade','phone','address','image','faculty'];
}
