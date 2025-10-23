<link rel="stylesheet" href="{{ asset('css/header.css') }}">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
    href="https://fonts.googleapis.com/css2?family=Aclonica&family=Emblema+One&family=IM+Fell+Great+Primer+SC&family=Keania+One&family=Lemonada:wght@300..700&family=Redressed&family=Wallpoet&family=Yatra+One&display=swap"
    rel="stylesheet">

<header class="header_one container-lg sticky-top">



    {{-- Desktop Menu --}}
    <nav class="menu12">
        <ul class="header_menus">
            @foreach ($headers as $menu)
                <li>
                    <a class="menu-link" href="{{ url($menu->menu_link) }}">{{ $menu->menu_name }}</a>
                </li>
            @endforeach
        </ul>
    </nav>

    {{-- Logo --}}
    @if ($headers->first() && $headers->first()->logo)
        <div class="logo">
            <img src="{{ asset('storage/' . $headers->first()->logo) }}" alt="Logo">
        </div>
    @endif

    {{-- Search + Button --}}
    <div class="header-actions">

        {{-- Header Button / Register/Login --}}
        @if ($headers->first() && $headers->first()->button_name)
            <a href="{{ url($headers->first()->button_link) }}" class="header-btn">
                {{ $headers->first()->button_name }}
            </a>
        @endif


        <div>
            @include('includes.social_media')
        </div>


    </div>

    {{-- Hamburger for mobile --}}
    <div class="hamburger" id="hamburger">
        <span></span><span></span><span></span>
    </div>

    {{-- Mobile menu --}}
    <div class="mobile-menu" id="mobileMenu">
        @foreach ($headers as $menu)
            <a class="menu-link" href="{{ url($menu->menu_link) }}">{{ $menu->menu_name }}</a>
        @endforeach
        @if ($headers->first() && $headers->first()->button_name)
            <a href="{{ url($headers->first()->button_link) }}" class="header-btn">
                {{ $headers->first()->button_name }}
            </a>
        @endif
    </div>
</header>




<script defer>
    document.addEventListener('DOMContentLoaded', function() {
        const hamburger = document.getElementById('hamburger');
        const mobileMenu = document.getElementById('mobileMenu');

        if (hamburger && mobileMenu) {
            hamburger.addEventListener('click', function() {
                mobileMenu.classList.toggle('active');
                this.classList.toggle('open');
            });
        }
    });
</script>
