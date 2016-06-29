<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Content;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $contents=Content::with('category')->get();
//        echo $contents;

//        /*category*/
//        $categories=category::all('id','title'); //Get all categories
//        foreach($categories as $category){ // Set Associative Array Before Send To Form
//            $arr_category[$category->id]=$category->title; // $arr_category["KEY"]="Values"
//        }
//        unset($arr_category[1]); // Delete first element from category
//        $arr_category=[''=>'กรุณาเลือก']+$arr_category;
//
        return view('admin.contents.index')->with('contents',$contents);

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

        $arr_category=[' '=>'เลือกหมวดหมู่']+$arr_category;
//
        return view('admin.contents.add_contents')->with('categories',$arr_category);
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
            'description'=>'required',
            'category'=>'required'
        ],[
            'title.required' =>'กรุณากรอกหัวเรื่อง',
            'description.required'=>'กรุณาใส่ข้อมูล',
            'category.required'=>'กรุณาเลือกหมวดหมู่'
        ]);

        $content=new Content();
        $content->title=$request->input('title');
        $content->text=$request->input('description');
        $content->category_id=$request->input('category');
        $content->save();

        return redirect()->route('admin.contents.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $content=Content::find($id);
//        echo $content;

        return view('admin.contents.show')->with('content',$content);
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
