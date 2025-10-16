<style>
    /* Blog Cards */
    .blog-card {
        border-radius: 12px;
        overflow: hidden;
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .blog-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 25px rgba(0, 0, 0, 0.15);
    }

    /* Image wrapper */
    .blog-img-wrapper {
        overflow: hidden;
        height: 180px;
    }

    .blog-img-wrapper .blog-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s;
    }

    .blog-img-wrapper .blog-img:hover {
        transform: scale(1.1);
    }

    /* Blog text */
    .blog-desc {
        max-height: 60px;
        overflow: hidden;
    }

    /* Buttons */
    .blog-btn {
        text-decoration: none;
        color: #fff;
        background-color: #007bff;
        padding: 0.4rem 0.8rem;
        border-radius: 6px;
        text-align: center;
        transition: background-color 0.3s;
    }

    .blog-btn:hover {
        background-color: #0056b3;
    }

    /* Responsive grid tweaks */
    .blog-col {
        flex: 0 0 33.3333%;
        max-width: 33.3333%;
    }

    @media (max-width: 992px) {
        .blog-col {
            flex: 0 0 50%;
            max-width: 50%;
        }
    }

    @media (max-width: 576px) {
        .blog-col {
            flex: 0 0 100%;
            max-width: 100%;
        }

        .blog-img-wrapper {
            height: 150px;
        }
    }
</style>

<div class="blog-container mt-5">
    <h2 class="category-heading mb-4">Category: {{ $category_name }}</h2>

    <div class="blog-row g-4">
        @forelse ($blogs as $blog)
            <div class="blog-col mb-3">
                <div class="blog-card h-100 shadow-sm">
                    <div class="blog-img-wrapper">
                        <img class="blog-img"
                            src="{{ $blog->blog_thumbnail
                                ? asset('uploads/thumbnails/' . $blog->blog_thumbnail)
                                : asset('uploads/thumbnails/default.jpg') }}"
                            alt="{{ $blog->blog_title }}">
                    </div>
                    <div class="blog-content d-flex flex-column">
                        <h5 class="blog-title">{{ $blog->blog_title }}</h5>
                        <p class="blog-desc text-truncate">{{ $blog->blog_description }}</p>
                        <a href="{{ route('blog.show', $blog->id) }}" class="blog-btn mt-auto">Read More</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <p>No blogs found in this category.</p>
            </div>
        @endforelse
    </div>
</div>
