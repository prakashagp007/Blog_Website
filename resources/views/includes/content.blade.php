@extends('layouts.app')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('css/content.css') }}">

    <div class="main-layout">

        <div class="left-section">


        </div>


        <div class="center-section">
            <div class="container-lg breadcrumb1">
                <p><a href="{{ route('home') }}">Home</a> / {{ $blog->blog_cat }}</p>
            </div>

            <div class="container pb-5 pt-3">
                <div class="card blog-card shadow-lg">
                    <div class="blog-header">
                        <img src="{{ $blog->blog_thumbnail ? asset('uploads/thumbnails/' . $blog->blog_thumbnail) : asset('uploads/thumbnails/default.jpg') }}"
                            alt="{{ $blog->blog_title }}">
                        <div class="blog-title-overlay">{{ $blog->blog_title }}</div>
                    </div>

                    <div class="card-body blog-content">
                        <span class="cat-view">{{ $blog->blog_cat }}</span>
                        <div class="blog-location">
                            <i class="fa-solid fa-location-dot"></i> {{ $blog->blog_location }}
                        </div>

                        <p>{{ $blog->blog_description }}</p>
                        <hr>
                        <p>{!! nl2br(e($blog->blog_content)) !!}</p>

                        <div class="share-buttons">
                            <a class="facebook" target="_blank"
                                href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}">
                                <i class="fab fa-facebook-f"></i> Share
                            </a>
                            <a class="twitter" target="_blank"
                                href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($blog->blog_title) }}">
                                <i class="fab fa-twitter"></i> Tweet
                            </a>
                            <a class="linkedin" target="_blank"
                                href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(request()->fullUrl()) }}">
                                <i class="fab fa-linkedin-in"></i> Share
                            </a>
                            <a class="whatsapp" target="_blank"
                                href="https://api.whatsapp.com/send?text={{ urlencode($blog->blog_title . ' ' . request()->fullUrl()) }}">
                                <i class="fab fa-whatsapp"></i> Share
                            </a>
                            <a class="email"
                                href="mailto:?subject={{ urlencode($blog->blog_title) }}&body={{ urlencode('Check out this blog: ' . request()->fullUrl()) }}">
                                <i class="fas fa-envelope"></i> Email
                            </a>
                        </div>
                    </div>
                </div>

                <div class="moments-section">
                    <h3 class="moments-title"><i class="fa-solid fa-camera-retro me-2"></i>Moments</h3>
                    <div class="fav-imgs">
                        @foreach (['blog_favimg', 'blog_favimg1', 'blog_favimg2', 'blog_favimg3'] as $key)
                            @if ($blog->$key)
                                @php
                                    $folder = match ($loop->index) {
                                        0 => 'fav_img',
                                        1 => 'fav_img2',
                                        2 => 'fav_img3',
                                        3 => 'fav_img4',
                                    };
                                @endphp
                                <div class="fav-img-card">
                                    <img src="{{ asset('uploads/' . $folder . '/' . $blog->$key) }}"
                                        alt="Moment {{ $loop->index + 1 }}">
                                    <div class="fav-img-overlay"></div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>

                <a href="{{ route('home') }}" class="back-btn mt-5">
                    <i class="fas fa-arrow-left"></i> Back to Home
                </a>
            </div>
        </div>


        <div class="right-section">

        </div>
    </div>
@endsection
