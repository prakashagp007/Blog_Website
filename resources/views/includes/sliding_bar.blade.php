<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="{{ asset('css/top_sliding.css') }}">

<div class="sliding-blog container-lg">
    <div class="row align-items-center" style="--bs-gutter-x: 10px;">
        <div class="col-lg-8 col-md-8 col-sm-12 col-12">
            <!-- Bootstrap Carousel -->
            <div id="blogCarousel" class="carousel slide blog-slider" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($blogs as $index => $blog)
                        <a href="{{ route('blog.show', $blog->id) }}" class="text-decoration-none text-dark">
                            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                <div class="blog-slide-item text-center">
                                    <h5>{{ $blog->blog_title }}</h5>
                                    <p>{{ $blog->blog_cat }} — {{ Str::limit($blog->blog_description, 80) }}</p>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>

                <!-- Controls -->
                <button class="carousel-control-prev" type="button" data-bs-target="#blogCarousel"
                    data-bs-slide="prev">
                    <span aria-hidden="true"><i class="fa-solid icn fa-angle-left"></i></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#blogCarousel"
                    data-bs-slide="next">
                    <span aria-hidden="true"><i class="fa-solid icn fa-angle-right"></i></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>

        <!-- Right Social Panel -->
        <div class="col-lg-4 col-md-4 col-sm-12 col-12 mt-3 mt-lg-0">

            <div class="search-bar ">
                <form action="{{ route('blog.search') }}" method="GET" class="d-flex gap-2 m-0 p-0">
                    <input type="text" name="query" class="form-control inp-header" placeholder="Search..."
                        required>
                    <button type="submit" class="search-icon">
                        <i class="fa fa-search"></i>
                    </button>
                </form>
            </div>


        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
