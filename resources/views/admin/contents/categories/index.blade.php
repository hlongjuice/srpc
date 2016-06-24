@extends('layouts.master')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            หมวดหมู่
        </div>
        <div class="panel-body">
            <div class="col-xs-12 col-md-4">
                <a class="btn btn-default" href={{route('admin.categories.create')}}>เพิ่มหมวดหมู่</a>
            </div>
            <div class="col-xs-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ลำดับ</th>
                            <th>หมวดหมู่</th>
                            <th>เลเวล</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $row =1?>
                    @foreach($categories as $category)
                            <tr>
                                <td>{{$row}}</td>
                                <td>
                                    <ul>
                                       <li>
                                           {{$category->title}}
                                           <ul>
                                           @foreach($category->child as $child)
                                 -<li>{{$child->title}}</li>
                                               @endforeach
                                                   </ul>
                                       </li>

                                    </ul>

                                </td>
                                <td>{{$category->level}}</td>

                            </tr>
                            <?php $row++?>
                            @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endsection