@extends('layouts.master')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">ระบบจัดการเอกสาร</div>
        <div class="panel-body">
            {{Form::open([
            'route'=>'admin.documents.store',
            'method'=>'POST',
            'files'=>true
            ])}}

            <div class="col-xs-12 col-md-6 form-group">
                {{Form::label('title','ชื่อเอกสาร')}}
                {{Form::text('title',null,['class'=>'form-control','value'=>old('title')])}}
                <div class="text-danger">{{$errors->first('title')}}</div>
            </div>

            <div class="col-xs-12 col-md-6 form-group">
                {{Form::label('divisions','หมวดหมู่')}}
                {{Form::select('divisions',$divisions,null,['class'=>'form-control','value'=>old('divisions')])}}
                <div class="text-danger">{{$errors->first('divisions')}}</div>
            </div>
            <div class="clearfix"></div>

            <div class="col-xs-12 form-group">
                {{Form::label('file','ไฟล์')}}
                {{Form::file('file')}}
                <div class="text-danger">{{$errors->first('file')}}</div>
            </div>


            <div class="col-xs-12 col-md-6 for form-group">
                {{Form::submit('อัพโหลด',['class'=>'btn btn-success btn-block'])}}
            </div>
        </div>
    </div>
    @endsection