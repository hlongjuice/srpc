@extends('layouts.master')
@section('nav')
    @include('group1.navbar')
    @endsection

{{--MAin Content--}}
@section('content')
    <div class="col-md-8 col-md-push-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3>ข้อมูลนักศึกษา</h3>
            </div>
            <div class="panel-body">
                {{--Student Form--}}
                {{Form::open(array('class'=>'form-horizontal'))}}

                    {{--Gender--}}
                    <div class=" col-xs-12 col-md-3 form-group">
                        <div class="col-xs-5">
                            <label class="radio-inline"><input type="radio" name="gender" id="gender" value="man">ชาย</label>
                        </div>
                        <div class="col-xs-5">
                            <label class="radio-inline"><input type="radio" name="gender" id="gender" value="woman">หญิง</label>
                        </div>
                    </div>

                    {{--Name--}}
                    <div class="col-xs-12 col-md-5 form-group">
                      {{Form::label('name','ชื่อ',array('class'=>'control-label col-xs-3'))}}
                        <div class="col-xs-9">
                            {{Form::text('name',null,array('class'=>'form-control','placeholder'=>'ชื่อ'))}}
                        </div>
                    </div>

                    {{--LastName--}}
                    <div class="col-xs-12 col-md-5 form-group">
                        {{Form::label('lastname','นามสกุล',array('class'=>'control-label col-xs-3'))}}
                        <div class="col-xs-9">
                            {{Form::text('lastname',null,array('class'=>'form-control','placeholder'=>'นามสกุล'))}}
                        </div>
                    </div>

                <div class="col-md-6">


                </div>
                {{Form::close()}}
            </div>

        </div>
    </div>
@endsection

{{--SideMenu--}}
@section('sidebar')
    <div class="col-md-4 col-md-pull-8">
        @include('group1.sidemenu')
    </div>
    @endsection