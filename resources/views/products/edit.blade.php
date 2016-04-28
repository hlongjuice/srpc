@extends('layouts.master')
@section('content')

    <div class="panel panel-info">
        <div class="panel-heading" >
             แก้ไข {{$product->name}}
        </div>
        <div class="panel-body">

        {!! Form::model($product, [
        'method' => 'PATCH',
        'route' => ['products.update', $product->id],
        'class' =>'form-horizontal'
         ]) !!}
            <div class="row">
                <div class="col-xs-12 col-md-6">
                    <div class="form-group">
                        {!! Form::label('name','ชื่อสินค้า',array('class'=>'col-xs-3 col-md-2 control-label' )) !!}
                        <div class="col-xs-8 col-md-10 ">
                            {!! Form::text('name',null,array('class'=>'form-control','placeholder'=>'ชื่อสินค้า')) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('cost_price','ราคาทุน',array('class'=>'col-xs-3 col-md-2  control-label' )) !!}
                        <div class="col-xs-8 col-md-10">
                            {!! Form::text('cost_price',null,array('class'=>'form-control','placeholder'=>'0.00')) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('sale_price','ราคาขาย',array('class'=>'col-xs-3 col-md-2 control-label' )) !!}
                        <div class="col-xs-8 col-md-10 ">
                            {!! Form::text('sale_price',null,array('class'=>'form-control','placeholder'=>'0.00')) !!}
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-6">
                    <div class="form-group">
                        {!! Form::label('image','รูป',array('class'=>'col-xs-3 col-md-3  control-label' )) !!}
                        <div class="col-xs-8 col-md-9">
                           <img src="{{url($product->image)}}" width="100" height="100">
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('image','รูป',array('class'=>'col-xs-3 col-md-3  control-label' )) !!}
                        <div class="col-xs-8 col-md-9">
                            {!! Form::file('image',null,array('files'=>true)) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('description','ลายละเอียดอื่นๆ',array('class'=>'col-xs-3 col-md-3  control-label' )) !!}
                        <div class="col-xs-8 col-md-9">
                            {!! Form::textarea('description',null,array('class'=>'form-control','placeholder'=>'ลายละเอียดเพิ่มเติม','rows'=>'4')) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-5 col-xs-push-6">
                            {!! Form::button('แก้ไขสินค้า',array('class'=>'btn btn-danger pull-right','type'=>'submit')) !!}
                        </div>
                    </div>
                </div>
            </div>
    {!!Form::close() !!}
@endsection