@php
    $unique_categories = $blogs->pluck('blog_cat')->unique();
@endphp

@foreach ($unique_categories as $category)
    @php
        $category_slug = \Illuminate\Support\Str::slug($category);
    @endphp
    <div class="item mb-3">
        <a href="{{ route('category.show', $category_slug) }}" class="text-decoration-none text-dark">
            <div class="card crd_ps1 shadow-sm">
                <div class="card-body text-center">
                    <p class="mb-0">{{ $category }}</p>
                </div>
            </div>
        </a>
    </div>
@endforeach
