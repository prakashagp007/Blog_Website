<style>
    /* --- Card Container --- */
    .form-card {
        padding: 20px;
        border-radius: 10px;
        margin-top: 0px;
        background-color: whitesmoke;
        box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
    }

    .form-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 18px 35px rgba(0, 0, 0, 0.12);
    }

    /* --- Heading --- */
    .form-heading {
        font-family: "merienda", cursive;
        font-size: 1.8rem;
        font-weight: 700;
        color: #134c72;
    }

    /* --- Input Fields --- */
    .input-field {
        border-radius: 12px;
        border: 1px solid #ddd;
        padding: 10px 15px;
        transition: border 0.3s ease, box-shadow 0.3s ease;
    }

    .input-field:focus {
        border-color: #007bff;
        box-shadow: 0 4px 12px rgba(0, 123, 255, 0.2);
        outline: none;
    }


    /* --- Responsive --- */
    @media (max-width: 576px) {
        .form-card {
            padding: 20px;
            border-radius: 15px;
        }

        .form-heading {
            font-size: 1.5rem;
        }

        .submit-btn {
            width: 100%;
        }
    }
</style>

<div class="container pb-5">
    <div class="form-card shadow-lg p-4 pt-0 rounded-4 mx-auto">

        <form action="{{ route('sociallinks.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group mb-3">
                <label class="form-label">Platform Name</label>
                <input type="text" name="platform_name" class="form-control input-field" placeholder="e.g., Facebook"
                    required>
            </div>

            <div class="form-group mb-3">
                <label class="form-label">Icon Class (FontAwesome)</label>
                <input type="text" name="icon_class" class="form-control input-field"
                    placeholder="e.g., fa-brands fa-facebook-f" required>
            </div>

            <div class="form-group mb-3">
                <label class="form-label">URL</label>
                <input type="url" name="url" class="form-control input-field" placeholder="https://example.com"
                    required>
            </div>

            <div class="text-center mt-4">
                <button type="submit" class="blog_btn">
                    Add Social Media <i class="fa-solid fa-download"></i>
                </button>
            </div>
        </form>
    </div>
</div>
