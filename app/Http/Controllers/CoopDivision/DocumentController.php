<?php

namespace App\Http\Controllers\CoopDivision;

use App\Models\Document;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function home($division){
//        echo  $division;
        $documents=Document::where('division_id',$division)->get();

        return view('coop_division.documents.index')->with('documents',$documents);
    }
    public function index($division)
    {
        echo $division;

//        $documents=Document::all();
//        return view('coop_division.documents.index')->with('documents',$documents);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addNewFile($division){

        return view('coop_division.documents.add_file')->with('division',$division);
    }
    public function create()
    {

        return view('coop_division.documents.add_file');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $document=new Document();
        $file_name=$request->file('document')->getClientOriginalName();
        $request->file('document')->move('documents',$file_name);
        $file_path='documents/'.$file_name;
        $document->file_path=$file_path;
        $document->title=$request->get('title');
        $document->division_id=$request->get('division');
        $document->save();
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
