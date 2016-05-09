@extends('layouts.master')
@section('nav')
    @include('coop_division.navbar')
@endsection
@section('content')
    <div class="col-md-4">
        <a class="btn btn-default" href={{route('personnel.create')}}>เพิ่มนักเรียน</a>
    </div>
    <div class="col-md-12">
        <table class="table table-striped">
            <tr class="info">
                <th>{!! Form::checkbox('check_product','',null,array('id'=>'select_all')) !!}</th>
                <th>คำนำหน้า</th>
                <th>ชื่อ</th>
                <th>นามสกุล</th>
                <th>ตำแหน่ง</th>
                <th>หน้าที่รับผิดชอบ</th>
                <th></th><th></th><th></th><th></th>

            </tr>
            {{--Show The Personnel--}}
            @foreach($personnel as $person)
                <tr>
                    <td width="10%">{!! Form::checkbox('checkbox[]',$person->id,null,array('class'=>'checkbox1')) !!}</td>
                    <td width="10%">{{$person->gender}}</td>
                    <td>{{$person->name }}</td>
                    <td>{{$person->lastname}}</td>
                    <td>@foreach($person->duties as $duty)
                            {!! $duty->title.'<br>' !!}
                        @endforeach
                    </td>
                    {{--Show Personnel's Division--}}
                    <td>@foreach($person->divisions as $division)
                            {!! $division->title.'<br>' !!}
                        @endforeach
                    </td>
                    <td>{{$person->grade}}</td>
                    {{--Check Image File--}}
                    @if(!empty($person->image))
                        <td><img src="{{$person->image}}" height="50" width="50"></td>
                    @else
                        <td> </td>
                    @endif

                    <td><a href="{{ route('students.edit', $person->id) }}" class="btn btn-primary">แก้ไข</a></td>
                    {!! Form::open(array('route'=>array('students.destroy',$person->id))) !!}
                    {{ Form::hidden('_method', 'DELETE') }}
                    <td>{!! Form::submit('ลบ',['class'=>'btn btn-danger']) !!}</td>

                </tr>
            @endforeach
            <tr><td>{{ Form::submit('ลบทั้งหมด',array('class'=>'btn btn-danger','name'=>'delete_all'))}}</td>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
            </tr>
            {!! Form::close() !!}
        </table>
    </div>
@endsection

{{--Side Menu--}}
@section('sidemenu')
    @include('coop_division.sidemenu')
@endsection
{{--Script--}}
@section('page-script')
    <script>
        $(document).ready(function() {
            $('#select_all').click(function(event) {  //on click
                if(this.checked) { // check select status
                    $('.checkbox1').each(function() { //loop through each checkbox
                        this.checked = true;  //select all checkboxes with class "checkbox1"
                    });
                }else{
                    $('.checkbox1').each(function() { //loop through each checkbox
                        this.checked = false; //deselect all checkboxes with class "checkbox1"
                    });
                }
            });

        });
    </script>
@endsection