<link rel="stylesheet" href="{{ asset('css/banner.css') }}">

<section class="banner-section container-lg pb-3">

    <div class="row align-items-center gx-4">

        {{-- Carousel --}}
        <div class="col-lg-8 col-md-12 mb-4">
            @if ($blogs && $blogs->count())
                <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="4000">
                    <div class="carousel-inner">

                        @foreach ($blogs as $index => $blog)
                            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                <div class="hero-slide position-relative">
                                    <img class="hero-img"
                                        src="{{ $blog->blog_thumbnail
                                            ? asset('uploads/thumbnails/' . $blog->blog_thumbnail)
                                            : asset('uploads/thumbnails/default.jpg') }}"
                                        alt="{{ $blog->blog_title }}">

                                    <div class="caption-box text-center">
                                        <h2 class="caption-title">{{ $blog->blog_title }}</h2>
                                        <p class="caption-text">{{ Str::limit($blog->blog_description, 100) }}</p>
                                        {{-- <p class="caption-date">
                                            <i class="fa-regular fa-calendar"></i>
                                            {{ $blog->created_at->format('d M, Y') }}
                                        </p> --}}
                                        <a href="{{ route('blog.show', $blog->id) }}" class="read-btn">Read More <i
                                                class="fa-solid fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Navigation -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel"
                        data-bs-slide="prev">
                        <span class="nav-btn"><i class="fa-solid fa-chevron-left"></i></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel"
                        data-bs-slide="next">
                        <span class="nav-btn"><i class="fa-solid fa-chevron-right"></i></span>
                    </button>
                </div>
            @endif
        </div>


        <div class="col-lg-4 col-md-12">
            @if ($latestblogs && $latestblogs)
                {{-- <h4 class="trend-heading mb-3">Trending Now</h4> --}}
                @foreach ($latestblogs as $blog)
                    <a href="{{ route('blog.show', $blog->id) }}" class="text-decoration-none text-dark">
                        <div class="trend-card d-flex align-items-center mb-3 shadow-sm rounded-4">
                            <img class="trend-img"
                                src="{{ $blog->blog_thumbnail
                                    ? asset('uploads/thumbnails/' . $blog->blog_thumbnail)
                                    : asset('uploads/thumbnails/default.jpg') }}"
                                alt="{{ $blog->blog_title }}">
                            <div class="trend-body ps-3">
                                <h6 class="trend-title">{{ $blog->blog_title }}</h6>
                                <p class="trend-date m-0">{{ $blog->created_at->format('d M, Y') }}</p>
                            </div>
                        </div>
                    </a>
                @endforeach
            @endif
        </div>

    </div>
</section>
