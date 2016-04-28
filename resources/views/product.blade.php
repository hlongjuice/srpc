@extends('layouts.master')
@section('content')
    <table class="table table-striped">
        <tr class="info">
            <th>{!! Form::checkbox('check_product') !!}</th>
            <th>รหัสสินค้า</th>
            <th>ชื่อสินค้า</th>
            <th>ราคาทุน</th>
            <th>ราคาขาย</th>
        </tr>
        @foreach($products as $product)
            <tr>
                <td>{!! Form::checkbox('check_product') !!}</td>
                <td>{{$product->id }}</td>
                <td>{{$product->name }}</td>
                <td>{{$product->cost_price}}</td>
                <td>{{$product->sale_price}}</td>
            </tr>

            @endforeach
        {!! Form::open(array('url'=>'/product','class' =>'form-horizontal')) !!}
        <tr><td>{{ Form::button('ลบ',array('type'=>'submit')) }}</td></tr>


    </table>
@endsection