<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
    integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
    .tab-section {
        max-width: 1200px;
        margin: 60px auto;
    }

    .tab-header {
        text-align: center;
        margin-bottom: 30px;
    }

    .tab-nav-pills {
        display: flex;
        justify-content: start;
        gap: 12px;
        flex-wrap: wrap;
        margin-bottom: 20px;
    }

    .tab-nav-link {
        border-radius: 8px;
        font-weight: 600;
        color: #7a5b44;
        background: #f4ece4;
        padding: 10px 24px;
        transition: all 0.3s ease;
        border: none;
    }

    .tab-nav-link:hover {
        background: #dfccbe;
    }

    .tab-nav-link.active {
        background: linear-gradient(135deg, #dfccbe, #b89679);
        color: #fff;
        box-shadow: 0 4px 10px rgba(122, 91, 68, 0.3);
    }


    .tab-blog-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 25px;
    }


    .tab-blog-card {
        position: relative;
        border-radius: 15px;
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        background: #fff;
        display: flex;
        flex-direction: column;
    }

    .tab-blog-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 25px rgba(0, 0, 0, 0.15);
    }

    .tab-blog-card img {
        width: 100%;
        height: 180px;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .tab-blog-card:hover img {
        transform: scale(1.05);
    }

    .tab-category-badge {
        position: absolute;
        top: 12px;
        left: 12px;
        background: rgba(255, 255, 255, 0.85);
        color: #7a5b44;
        padding: 5px 12px;
        font-size: 0.75rem;
        font-weight: 600;
        border-radius: 20px;
        backdrop-filter: blur(4px);
        font-family: 'merienda', cursive;
    }

    .tab-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.35);
        opacity: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: opacity 0.3s ease;
        border-radius: 15px;
    }

    .tab-blog-card:hover .tab-overlay {
        opacity: 1;
    }

    .tab-overlay a {
        text-decoration: none;
        color: #fff;
        background: #b89679;
        padding: 8px 20px;
        border-radius: 50px;
        font-weight: 600;
        transition: background 0.3s ease;
    }

    .tab-overlay a:hover {
        background: #dfccbe;
        color: #543d2f;
    }

    .tab-card-body {
        padding: 15px;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .tab-card-body h5 {
        color: #543d2f;
        margin-bottom: 8px;
        font-size: 23px;
        line-height: 1.2;
        font-family: "Redressed", cursive;
        font-weight: 400;
        font-style: normal;
    }

    .tab-card-body p {
        font-size: 12px;
        color: #555;
        margin-bottom: 10px;
        font-family: comfortaa;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .tab-blog-footer {
        font-size: 0.8rem;
        color: #906f54;
    }

    .tab-title {
        font-family: "Aclonica", sans-serif;
        font-weight: 400;
        font-style: normal;
    }

    .tab1_section {
        background: #F8F5F2;
        background: linear-gradient(180deg, rgba(248, 245, 242, 1) 0%, rgba(122, 93, 68, 0.33) 50%, rgba(248, 245, 242, 0.25) 100%);
    }
</style>

<section class="tab1_section">
    <div class="container-lg tab-section">
        <div class="tab-header">
            <h3 class="blog-heading">
                Browse Blogs by Category
            </h3>
        </div>

        <!-- Top Horizontal Tabs -->
        <ul class="nav tab-nav-pills" id="categoryTabs" role="tablist">
            @foreach ($categories as $index => $category)
                @php $safeId = Str::slug($category, '-'); @endphp
                <li class="nav-item" role="presentation">
                    <button class="tab-nav-link {{ $index == 0 ? 'active' : '' }}" id="tab-{{ $safeId }}"
                        data-bs-toggle="pill" data-bs-target="#content-{{ $safeId }}" type="button"
                        role="tab" aria-controls="content-{{ $safeId }}"
                        aria-selected="{{ $index == 0 ? 'true' : 'false' }}">
                        {{ ucfirst($category) }}
                    </button>
                </li>
            @endforeach
        </ul>

        <!-- Tab Content Below -->
        <div class="tab-content">
            @foreach ($categories as $index => $category)
                @php
                    $safeId = Str::slug($category, '-');
                    $filteredBlogs = $tab->where('blog_cat', $category);
                @endphp
                <div class="tab-pane fade {{ $index == 0 ? 'show active' : '' }}" id="content-{{ $safeId }}"
                    role="tabpanel" aria-labelledby="tab-{{ $safeId }}">
                    @if ($filteredBlogs->count() > 0)
                        <div class="tab-blog-grid mt-3">
                            @foreach ($filteredBlogs as $blog)
                                <div class="card tab-blog-card">
                                    <img src="{{ $blog->blog_thumbnail
                                        ? asset('uploads/thumbnails/' . $blog->blog_thumbnail)
                                        : asset('uploads/thumbnails/default.jpg') }}"
                                        alt="{{ $blog->blog_title }}">
                                    <span class="tab-category-badge">{{ $blog->blog_cat }}</span>
                                    <div class="tab-overlay">
                                        <a href="{{ route('blog.show', $blog->id) }}">Read More</a>
                                    </div>
                                    <div class="tab-card-body">
                                        <h5>{{ $blog->blog_title }}</h5>
                                        <p>{{ $blog->blog_description }}</p>
                                        <div class="tab-blog-footer">
                                            <span><i class="fa-regular fa-calendar"></i>
                                                {{ $blog->created_at->format('d M, Y') }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center text-muted py-4">
                            <i class="fa-solid fa-info-circle me-2"></i>No blogs found in this category.
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    </div>

</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
