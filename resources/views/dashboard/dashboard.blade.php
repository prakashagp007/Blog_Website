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
        href="https://fonts.googleapis.com/css2?family=Aclonica&family=Comfortaa:wght@300..700&family=Emblema+One&family=IM+Fell+Great+Primer+SC&family=Keania+One&family=Lemonada:wght@300..700&family=Lobster+Two:ital,wght@0,400;0,700;1,400;1,700&family=Merienda:wght@300..900&family=Overlock+SC&family=Redressed&family=Uncial+Antiqua&family=Wallpoet&family=Yatra+One&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
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
                    <a class="nav-link" id="social-media-tab" data-bs-toggle="pill" href="#social-media" role="tab">
                        <i class="fa-solid fa-images"></i> <span>Social Medias</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="footer-tab" data-bs-toggle="pill" href="#footer" role="tab">
                        <i class="fas fa-chart-bar"></i> <span>Footer</span>
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

                        <i class="fa-solid fa-circle-user"></i> prakash
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

                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif



            </div>

            {{-- Blog Content --}}
            <div class="tab-pane fade" id="blogs" role="tabpanel">

                <h3 class="mb-4 text-center blog_ttl">Blog Management</h3>

                <!-- Tabs -->
                <ul class="nav nav-tabs d-flex justify-content-between" id="blogTabs" role="tablist">

                    <li class="nav-item active" role="presentation">
                        <button class="nav-link dbhead" id="table-tab" data-bs-toggle="tab" data-bs-target="#table"
                            type="button" role="tab" aria-controls="table" aria-selected="false">
                            Blog Table
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link dbhead " id="add-tab" data-bs-toggle="tab" data-bs-target="#add"
                            type="button" role="tab" aria-controls="add" aria-selected="true">
                            Add Blog <i class="fa-solid fa-square-plus"></i>
                        </button>
                    </li>
                </ul>

                <!-- Tab Contents -->
                <div class="tab-content mt-3" id="blogTabsContent">
                    <div class="tab-pane fade  " id="add" role="tabpanel" aria-labelledby="add-tab">
                        @include('db_includes.blog_add')
                    </div>
                    <div class="tab-pane fade show active" id="table" role="tabpanel"
                        aria-labelledby="table-tab">
                        @include('db_includes.db_table')
                    </div>
                </div>
            </div>


     

        {{-- Menus --}}
        <div class="tab-pane fade" id="menus" role="tabpanel">

            <h3 class="text-center mb-4 blog_ttl">Header Section</h3>

            <!-- Tabs -->
            <ul class="nav nav-tabs mx-4 justify-content-between" id="blogTabs" role="tablist">
                <li class="nav-item " role="presentation">
                    <button class="nav-link dbhead active" id="blogAddTab" data-bs-toggle="tab"
                        data-bs-target="#blogAdd" type="button" role="tab" aria-controls="blogAdd"
                        aria-selected="true">
                        Header Table
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link dbhead" id="dbTableTab" data-bs-toggle="tab" data-bs-target="#dbTable"
                        type="button" role="tab" aria-controls="dbTable" aria-selected="false">
                        Add Header
                    </button>
                </li>
            </ul>

            <!-- Tab Contents -->
            <div class="tab-content border border-top-0 p-3 bg-white rounded-bottom" id="blogTabsContent">
                <div class="tab-pane fade show active" id="blogAdd" role="tabpanel" aria-labelledby="blogAddTab">
                    @include('db_includes.header_table')
                </div>

                <div class="tab-pane fade" id="dbTable" role="tabpanel" aria-labelledby="dbTableTab">
                    @include('db_includes.add_header')
                </div>
            </div>
        </div>

        {{-- Logo --}}
        <div class="tab-pane fade" id="social-media" role="tabpanel">

            <ul class="nav nav-tabs justify-content-between" id="blogTabs" role="tablist">

                <li class="nav-item" role="presentation">
                    <button class="nav-link dbhead active" id="iconsTableTab" data-bs-toggle="tab"
                        data-bs-target="#iconsTable" type="button" role="tab" aria-controls="iconsTable"
                        aria-selected="false">
                        Social Icons Table
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link dbhead " id="addIconsTab" data-bs-toggle="tab"
                        data-bs-target="#addIcons" type="button" role="tab" aria-controls="addIcons"
                        aria-selected="true">
                        Add Social Icons
                    </button>
                </li>
            </ul>

            <!-- Tab Contents -->
            <div class="tab-content border border-top-0 p-3 bg-white rounded-bottom" id="blogTabsContent">


                <div class="tab-pane show active fade" id="iconsTable" role="tabpanel" aria-labelledby="iconsTableTab">
                    @include('db_includes.social_icons_table')
                </div>
                 <div class="tab-pane fade" id="addIcons" role="tabpanel" aria-labelledby="addIconsTab">
                    @include('db_includes.add_social_icons')
                </div>
            </div>


        </div>

        {{-- Analytics --}}
        <div class="tab-pane fade" id="analytics" role="tabpanel">



        </div>
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
