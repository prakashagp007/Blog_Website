<style>
    form {
    max-width: 800px;
    margin: 20px auto;
    padding: 20px;
    background: #f9f9f9;
    border-radius: 10px;
    box-shadow: 0 3px 10px rgba(0,0,0,0.1);
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

</style>

<h3>Edit Blog</h3>

<form action="{{ route('blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <label>Title:</label>
    <input type="text" name="blog_title" value="{{ $blog->blog_title }}" required><br>

    <label>Category:</label>
    <input type="text" name="blog_cat" value="{{ $blog->blog_cat }}" required><br>

    <label>Description:</label>
    <textarea name="blog_description" required>{{ $blog->blog_description }}</textarea><br>

    <label>Location:</label>
    <input type="text" name="blog_location" value="{{ $blog->blog_location }}" required><br>

   <label>Thumbnail:</label>
<input type="file" name="blog_thumbnail">
@if($blog->blog_thumbnail)
    <img src="{{ asset('uploads/thumbnails/' . $blog->blog_thumbnail) }}" width="80">
@endif
    <br>

<label>Fav Images:</label><br>

@if($blog->blog_favimg)
    <input type="file" name="blog_favimg">
    <img src="{{ asset('uploads/fav_img/' . $blog->blog_favimg) }}" width="60"><br>
@endif

@if($blog->blog_favimg1)
    <input type="file" name="blog_favimg1">
    <img src="{{ asset('uploads/fav_img2/' . $blog->blog_favimg1) }}" width="60"><br>
@endif

@if($blog->blog_favimg2)
    <input type="file" name="blog_favimg2">
    <img src="{{ asset('uploads/fav_img3/' . $blog->blog_favimg2) }}" width="60"><br>
@endif

@if($blog->blog_favimg3)
    <input type="file" name="blog_favimg3">
    <img src="{{ asset('uploads/fav_img4/' . $blog->blog_favimg3) }}" width="60"><br>
@endif

    <label>Content:</label>
    <textarea name="blog_content" required>{{ $blog->blog_content }}</textarea><br>

    <button type="submit">Update Blog</button>
</form>
