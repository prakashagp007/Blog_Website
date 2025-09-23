<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- google font --}}

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@300..900&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Aclonica&family=IM+Fell+Great+Primer+SC&display=swap"
        rel="stylesheet">

    <link
        href="https://fonts.googleapis.com/css2?family=Aclonica&family=IM+Fell+Great+Primer+SC&family=Wallpoet&family=Yatra+One&display=swap"
        rel="stylesheet">

</head>
<style>
    .bg-log {
        width: 100%;
        height: 100vh;
        background-image: url('images/log-img2.jpg');
        background-repeat: no-repeat;
        background-size: cover;
        background-position: top;

    }

    .log-img {
        width: 100%;
    }

    .crd {
        background-color: rgba(139, 224, 245, 0.3);
        backdrop-filter: blur(4px);
        box-shadow: rgba(255, 255, 255, 0.2) 0px 7px 29px 0px;
        margin: 20% 0%;
    }

    .inp {
        background-color: transparent;
        transition: 0.3s;
        border: none;
        border-bottom: 1px solid #ecf7fc;
        border-radius: 0px;
        color: #ecf7fc;
    }

    label {
        color: #002D4E;
        font-family: "IM Fell Great Primer SC", serif;
        font-weight: 400;
        font-style: normal;
        font-size: 18px;
    }

    /** Text Gradient Example */
    .txt {
        color: #ecf7fc;
        font-size: 35px;
        font-weight: bold;
        line-height: 50px;
        font-family: "Merienda", cursive;
        font-optical-sizing: auto;
        font-weight: <weight>;
        font-style: normal;
        margin: 10px 0px 20px 0px;
    }

    .inp:focus {
        background-color: transparent;
        box-shadow: none;
        border: 1.6px solid #002D4E;
        border: none;
        border-bottom: 1px solid #ecf7fc;
        border-radius: 0px;
    }

    .inp::placeholder {
        color: #8fe1f5;
        font-size: 14px;
    }

    .log-btn {
        background: linear-gradient(90deg, rgba(160, 7, 27, 1) 0%, rgba(0, 65, 115, 1) 54%, rgba(0, 164, 208, 1) 100%);
        color: white;
        padding: 5px 27px;
        border: none;
        border-radius: 5px;
        font-family: "Merienda", cursive;
        font-optical-sizing: auto;
        font-weight: <weight>;
        font-style: normal;
        transition: 0.3s;
    }

    .error {
        float: right;
        padding: 10px 20px;
        position: absolute;
        top: 45%;
        right: 2%;
        background-color: rgba(249, 249, 249, 0.31);
        border-radius: 5px;
        box-shadow: rgba(255, 255, 255, 0.2) 0px 7px 29px 0px;
    }

    .error {
        font-family: "Wallpoet", sans-serif;
        font-weight: 400;
        font-style: normal;
    }

    .log-btn:hover .ico {
        animation: icon1 0.5s ease;
    }

    @keyframes icon1 {
        0% {
            transform: translateX(0px);
        }

        50% {
            transform: translateX(10px);
        }

        100% {
            transform: translateX(0px);
        }
    }
</style>

<body>

    <div class="bg-log">

        <div class="container ">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-6 col-sm-12 col-12">
                    <div class="card crd p-4">

                        <h3 class="text-center txt"><i class="fa-solid fa-user-shield"></i> Login Form</h3>



                        <form method="POST" action="/login">
                            @csrf
                            <label><i class="fa-solid fa-circle-user"></i> Username:</label>
                            <input type="text" name="username" placeholder="Enter Your Username..."
                                class="form-control inp" required>
                            <br>
                            <label><i class="fa-solid fa-key"></i> Password:</label>
                            <input type="password" name="password" placeholder="Enter Your Password..."
                                class="form-control inp" required>
                            <br>
                            <div class="text-center">
                                <button class="log-btn" type="submit">Login <i
                                        class="fa-solid fa-arrow-right-to-bracket ico"></i></button>
                            </div>
                        </form>
                    </div>





                </div>
            </div>


        </div>

        @if ($errors->any())
            <div class="error crd">
                <p style="color: rgb(255, 0, 0);margin:0px;"><i class="fa-solid fa-ban"></i> {{ $errors->first() }}</p>
            </div>
        @endif



    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
