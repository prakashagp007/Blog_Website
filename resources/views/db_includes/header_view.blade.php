<style>
    .blog-card {
        max-width: 700px;
        margin: 20px auto;
        padding: 20px;
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
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
        <td>
            @if ($headers->logo)
                <img src="{{ Storage::url($headers->logo) }}" alt="Thumbnail" width="80">
            @else
                No Image
            @endif
        </td>

    </div>
    <div class="card-header">
        <h2>{{ $headers->menu_name }}</h2>
    </div>

    <div class="card-location">
        <h4>{{ $headers->menu_link }}</h4>
    </div>

    <div class="card-content">
        <p>{{ $headers->button_name }}</p>
        <p>{{ $headers->button_link }}</p>
    </div>
</div>
