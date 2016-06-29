@extends('layouts.master)
@section('content')

    {{Form::open([
    'route'=>'testnested.store'
    ])}}
    <div class="form-group">
        {{Form::label('title','Title')}}
        {{Form::text('title',null,['class'=>'form-control'])}}
    </div>
    <div class="form-group">
        {{Form}}
    </div>

@endsection