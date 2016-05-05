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
            @foreach($personnels as $personnel)
                <tr>
                    <td width="10%">{!! Form::checkbox('checkbox[]',$personnel->id,null,array('class'=>'checkbox1')) !!}</td>
                    <td width="10%">{{$personnel->gender}}</td>
                    <td>{{$personnel->name }}</td>
                    <td>{{$personnel->lastname}}</td>
                    <td>{{$personnel->rank}}</td>
                    <td>{{$personnel->division}}</td>
                    <td>{{$personnel->grade}}</td>
                    {{--Check Image File--}}
                    @if(!empty($personnel->image))
                        <td><img src="{{$personnel->image}}" height="50" width="50"></td>
                    @else
                        <td> </td>
                    @endif

                    <td><a href="{{ route('students.edit', $personnel->id) }}" class="btn btn-primary">แก้ไข</a></td>
                    {!! Form::open(array('route'=>array('students.destroy',$personnel->id))) !!}
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