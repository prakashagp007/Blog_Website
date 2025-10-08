<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
    .sliding-blog {
        padding: 0px 0px;
        background: #7b5c45;
        border-radius: 0px 0px 6px 6px;
    }

    .blog-slider {
        background: #7b5c45;
        border-radius: 8px;
        /* box-shadow: 0 6px 15px rgba(0, 0, 0, 0.08); */
        padding: 10px 20px;
        max-height: 180px;
        overflow: hidden;
    }

    .blog-slide-item h5 {
        font-weight: 600;
        font-size: 12px;
        margin-bottom: 5px;
        color: #ffffff;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .blog-slide-item p {
        font-size: 11px;
        color: #ffffff;
        margin: 0;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .social-icons {
        column-gap: 10px;
        display: flex;
        justify-content: space-around;
    }

    .social-panel {
        background: white;
        border-radius: 4px;
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.08);
        padding: 6px 0px;
    }

    .social-icons a {
        text-decoration: none;
        color: #7b5c45;
        border: 1.3px solid #7b5c45;
        padding: 5px;
        border-radius: 4px;
        font-size: 14px;
    }

    .carousel-control-prev,
    .carousel-control-next {
        width: 5%;
    }

    .carousel-control-prev .icn,
    .carousel-control-next .icn {
        font-size: 20px;
        color: #fff;
        background: #7b5e48;
        padding: 3px 0px;
        border-radius: 3px;
    }

    @media (max-width: 768px) {
        .blog-slider {
            max-height: 250px;
            padding: 15px;
        }
    }
</style>

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
            <div class="social-panel">
                @include('includes.social_media')
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
