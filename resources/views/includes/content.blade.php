@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="card shadow-sm">
        <img src="{{ $blog->blog_thumbnail
                    ? asset('uploads/thumbnails/' . $blog->blog_thumbnail)
                    : asset('uploads/thumbnails/default.jpg') }}"
             class="card-img-top"
             alt="{{ $blog->blog_title }}">

        <div class="card-body">
            <h2>{{ $blog->blog_title }}</h2>
            <p class="text-muted">Category: {{ $blog->blog_cat }}</p>
            <p><strong>Location:</strong> {{ $blog->blog_location }}</p>
            <p>{{ $blog->blog_description }}</p>

            <hr>
            <h4>Full Content</h4>
            <p>{!! nl2br(e($blog->blog_content)) !!}</p>
            <img src="{{ $blog->blog_thumbnail
                    ? asset('uploads/fav_img/' . $blog->blog_favimg)
                    : asset('uploads/thumbnails/default.jpg') }}"
             class="card-img-top"
             alt="{{ $blog->blog_title }}">

              <img src="{{ $blog->blog_favimg1
                    ? asset('uploads/fav_img1/' . $blog->blog_favimg1)
                    : asset('uploads/thumbnails/default.jpg') }}"
             class="card-img-top"
             alt="{{ $blog->blog_title }}">

              <img src="{{ $blog->blog_favimg2
                    ? asset('uploads/fav_img2/' . $blog->blog_favimg2)
                    : asset('uploads/thumbnails/default.jpg') }}"
             class="card-img-top"
             alt="{{ $blog->blog_title }}">

             <img src="{{ $blog->blog_favimg3
                    ? asset('uploads/fav_img3/' . $blog->blog_favimg3)
                    : asset('uploads/thumbnails/default.jpg') }}"
             class="card-img-top"
             alt="{{ $blog->blog_title }}">
        </div>
    </div>

    <a href="{{ route('home') }}" class="btn btn-primary mt-3">⬅ Back to Home</a>
</div>
@endsection
