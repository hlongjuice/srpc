<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::all();
        return view('products.index')->with('products',$products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('add_product');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product=$request->all();
        $path='images/'.$request->file('image')->getClientOriginalName();
        $product['image']=$path;
        Image::make($request->file('image')->getRealPath())->resize(200,200)->save($path);
//        print_r($product);
        Product::create($product);
        return redirect('products');
//        echo public_path('images');

//         $product=$request->all();
//        $product=new Product();
//       $product->images= $request->file('file_upload')->move('images','first');
//        print_r($product);
//        echo $product;
//         Product::create($product);
//         return redirect('products');
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
        $product=Product::findOrNew($id);
        return view('products.edit')->with('product',$product);
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
        $product=$request->all();
        $path='images/'.$request->file('image')->getClientOriginalName();
        $product['image']=$path;
        Image::make($request->file('image')->getRealPath())->resize(200,200)->save($path);
        Product::findOrNew($id)->fill($product)->save();
        return redirect('products');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $ids)
    {
//        Product::destroy($ids->all());
//        echo $ids->all();
//        $resutl=$ids->all();
//        foreach($resutl as $id)
//        echo $id.'<br>';
      //  print_r($ids->get('checkbox'));
        Product::destroy($ids->get('checkbox'));
        return redirect('products');
    }
}
