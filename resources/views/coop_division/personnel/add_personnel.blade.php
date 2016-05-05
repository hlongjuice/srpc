@extends('layouts.master')
@section('nav')
    @include('coop_division.navbar')
@endsection

{{--MAin Content--}}
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3>ข้อมูลนักศึกษา</h3>
        </div>
        <div class="panel-body">
            {{--Student Form--}}
            {{Form::open(array('route'=>'personnel.store'))}}
            
            {{--Gender--}}
            <div class="col-xs-12 col-md-4 form-group">
                {{Form::label('gender','เพศ')}}
                <div class="form-group">
                    <div class="col-xs-5">
                        <label class="radio-inline"><input type="radio" name="gender" id="gender" value="ชาย">ชาย</label>
                    </div>
                    <div class="col-xs-5">
                        <label class="radio-inline"><input type="radio" name="gender" id="gender" value="หญิง">หญิง</label>
                    </div>
                </div>
            </div>

            {{--Name--}}
            <div class="col-xs-12 col-md-4 form-group">
                {{Form::label('name','ชื่อ')}}
                    {{Form::text('name',null,array('class'=>'form-control','placeholder'=>'ชื่อ'))}}
            </div>

            {{--LastName--}}
            <div class="col-xs-12 col-md-4 form-group">
                {{Form::label('lastname','นามสกุล')}}
                    {{Form::text('lastname',null,array('class'=>'form-control','placeholder'=>'นามสกุล'))}}
            </div>

            {{--Level--}}
            <div class="col-xs-6 col-md-4 form-group">
                {{Form::label('level','ชั้นปี')}}
                    {{Form::text('level',null,array('class'=>'form-control','placeholder'=>'1-3'))}}
            </div>

            {{--Grade--}}
            <div class="col-xs-6 col-md-4 form-group">
                {{Form::label('grade','เกรดเฉลี่ย')}}
                    {{Form::text('grade',null,array('class'=>'form-control','placeholder'=>'x.xx'))}}
            </div>

            {{--Phone--}}
            <div class="col-xs-6 col-md-4 form-group">
                {{Form::label('phone','เบอร์โทร')}}
                    {{Form::text('phone',null,array('class'=>'form-control','placeholder'=>'0x-xxxxxxx'))}}
            </div>

            {{--Address--}}
            <div class="col-xs-12 col-md-8 form-group">
                {{Form::label('address','ที่อยู่')}}
                {{Form::textarea('address',null,array('class'=>'form-control','row'=>'7'))}}
            </div>

            {{--Image--}}
            <div class="col-xs-6 col-md-4 form-group">
                {{Form::label('image','รูป')}}
                {{Form::file('image')}}
            </div>

            {{--Submit--}}
            <div class="col-xs-12 col-md-4 form-group">
              {{Form::submit('บันทึก',array('class'=>'btn btn-success btn-block'))}}
            </div>

            {{Form::close()}}
        </div>
    </div>
@endsection

{{--SideMenu--}}
@section('sidemenu')
        @include('coop_division.sidemenu')
@endsection