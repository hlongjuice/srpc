@extends('layouts.master')
@section('nav')
    @include('coop_division.layouts.navbar')
@endsection

{{--MAin Content--}}
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>เพิ่มบุคคลากร</h4>
        </div>
        <div class="panel-body">
            {{--Student Form--}}
            {{Form::open(array('route'=>'coop_division.personnel.store','files'=>true))}}

            {{--Gender--}}
            <div class="col-xs-12 col-md-4 form-group">
                {{Form::label('gender','เพศ')}}
                <div class="form-group">
                    <div class="col-xs-6">
                        <label class="radio-inline"><input type="radio" name="gender" id="gender" value="ชาย">ชาย</label>
                    </div>
                    <div class="col-xs-6">
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

            {{--Rank--}}
            <div class="col-xs-6 col-md-4 form-group">
                {{Form::label('rank','ตำแหน่ง')}}
                    {{Form::text('level',null,array('class'=>'form-control','placeholder'=>''))}}
            </div>

            {{--Department--}}
            <div class="col-xs-12 col-md-4 form-group">
                {{Form::label('department','แผนก')}}
                {{Form::select('department',$departments,null,array('class'=>'form-control'))}}
            </div>

            {{--Image--}}
            <div class="col-xs-12 col-md-4 form-group">
                {{Form::label('image','รูป')}}
                {{Form::file('image')}}
            </div>

            {{--Duty--}}
            <div class="col-xs-12 col-md-4 form-group">
                {{Form::label('duty','หน้าที่รับชอบ')}}
                <div class="form-group">
                    <div class="col-xs-6 col-md-6">
                        <label class="radio-inline"><input type="radio" name="duty" id="duty" value="1">หัวหน้า</label>
                    </div>
                    <div class="col-xs-6 col-md-6">
                        <label class="radio-inline"><input type="radio" name="duty" id="duty" value="2">เจ้าหน้าที่</label>
                    </div>
                </div>
            </div>

            {{--Division--}}
            <div class="col-xs-6 col-md-4 form-group">
                {{Form::label('division',' แผนก')}}
                {{Form::select('division',$divisions,null,array('class'=>'form-control'))}}
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
        @include('coop_division.layouts.sidemenu')
@endsection