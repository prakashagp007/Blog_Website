<link rel="stylesheet" href="{{ asset('css/header.css') }}">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
    href="https://fonts.googleapis.com/css2?family=Aclonica&family=Emblema+One&family=IM+Fell+Great+Primer+SC&family=Keania+One&family=Lemonada:wght@300..700&family=Redressed&family=Wallpoet&family=Yatra+One&display=swap"
    rel="stylesheet">

<header class="header_one container-lg sticky-top">





    {{-- Logo --}}
    @if ($headers->first() && $headers->first()->logo)
        <div class="logo">
            <a href="{{ route('home') }}">
            <img src="{{ asset('storage/' . $headers->first()->logo) }}" alt="Logo">
            </a>
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




</header>
