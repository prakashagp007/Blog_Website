@extends('layouts.app')

@section('content')
    @include('includes.post_section1', ['blogs' => $blogs])
@endsection

