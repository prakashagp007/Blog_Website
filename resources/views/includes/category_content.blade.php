<style>
    /* ======= GENERAL LAYOUT ======= */
    .category-container {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 30px;
    }

    @media (max-width: 992px) {
        .category-container {
            grid-template-columns: 1fr;
        }
    }

    /* ======= BLOG GRID ======= */
    .blog-grid {
        display: grid;
        /* grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); */
        gap: 25px;
    }

    .blog-card {
        border-radius: 15px;
        overflow: hidden;
        background: #fff;
        display: flex;
        flex-direction: column;
        transition: all 0.3s ease;
        border: 1px solid #eee;
    }

    .blog-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }

    .blog-img-wrapper {
        width: 100%;
        height: 230px;
        overflow: hidden;
    }

    .blog-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.4s ease;
    }

    .blog-card:hover .blog-img {
        transform: scale(1.08);
    }

    .blog-content {
        padding: 18px;
        display: flex;
        flex-direction: column;
    }

    .blog-title {
        font-size: 28px;
        line-height: 1.2;
        font-family: "Redressed", cursive;
        font-weight: 400;
        font-style: normal;
        color: #7a5d44;
    }

    .blog-desc {
        color: #666;
        font-size: 14px;
        line-height: 1.5;
        margin-bottom: 15px;
        font-family: comfortaa;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .blog-btn {
        background: #007bff;
        color: #fff;
        text-align: center;
        padding: 8px 15px;
        border-radius: 6px;
        text-decoration: none;
        font-weight: 500;
        transition: background 0.3s ease;
    }

    .blog-btn:hover {
        background: #0056b3;
    }

    /* ======= SIDEBAR ======= */
    .sidebar {
        position: sticky;
        top: 100px;
        display: flex;
        flex-direction: column;
        gap: 25px;
    }

    .widget {
        background: #fff;
        border-radius: 12px;
        padding: 20px;
        border: 1px solid #eee;
        transition: all 0.3s ease;
    }

    .widget:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08);
    }

    .widget h5 {
        color: #7a5c46;
        border-bottom: 2px solid #007bff;
        display: inline-block;
        margin-bottom: 15px;
        padding-bottom: 5px;
        font-weight: 600;
    }

    .widget ul {
        list-style: none;
        padding-left: 0;
        margin: 0;
    }

    .widget ul li {
        padding: 8px 0;
        border-bottom: 1px solid #f1f1f1;
    }

    .widget ul li:last-child {
        border-bottom: none;
    }

    .widget a {
        text-decoration: none;
        color: #333;
        transition: color 0.3s ease;
    }

    .widget a:hover {
        color: #007bff;
    }

    img {
        width: 100%;
    }

    /* ===== TRENDING BLOGS WIDGET ===== */
    .trend-heading {
        font-weight: 700;
        color: #007bff;
        border-bottom: 2px solid #007bff;
        display: inline-block;
        padding-bottom: 5px;
        margin-bottom: 15px;
    }

    .trend-card {
        background: #fff;
        border: 1px solid #eee;
        transition: all 0.3s ease;
        overflow: hidden;
        cursor: pointer;
        padding: 8px;
    }

    .trend-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 18px rgba(0, 0, 0, 0.08);
    }

    .trend-img {
        width: 85px;
        height: 50px;
        border-radius: 5px;
        object-fit: cover;
        transition: transform 0.4s ease;
    }

    .trend-card:hover .trend-img {
        transform: scale(1.08);
    }

    .trend-body {
        flex: 1;
    }

    .trend-title {
        margin-bottom: 4px;
        line-height: 1.3;
        transition: color 0.3s ease;
        font-size: 18px;
        line-height: 1.2;
        font-family: "Redressed", cursive;
        font-weight: 400;
        font-style: normal;
        color: #7a5d44;
    }

    .trend-card:hover .trend-title {
        color: #007bff;
    }

    .cat-heading {
        font-family: "Aclonica", sans-serif;
        font-weight: 400;
        font-style: normal;
        font-size: 25px;
        margin: 30px 0px;
        color: #7a5c46;
        border-left: 5px solid #007bff;
        padding-left: 12px;
    }

    .trend-date {
        font-size: 0.8rem;
        color: #888;
    }

    /* ===== RESPONSIVE TWEAKS ===== */
    @media (max-width: 576px) {
        .trend-card {
            flex-direction: column;
            align-items: flex-start !important;
            text-align: left;
            padding: 10px;
        }

        .trend-img {
            width: 100%;
            height: 150px;
            border-radius: 12px;
            margin-bottom: 8px;
        }

        .trend-body {
            padding-left: 0 !important;
        }

        .trend-title {
            font-size: 1rem;
        }
    }
</style>

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
