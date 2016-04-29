@extends('layouts.master')
@section('content')
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3>ข้อมูลนักศึกษา</h3>
            </div>
            <div class="panel-body">
                {{Form::open(array('class'=>'form-horizontal'))}}
                <div class=" col-xs-12 col-md-5 form-inline">
                    <div class="form-group col-xs-3">
                        {{Form::label('man','ชาย',array('class'=>'col-xs-2 col-md-4'))}}
                        <div class="col-xs-2 col-md-4">
                            {{Form::radio('man','man',false)}}
                        </div>
                    </div>
                    <div class="form-group col-xs-3">
                        {{Form::label('man','หญิง',array('class'=>'col-xs-2 col-md-2'))}}
                        <div class="col-xs-2 col-md-2">
                            {{Form::radio('man','man',false)}}
                        </div>
                    </div>

                </div>
                <div class="col-md-6">


                </div>
            </div>
                {{Form::close()}}
        </div>
    </div>
@endsection