@extends('layouts.master')
@section('nav')
    @include('group1.navbar')
    @endsection
@section('content')
    <div class="col-md-8 col-md-push-4">
        @include('group1.maincontent')
    </div>
    @endsection
@section('sidebar')
    <div class="col-md-4 col-md-pull-8">
        @include('group1.sidemenu')
    </div>
    @endsection