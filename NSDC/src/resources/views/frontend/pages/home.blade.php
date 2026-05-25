@extends('frontend.template.template')

@section('ftitle', 'RSDC - Rajshahi Skill Development Center')

@section('header')
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <!-- Owl Carousel JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    @include('frontend.includes.transparent_header')
@endsection
@push('css')
    <style>
        .hero-section {
            min-height: 620px;
        }

        .hero-content {
            padding: 130px 20px 88px;
        }

        .hero-text {
            max-width: 900px;
            margin: 0 auto;
        }

        .hero-text h1 {
            color: #fff;
            font-size: clamp(2.35rem, 4.7vw, 4.4rem);
            line-height: 1.08;
            margin-bottom: 20px;
            font-weight: 800;
            text-wrap: balance;
        }

        .hero-text p {
            font-size: clamp(1.05rem, 1.45vw, 1.28rem);
            line-height: 1.65;
            margin-bottom: 34px;
            max-width: 760px;
            margin-left: auto;
            margin-right: auto;
            opacity: 0.9;
            color: #fff;
            text-wrap: balance;
        }

        .hero-buttons {
            gap: 14px;
            align-items: center;
        }

        .hero-buttons .btn {
            min-width: 154px;
            min-height: 50px;
            padding: 14px 28px;
            border-radius: 8px;
            font-size: 15px;
            font-weight: 700;
            line-height: 1.2;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .carousel-indicators {
            position: absolute;
            bottom: 30px;
            left: 50% !important;
            transform: translateX(-50%);
            display: flex;
            gap: 10px;
            z-index: 3;
        }

        .partner-section {
            background: #242F6F;
            padding: 58px 0;
            overflow: hidden;
        }

        .partner-section .section-title {
            margin-bottom: 36px;
        }

        .partner-section .section-title h2 {
            color: #fff;
        }

        .partner-section .section-title p {
            color: rgba(255, 255, 255, 0.72);
        }

        .partner-carousel .owl-stage {
            display: flex;
            align-items: stretch;
        }

        .partner-carousel .owl-item {
            display: flex;
            align-items: stretch;
        }

        .partner-section .partner-logo {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            min-height: 132px;
            padding: 20px 22px;
            border: 1px solid rgba(255, 255, 255, 0.14);
            border-radius: 8px;
            background: rgba(255, 255, 255, 0.96);
            box-shadow: 0 14px 34px rgba(12, 18, 54, 0.18);
            filter: grayscale(0.12);
            transition: transform 0.25s ease, box-shadow 0.25s ease, filter 0.25s ease, border-color 0.25s ease;
        }

        .partner-section .partner-logo img {
            display: block;
            width: auto !important;
            max-width: 168px;
            height: 82px;
            max-height: 82px;
            object-fit: contain;
            object-position: center;
        }

        .partner-section .partner-logo:hover {
            filter: grayscale(0);
            transform: translateY(-4px);
            border-color: rgba(245, 122, 28, 0.55);
            box-shadow: 0 18px 42px rgba(12, 18, 54, 0.26);
        }

        .home-contact-card {
            background: white;
            padding: 0;
            border-radius: 8px;
            box-shadow: var(--shadow);
            border: 1px solid rgba(36, 47, 111, 0.08);
            overflow: hidden;
        }

        .home-contact-card-inner {
            padding: 38px 38px 28px;
        }

        .home-contact-action {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            padding: 18px 22px;
            border-top: 1px solid rgba(36, 47, 111, 0.10);
            background: linear-gradient(135deg, rgba(36, 47, 111, 0.04), rgba(245, 122, 28, 0.08));
            text-align: left;
        }

        .home-contact-action-text strong {
            display: block;
            color: var(--secondary-color);
            font-size: 15px;
            line-height: 1.25;
            margin-bottom: 3px;
        }

        .home-contact-action-text span {
            display: block;
            color: var(--text-gray);
            font-size: 13px;
            line-height: 1.35;
        }

        .home-contact-action .btn {
            flex: 0 0 auto;
            border-radius: 8px;
            padding: 13px 22px;
            min-height: 46px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            font-weight: 700;
            white-space: nowrap;
        }

        .home-contact-layout {
            display: grid;
            grid-template-columns: minmax(0, 1fr) minmax(360px, 0.85fr);
            gap: 24px;
            align-items: stretch;
            max-width: 1180px;
            margin: 0 auto;
        }

        .home-map-card {
            position: relative;
            min-height: 100%;
            border-radius: 8px;
            overflow: hidden;
            background: #fff;
            box-shadow: var(--shadow);
            border: 1px solid rgba(36, 47, 111, 0.08);
        }

        .home-map-frame {
            position: relative;
            min-height: 100%;
            height: 100%;
            aspect-ratio: 4 / 3;
            overflow: hidden;
        }

        .home-map-frame iframe {
            width: 100%;
            height: 100%;
            min-height: 390px;
            border: 0;
            display: block;
            filter: saturate(0.95) contrast(1.03);
        }

        .home-map-pin {
            position: absolute;
            left: 50%;
            top: 50%;
            width: 54px;
            height: 54px;
            border-radius: 50% 50% 50% 0;
            background: var(--primary-color);
            transform: translate(-50%, -86%) rotate(-45deg);
            z-index: 2;
            box-shadow: 0 16px 34px rgba(245, 122, 28, 0.36);
            pointer-events: none;
        }

        .home-map-pin::before {
            content: "";
            position: absolute;
            inset: 8px;
            border-radius: 50%;
            background: #fff;
            box-shadow: inset 0 0 0 2px rgba(36, 47, 111, 0.08);
        }

        .home-map-pin i {
            position: absolute;
            left: 50%;
            top: 50%;
            color: var(--secondary-color);
            font-size: 17px;
            transform: translate(-50%, -50%) rotate(45deg);
            z-index: 1;
        }

        .home-map-label {
            position: absolute;
            left: 14px;
            right: auto;
            top: 14px;
            bottom: auto;
            z-index: 2;
            display: flex;
            align-items: center;
            gap: 9px;
            max-width: min(240px, calc(100% - 140px));
            padding: 10px 12px;
            border-radius: 8px;
            background: rgba(255, 255, 255, 0.92);
            box-shadow: 0 12px 26px rgba(18, 25, 66, 0.16);
            text-align: left;
            pointer-events: none;
        }

        .home-map-label span {
            width: 30px;
            height: 30px;
            flex: 0 0 30px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            color: #fff;
            background: var(--secondary-color);
            font-size: 13px;
        }

        .home-map-label strong {
            display: block;
            color: var(--secondary-color);
            font-size: 12px;
            line-height: 1.2;
            margin-bottom: 2px;
        }

        .home-map-label small {
            color: var(--text-gray);
            font-size: 10.5px;
            line-height: 1.25;
        }

        .home-map-action {
            position: absolute;
            right: 14px;
            top: 14px;
            z-index: 2;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            min-height: 36px;
            padding: 8px 12px;
            border-radius: 8px;
            background: rgba(255, 255, 255, 0.94);
            color: var(--secondary-color);
            font-size: 12px;
            font-weight: 700;
            text-decoration: none;
            box-shadow: 0 12px 26px rgba(18, 25, 66, 0.16);
            transition: color 0.2s ease, transform 0.2s ease, box-shadow 0.2s ease;
        }

        .home-map-action:hover {
            color: var(--primary-color);
            transform: translateY(-1px);
            box-shadow: 0 14px 30px rgba(18, 25, 66, 0.20);
        }

        .home-contact-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 22px;
            margin-bottom: 30px;
        }

        .home-contact-item {
            min-width: 0;
            text-align: center;
        }

        .home-contact-icon {
            background: var(--primary-color);
            color: white;
            width: 58px;
            height: 58px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            font-size: 1.35rem;
        }

        .home-contact-item h4 {
            color: var(--secondary-color);
            margin-bottom: 10px;
            font-size: 17px;
        }

        .home-contact-item p,
        .home-contact-item a {
            color: var(--text-gray);
            font-size: 15px;
            line-height: 1.55;
            margin: 0;
            text-decoration: none;
            overflow-wrap: anywhere;
        }

        .courses-grid {
            align-items: stretch;
        }

        .course-card {
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .course-content {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .course-description {
            min-height: 72px;
            margin-bottom: 18px;
        }

        .course-btn {
            margin-top: auto;
            align-self: flex-start;
            text-align: center;
        }

        @media (max-width: 991px) {
            .hero-section {
                min-height: 560px;
            }

            .hero-content {
                padding: 116px 18px 76px;
            }

            .hero-text {
                max-width: 720px;
            }

            .hero-text h1 {
                font-size: clamp(1.7rem, 5.2vw, 2.55rem);
                line-height: 1.12;
            }

            .hero-text p {
                font-size: 0.92rem;
                line-height: 1.58;
                margin-bottom: 24px;
            }

            .courses-grid,
            .employees-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .home-contact-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .home-contact-layout {
                grid-template-columns: 1fr;
            }

            .home-map-frame iframe {
                min-height: 340px;
            }

            .partner-section .partner-logo {
                min-height: 118px;
                padding: 16px;
            }

            .partner-section .partner-logo img {
                max-width: 148px;
                height: 72px;
                max-height: 72px;
            }
        }

        @media (max-width: 575px) {
            .hero-section {
                min-height: 520px;
            }

            .hero-content {
                padding: 104px 16px 66px;
            }

            .hero-text h1 {
                font-size: clamp(1.35rem, 7.4vw, 1.95rem);
                line-height: 1.14;
                margin-bottom: 12px;
            }

            .hero-text p {
                font-size: 0.84rem;
                line-height: 1.5;
                margin-bottom: 20px;
            }

            .hero-buttons {
                gap: 10px;
            }

            .hero-buttons .btn {
                width: 100%;
                max-width: 240px;
                min-height: 46px;
                padding: 12px 18px;
                font-size: 14px;
            }

            .courses-grid,
            .employees-grid,
            .home-contact-grid {
                grid-template-columns: 1fr;
            }

            .home-contact-card {
                padding: 0;
            }

            .home-contact-card-inner {
                padding: 28px 18px 22px;
            }

            .home-contact-action {
                flex-direction: column;
                align-items: stretch;
                text-align: center;
                padding: 18px;
            }

            .home-contact-action .btn {
                width: 100%;
            }

            .home-map-frame {
                aspect-ratio: 1 / 1;
            }

            .home-map-frame iframe {
                min-height: 320px;
            }

            .home-map-pin {
                width: 46px;
                height: 46px;
            }

            .home-map-pin i {
                font-size: 15px;
            }

            .home-map-label {
                left: 10px;
                top: 54px;
                bottom: auto;
                max-width: calc(100% - 20px);
                padding: 9px 10px;
            }

            .home-map-action {
                right: 10px;
                top: 10px;
                min-height: 34px;
                padding: 7px 10px;
                font-size: 11px;
            }

            .partner-section {
                padding: 46px 0;
            }

            .partner-section .partner-logo {
                min-height: 108px;
                padding: 14px;
            }

            .partner-section .partner-logo img {
                max-width: 136px;
                height: 66px;
                max-height: 66px;
            }
        }


    </style>
@endpush
@section('content')
    <!-- Hero Section with Carousel -->
    <section class="hero-section">
        <div class="hero-carousel">
            @forelse($sliders as $key => $slider)
                <div class="hero-slide {{ $key == 0 ? 'active' : '' }}"
                     style="background-image: url('{{ asset('storage/'.$slider->image) }}');">
                    <div class="hero-content">
                        <div class="hero-text">
                            <h1>{{ $slider->title }}</h1>
                            <p>{{ $slider->description }}</p>
                            <div class="hero-buttons">
                                @if($slider->button1_text && $slider->button1_link)
                                    <a href="{{ $slider->button1_link }}" class="btn btn-primary">
                                        {{ $slider->button1_text }}
                                    </a>
                                @endif
                                @if($slider->button2_text && $slider->button2_link)
                                    <a href="{{ $slider->button2_link }}" class="btn btn-outline">
                                        {{ $slider->button2_text }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="hero-slide active" style="background-color: #f1f1f1; height: 400px;">
                    <div class="hero-content text-center">
                        <h1>No Sliders Available</h1>
                    </div>
                </div>
            @endforelse
        </div>

        <!-- Carousel Navigation -->
        <button class="carousel-nav carousel-prev" onclick="changeSlide(-1)">
            <i class="fas fa-chevron-left"></i>
        </button>
        <button class="carousel-nav carousel-next" onclick="changeSlide(1)">
            <i class="fas fa-chevron-right"></i>
        </button>

        <!-- Carousel Indicators -->
        <div class="carousel-indicators">
            @foreach($sliders as $key => $slider)
                <span class="indicator {{ $key == 0 ? 'active' : '' }}" onclick="currentSlide({{ $key + 1 }})"></span>
            @endforeach
        </div>
    </section>


    <!-- Our Courses Section -->
    <section id="courses" class="section courses-section">
        <div class="container">
            <div class="section-title">
                <h2>Our Courses</h2>
                <p>Comprehensive training programs designed to equip you with the skills needed for entrepreneurial success</p>
            </div>

            <div class="courses-grid">
                @foreach($cdata as $data)
                    <div class="course-card fade-in">
                        <div class="course-image" style="background-image: url('{{ Storage::url($data->picture) }}');">
                            <div class="course-overlay">
                                <i class="fas fa-lightbulb" style="font-size: 3rem; color: white;"></i>
                            </div>
                        </div>
                        <div class="course-content">
                            <h3 class="course-title">{{$data->title ?? ''}}</h3>
                            <div class="course-duration">{{$data->duration ?? ''}}</div>
                            <p class="course-description">{{ \Illuminate\Support\Str::limit(strip_tags($data->short_des), 135, '...') }}</p>
                            <a href="{{route('course_details',$data->slug)}}" class="course-btn text-white font-weight-700">Apply Now</a>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Partner Section -->
    <section id="partners" class="section partner-section">
        <div class="container">
            <div class="section-title text-center mb-5">
                <h2>Our Partners</h2>
                <p>Companies and organizations we proudly collaborate with</p>
            </div>

            <div class="owl-carousel partner-carousel">
                @forelse($partners as $partner)
                    <div class="partner-logo">
                        <img src="{{ $partner->logo ? Storage::url($partner->logo) : asset('image/no-image-uploded-2.png') }}"
                             alt="Partner {{ $loop->iteration }}">
                    </div>
                @empty
                    <div class="text-center" style="color: white; width: 100%;">
                        <p>No partners available at the moment.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>


   <section id="employees" class="section employees-section">
    <div class="container">
        <div class="section-title">
            <h2>Our Expert Team</h2>
            <p>Meet our experienced instructors and mentors who are dedicated to your success</p>
        </div>

        <div class="employees-grid">
            @foreach($team as $index => $employee)
                <div class="employee-card {{ $index % 2 == 0 ? 'slide-in-left' : 'slide-in-right' }}">
                    
                    <div class="employee-image" 
                         style="background-image: url('{{ Storage::url($employee->image) }}');">
                    </div>

                    <h3 class="employee-name">
                        {{ $employee->name }}
                    </h3>

                    <div class="employee-designation">
                        {{ $employee->designation }}
                    </div>

                    <div class="employee-contact">
                        {{ $employee->email }}
                    </div>

                </div>
            @endforeach
        </div>
    </div>
</section>
    <!-- Contact Section -->
    <section id="contact" class="section" style="background: var(--bg-light);">
        <div class="container">
            <div class="section-title">
                <h2>Get In Touch</h2>
                <p>Ready to start your entrepreneurial journey? Contact us today to learn more about our programs</p>
            </div>

            <div class="home-contact-layout">
                <div class="home-contact-card">
                    <div class="home-contact-card-inner">
                        <div class="home-contact-grid">
                            <div class="home-contact-item">
                                <div class="home-contact-icon">
                                    <i class="fas fa-phone"></i>
                                </div>
                                <h4>Phone</h4>
                                <p>
                                    <a href="tel:01752257387">01752257387</a><br>
                                    <a href="tel:01725537792">01725537792</a><br>
                                    <a href="tel:01721258411">01721258411</a>
                                </p>
                            </div>
                            <div class="home-contact-item">
                                <div class="home-contact-icon">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <h4>Email</h4>
                                <p><a href="mailto:rsdc.rajshahi@gmail.com">rsdc.rajshahi@gmail.com</a></p>
                            </div>
                            <div class="home-contact-item">
                                <div class="home-contact-icon">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <h4>Address</h4>
                                <p>Shahmokhdum, Rajshahi</p>
                            </div>
                            <div class="home-contact-item">
                                <div class="home-contact-icon">
                                    <i class="fas fa-clock"></i>
                                </div>
                                <h4>Office Hour</h4>
                                <p>Sat- Thursday<br>9am to 5pm</p>
                            </div>
                        </div>
                    </div>
                    <div class="home-contact-action">
                        <div class="home-contact-action-text">
                            <strong>Have a question about our programs?</strong>
                            <span>Send us an email and our team will get back to you.</span>
                        </div>
                        <a href="mailto:rsdc.rajshahi@gmail.com" class="btn btn-primary">Contact Us Now</a>
                    </div>
                </div>
                <div class="home-map-card" aria-label="Rajshahi Skill Development Centre location map">
                    <div class="home-map-frame">
                        <iframe
                            src="https://www.google.com/maps?q=24.4085024,88.6087775&t=k&z=17&output=embed"
                            loading="lazy"
                            allowfullscreen
                            referrerpolicy="no-referrer-when-downgrade"
                            title="Rajshahi Skill Development Centre on Google Maps"></iframe>
                        <div class="home-map-pin" aria-hidden="true">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <a class="home-map-action"
                           href="https://www.google.com/maps/place/Rajshahi+Skill+Development+Centre/@24.4085073,88.6062026,17z/data=!3m1!4b1!4m6!3m5!1s0x39fbef0001281f53:0xa1b144988f3b785!8m2!3d24.4085024!4d88.6087775!16s%2Fg%2F11z20sqzln"
                           target="_blank"
                           rel="noopener">
                            <i class="fas fa-up-right-from-square"></i>
                            Open Map
                        </a>
                        <div class="home-map-label">
                            <span><i class="fas fa-location-dot"></i></span>
                            <div>
                                <strong>Rajshahi Skill Development Centre</strong>
                                <small>Shahmokhdum, Rajshahi</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </section>

    <!-- JavaScript for Carousel Functionality -->
    <script>
        // Hero Carousel
        let currentHeroSlide = 0;
        const heroSlides = document.querySelectorAll('.hero-slide');
        const heroIndicators = document.querySelectorAll('.indicator');

        function showHeroSlide(n) {
            if (!heroSlides.length || !heroIndicators.length) {
                return;
            }

            heroSlides[currentHeroSlide].classList.remove('active');
            heroIndicators[currentHeroSlide].classList.remove('active');

            currentHeroSlide = (n + heroSlides.length) % heroSlides.length;

            heroSlides[currentHeroSlide].classList.add('active');
            heroIndicators[currentHeroSlide].classList.add('active');
        }

        function changeSlide(direction) {
            showHeroSlide(currentHeroSlide + direction);
        }

        function currentSlide(n) {
            showHeroSlide(n - 1);
        }

        // Auto-play hero carousel
        if (heroSlides.length > 1 && heroIndicators.length > 1) {
            setInterval(() => {
                changeSlide(1);
            }, 5000);
        }

        // Testimonial Carousel
        let currentTestimonial = 0;
        const testimonialSlides = document.querySelectorAll('.testimonial-slide');

        function showTestimonial(n) {
            if (!testimonialSlides.length) {
                return;
            }

            testimonialSlides[currentTestimonial].classList.remove('active');
            currentTestimonial = (n + testimonialSlides.length) % testimonialSlides.length;
            testimonialSlides[currentTestimonial].classList.add('active');
        }

        function changeTestimonial(direction) {
            showTestimonial(currentTestimonial + direction);
        }

        // Auto-play testimonial carousel
        if (testimonialSlides.length > 1) {
            setInterval(() => {
                changeTestimonial(1);
            }, 4000);
        }

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Animation on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        // Observe elements for animation
        document.querySelectorAll('.fade-in, .slide-in-left, .slide-in-right').forEach(el => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(30px)';
            el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            observer.observe(el);
        });

        // Button loading effect
       /* document.querySelectorAll('.course-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const originalText = this.textContent;
                this.innerHTML = '<span class="loading"></span> Processing...';
                this.disabled = true;

                setTimeout(() => {
                    this.textContent = originalText;
                    this.disabled = false;
                }, 2000);
            });
        });*/

    </script>
    <script>
        $(document).ready(function(){
            $('.partner-carousel').owlCarousel({
                loop:true,
                margin:22,
                autoplay:true,
                autoplayTimeout:3000,
                autoplayHoverPause:true,
                nav:false,
                dots:false,
                responsive:{
                    0:{ items:2, margin:12 },
                    480:{ items:3, margin:16 },
                    768:{ items:4 },
                    992:{ items:6 }
                }
            });
        });
    </script>
@endsection
