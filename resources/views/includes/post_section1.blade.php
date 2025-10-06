    <link rel="stylesheet" href="{{ asset('css/post_section.css') }}">


<section class="blog-section">

    @include('includes.banner')

    <h3 class="blog-heading">Recent Blogs</h3>

    <div class="container">
        @if ($blogs && $blogs->count())
            <div class="row justify-content-center">
                @foreach ($blogs as $blog)
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4">
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
                                    <p class="card-text crd_txt_ps1">{{ Str::limit($blog->blog_description, 100) }}</p>
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
