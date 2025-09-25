<div class="p-3 bg-light rounded shadow-sm mb-4">
    <h2>Welcome to Home Page</h2>
    <p>This is my included content for home.</p>
</div>

@if($blogs && $blogs->count())
    <div class="row">
        @foreach ($blogs as $blog)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    {{-- Image --}}
                    @php
                        // Example: use thumbnail folder if exists
                        $imagePath = $blog->image ?? 'uploads/thumbnail/default.jpg';
                    @endphp
                    <img src="{{ asset($imagePath) }}" class="card-img-top" alt="{{ $blog->title }}">

                    <div class="card-body">
                        <h5 class="card-title">{{ $blog->title }}</h5>
                        <p class="card-text">{{ Str::limit($blog->description, 100) }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@else
    <p>No blogs found.</p>
@endif
