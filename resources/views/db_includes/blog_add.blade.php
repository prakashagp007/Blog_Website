    {{-- google font --}}

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@300..900&display=swap" rel="stylesheet">


    <style>
        .blog_ttl {
            text-align: center;
            font-family: "Merienda", cursive;
            font-optical-sizing: auto;
            font-weight: 700;
            font-style: normal;
            color: #0d4269;
            margin-top: 10px;
        }

        /* Text Gradient CSS */
        .text-gradient {}

        .crd12 {
            padding: 20px;
            border-radius: 10px;
            box-shadow: rgba(14, 63, 126, 0.06) 0px 0px 0px 1px, rgba(42, 51, 70, 0.03) 0px 1px 1px -0.5px, rgba(42, 51, 70, 0.04) 0px 2px 2px -1px, rgba(42, 51, 70, 0.04) 0px 3px 3px -1.5px, rgba(42, 51, 70, 0.03) 0px 5px 5px -2.5px, rgba(42, 51, 70, 0.03) 0px 10px 10px -5px, rgba(42, 51, 70, 0.03) 0px 24px 24px -8px;
            margin-top: 30px;
            background-color: #f4f4f4;
        }

        .blog_btn {
            margin-top: 10px;
            background: #05375F;
            background: linear-gradient(90deg, rgba(5, 55, 95, 1) 0%, rgba(108, 202, 232, 1) 100%);
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
        }

        label {
            margin-top: 8px;
        }
    </style>

    <div class="container">

        <h2 class="blog_ttl">Add Blog</h2>

        <div class="row justify-content-center">

            <div class="col-lg-12 col-md-8 col-sm-12 col-12">
                <div class="crd12">
                    <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">

                            <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                <label for="">Enter Your Title:</label>
                                <input type="text" name="blog_title" class="form-control">
                            </div>

                            <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                <label for="">Select Category:</label>
                                <select name="blog_cat" class="form-control" id="">
                                    <option value=""></option>
                                    <option value="Travel">Travel</option>
                                </select>
                            </div>

                            <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                <label for="">Description:</label>
                                <input type="text" name="blog_description" class="form-control">
                            </div>

                            <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                <label for="">Thumbnail Image:</label>
                                <input type="file" name="blog_thumbnail" class="form-control">
                            </div>

                            <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                <label for="">Favourite Images:</label>
                                <input type="file" name="blog_Favimg[]" class="form-control">
                            </div>

                            <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                <label for="">Location:</label>
                                <input type="text" name="blog_location" class="form-control">
                            </div>



                            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                <label for="">Content:</label>
                                <textarea name="blog_content" id="" class="form-control"></textarea>
                            </div>


                        </div>

                        <div class="text-center">
                            <button type="submit" class="blog_btn">Publish as Blog</button>
                        </div>

                    </form>
                </div>
            </div>

        </div>


    </div>
