@extends('layouts.master')
@section('nav')
    @include('group1.navbar')
    @endsection
@section('content')
    <table class="table table-striped">
        <tr class="info">
            <th>{!! Form::checkbox('check_product','',null,array('id'=>'select_all')) !!}</th>
            <th>รหัสนักเรียน</th>
            <th>เพศ</th>
            <th>ชื่อ</th>
            <th>นามสกุล</th>
            <th>คณะ</th>
            <th>ชั้นปี</th>
            <th>เกรด</th><th></th><th></th><th></th>

        </tr>
        @foreach($students as $student)
            <tr>
                <td width="10%">{!! Form::checkbox('checkbox[]',$student->id,null,array('class'=>'checkbox1')) !!}</td>
                <td width="10%">{{$student->student_id }}</td>
                <td>{{$student->gender}}</td>
                <td>{{$student->name }}</td>
                <td>{{$student->lastname}}</td>
                <td>{{$student->faculty}}</td>
                <td>{{$student->level}}</td>
                <td>{{$student->grade}}</td>
                {{--Check Image File--}}
                @if(!empty($student->image))
                    <td><img src="{{$student->image}}" height="50" width="50"></td>
                @else
                    <td> </td>
                @endif

                <td><a href="{{ route('students.edit', $student->id) }}" class="btn btn-primary">แก้ไข</a></td>
                {!! Form::open(array('route'=>array('students.destroy',$student->id))) !!}
                {{ Form::hidden('_method', 'DELETE') }}
                <td>{!! Form::submit('ลบ',['class'=>'btn btn-danger']) !!}</td>

            </tr>
        @endforeach
        <tr><td>{{ Form::submit('ลบทั้งหมด',array('class'=>'btn btn-danger','name'=>'delete_all'))}}</td>
            <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
        </tr>
        {!! Form::close() !!}
    </table>
@endsection

{{--Side Menu--}}
@section('sidemenu')
    @include('group1.sidemenu')
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