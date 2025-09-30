<section class="hero">
    <div class="hero-slider">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide" style="background-image: url('/media/img/informasidesa_hero1.jpg');"></div>
                <div class="swiper-slide" style="background-image: url('/media/img/informasidesa_hero2.jpg');"></div>
                <div class="swiper-slide" style="background-image: url('/media/img/informasidesa_hero3.jpg');"></div>
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
            <!-- Add Navigation -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
        <!-- Overlay gradient -->
        <div class="hero-overlay"></div>
    </div>
    <div class="container">
        <div class="hero-content">
            <h1 class="hero-title">
                Informasi Desa<br>
            </h1>
            <p class="hero-subtitle">Berita, pengumuman, agenda, dan galeri kegiatan desa</p>
        </div>
    </div>
</section>

<!-- Include Swiper CSS and JS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const swiper = new Swiper('.swiper-container', {
            loop: true,
            effect: 'fade', // fade effect for smooth transition
            fadeEffect: {
                crossFade: true
            },
            autoplay: {
                delay: 6000,
                disableOnInteraction: false,
            },
            speed: 1000,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    });
</script>

<style>
    /* Reset some basics */
    .hero {
        position: relative;
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: 'Poppins', sans-serif;
        overflow: hidden;
        color: #fff;
    }

    .hero-slider {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 1;
        overflow: hidden;
        border-radius: 0;
    }

    .swiper-container {
        width: 100%;
        height: 100%;
    }

    .swiper-slide {
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        width: 100%;
        height: 100%;
        transition: background-image 1s ease-in-out;
    }

    /* Overlay gradient for better text contrast */
    .hero-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(180deg, rgba(0, 0, 0, 0.6) 0%, rgba(0, 0, 0, 0.4) 50%, rgba(0, 0, 0, 0.7) 100%);
        z-index: 2;
        pointer-events: none;
    }

    .container {
        position: relative;
        z-index: 3;
        max-width: 900px;
        padding: 0 20px;
        text-align: center;
    }

    .hero-content {
        animation: fadeInUp 1.2s ease forwards;
        opacity: 0;
        transform: translateY(20px);
    }

    @keyframes fadeInUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .hero-title {
        font-size: 3.5rem;
        font-weight: 700;
        line-height: 1.2;
        margin-bottom: 0.5rem;
        text-shadow: 0 4px 10px rgba(0, 0, 0, 0.6);
    }

    .text-highlight {
        color: #ffd700;
        /* gold highlight */
        font-weight: 800;
        text-shadow: 0 2px 6px rgba(0, 0, 0, 0.7);
    }

    .hero-subtitle {
        font-size: 1.25rem;
        margin-bottom: 2rem;
        font-weight: 400;
        text-shadow: 0 2px 6px rgba(0, 0, 0, 0.5);
    }

    .hero-buttons {
        display: flex;
        justify-content: center;
        gap: 1.5rem;
        flex-wrap: wrap;
    }

    .btn {
        padding: 0.75rem 2rem;
        font-size: 1.1rem;
        font-weight: 600;
        border-radius: 30px;
        text-decoration: none;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        cursor: pointer;
        user-select: none;
        display: inline-block;
        min-width: 160px;
        text-align: center;
    }

    .btn-primary {
        background: #007bff;
        color: white;
        border: none;
    }

    .btn-primary:hover,
    .btn-primary:focus {
        background: #0056b3;
        box-shadow: 0 6px 20px rgba(0, 86, 179, 0.6);
        outline: none;
    }

    .btn-secondary {
        background: transparent;
        color: #ffd700;
        border: 2px solid #ffd700;
    }

    .btn-secondary:hover,
    .btn-secondary:focus {
        background: #ffd700;
        color: #222;
        box-shadow: 0 6px 20px rgba(255, 215, 0, 0.6);
        outline: none;
    }

    /* Swiper pagination bullets */
    .swiper-pagination-bullet {
        background: rgba(255, 255, 255, 0.8);
        opacity: 1;
        transition: background-color 0.3s ease;
    }

    .swiper-pagination-bullet-active {
        background: #ffd700;
        box-shadow: 0 0 8px #ffd700;
    }

    /* Swiper navigation arrows */
    .swiper-button-prev,
    .swiper-button-next {
        color: #ffd700;
        transition: color 0.3s ease;
        filter: drop-shadow(0 0 2px rgba(0, 0, 0, 0.7));
    }

    .swiper-button-prev:hover,
    .swiper-button-next:hover {
        color: #fff;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .hero-title {
            font-size: 2.5rem;
        }

        .hero-subtitle {
            font-size: 1rem;
        }

        .btn {
            min-width: 140px;
            font-size: 1rem;
            padding: 0.6rem 1.5rem;
        }
    }

    @media (max-width: 480px) {
        .hero-title {
            font-size: 2rem;
        }

        .hero-subtitle {
            font-size: 0.9rem;
        }

        .hero-buttons {
            flex-direction: column;
            gap: 1rem;
        }

        .btn {
            width: 100%;
            min-width: unset;
        }
    }
</style>
