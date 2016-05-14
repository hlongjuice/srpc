@extends('layouts.master')
@section('nav')
    @include('coop_division.layouts.navbar')
    @endsection
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>เพิ่มไฟล์</h4>
        </div>
        <div class="panel-body">
            {{Form::open(['route'=>'coop_division.documents.store','files'=>true])}}
            <div class="form-group col-xs-6">
                <div class="form-group">
                    {{Form::label('title','ชื่อเอกสาร',['class'=>'col-xs-3'])}}
                    {{Form::text('title',null,['class'=>'col-xs-9 form-control'])}}
                </div>
                <div class="form-group">
                    {{Form::label('document','ไฟล์',['class'=>'col-xs-3'])}}
                    {{Form::file('document',['class'=>'col-xs-9'])}}
                </div>
                <div class="form-group">
                    {{Form::text('division',$division,array('class'=>'sr-only'))}}
                    {{Form::submit('บันทึก')}}
                </div>


            </div>
            {{Form::close()}}
        </div>
    </div>

    @endsection
@section('sidemenu')
    @include('coop_division.layouts.sidemenu')
    @endsection