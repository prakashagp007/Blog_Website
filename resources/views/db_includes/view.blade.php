<style>
    .blog-card {
    max-width: 700px;
    margin: 20px auto;
    padding: 20px;
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    font-family: Arial, sans-serif;
    transition: transform 0.3s;
}

.blog-card:hover {
    transform: translateY(-5px);
}

.blog-card .card-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
}

.blog-card .card-header h2 {
    margin: 0;
    font-size: 24px;
    color: #333;
}

.blog-card .category {
    background: #007BFF;
    color: #fff;
    padding: 4px 10px;
    border-radius: 6px;
    font-size: 14px;
}

.blog-card .card-location h4 {
    margin: 10px 0;
    font-weight: normal;
    color: #555;
}

.blog-card .card-thumbnail img {
    width: 100%;
    max-height: 300px;
    object-fit: cover;
    border-radius: 10px;
    margin: 10px 0;
}

.blog-card .fav-images {
    margin: 10px 0;
}

.blog-card .fav-images img {
    width: 60px;
    height: 60px;
    object-fit: cover;
    margin-right: 8px;
    border-radius: 8px;
    border: 1px solid #ddd;
}

.blog-card .card-content p {
    margin: 10px 0;
    line-height: 1.6;
    color: #444;
}

/* Responsive */
@media (max-width: 768px) {
    .blog-card {
        padding: 15px;
    }
    .blog-card .card-header h2 {
        font-size: 20px;
    }
    .blog-card .fav-images img {
        width: 50px;
        height: 50px;
    }
}

</style>

<div class="blog-card">
    <div class="card-header">
        <h2>{{ $infos->blog_title }}</h2>
        <span class="category">{{ $infos->blog_cat }}</span>
    </div>

    <div class="card-location">
        <h4>{{ $infos->blog_location }}</h4>
    </div>

    {{-- Thumbnail --}}
    <div class="card-thumbnail">
        @if ($infos->blog_thumbnail)
            <img src="{{ asset('uploads/thumbnails/' . $infos->blog_thumbnail) }}" alt="Thumbnail">
        @else
            <div class="no-image">No Image</div>
        @endif
    </div>

    {{-- Fav Images --}}
    <div class="fav-images">
        <span>
                        @if ($infos->blog_favimg)
                            <img src="{{ asset('uploads/fav_img/' . $infos->blog_favimg) }}" alt="Fav Image" width="60">
                        @else
                            No Image
                        @endif
                    </span>
                    <span>
                        @if ($infos->blog_favimg1)
                            <img src="{{ asset('uploads/fav_img2/' . $infos->blog_favimg1) }}" alt="Fav Image"
                                width="60">
                        @else
                            No Image
                        @endif
                    </span>
                    <span>
                        @if ($infos->blog_favimg2)
                            <img src="{{ asset('uploads/fav_img3/' . $infos->blog_favimg2) }}" alt="Fav Image"
                                width="60">
                        @else
                            No Image
                        @endif
                    </span>
                    <span>
                        @if ($infos->blog_favimg3)
                            <img src="{{ asset('uploads/fav_img4/' . $infos->blog_favimg3) }}" alt="Fav Image"
                                width="60">
                        @else
                            No Image
                        @endif
                    </span>
    </div>

    <div class="card-content">
        <p>{{ $infos->blog_description }}</p>
        <p>{{ $infos->blog_content }}</p>
    </div>
</div>
