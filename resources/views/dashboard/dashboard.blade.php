<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">


    {{-- google font --}}

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Aclonica&family=Comfortaa:wght@300..700&family=Emblema+One&family=IM+Fell+Great+Primer+SC&family=Keania+One&family=Lemonada:wght@300..700&family=Overlock+SC&family=Redressed&family=Wallpoet&family=Yatra+One&display=swap"
        rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@300..900&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-color: #4361ee;
            --secondary-color: #3a0ca3;
            --light-color: #f8f9fa;
            --dark-color: #212529;
        }

        body {
            background-color: #f5f7fb;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* Sidebar */
        .sidebar {
            background: #05375F;
            background: linear-gradient(90deg, rgba(5, 55, 95, 1) 0%, rgba(108, 202, 232, 1) 100%);
            color: white;
            height: 100vh;
            position: fixed;
            min-width: 250px;
            box-shadow: 5px 0 15px rgba(0, 0, 0, 0.1);
        }

        .sidebar-brand {
            height: 100px;
            display: flex;
            align-items: center;
            padding: 0 1rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .sidebar-nav {
            padding-top: 1.5rem;
        }

        .sidebar-nav .nav-link {
            color: rgba(255, 255, 255, 0.85);
            border-radius: 0.5rem;
            margin: 0.25rem 0;
            padding: 0.75rem 1rem;
            transition: all 0.3s ease;
            font-family: "Aclonica", sans-serif;
            font-weight: 200;
            font-style: normal;
        }

        .sidebar-nav .nav-link:hover,
        .sidebar-nav .nav-link.active {
            background-color: rgba(255, 255, 255, 0.15);
            color: white;
            transform: translateX(5px);
        }

        .sidebar-nav .nav-link i {
            margin-right: 0.75rem;
            width: 20px;
            text-align: center;
        }

        /* Content */
        .content-wrapper {
            margin-left: 250px;
            min-height: 100vh;
            background-color: #ffffff;
        }

        .ico2 {
            background-color: blue;
            color: white;
            padding: 10px;
            border-radius: 50%;
        }

        /* Topbar */
        .topbar {
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 0.75rem 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .search-bar {
            width: 300px;
        }

        .user-menu {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .admin-btn {
            background: #05375F;
            background: linear-gradient(90deg, rgba(5, 55, 95, 1) 0%, rgba(108, 202, 232, 1) 100%);
            color: white;
            border: none;
            font-family: "Merienda", cursive;
            font-optical-sizing: auto;
            font-weight: <weight>;
            font-style: normal;
        }

        .admin-btn:hover,
        .admin-btn:focus {
            background: #05375F;
            background: linear-gradient(90deg, rgba(5, 55, 95, 1) 0%, rgba(108, 202, 232, 1) 100%);
            color: white;
        }

        /* Responsive */
        @media (max-width: 991px) {
            .sidebar {
                min-width: 70px;
            }

            .sidebar-brand span,
            .sidebar-nav .nav-link span {
                display: none;
            }

            .content-wrapper {
                margin-left: 70px;
            }

            .search-bar {
                width: 200px;
            }
        }

        @media (max-width: 768px) {
            .sidebar {
                position: absolute;
                left: -250px;
                z-index: 1000;
            }

            .sidebar.show {
                left: 0;
            }

            .content-wrapper {
                margin-left: 0;
            }

            .search-bar {
                width: 150px;
            }
        }

        .logo {
            width: 100px;
            margin: 0px auto;
            border-radius: 10px;
        }
    </style>
</head>

<body>




    <!-- Sidebar -->
    <div class="sidebar d-flex flex-column">
        <div class="sidebar-brand  d-flex justify-content-between align-items-center">
            <img src="{{ asset('images/GP logo1.png') }}" class="logo" alt="">
            <button class="btn btn-sm btn-light d-md-none" id="sidebar-close">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <!-- Sidebar -->
        <div class="sidebar-nav flex-grow-0 me-3">
            <ul class="nav flex-column nav-pills" id="sidebarTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="dashboard-tab" data-bs-toggle="pill" href="#dashboard"
                        role="tab">
                        <i class="fas fa-home"></i> <span>Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="blogs-tab" data-bs-toggle="pill" href="#blogs" role="tab">
                        <i class="fa-solid fa-blog"></i> <span>Add Blogs</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="menus-tab" data-bs-toggle="pill" href="#menus" role="tab">
                        <i class="fa-solid fa-bars"></i> <span>Menus</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="logo-tab" data-bs-toggle="pill" href="#logo" role="tab">
                        <i class="fa-solid fa-images"></i> <span>Logo</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="analytics-tab" data-bs-toggle="pill" href="#analytics" role="tab">
                        <i class="fas fa-chart-bar"></i> <span>Analytics</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="p-3">
            <a href="{{ route('logout') }}" class="btn btn-light d-block text-center">
                <i class="fas fa-sign-out-alt me-2"></i> Logout
            </a>
        </div>
    </div>

    <!-- Content Wrapper -->
    <div class="content-wrapper">
        <!-- Topbar -->
        <nav class="topbar d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                <button class="btn btn-outline-secondary me-3 d-md-none" id="sidebar-toggle">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="position-relative">
                    <input type="text" class="form-control search-bar" placeholder="Search...">
                    <i class="fas fa-search position-absolute"
                        style="top: 50%; right: 10px; transform: translateY(-50%); color: #6c757d;"></i>
                </div>
            </div>
            <div class="user-menu">
                <div class="dropdown">
                    <button class="btn admin-btn dropdown-toggle" type="button" data-bs-toggle="dropdown">

                        <i class="fa-solid fa-circle-user"></i>
                        <span class="d-none d-md-inline">prakash</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="{{ route('logout') }}"><i
                                    class="fas fa-sign-out-alt me-2"></i> Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>



        {{-- Tab Content --}}



        <div class="tab-content flex-grow-1 p-3" id="sidebarTabContent">
            <div class="tab-pane fade show active" id="dashboard" role="tabpanel">

                @include('db_includes.db_table')

                @include('db_includes.header_table')

            </div>

            {{-- Blog Content --}}
            <div class="tab-pane fade" id="blogs" role="tabpanel">

                @include('db_includes.blog_add')


            </div>

            {{-- Menus --}}
            <div class="tab-pane fade" id="menus" role="tabpanel">
                @include('db_includes.add_header')
            </div>

            {{-- Logo --}}
            <div class="tab-pane fade" id="logo" role="tabpanel">
                <h3>Logo</h3>
                <p>Upload/change logo section here.</p>
            </div>

            {{-- Analytics --}}
            <div class="tab-pane fade" id="analytics" role="tabpanel">
                <h3>Analytics</h3>
                <p>Charts and analytics go here.</p>
            </div>
        </div>



        {{-- Tab Content --}}
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Toggle sidebar on mobile
        document.getElementById('sidebar-toggle').addEventListener('click', function() {
            document.querySelector('.sidebar').classList.toggle('show');
        });

        document.querySelectorAll('.sidebar-nav .nav-link').forEach(item => {
            item.addEventListener('click', function() {
                document.querySelectorAll('.sidebar-nav .nav-link').forEach(link => {
                    link.classList.remove('active');
                });
                this.classList.add('active');
            });
        });

        //

        //  toggle for mbl view
        const sidebar = document.querySelector('.sidebar');
        document.getElementById('sidebar-toggle').addEventListener('click', function() {
            sidebar.classList.add('show');
        });
        document.getElementById('sidebar-close').addEventListener('click', function() {
            sidebar.classList.remove('show');
        });
    </script>
</body>

</html>
