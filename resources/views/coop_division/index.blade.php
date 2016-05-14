@extends('layouts.master')
@section('nav')
    @include('coop_division.layouts.navbar')
    @endsection
@section('content')
        @include('coop_division.maincontent')
    @endsection

@section('sidemenu')
        @include('coop_division.layouts.sidemenu')
    @endsection