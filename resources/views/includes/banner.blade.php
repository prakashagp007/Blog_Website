    <link rel="stylesheet" href="{{ asset('css/banner.css') }}">

    {{-- banner --}}
    <div class="banner-section">

        <div class="row">
            <div class="col-lg-7 col-md-7 col-sm-12 col-12">

                @if ($blogs && $blogs->count())
                    <div id="blogCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">

                            @foreach ($blogs as $index => $blog)
                                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                    <div class="card-banner">
                                        <img class="banner-img"
                                            src="{{ $blog->blog_thumbnail
                                                ? asset('uploads/thumbnails/' . $blog->blog_thumbnail)
                                                : asset('uploads/thumbnails/default.jpg') }}"
                                            alt="{{ $blog->blog_title }}">
                                        <a href="{{ route('blog.show', $blog->id) }}" class="text-muted">
                                            <div class="card-body banner_text pt-3 text-center">
                                                <h5 class="banner-title ">{{ $blog->blog_title }}</h5>
                                                <p class="banner-text ">
                                                    {{ Str::limit($blog->blog_description, 100) }}</p>
                                                <p class="text-muted">
                                                    Published on {{ $blog->created_at->format('d M, Y') }}
                                                </p>

                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endforeach

                            <!-- Controls -->
                            <button class="carousel-control-prev" type="button" data-bs-target="#blogCarousel"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#blogCarousel"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    @else
                        <p>No blogs found.</p>
                @endif

            </div>
        </div>

        <div class="col-lg-5 col-md-5 col-sm-12 col-12">
            @if ($latestblogs && $latestblogs)
                    @foreach ($latestblogs as $blog)
                        <div class="">
                            <a href="{{ route('blog.show', $blog->id) }}" class="text-decoration-none text-dark">
                                <div class=" banner-card2 mb-3">
                                    <div>
                                    <img class="banner-img2"
                                        src="{{ $blog->blog_thumbnail
                                            ? asset('uploads/thumbnails/' . $blog->blog_thumbnail)
                                            : asset('uploads/thumbnails/default.jpg') }}"
                                        alt="{{ $blog->blog_title }}">
                                        </div>
                                    <div class="banner_text2 text-center d-flex  justify-content-around py-2 align-items-center">
                                        <h5 class="banner-title2 ">{{ $blog->blog_title }}</h5>
                                        {{-- <p class="banner-text2 ">{{ Str::limit($blog->blog_description, 100) }}
                                        </p> --}}
                                        <p class="text-muted m-0 p-0" style="font-size: 0.9rem;">
                                            Published on {{ $blog->created_at->format('d M, Y') }}
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
            @endif




        </div>





    </div>
    </div>

    {{-- banner --}}









    {{--  --}}
