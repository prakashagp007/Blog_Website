<style>
    .cinematic-strip {
        display: flex;
        height: 60vh;
        width: 100%;
        margin-bottom: 40px;
    }

    .cinematic-item {
        flex: 1;
        position: relative;
        overflow: hidden;
        transition: flex 0.8s ease, transform 0.5s ease;
        cursor: pointer;
    }

    .cinematic-item:hover {
        flex: 2;
        transform: scale(1.02);
        z-index: 10;
    }

    .cinematic-item::after {
        content: "";
        position: absolute;
        inset: 0;
        background: linear-gradient(to top, rgba(0, 0, 0, 0.8), transparent);
        transition: opacity 0.5s ease;
        opacity: 0.7;
    }

    .cinematic-bg {
        position: absolute;
        inset: 0;
        background-size: cover;
        background-position: center;
        filter: brightness(0.8);
        transition: transform 1s ease;
    }

    .cinematic-item:hover .cinematic-bg {
        transform: scale(1.1);
        filter: brightness(1);
    }

    .cinematic-info {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        padding: 30px 25px;
        color: #fff;
        z-index: 2;
        transition: opacity 0.5s ease, transform 0.5s ease;
        transform: translateY(40px);
        opacity: 0;
    }

    .cinematic-item:hover .cinematic-info {
        transform: translateY(0);
        opacity: 1;
    }

    .cinematic-title {
        font-size: 1.4rem;
        font-weight: 700;
        color: #ffce00;
        margin-bottom: 8px;
    }

    .cinematic-cat {
        font-size: 0.9rem;
        color: #ccc;
        margin-bottom: 5px;
    }

    .cinematic-meta {
        font-size: 0.85rem;
        color: #aaa;
        display: flex;
        gap: 10px;
    }

    @media (max-width: 900px) {
        .cinematic-strip {
            flex-direction: column;
        }

        .cinematic-item {
            flex: none;
            height: 20%;
        }

        .cinematic-item:hover {
            flex: none;
            transform: scale(1.03);
        }
    }
</style>

<div class="cinematic-strip">
    @foreach ($blogs->take(5) as $blog)

            <a href="{{ route('blog.show', $blog->id) }}" class="cinematic-item">
                <div class="cinematic-bg"
                    style="background-image: url('{{ $blog->blog_thumbnail ? asset('uploads/thumbnails/' . $blog->blog_thumbnail) : asset('uploads/thumbnails/default.jpg') }}');">
                </div>

                <div class="cinematic-info">
                    <h3 class="cinematic-title">{{ $blog->blog_title }}</h3>
                    <p class="cinematic-cat">{{ $blog->blog_cat }}</p>
                    <div class="cinematic-meta">
                        <span><i class="fa-solid fa-calendar"></i> {{ $blog->created_at->format('d M, Y') }}</span>
                        <span><i class="fa fa-eye"></i> {{ $blog->views }}</span>
                    </div>
                </div>
            </a>
    @endforeach
</div>
