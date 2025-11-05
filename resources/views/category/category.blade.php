@extends('layouts.app')

@include('includes.category_header')
<link rel="stylesheet" href="{{ asset('css/category_res.css') }}">
@section('content')
    @include('includes.category_content')
    @include('includes.category_footer')
@endsection
