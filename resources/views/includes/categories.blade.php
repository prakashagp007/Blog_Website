<style>

    .category-card {
        background: #fff;
        transition: all 0.3s ease-in-out;
        display: flex;
        align-items: center;
        justify-content: start;
        column-gap: 10px;
        width:fit-content;
            /* border: 1px solid #eee; */
    }

    .category-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        background: linear-gradient(135deg, #795c447c 0%, #f8ddc8 100%);
        color: #fff;
    }

    .category-card .icon-wrapper {
        font-size: 25px;
        color: #795c4478;
        transition: color 0.3s;
    }

    .icon-wrapper {
        border-right: 1px solid #a671469a;
        padding-right: 10px
    }

    .category-card:hover .icon-wrapper {
        color: #fff;
    }

    .category-card:hover .category-name {
        color: #fff;
    }

    .category-name {
        font-size: 16px;
        letter-spacing: 0.5px;
        color: #795c44;
        font-family: 'merienda', cursive;
    }
</style>

<section class="category-section pb-5">
    <div class="container">
        <h2 class="blog-heading mb-5 "><span>Explore Categories</span> </h2>
        <div class="d-flex justify-content-start gap-3">
            @php
                $unique_categories = $blogs->pluck('blog_cat')->unique();
            @endphp

            @foreach ($unique_categories as $category)
                @php
                    $category_slug = \Illuminate\Support\Str::slug($category);
                @endphp
                <div class="mb-4">
                    <a href="{{ route('category.show', $category_slug) }}" class="text-decoration-none">
                        <div class="category-card shadow-sm text-center p-3 rounded-4">
                            <div class="icon-wrapper">
                                <i class="fa-solid fa-feather-pointed"></i>
                            </div>
                            <div>
                                <p class="category-name mb-0 fw-semibold">{{ $category }}</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
