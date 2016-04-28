@extends('layouts.master')
{{--@section('add_css')--}}
	{{--<link href="{{ asset('css/selectize.bootstrap3.css')}}" rel="stylesheet">--}}
{{--@endsection--}}
@section('script')
	<script src="{{ asset('js/standalone/selectize.min.js')}}"></script>
@endsection
@section('content')
	<div class="panel panel-info">
		<div class="panel-heading">
			กรอกข้อมูล
		</div>
		<div class="panel-body">
			{!! Form::open(array('url'=>'/create-order','class' =>'form-horizontal')) !!}

			<div class ="form-group">
				{!! Form::label('date','วันที่',array('class'=>'col-xs-3 control-label')) !!}
				<div class="col-xs-8">
					{!! Form::date('date',\Carbon\Carbon::now(),array('class'=>'form-control')) !!}
				</div>
			</div>

			<div class ="form-group">
				{!! Form::label('customer','ชื่อผู้ซื้อ',array('class'=>'col-xs-3 control-label')) !!}
				<div class="col-xs-8">
					{!! Form::text('customer_name',null,array('class'=>'form-control','placeholder'=>'ผู้ซื้อ')) !!}
				</div>
			</div>

			<div class ="form-group">
				{!! Form::label('invoice_no','เลขที่ใบส่งของ',array('class'=>'col-xs-3 control-label')) !!}
				<div class="col-xs-8">
					{!! Form::text('invoice_no',null,array('class'=>'form-control','placeholder'=>'หมายเลขใบส่งของ')) !!}
				</div>
			</div>

			<div class ="form-group">
				{!! Form::label('order_no','เลชที่ใบสั่งซื้อ',array('class'=>'col-xs-3 control-label')) !!}
				<div class="col-xs-8">
					{!! Form::text('order_no',null,array('class'=>'form-control','placeholder'=>'หมายเลขใบสั่งซื้อ')) !!}
				</div>
			</div>

			<div id="product-group">
				<div class="head-product">
					<div class ="form-group">
						{!! Form::label('product_name','สินค้า',array('class'=>'col-xs-3 control-label')) !!}
						<div class="col-xs-8">
							{!! Form::text('product_name',null,array('class'=>'form-control','placeholder'=>'กรอกชื่อสินค้า')) !!}
						</div>
					</div>

					<div class ="form-group">
						{!! Form::label('price','ราคา',array('class'=>'col-xs-3 control-label')) !!}
						<div class="col-xs-8">
						  <div class="input-group">
							  {!! Form::text('price',null,array('class'=>'form-control','placeholder'=>'0.00')) !!}
							  <div class="input-group-addon">บาท</div>
						  </div>
						</div>
					</div>

					<div class ="form-group " id="lastdiv">
						{!! Form::label('quantity','จำนวน',array('class'=>'col-xs-3 control-label')) !!}
						<div class="col-xs-8">
							{!! Form::text('quantity',null,array('class'=>'form-control','placeholder'=>'0.00')) !!}
						</div>
					</div>

					<div class ="form-group">
						<div class="col-xs-offset-3 col-xs-8">
							{!! Form::button('-',array('class'=>'remove-product btn btn-danger','type'=>'button')) !!}
						</div>
					</div>
				</div>
			</div>

			<div class ="form-group">
				<div class="col-xs-offset-3 col-xs-8">
					{!! Form::button('+',array('class'=>'btn btn-primary pull-right','type'=>'button','id'=>'add-product')) !!}
				</div>
			</div>

			<div class ="form-group">
				<div class="col-xs-offset-3 col-xs-8">
					{!! FORM::submit('บันทึก',array('class'=>'btn btn-primary pull-right','id'=>'bt_submit')) !!}
				</div>
			</div>

			{!! Form::close() !!}
		</div>
	</div>
@endsection

@section('page-script')
	<script>
        $(document).ready(function(){
				var j=2;
				 $("#add-product").click(function(){
					 $("#product-group").append('\
					 <div class="head-product"><div class ="form-group">\
						<label class="col-xs-3 control-label">สินค้า</label>\
						<div class="col-xs-8">\
							<input class="form-control" id="product_name" name="product_name[]" placeholder="สินค้าที่ขาย">\
						</div>\
					</div>\
					<div class ="form-group">\
						<label class="col-xs-3 control-label">ราคา</label>\
						<div class="col-xs-8">\
						  <div class="input-group">\
						  <input class="form-control" name="price" id="price" placeholder="00.00">\
						  <div class="input-group-addon">บาท</div>\
						  </div>\
						</div>\
					</div>\
					<div class ="form-group" >\
						<label class="col-xs-3 control-label">จำนวน</label>\
						<div class="col-xs-8">\
						  <input class="form-control" name="quantity" id="quantity[]" placeholder="00">\
						</div>\
					</div>\
					<div class ="form-group">\
					<div class="col-xs-offset-3 col-xs-8">\
					<button type="button" class="remove-product btn btn-danger">-</button>\
					</div>\
				</div></div>');
		  j++;
		 });
			
			$(document).on("click",".remove-product",function(){
				$(this).parent().parent().parent().remove();
			});			
			});
	</script>
	
@endsection
