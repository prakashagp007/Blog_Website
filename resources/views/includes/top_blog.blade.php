    <link rel="stylesheet" href="{{ asset('css/top_blog.css') }}">


    <section class="favourite_blogs">
        <div class="container-lg mb-5">
            <div class="row align-items-center">
                <div class="col-5">
                    <h3 class="blog-heading mt-4 mb-4">Favourite Blogs</h3>
                    @if ($latestblogs && $latestblogs)
                        {{-- <h4 class="trend-heading mb-3">Trending Now</h4> --}}
                        @foreach ($latestblogs as $blog)
                            <a href="{{ route('blog.show', $blog->id) }}" class="text-decoration-none text-dark">
                                <div
                                    class="trend-card-top d-flex align-items-center mb-3">
                                    <img class="trend-img1"
                                        src="{{ $blog->blog_thumbnail
                                            ? asset('uploads/thumbnails/' . $blog->blog_thumbnail)
                                            : asset('uploads/thumbnails/default.jpg') }}"
                                        alt="{{ $blog->blog_title }}">
                                    <div class="trend-body ps-3">
                                        <h6 class="trend-title">{{ $blog->blog_title }}</h6>
                                        <p class="trend-date top_blog_desc m-0">{{ $blog->blog_description }}</p>
                                        {{-- <p class="trend-date m-0">{{ $blog->created_at->format('d M, Y') }}</p> --}}
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    @endif
                </div>


                <div class="col-7 mt-5">
                    @if ($latestblogs && $latestblogs)
                        <div class="row g-3"> <!-- grid row with gap -->
                            @foreach ($latestblogs as $blog)
                                <div class="col-md-6"> <!-- two cards per row -->
                                    <a href="{{ route('blog.show', $blog->id) }}"
                                        class="text-decoration-none text-dark">
                                        <div class="trend-card-grid1 trend-card-grid shadow-sm rounded-3">
                                            <img class="trend-img-grid w-100 rounded-top"
                                                src="{{ $blog->blog_thumbnail
                                                    ? asset('uploads/thumbnails/' . $blog->blog_thumbnail)
                                                    : asset('uploads/thumbnails/default.jpg') }}"
                                                alt="{{ $blog->blog_title }}">
                                            <div class="trend-body1 trend-body p-2">
                                                <h6 class="trend-title-grid">{{ $blog->blog_title }}</h6>
                                                <p class="trend-date top_blog_desc m-0">{{ $blog->blog_description }}
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>

                {{-- <div class="col-3 mt-3">
                    <!-- Elfsight Weather | Untitled Weather -->
                    <script src="https://elfsightcdn.com/platform.js" async></script>
                    <div class="elfsight-app-2a955d4d-283e-47bd-9cea-cce18e89c536" data-elfsight-app-lazy></div>
                </div> --}}



            </div>
        </div>
    </section>
