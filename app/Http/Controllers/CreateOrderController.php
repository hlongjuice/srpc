<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Http\Controllers\Controller;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;

class CreateOrderController extends Controller
{
    public function index()
    {
        $orders= Order::all();
        return view('result')->with('order',$orders[0]->customer);
    }

    public function show($id){
        $order=Order::findOrNew($id);
        return $order;
    }

    public function store(Request $request)
    {
        $customer=new Customer();
        $order=new Order();
        $product=new Product();
        $order_detail=new OrderDetail();

//        First method return first row if exist
        $check_product_exist=Product::where('name','=',$request->input('product_name'))->first();
        if(empty($check_product_exist))
        {
            $product->name = $request->input('product_name');
            $product->price = $request->input('price');
            $product->save();
        }
        else
        {
            $product->id=$check_product_exist['id'];
        }


        $customer->name=$request->input('customer_name');
        $customer->save();

        $order->date=$request->input('date');
        $order->order_no=$request->input('invoice_no');
        $order->customer_id=$customer->id;
        $order->save();

        $order_detail->order_id=$order->id;
        $order_detail->product_id=$product->id;
        $order_detail->quantity=$request->input('quantity');
        $order_detail->save();

        return $order_detail;


//        $exist_product=Product::where('name','=',$request->input('product_name'))->get();
//        $exist_product=$product->where('name','=',$request->input('product_name'))->get();
//        return $exist_product;

    }
}
