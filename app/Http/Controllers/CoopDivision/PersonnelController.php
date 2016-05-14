<?php

namespace App\Http\Controllers\CoopDivision;

use App\Models\Division;
use App\Models\Duty;
use App\Models\Personnel;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Http\Controllers\Controller;
use App\Http\Requests;

class PersonnelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home($id)
    {
        $division=Division::where('id',$id)->first();
        return view('coop_division.personnel.index')->with('personnel',$division->personnel);
    }

    public function index()
    {
        echo 'Index!!!';

    }
    public function addPersonnel(){
//        echo 'Yo!!';
        $divisions=Division::all('id','title'); //Get all divisions
//
        foreach($divisions as $division){ // Set Associative Array Before Send To Form
            $arr_division[$division->id]=$division->title; // $arr_division["KEY"]="Values"
        }
//        print_r($arr_division);
        unset($arr_division[1]); // Delete first element from division
        return view('coop_division.personnel.add_personnel')->with('division',$arr_division);
    }

    /*Create Personnel*/
    public function create()
    {
//        return view('coop_division.documents.index');
    }

    /*Add New Personnel*/
    public function store(Request $request)
    {
        //Set input to personnel model
        $person =new Personnel();
        $person->name=$request->get('name');
        $person->lastname=$request->get('lastname');
        //Upload image
        if($request->hasfile('image')) {
            $path = 'images/' . $request->file('image')->getClientOriginalName();//Get path and file name
            Image::make($request->file('image')->getRealPath())->resize(200, 200)->save($path);//Upload image to directory
            $person->image = $path;//set image path
        }
        $person->save();

        //Select Division from user's input
        $division=Division::find($request->get('division'));

        //Add New Personnel and set his/her division
        $division->personnel()->attach($person->id,['duty_id'=>$request->get('duty')]);
        return redirect('personnel');
    }

    public function show($id)
    {
        //
    }

    /*Edit Personnel Profile*/
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
