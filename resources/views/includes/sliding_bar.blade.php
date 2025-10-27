<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="{{ asset('css/top_sliding.css') }}">

<div class="sliding-blog container-lg">
    <div class="row align-items-center" style="--bs-gutter-x: 10px;">
        <div class="col-lg-9 col-md-8 col-sm-12 col-12">

            <div class=" category-container">
    <button class="scroll-btn scroll-left">
        <i class="fa-solid fa-chevron-left"></i>
    </button>

    <div class="category-scroll">
        @php
            $unique_categories = $blogs->pluck('blog_cat')->unique();
        @endphp

        @foreach ($unique_categories as $category)
            @php
                $category_slug = \Illuminate\Support\Str::slug($category);
            @endphp
            <a href="{{ route('category.show', $category_slug) }}" class="text-decoration-none">
                <li class="head-links">{{ $category }}</li>
            </a>
        @endforeach
    </div>

    <button class="scroll-btn scroll-right">
        <i class="fa-solid fa-chevron-right"></i>
    </button>
</div>


        </div>

        <!-- Right Social Panel -->
        <div class="col-lg-3 col-md-4 col-sm-12 col-12 mt-3 mt-lg-0">

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
<script>
    const scrollContainer = document.querySelector('.category-scroll');
    const leftBtn = document.querySelector('.scroll-left');
    const rightBtn = document.querySelector('.scroll-right');

    rightBtn.addEventListener('click', () => {
        scrollContainer.scrollBy({ left: 250, behavior: 'smooth' });
    });

    leftBtn.addEventListener('click', () => {
        scrollContainer.scrollBy({ left: -250, behavior: 'smooth' });
    });
</script>
