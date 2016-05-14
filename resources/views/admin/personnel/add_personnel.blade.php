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

            {{--Level--}}
            <div class="col-xs-6 col-md-4 form-group">
                {{Form::label('rank','ตำแหน่ง')}}
                    {{Form::text('level',null,array('class'=>'form-control','placeholder'=>''))}}
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
                {{Form::select('division',$division,null,array('class'=>'form-control'))}}
            </div>

            {{--Address--}}
            <div class="col-xs-12 col-md-8 form-group">
                {{Form::label('address','ที่อยู่')}}
                {{Form::textarea('address',null,array('class'=>'form-control','rows'=>'10'))}}
            </div>

            <div class="col-xs-12 col-md-4 form-group">
                {{--Phone--}}
                <div class="form-group">
                    {{Form::label('phone','เบอร์โทร')}}
                    {{Form::text('phone',null,array('class'=>'form-control','placeholder'=>'ตัวอย่าง 081-2345678'))}}
                </div>

                {{--Image--}}
                <div class="form-group">
                    {{Form::label('image','รูป')}}
                    {{Form::file('image')}}
                </div>

                {{--Submit--}}
                <div class="form-group">
                  {{Form::submit('บันทึก',array('class'=>'btn btn-success btn-block'))}}
                </div>

            </div>

            {{Form::close()}}
        </div>
    </div>
@endsection

{{--SideMenu--}}
@section('sidemenu')
        @include('coop_division.layouts.sidemenu')
@endsection