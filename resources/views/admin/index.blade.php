@extends('layouts.master')
@section('nav')
    @endsection
@section('content')
    <div  class="panel panel-default">
        <div class="panel-heading">
            <h4>Admin</h4>
        </div>
        <div class="panel-body">
            <div class="col-xs-3">
                <div class="thumbnail">
                    <img style="width: 100%" src="http://placehold.it/50x50">
                    <div class="caption text-center">
                        <h4><a href={{route('admin.personnel.index')}}>บุคลากร</a></h4>
                    </div>
                </div>
            </div>
            <div class="col-xs-3">
                <div class="thumbnail">
                    <img style="width: 100%" src="http://placehold.it/50x50">
                    <div class="caption text-center">
                        <h4><a href={{route('admin.documents.index')}}>Document</a></h4>
                    </div>
                </div>
            </div>
            <div class="col-xs-3">
                <div class="thumbnail">
                    <img style="width: 100%" src="http://placehold.it/50x50">
                    <div class="caption text-center">
                        <h4><a href={{route('admin.contents.index')}}>Content</a></h4>
                    </div>
                </div>
            </div>
            <div class="col-xs-3">
                <div class="thumbnail">
                    <img style="width: 100%" src="http://placehold.it/50x50">
                    <div class="caption text-center">
                        <h4><a href={{route('admin.categories.index')}}>Content Categories</a></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
@section('sidemenu')
    @include('admin.layouts.side_menu')
    @endsection
