    <link rel="stylesheet" href="{{ asset('css/post_section.css') }}">
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">


    <section class="blog-section">

        @include('includes.banner')



        <div class="container-lg position-relative">
            <h3 class="blog-heading">Recent Blogs</h3>
            @if ($blogs && $blogs->count())
                <!-- Top-right navs wrapper -->
                <div class="owl-nav-top-right"></div>

                <div class="owl-carousel owl-theme blog-carousel">
                    @foreach ($blogs as $blog)
                        <div class="item">
                            <a href="{{ route('blog.show', $blog->id) }}" class="text-decoration-none text-dark">
                                <div class="card crd_ps1 shadow-sm">
                                    <img class="img-ps1"
                                        src="{{ $blog->blog_thumbnail
                                            ? asset('uploads/thumbnails/' . $blog->blog_thumbnail)
                                            : asset('uploads/thumbnails/default.jpg') }}"
                                        alt="{{ $blog->blog_title }}">

                                    <div class="card-body crd_bdy_ps1">
                                        <h5 class="card-title crd_ttl_ps1">{{ $blog->blog_title }}</h5>
                                        <p class="abs">{{ $blog->blog_cat }}</p>
                                        <p class="card-text crd_txt_ps1">{{ Str::limit($blog->blog_description, 100) }}
                                        </p>
                                        <p class="text-muted crd_date_ps1">
                                            Published on {{ $blog->created_at->format('d M, Y') }}
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-center text-muted">No blogs found.</p>
            @endif
        </div>


    </section>
    <!-- jQuery first (Owl needs it) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <!-- Owl Carousel JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <script>
        $(document).ready(function() {
            const carousel = $('.blog-carousel');

            carousel.owlCarousel({
                loop: true,
                margin: 10,
                nav: true,
                navContainer: '.owl-nav-top-right',
                autoplay: true,
                autoplayTimeout: 3500,
                autoplayHoverPause: true,
                dots: false,
                responsive: {
                    0: {
                        items: 1
                    },
                    576: {
                        items: 1
                    },
                    768: {
                        items: 2
                    },
                    992: {
                        items: 4
                    },
                    1400: {
                        items: 4
                    }
                }
            });
        });
    </script>
