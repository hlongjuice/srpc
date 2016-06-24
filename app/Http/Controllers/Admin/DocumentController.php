<?php

namespace App\Http\Controllers\Admin;

use App\Models\Division;
use App\Models\Document;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use PhpParser\Comment\Doc;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth',['except'=>'deleteDocument']);
    }
    public function index()
    {
        $documents=Document::with('divisions')->get();
//        foreach($documents as $document)
//        {
//           echo $document->divisions->title.'<br><br>';
//        }
        return view('admin.documents.index')->with('documents',$documents);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $divisions=Division::all('id','title'); //Get all divisions
        foreach($divisions as $division){ // Set Associative Array Before Send To Form
            $arr_division[$division->id]=$division->title; // $arr_division["KEY"]="Values"
        }
        unset($arr_division[1]); // Delete first element from division
        $arr_division=[''=>'กรุณาเลือก']+$arr_division;

        return view('admin.documents.add_document')->with('divisions',$arr_division);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
          'title'=>'required',
            'divisions'=>'required',
            'file'=>'required'
        ],[
            'title.required'=>'กรุณากรอกข้อมูล',
            'divisions.required'=>'กรุณาเลือกหมวดหมู่',
            'file.required'=>'กรุณาเลือกไฟล์']);

        /*If Validate pass do this*/
        $document=new Document();
        $file_name=$request->file('file')->getClientOriginalName();
        $request->file('file')->move('documents',$file_name);
        $file_path='documents/'.$file_name;
        $document->file_path=$file_path;
        $document->title=$request->input('title');
        $document->division_id=$request->input('divisions');

        $document->save();

        return redirect()->route('admin.documents.index');
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

    public function deleteDocument()
    {
        $document_id=$_GET['document_id'];
       $result= Document::destroy($document_id);
        return $result;
    }
}
