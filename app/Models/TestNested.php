<?php

namespace App\Models;
use Baum\Node;
use Illuminate\Database\Eloquent\Model;

class TestNested extends Node
{
    protected $fillable=(['title']);
    protected $table='testnests';
    protected $depthColumn='level';
}
