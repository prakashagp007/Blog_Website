@extends('layouts.app')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        p {
            margin: 0px;
            padding: 0px;
        }

        /* Breadcrumb */
        .breadcrumb1 {
            background: linear-gradient(90deg, #f5e6d3, #faf7f2);
            padding: 15px 25px;
            border-radius: 12px;
            margin-top: 25px;
            font-weight: 500;
            color: #444;
            box-shadow: 0 4px 14px rgba(0, 0, 0, 0.05);
        }

        .breadcrumb1 a {
            color: #7a5b44;
            text-decoration: none;
            font-weight: 600;
        }

        /* Blog Card */
        .blog-card {
            border: none;
            border-radius: 20px;
            overflow: hidden;
            background: #fff;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            transition: all 0.4s ease;
        }

        .blog-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
        }

        .blog-header {
            position: relative;
            overflow: hidden;
        }

        .blog-header img {
            width: 100%;
            height: 420px;
            object-fit: cover;
            transition: transform 0.6s ease;
            filter: brightness(0.92);
        }

        .blog-header img:hover {
            transform: scale(1.07);
        }

        .blog-header::after {
            content: "";
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 130px;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.7), transparent);
        }

        .blog-title-overlay {
            position: absolute;
            bottom: 30px;
            left: 40px;
            color: #fff;
            font-size: 2.4rem;
            font-weight: 700;
            text-shadow: 0px 4px 14px rgba(0, 0, 0, 0.8);
            letter-spacing: 1px;
        }

        /* Blog Content */
        .blog-content {
            padding: 35px;
        }

        .cat-view {
            display: inline-block;
            background: linear-gradient(135deg, #ff6a00, #ee0979);
            color: white;
            font-size: 0.9rem;
            font-weight: 600;
            padding: 6px 16px;
            border-radius: 50px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            box-shadow: 0 3px 8px rgba(255, 105, 50, 0.3);
        }

        .blog-location {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-top: 10px;
            font-weight: 500;
            color: #555;
            background: #dfccbe84;
            border-radius: 30px;
            padding: 6px 14px;
            font-size: 0.95rem;
            transition: background 0.3s ease;
        }

        .blog-location i {
            color: #7a5b44;
        }

        .blog-location:hover {
            background: #dfccbe85;
        }

        .blog-content p {
            margin-top: 20px;
            font-size: 1.05rem;
            line-height: 1.9;
            color: #333;
        }

        hr {
            border: none;
            height: 2px;
            background: linear-gradient(90deg, #076c81, #00b4d8);
            width: 100px;
            margin: 25px 0;
            border-radius: 2px;
        }

        /* Share Buttons */
        .share-buttons {
            display: flex;
            gap: 12px;
            margin-top: 25px;
            flex-wrap: wrap;
        }

        .share-buttons a {
            display: flex;
            align-items: center;
            gap: 6px;
            text-decoration: none;
            color: #fff;
            font-weight: 500;
            padding: 10px 16px;
            border-radius: 30px;
            transition: all 0.3s ease;
        }

        .share-buttons a:hover {
            transform: translateY(-3px);
            opacity: 0.9;
        }

        .facebook {
            background-color: #3b5998;
        }

        .twitter {
            background-color: #1da1f2;
        }

        .linkedin {
            background-color: #0077b5;
        }

        .whatsapp {
            background-color: #25d366;
        }

        .email {
            background-color: #6c757d;
        }

        /* Moments Section */
        .moments-section {
            margin-top: 70px;
        }

        .moments-title {
            text-align: center;
            font-size: 1.9rem;
            font-weight: 700;
            color: #7a5b44;
            margin-bottom: 30px;
            position: relative;
        }

        .moments-title::after {
            content: "";
            position: absolute;
            width: 70px;
            height: 3px;
            background: linear-gradient(90deg, #239bab, #89d0dc);
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            border-radius: 2px;
        }

        .fav-imgs {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 22px;
        }

        .fav-img-card {
            position: relative;
            overflow: hidden;
            border-radius: 16px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
        }

        .fav-img-card img {
            width: 100%;
            height: 260px;
            object-fit: cover;
            transition: transform 0.4s ease, filter 0.4s ease;
        }

        .fav-img-card:hover img {
            transform: scale(1.08);
            filter: brightness(0.85);
        }

        .fav-img-overlay {
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: end;
            justify-content: center;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.6), transparent);
            color: white;
            font-size: 1.2rem;
            font-weight: 600;
            opacity: 0;
            transition: opacity 0.3s ease;
            padding-bottom: 20px;
        }

        .fav-img-card:hover .fav-img-overlay {
            opacity: 1;
        }

        /* Back Button */
        .back-btn {
            display: inline-block;
            margin-top: 50px;
            border-radius: 30px;
            padding: 10px 25px;
            transition: all 0.3s ease;
            font-weight: 500;
            border: 1px solid #7a5b44;
            color: #7a5b44;
            text-decoration: none;
        }

        .back-btn:hover {
            background: #7a5b44;
            color: #fff;
        }
    </style>

    <div class="container-lg breadcrumb1">
        <p><a href="{{ route('home') }}">Home</a> / {{ $blog->blog_cat }}</p>
    </div>

    <div class="container pb-5 pt-3">
        <div class="card blog-card shadow-lg">
            <div class="blog-header">
                <img src="{{ $blog->blog_thumbnail
                    ? asset('uploads/thumbnails/' . $blog->blog_thumbnail)
                    : asset('uploads/thumbnails/default.jpg') }}"
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

                <!-- Share Buttons -->
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

        <!-- Moments Section -->
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

        <a href="{{ route('home') }}" class=" back-btn">
            <i class="fas fa-arrow-left"></i> Back to Home
        </a>
    </div>
@endsection
