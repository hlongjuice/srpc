@extends('layouts.master')

@section('content')

    {!! Form::open() !!}
        {!! Form::label('name','ชื่อ') !!}
        {!! Form::text('name','นาย หล่ง') !!}
        {!! Form::label('lastname','นามสกุล') !!}
        {!! Form::text('lastname','อินทชาติ') !!}
    {!! Form::close() !!}

@endsection