@extends('layouts.master')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">ระบบจัดการบทความ</div>
        <div class="panel-body">
            <div class="col-md-4">
                <a href={{route('admin.contents.create')}}>เพิ่มบทความ</a>
            </div>
            <div class="col-xs-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ลำดับ</th>
                            <th>รายการ</th>
                            <th>หมวดหมู่</th>
                            <th>วันที่</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $row=1?>
                        @foreach($contents as $content)
                            <tr>
                                <td>{{$row}}</td>
                                <td><a href={{route('admin.contents.show',$content->id)}}>{{$content->title}}</a></td>
                                <td>{{$content->category->title}}</td>
                                <td>{{$content->created_at}}</td>
                            </tr>
                            <?php $row++ ?>
                            @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </div>
    @endsection
