@extends('layouts.master')
@section('nav')
    @include('coop_division.navbar')
    @endsection
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3>แก้ไข {{$student->student_id}} </h3>
        </div>
        <div class="panel-body">
            {!! Form::model($student,[
            'method'=>'PATCH',
            'route'=>['students.update',$student->id],
            'class'=>'form-horizontal'
            ])!!}
            {{--Name--}}
                <div class="form-group col-md-6">
                    {!! Form::label('name','ชื่อ',array('class'=>'control-label col-md-4')) !!}
                    <div class="col-md-8">
                        {!! Form::text('name',null,array('class'=>'form-control')) !!}
                    </div>
                </div>
            {{--Lastname--}}
                <div class="form-group col-md-6">
                    {!! Form::label('lastname','ชื่อ',array('class'=>'col-xs-4 control-label')) !!}
                    <div class="col-xs-8">
                        {!! Form::text('lastname',null,array('class'=>'form-control')) !!}
                    </div>
                </div>

        </div>
    </div>
    @endsection
{{--Side Menu--}}
@section('sidemenu')
    @include('coop_division.sidemenu')
    @endsection