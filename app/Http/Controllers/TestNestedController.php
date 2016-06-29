<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\TestNested;
use Illuminate\Http\Request;

use App\Http\Requests;

class TestNestedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $html='';
        $nested=TestNested::root();
        $root=Category::root();
//        echo $root;
        $root->children()->create(['title'=>'ฝ่ายแผนงานและความร่วมมิอ']);
//        echo $nested->getDescendantsAndSelf();
//        foreach($nested->getDescendantsAndSelf() as $child){
//            for($i=0;$i<$child->getLevel();$i++){
//                $html.='-';
//            }
//            echo $html.$child->title;
//            echo' Level is '.$child->getLevel().'<br>';
//            $html='';
//        }



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        $root =Testnested::create(['title'=>'root']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
