@extends('layouts.master')
@section('content')
    {!! Form::open() !!}
    {!! Form::textarea('messageArea',null,array('class'=>'form-control ckeditor','row'=>'7')) !!}
    {!! Form::close() !!}
@endsection
@section('page-script')
    <script type="text/javascript">
        CKEDITOR.replace( 'messageArea',
                {
                    customConfig : 'config.js',
                    toolbar : 'simple'
                })
    </script>
@endsection