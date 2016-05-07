<?php

namespace App\Http\Controllers;

use App\Models\Division;
use App\Models\DivisionPersonnel;
use App\Models\Personnel;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;

class PersonnelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $personnels=Personnel::with(['division'=>function($query){
//            $query->select('division_id');
//        }])->get()->toArray();//            $personnels=new Personnel();
//        $personnels->division();
        $personnel=Personnel::all();
//        $personnels=Personnel::find(8)->division->toArray();
//        $personnels->division;
        foreach($personnel as $person){
            echo $person->divisions;
        }
//        foreach($personnels->divisions as $person){
//            echo $person;
//        }
//        print_r($personnels->division);
//        return view('coop_division.personnel.index')->with('personnels',$personnels);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $divisions=Division::all('id','title');
//   Set Associative Array Before Send To Form
        foreach($divisions as $division){
//     $arr_division["KEY"]="Values"
            $arr_division[$division->id]=$division->title;
        }
//    Delete first element from division
        unset($arr_division[1]);
        return view('coop_division.personnel.add_personnel')->with('division',$arr_division);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $person =new Personnel();
        $person->name=$request->get('name');
        $person->lastname=$request->get('lastname');
        $person->save();

        $person_duty=new DivisionPersonnel();
        $person_duty->personnel_id=$person->id;
        $person_duty->division_id=$request->get('division');
        $person_duty->save();
//        $division=Division::find($request->get('division'));
//        $division->personnel()->attach()
        return redirect()->back();;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
