<link rel="stylesheet" href="{{ asset('css/search.css') }}">

<div class="container search-container">
    <h3 class="search-title">Search Results for: <span class="text-primary">{{ $query }}</span></h3>

    <div class="row">
        {{-- Left – Search Results --}}
        <div class="col-lg-8">
            @if ($blogs->isEmpty())
                <p class="text-center">No blogs found matching your search.</p>
            @else
                <div class="row">
                    @foreach ($blogs as $blog)
                        <div class="col-md-6 col-sm-12 mb-4">
                            <div class="card blog-card h-100">
                                {{-- Blog Thumbnail --}}
                                <img class="img-ps1"
                                    src="{{ $blog->blog_thumbnail
                                        ? asset('uploads/thumbnails/' . $blog->blog_thumbnail)
                                        : asset('uploads/thumbnails/default.jpg') }}"
                                    alt="{{ $blog->blog_title }}">

                                <div class="card-body">
                                    <h5 class="card-title">{{ $blog->blog_title }}</h5>
                                    <div class="blog-meta">
                                        <i class="fa fa-layer-group"></i> {{ $blog->blog_cat }} <br>
                                        <i class="fa fa-map-marker-alt"></i> {{ $blog->blog_location }}
                                    </div>
                                    <p class="card-text">{{ Str::limit($blog->blog_description, 90) }}</p>
                                    <a href="{{ route('blog.show', $blog->id) }}" class="btn btn-read">Read More</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

        {{-- Right – Sidebar --}}
        <div class="col-lg-4 col-md-12 mt-4 mt-lg-0">
            {{-- Categories Widget --}}
            <div class="sidebar">
                <h5><i class="fa fa-layer-group me-2"></i>All Categories</h5>
                <ul>
                    @php $unique_cats = $allblogs->pluck('blog_cat')->unique(); @endphp
                    @foreach ($unique_cats as $cat)
                        @php $slug = \Illuminate\Support\Str::slug($cat); @endphp
                        <li><a href="{{ route('category.show', $slug) }}">{{ $cat }}</a></li>
                    @endforeach
                </ul>
            </div>

            {{-- Recent Blogs Widget --}}
            <div class="sidebar">
                <h5><i class="fa fa-clock me-2"></i>Recent Blogs</h5>
                <ul>
                    @foreach ($allblogs->sortByDesc('created_at')->take(5) as $recent)
                        <li><a href="{{ route('blog.show', $recent->id) }}">{{ $recent->blog_title }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
