<link rel="stylesheet" href="{{ asset('css/category.css') }}">

<div class="container">
    <h2 class="cat-heading">Category: {{ $category_name }}</h2>

    <div class="category-container">
        <!-- LEFT COLUMN (BLOGS) -->
        <div>
            <div class="blog-grid">
                @forelse ($blogs as $blog)
                    <div class="blog-card">
                        <div class="blog-img-wrapper">
                            <img class="blog-img"
                                src="{{ $blog->blog_thumbnail
                                    ? asset('uploads/thumbnails/' . $blog->blog_thumbnail)
                                    : asset('uploads/thumbnails/default.jpg') }}"
                                alt="{{ $blog->blog_title }}">
                        </div>
                        <div class="blog-content">
                            <h5 class="blog-title">{{ $blog->blog_title }}</h5>
                            <p class="blog-desc m-0">{{ $blog->blog_description }}</p>
                            <a href="{{ route('blog.show', $blog->id) }}" class="blog-btn mt-3">Read More</a>
                        </div>
                    </div>
                @empty
                    <p>No blogs found in this category.</p>
                @endforelse
            </div>
        </div>

        <!-- RIGHT COLUMN (SIDEBAR) -->
        <aside class="sidebar">
            <div class="search-bar ">
                <form action="{{ route('blog.search') }}" method="GET" class="d-flex gap-2 m-0 p-0">
                    <input type="text" name="query" class="form-control inp-header" placeholder="Search..."
                        required>
                    <button type="submit" class="search-icon">
                        <i class="fa fa-search"></i>
                    </button>
                </form>
            </div>
            <div class="widget">
                <h5>Trending Blogs</h5>
                <ul>
                    @if ($latestblogs && $latestblogs)
                        {{-- <h4 class="trend-heading mb-3">Trending Now</h4> --}}
                        @foreach ($latestblogs as $blog)
                            <a href="{{ route('blog.show', $blog->id) }}" class="text-decoration-none text-dark">
                                <div class="trend-card d-flex align-items-center mb-3 shadow-sm rounded-2">
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
                    {{-- @foreach ($latestblogs as $latest)
                        <li><a href="{{ route('blog.show', $latest->id) }}">{{ $latest->blog_title }}</a></li>
                    @endforeach --}}
                </ul>
            </div>

            <div class="widget">
                <h5>Categories</h5>
                <ul>
                    @php
                        $uniqueCategories = $categories->unique('blog_cat');
                    @endphp

                    @foreach ($uniqueCategories as $cat)
                        <li><a href="{{ route('category.show', $cat->blog_cat) }}">{{ $cat->blog_cat }}</a></li>
                    @endforeach


                </ul>
            </div>
        </aside>
    </div>
</div>
