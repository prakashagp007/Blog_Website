<link rel="stylesheet" href="{{ asset('css/header.css') }}">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
    href="https://fonts.googleapis.com/css2?family=Aclonica&family=Emblema+One&family=IM+Fell+Great+Primer+SC&family=Keania+One&family=Lemonada:wght@300..700&family=Redressed&family=Wallpoet&family=Yatra+One&display=swap"
    rel="stylesheet">

{{--  --}}


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="{{ asset('css/top_sliding.css') }}">

<header class="header_one container-lg sticky-top">





    {{-- Logo --}}
    @if ($headers->first() && $headers->first()->logo)
        <div class="logo">
            <a href="{{ route('home') }}">
                <img src="{{ asset('storage/' . $headers->first()->logo) }}" alt="Logo">
            </a>
        </div>
    @endif

    {{-- Search + Button --}}
    <div class="header-actions">

        {{-- Header Button / Register/Login --}}
        @if ($headers->first() && $headers->first()->button_name)
            <a href="{{ url($headers->first()->button_link) }}" class="header-btn">
                {{ $headers->first()->button_name }}
            </a>
        @endif


        <div>
            @include('includes.social_media')
        </div>


    </div>




</header>


<div class="sliding-blog container-lg">
    <div class="row align-items-center" style="--bs-gutter-x: 10px;">
        <div class="col-lg-9 col-md-8 col-sm-12 col-12">

            <div class=" category-container">
                <button class="scroll-btn scroll-left">
                    <i class="fa-solid fa-chevron-left"></i>
                </button>

                <div class="category-scroll">
                    @php
                        $unique_categories = $allblogs->pluck('blog_cat')->unique();
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
        scrollContainer.scrollBy({
            left: 250,
            behavior: 'smooth'
        });
    });

    leftBtn.addEventListener('click', () => {
        scrollContainer.scrollBy({
            left: -250,
            behavior: 'smooth'
        });
    });
</script>
