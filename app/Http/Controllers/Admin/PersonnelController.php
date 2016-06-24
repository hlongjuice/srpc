<?php

namespace App\Http\Controllers\Admin;

use App\Models\Department;
use App\Models\Division;
use App\Models\Duty;
use App\Models\Personnel;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use DB;

class PersonnelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth',['except'=>['deletePersonnel','deleteDivision']]);// use middleware auth and except method name "deletePersonnel"
    }

    public function getDivisions(){
        $divisions=Division::all('id','title')->toJson(); //Get all divisions
        return $divisions;
    }

    public function dashBoard(){
        return view('admin.index');
    }
    public function index()
    {
//        $personnel=Personnel::with('duties')->get();
        $personnel=Personnel::with('duties')->get();
//        foreach($personnel as $person){
//           echo $person->department->title;
//        }

        return view('admin.personnel.index')->with('personnel',$personnel);
    }

    /*Create Personnel*/
    public function create()
    {
        $divisions=Division::all('id','title'); //Get all divisions
        foreach($divisions as $division){ // Set Associative Array Before Send To Form
            $arr_division[$division->id]=$division->title; // $arr_division["KEY"]="Values"
        }
        unset($arr_division[1]); // Delete first element from division
        $arr_division=[''=>'กรุณาเลือก']+$arr_division;

        $departments=Department::all('id','title');//Get All department
        foreach($departments as $department)
        {
            $arr_department[$department->id]=$department->title;
        }
        $arr_department=[''=>'กรุณาเลือก']+$arr_department;
        return view('admin.personnel.add_personnel')->with(['jason_divisions'=>$departments,'divisions'=>$arr_division,'departments'=>$arr_department]);
    }

    /*Add New Personnel*/
    public function store(Request $request)
    {
        //Set input to personnel model
        $i=0;
        $person =new Personnel();
        $person->gender=$request->input('gender');
        $person->name=$request->input('name');
        $person->lastname=$request->input('lastname');
        $person->rank=$request->input('rank');
        $person->department_id=$request->input('department');

        //Upload image
        if($request->hasfile('image')) {
            $path = 'images/' . $request->file('image')->getClientOriginalName();//Get path and file name
            Image::make($request->file('image')->getRealPath())->resize(200, 200)->save($path);//Upload image to directory
            $person->image = $path;//set image path
        }
           $person->save();
        //Select Division from user's input
        foreach($request->input('division') as $input_division)
        {
            $division=Division::find($input_division);
            //Add New Personnel and set his/her division to pivot table
            $division->personnel()->attach($person->id,['duty_id'=>$request->input('duty'.$i)]);
            $i++;
        }

        return redirect()->route('admin.personnel.index');
    }

    public function show($id)
    {
        //
    }

    /*Edit Personnel Profile*/
    public function edit($id)
    {
        $personnel=Personnel::find($id);//get personnel from id

//        echo $personnel->department_id;
        $divisions=Division::all('id','title'); //Get all divisions
        foreach($divisions as $division){ // Set Associative Array Before Send To Form
            $arr_division[$division->id]=$division->title; // $arr_division["KEY"]="Values"
        }
        unset($arr_division[1]); // Delete first element from division

        $departments=Department::all('id','title');//Get All department
        foreach($departments as $department)
        {
            $arr_department[$department->id]=$department->title;
        }

        return view('admin.personnel.edit')->with(['personnel'=>$personnel,'divisions'=>$arr_division,'departments'=>$arr_department]);
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
        $round=0;
        $i=1;
        $personnel=Personnel::find($id);
        $personnel->gender=$request->input('gender');
        $personnel->name=$request->input('name');
        $personnel->lastname=$request->input('lastname');
        $personnel->rank=$request->input('rank');

        //Upload image
        if($request->hasfile('image')) {

            $path = 'images/' . $request->file('image')->getClientOriginalName();//Get path and file name
            Image::make($request->file('image')->getRealPath())->resize(200, 200)->save($path);//Upload image to directory
            $personnel->image = $path;//set image path
        }
        $personnel->save();//Update Gender Name Lastname and Rank

        /*Update Duty and Division*/
        if($request->has('ddp_id'))//check ddp_id input
        {
            foreach($request->input('ddp_id') as $ddp_id)
            {
                DB::table('division_duty_personnel')
                    ->where('id',$ddp_id)
                    ->update(['division_id'=>$request->input('division.'.$round),'duty_id'=>$request->input('duty'.$round)]);
                $round++;
            }
        }

        /*Add new Duty and Division*/
        if($request->has('new_division'))
        {
            foreach($request->input('new_division') as $input_new_division)
            {
                $new_division=Division::find($input_new_division);
                //Add New Personnel and set his/her division to pivot table
                $new_division->personnel()->attach($id,['duty_id'=>$request->input('new_duty'.$i)]);
                $i++;
            }
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        echo 'yooo!!!';
    }

    /*Use to delete old division in edit form*/
    public function deleteDivision( )
    {
        $ddp_id=$_GET['ddp_id'];
        $result=DB::table('division_duty_personnel')
            ->where('id',$ddp_id)
            ->delete();
        echo $result;
    }

    public function deletePersonnel()
    {
        $person_id=$_POST['person_id'];
        $ddp_ids=$_POST['ddp_ids'] ;

        /*Delete Division Duty Personnel by ddp_id */
        try {
            if ($ddp_ids != "") {   //Delete ddp if exist
                foreach ($ddp_ids as $ddp_id) {
                    DB::table('division_duty_personnel')
                        ->where('id', $ddp_id)
                        ->delete();
                }
            }

            /*Delete Personnel by person_id*/
            DB::table('personnel')
                ->where('id', $person_id)
                ->delete();
        }
        catch(\Exception $e){
            return false;
        }

    }
}
