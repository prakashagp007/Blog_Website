<style>
    body {
        background-color: #f8f9fa;
        font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
    }

    .container {
        max-width: 900px;
        margin: 40px auto;
    }

    .cd {
        background: #fff;
        border: none;
        box-shadow: 0 3px 8px rgba(0, 0, 0, 0.08);
        border-radius: 10px;
        padding: 20px;
    }

    .crd {
        padding: 12px;
        border: none;
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
    }

    .blog_ttl {
        margin-bottom: 15px;
        font-weight: 600;
        font-size: 1.2rem;
        color: #05375f;
        text-align: center;
    }

    label {
        font-weight: 500;
        font-size: 0.9rem;
        margin-bottom: 4px;
        display: block;
    }

    input.form-control {
        margin-bottom: 8px;
        border-radius: 6px;
        border: 1px solid #dcdcdc;
        padding: 6px 10px;
        font-size: 0.9rem;
    }

    input.form-control:focus {
        border-color: #6ccae8;
        box-shadow: 0 0 4px rgba(108, 202, 232, 0.5);
    }

    .upd-btn {
        margin-top: 15px;
        background: linear-gradient(90deg, rgb(5, 55, 95) 0%, rgb(108, 202, 232) 100%);
        color: white;
        border: none;
        padding: 8px 14px;
        border-radius: 6px;
        font-size: 0.95rem;
        font-weight: 500;
        cursor: pointer;
        transition: 0.25s ease;
    }

    .upd-btn:hover {
        background: linear-gradient(90deg, rgb(4, 40, 70) 0%, rgb(80, 170, 210) 100%);
        transform: scale(1.03);
    }

    img {
        margin-bottom: 8px;
        border-radius: 6px;
        box-shadow: 0 1px 4px rgba(0, 0, 0, 0.08);
    }
</style>

<div class="container">
    <div class="card cd">
        <h3 class="blog_ttl">Header Section</h3>
        <form action="{{ route('header.update', $headers->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row g-3">
                <div class="col-md-4">
                    <div class="card crd">
                        <label>Logo:</label>
                        @if ($headers->logo)
                            <img src="{{ Storage::url($headers->logo) }}" alt="Thumbnail" width="70">
                        @else
                            <p>No Image</p>
                        @endif
                        <input type="file" class="form-control" name="logo">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card crd">
                        <label>Menu Name:</label>
                        <input type="text" class="form-control" value="{{ $headers->menu_name }}" name="menu_name"
                            required>
                        <label>Menu Link:</label>
                        <input type="text" class="form-control" value="{{ $headers->menu_link }}" name="menu_link"
                            required>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card crd">
                        <label>Button Name:</label>
                        <input type="text" class="form-control" value="{{ $headers->button_name }}"
                            name="button_name">
                        <label>Button Link:</label>
                        <input type="text" class="form-control" value="{{ $headers->button_link }}"
                            name="button_link">
                    </div>
                </div>
            </div>

            <div class="text-center">
                <button class="upd-btn" type="submit">Update</button>
            </div>
        </form>
    </div>
</div>
