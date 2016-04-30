@extends('layouts.master')
@section('nav')
    @include('group1.navbar')
    @endsection
@section('content')
        @include('group1.maincontent')
    @endsection

@section('sidemenu')
        @include('group1.sidemenu')
    @endsection