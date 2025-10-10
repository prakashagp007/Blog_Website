@extends('layouts.app')
<style>
    body {
        background-color: #f8f5f2 !important;
    }
</style>
@include('includes.header')

@section('content')
    @include('includes.post_section1')
    @include('includes.tab')
    @include('includes.footer')
@endsection
