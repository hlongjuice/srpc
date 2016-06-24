<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$categories=Category::all();
        $categories =Category::with('child')->get();

//        foreach($categories as $category)
//        {
//
//        }

        return view('admin.contents.categories.index')->with('categories',$categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        
        foreach($categories as $category){ // Set Associative Array Before Send To Form
            $arr_category[$category->id]=$category->title; // $arr_category["KEY"]="Values"
        }
        unset($arr_category[1]); // Delete first element from category
        $arr_category=['1'=>'เป็นหมวดหมู่กลัก']+$arr_category;
        return view('admin.contents.categories.add_categories')->with('categories',$arr_category);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category=new Category();
        $category->title=$request->input('title');
        $category->parent_id=$request->input('parent_id');
        $cat_level= $category->where('id',$request->input('parent_id'))->first(); // Get Category level from parent
//        echo $cat_level;
        $category->level=$cat_level->level+1;
        $category->save();

        return redirect()->route('admin.categories.index');

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
