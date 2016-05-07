<?php

namespace App\Http\Controllers;

use App\Models\Division;
use App\Models\DivisionPersonnel;
use App\Models\Personnel;
use Illuminate\Http\Request;

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
        $personnels=Personnel::with('division')->get();
//        $personnels=Personnel::find(8)->division->toArray();
//        $personnels->division;
        print_r($personnels->division);
//        return view('coop_division.personnel.index')->with('personnels',$personnels);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $divisions=Division::all('title')->toArray();
        $division=array_map('current',$divisions);
//        array_shift($division:$d
//        array_shift($division);
//        print_r($division);
        unset($division[0]);
       return view('coop_division.personnel.add_personnel')->with('division',$division);
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

        return redirect('personnel');

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
