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
        $categories=Category::all()->toHierarchy();
        return view('admin.contents.categories.index')->with('categories',$categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $text='';
        $root_cat = Category::root();//get root category
        foreach($root_cat->getDescendants() as $child_cat) //get child category
        {
            for($i=0;$i<$child_cat->getLevel();$i++)//check level
            {
                $text.='-';//add '-' before text per level of category
            }
            if($child_cat->getLevel()==1)
                $arr_category[$child_cat->id]=$text.$child_cat->title;
            else
                $arr_category[$child_cat->id]=$text.' '.$child_cat->title; // $arr_category["KEY"]="Values"
            $text='';
        };

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
        $parent=Category::where('id',$request->input('parent_id'))->first();
        $parent->children()->create(['title'=>$request->input('title')]);
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
