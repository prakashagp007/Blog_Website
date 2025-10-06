<style>
    form {
        max-width: 800px;
        margin: 20px auto;
        padding: 20px;
        background: #f9f9f9;
        border-radius: 10px;
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
        font-family: Arial, sans-serif;
    }

    form h3 {
        text-align: center;
        margin-bottom: 20px;
        color: #333;
    }

    form label {
        display: block;
        margin-top: 15px;
        font-weight: bold;
        color: #555;
    }

    form input[type="text"],
    form input[type="file"],
    form textarea {
        width: 100%;
        padding: 8px 10px;
        margin-top: 5px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
        font-size: 14px;
        transition: 0.3s;
    }

    form input[type="text"]:focus,
    form textarea:focus {
        border-color: #007BFF;
        outline: none;
    }

    form textarea {
        min-height: 120px;
        resize: vertical;
    }

    form img {
        margin-top: 8px;
        margin-bottom: 10px;
        border-radius: 5px;
        border: 1px solid #ddd;
    }

    form button {
        margin-top: 20px;
        padding: 10px 25px;
        background: #007BFF;
        color: #fff;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
        transition: 0.3s;
    }

    form button:hover {
        background: #0056b3;
    }

    .edit-title {
        text-align: center;
        font-family: "Merienda", cursive;
        font-optical-sizing: auto;
        font-weight: 400;
        font-style: normal;
        margin: 20px 0px;
        font-size: 20px;

    }

    .edit-ttl {
        background-color: #19547a;
        color: white;
        padding: 3px 20px;
        border-radius: 5px;
        box-shadow: rgba(0, 0, 0, 0.25) 0px 0.0625em 0.0625em, rgba(0, 0, 0, 0.25) 0px 0.125em 0.5em, rgba(255, 255, 255, 0.1) 0px 0px 0px 1px inset;
    }
</style>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
{{-- google font --}}

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<link
    href="https://fonts.googleapis.com/css2?family=Aclonica&family=Comfortaa:wght@300..700&family=Emblema+One&family=IM+Fell+Great+Primer+SC&family=Keania+One&family=Lemonada:wght@300..700&family=Overlock+SC&family=Redressed&family=Wallpoet&family=Yatra+One&display=swap"
    rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Merienda:wght@300..900&display=swap" rel="stylesheet">

<h3 class="edit-title"><span class="edit-ttl">Edit Blog</span></h3>

<form action="{{ route('blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
            <label>Title:</label>
            <input type="text" name="blog_title" value="{{ $blog->blog_title }}" required><br>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
            <label>Category:</label>
            <input type="text" name="blog_cat" value="{{ $blog->blog_cat }}" required><br>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <label>Description:</label>
            <textarea name="blog_description" required>{{ $blog->blog_description }}</textarea><br>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <label>Location:</label>
            <input type="text" name="blog_location" value="{{ $blog->blog_location }}" required><br>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <label>Thumbnail:</label>
            <input type="file" name="blog_thumbnail">
            @if ($blog->blog_thumbnail)
                <img src="{{ asset('uploads/thumbnails/' . $blog->blog_thumbnail) }}" width="80">
            @endif
            <br>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <label class="text-center">Fav Images:</label><br>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-12 col-12">


            @if ($blog->blog_favimg)
                <input type="file" name="blog_favimg">
                <img src="{{ asset('uploads/fav_img/' . $blog->blog_favimg) }}" width="60"><br>
            @endif
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
            @if ($blog->blog_favimg1)
                <input type="file" name="blog_favimg1">
                <img src="{{ asset('uploads/fav_img2/' . $blog->blog_favimg1) }}" width="60"><br>
            @endif
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
            @if ($blog->blog_favimg2)
                <input type="file" name="blog_favimg2">
                <img src="{{ asset('uploads/fav_img3/' . $blog->blog_favimg2) }}" width="60"><br>
            @endif
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
            @if ($blog->blog_favimg3)
                <input type="file" name="blog_favimg3">
                <img src="{{ asset('uploads/fav_img4/' . $blog->blog_favimg3) }}" width="60"><br>
            @endif
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <label>Content:</label>
            <textarea name="blog_content" required>{{ $blog->blog_content }}</textarea><br>
        </div>
    </div>


    <button type="submit">Update Blog</button>
</form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
