<style>
    /* --- Card Container --- */
    .edit-card {
        max-width: 550px;
        background: #f9fbfc;
        border-radius: 20px;
        padding: 35px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
    }

    .edit-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.12);
    }

    /* --- Heading --- */
    .edit-heading {
        font-family: 'Poppins', sans-serif;
        font-size: 1.8rem;
        font-weight: 600;
        color: #0c476c;
        /* elegant green-blue */
    }

    /* --- Input Fields --- */
    .edit-input {
        border-radius: 12px;
        border: 1px solid #ccc;
        padding: 10px 14px;
        transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }

    .edit-input:focus {
        border-color: #1778a5;
        box-shadow: 0 4px 12px rgba(23, 165, 137, 0.2);
        outline: none;
    }

    /* --- Update Button --- */
    .update-btn {
        background: linear-gradient(90deg, #0a639a, #4bbed5);
        color: #fff;
        font-weight: 600;
        padding: 10px 25px;
        border-radius: 25px;
        border: none;
        transition: transform 0.3s ease, background 0.3s ease;
        box-shadow: 0 5px 15px rgba(23, 134, 165, 0.3);
    }

    .update-btn:hover {
        transform: translateY(-2px);
        background: linear-gradient(90deg, #0a639a, #4bbed5);
    }

    /* --- Alerts --- */
    .alert {
        border-radius: 12px;
        font-size: 0.95rem;
    }

    /* --- Responsive --- */
    @media (max-width: 576px) {
        .edit-card {
            padding: 25px;
            border-radius: 15px;
        }

        .edit-heading {
            font-size: 1.5rem;
        }

        .update-btn {
            width: 100%;
        }
    }
</style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-6 col-sm-12 col-12">

            <div class="edit-card shadow-lg p-4 rounded-4 mx-auto">
                <h2 class="edit-heading text-center mb-4">
                    <i class="fa-solid fa-pen-to-square me-2"></i> Edit Social Media Link
                </h2>


                <form action="{{ route('social.update', $socialLink->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group mb-3">
                        <label class="form-label">Platform Name</label>
                        <input type="text" name="platform_name" value="{{ $socialLink->platform_name }}"
                            class="form-control edit-input" required>
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label">Icon Class (FontAwesome)</label>
                        <input type="text" name="icon_class" value="{{ $socialLink->icon_class }}"
                            class="form-control edit-input" required>
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label">URL</label>
                        <input type="url" name="url" value="{{ $socialLink->url }}"
                            class="form-control edit-input" required>
                    </div>

                    <div class="text-center mt-4">
                        <button type="submit" class="update-btn">
                            <i class="fa-solid fa-rotate me-2"></i> Update Link
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
