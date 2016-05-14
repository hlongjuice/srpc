@extends('layouts.master')
@section('nav')
    @include('coop_division.layouts.navbar')
    @endsection
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>เอกสาร</h4>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-4">
                    <a class="btn btn-default" href={{route('coop_division.documents.add_new_file','2')}}>เพิ่มเอกสาร</a>
                </div>

            </div>
            <div class="row">
                <div class="col-xs-12">
                    <ul class="srpc-list list-unstyled">
                @foreach($documents as $document)
                   <li> <a href={{url($document->file_path) }}>****** {{$document->title}} ******</a><br></li>
                    @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    @endsection
@section('sidemenu')
    @include('coop_division.layouts.sidemenu')
    @endsection