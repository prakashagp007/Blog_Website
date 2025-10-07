<style>
    .social-card {
        max-width: 400px;
        margin: 20px auto;
        background: linear-gradient(145deg, #ffffff, #f0f0f0);
        border-radius: 16px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
        padding: 25px;
        font-family: "Poppins", sans-serif;
        transition: all 0.3s ease;
        text-align: center;
    }

    .social-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 25px rgba(0, 0, 0, 0.12);
    }

    .social-icon {
        font-size: 48px;
        color: #007bff;
        margin-bottom: 0px;
        transition: color 0.3s ease;
    }

    .social-card:hover .social-icon {
        color: #0056b3;
    }

    .social-title {
        font-size: 22px;
        font-weight: 600;
        color: #333;
        margin-bottom: 8px;
    }

    .social-url {
        display: inline-block;
        color: #007bff;
        text-decoration: none;
        font-size: 16px;
        word-wrap: break-word;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        max-width: 100%;
    }

    .social-url:hover {
        text-decoration: underline;
    }

    @media (max-width: 768px) {
        .social-card {
            max-width: 90%;
            padding: 20px;
        }

        .social-icon {
            font-size: 40px;
        }

        .social-title {
            font-size: 20px;
        }

        .social-url {
            font-size: 14px;
        }
    }
</style>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<div class="social-card">
    <i class="{{ $sociallinks->icon_class }} social-icon"></i>
    <h3 class="social-title">{{ $sociallinks->platform_name }}</h3>
    <a href="{{ $sociallinks->url }}" target="_blank" class="social-url">{{ $sociallinks->url }}</a>
</div>
