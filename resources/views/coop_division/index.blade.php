@extends('layouts.master')
@section('nav')
    @include('coop_division.navbar')
    @endsection
@section('content')
        @include('coop_division.maincontent')
    @endsection

@section('sidemenu')
        @include('coop_division.sidemenu')
    @endsection