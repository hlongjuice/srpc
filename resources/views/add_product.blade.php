@extends('layouts.master')
@section('content')
    <div class="panel panel-info">
        <div class="panel-heading" >
            เพิ่มสินค้า
        </div>
        <div class="panel-body">
            {!! Form::open(array('route'=>'products.store','class' =>'form-horizontal','files'=> true )) !!}
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
                    <div class="form-group">
                        {!! Form::label('image','รูป',array('class'=>'col-xs-3 col-md-2 control-label' )) !!}
                        <div class="col-xs-8 col-md-10 ">
                            {!! Form::file('image') !!}
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-6">
                    <div class="form-group">
                        {!! Form::label('description','ลายละเอียดอื่นๆ',array('class'=>'col-xs-3 col-md-3  control-label' )) !!}
                        <div class="col-xs-8 col-md-9">
                            {!! Form::textarea('description',null,array('class'=>'form-control','placeholder'=>'ลายละเอียดเพิ่มเติม','rows'=>'4')) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-5 col-xs-push-6">
                            {!! Form::button('เพิ่มสินค้า',array('class'=>'btn btn-danger pull-right','type'=>'submit')) !!}
                        </div>
                    </div>
                </div>
            </div>
            {!!Form::close() !!}
        </div>
    </div>
@endsection