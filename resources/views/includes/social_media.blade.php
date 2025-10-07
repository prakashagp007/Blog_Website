@php
    $socialLinks = App\Models\SocialLink::all();
@endphp

<div class="social-icons">
    @foreach ($socialLinks as $link)
        <a href="{{ $link->url }}" target="_blank">
            <i class="{{ $link->icon_class }}"></i>
        </a>
    @endforeach
</div>
