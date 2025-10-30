<style>
    .slinks {
        font-size: 20px;
        font-weight: 500px !important;
        text-align: left;
        margin: 0px;
    }

    .sl-ink .social-icons a {
        text-decoration: none;
        color: #7a5d44;
        border: 1.3px solid #fff;
        padding: 6px 22px;
        border-radius: 4px;
        font-size: 17px;
        margin-top: 10px;
        background: white;
    }

    .sl-ink .social-icons {
        display: flex;
        flex-wrap: wrap;
        justify-content: start;
    }

    .foot-cat {
        display: flex;
        flex-wrap: wrap;
        list-style: none;
        column-gap: 20px;
        margin: 0px;
        padding: 0px;
    }

    .foot-links {
        color: white;
        margin: 5px;
    }
</style>

<link rel="stylesheet" href="{{ asset('css/footer.css') }}">

<footer class="container-lg">

    <div class="row">

        <div class="col-lg-2">

            {{-- Logo --}}
            @if ($headers->first() && $headers->first()->logo)
                <div class="logo">
                    <img class="foot_logo" src="{{ asset('storage/' . $headers->first()->logo) }}" alt="Logo">
                </div>
            @endif

        </div>

        <div class="col-lg-3">

            <h3 class="blog-heading text-light slinks ms-2">Social Links</h3>

            <div class="sl-ink ms-2">

                @include('includes.social_media')

            </div>

        </div>

        <div class="col-lg-6">
            <h3 class="blog-heading text-light slinks">Categories</h3>

            <div class="d-flex justify-content-start flex-wrap gap-3">
                @php
                    $unique_categories = $allblogs->pluck('blog_cat')->unique();
                @endphp

                @foreach ($unique_categories as $category)
                    @php
                        $category_slug = \Illuminate\Support\Str::slug($category);
                    @endphp
                    <div>
                        <a href="{{ route('category.show', $category_slug) }}" class="text-decoration-none">
                            <li style="list-style: none" class="foot-links"><i class="fa-solid fa-layer-group"></i>
                                {{ $category }}</li>
                        </a>
                    </div>
                @endforeach
            </div>

            {{--  --}}
        </div>


    </div>

</footer>
