    {{-- google font --}}

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Aclonica&family=Comfortaa:wght@300..700&family=Emblema+One&family=IM+Fell+Great+Primer+SC&family=Keania+One&family=Lemonada:wght@300..700&family=Lobster+Two:ital,wght@0,400;0,700;1,400;1,700&family=Merienda:wght@300..900&family=Overlock+SC&family=Redressed&family=Uncial+Antiqua&family=Wallpoet&family=Yatra+One&display=swap"
        rel="stylesheet">


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

        .crd12 {
            padding: 20px;
            border-radius: 10px;
            margin-top: 30px;
            background-color: whitesmoke;
            box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
        }

        .blog_btn {
            margin-top: 10px;
            background: #05375F;
            background: linear-gradient(90deg, rgba(5, 55, 95, 1) 0%, rgba(108, 202, 232, 1) 100%);
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            font-family: "Keania One", sans-serif;
            font-weight: 400;
            font-style: normal;
        }

        label {
            margin-top: 8px;
            font-family: "Redressed", cursive;
            font-weight: 400;
            font-style: normal;
            font-size: 20px;
            margin-bottom: 5px;
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
                                    <option value="Relationship">Relationship</option>
                                    <option value="Music">Music</option>
                                    <option value="Writing & Journaling">Writing & Journaling</option>
                                    <option value="Saving Money">Saving Money</option>
                                    <option value="Fashion & Style">Fashion & Style</option>
                                    <option value="Personal Development">Personal Development</option>
                                    <option value="Entrepreneurship">Entrepreneurship</option>
                                    <option value="Career Advice">Career Advice</option>
                                    <option value="Tech Reviews">Tech Reviews</option>
                                    <option value="Coding & Programming">Coding & Programming</option>
                                    <option value="Online Courses">Online Courses</option>

                                </select>
                            </div>

                            <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                <label for="">Description:</label>
                                <input type="text" name="blog_description" class="form-control">
                            </div>

                            <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                <label for="">Location:</label>
                                <input type="text" name="blog_location" class="form-control">
                            </div>

                            <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                <label for="">Thumbnail Image:</label>
                                <input type="file" name="blog_thumbnail" class="form-control">
                            </div>

                            <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                <label for="">Favourite Images:</label>
                                <input type="file" name="blog_favimg" class="form-control">
                            </div>

                            <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                <label for="">Favourite Images:</label>
                                <input type="file" name="blog_favimg1" class="form-control">
                            </div>

                            <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                <label for="">Favourite Images:</label>
                                <input type="file" name="blog_favimg2" class="form-control">
                            </div>

                            <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                <label for="">Favourite Images:</label>
                                <input type="file" name="blog_favimg3" class="form-control">
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                <label for="">Content:</label>
                                <textarea name="blog_content" id="" class="form-control"></textarea>
                            </div>


                        </div>

                        <div class="text-center">
                            <button type="submit" class="blog_btn">Publish as Blog <i
                                    class="fa-solid fa-download"></i></button>
                        </div>

                    </form>
                </div>
            </div>

        </div>


    </div>
