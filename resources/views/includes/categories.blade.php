<link rel="stylesheet" href="{{ asset('css/expcategory.css') }}">

<section class="category-section pb-5">
    <div class="container-lg">
        <h2 class="blog-heading mb-5 "><span>Explore Categories</span> </h2>
        <div class="category-scroll1 d-flex justify-content-start gap-3">
            @php
                $unique_categories = $blogs->pluck('blog_cat')->unique();
            @endphp

            @foreach ($unique_categories as $category)
                @php
                    $category_slug = \Illuminate\Support\Str::slug($category);
                @endphp
                <div class="mb-4">
                    <a href="{{ route('category.show', $category_slug) }}" class="text-decoration-none">
                        <div class="category-card shadow-sm text-center p-lg-3 p-md-3 p-2 rounded-4">
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
