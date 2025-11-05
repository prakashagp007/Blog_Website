@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/search_res.css') }}">
@include('includes.search_header')
@section('content')
    @include('includes.search')
@endsection
