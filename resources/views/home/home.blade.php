@extends('layouts.app')
<style>
    body {
        background-color: #f8f5f2 !important;
    }
</style>
@include('includes.header')

@section('content')
    @include('includes.sliding_bar')
    @include('includes.post_section1')
    @include('includes.tab')
    @include('includes.top_blog')
    @include('includes.categories')
    @include('includes.footer')
@endsection
