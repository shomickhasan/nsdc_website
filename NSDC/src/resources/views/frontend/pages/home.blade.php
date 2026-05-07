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
            padding: 120px 20px 80px;
        }

        .hero-text {
            max-width: 820px;
            margin: 0 auto;
        }

        .hero-text h1 {
            color: #fff;
            font-size: clamp(2rem, 5vw, 4rem);
            line-height: 1.12;
            margin-bottom: 18px;
        }

        .hero-text p {
            font-size: clamp(1rem, 2.2vw, 1.3rem);
            margin-bottom: 30px;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
            opacity: 0.9;
            color: #fff;
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
            background: #111;
            padding: 50px 0;
        }

        .partner-section .partner-logo {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 15px;
            filter: grayscale(0.3);
            transition: filter 0.3s ease;
        }

        .partner-section .partner-logo img {
            max-width: 100px;
            max-height: 60px;
        }

        .partner-section .partner-logo:hover {
            filter: grayscale(0);
        }

        .home-contact-card {
            background: white;
            padding: 40px;
            border-radius: 8px;
            box-shadow: var(--shadow);
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

        @media (max-width: 991px) {
            .hero-section {
                min-height: 560px;
            }

            .courses-grid,
            .employees-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .home-contact-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 575px) {
            .hero-section {
                min-height: 520px;
            }

            .hero-content {
                padding: 110px 16px 70px;
            }

            .hero-buttons {
                gap: 12px;
            }

            .hero-buttons .btn {
                width: 100%;
                max-width: 260px;
                padding: 13px 20px;
            }

            .courses-grid,
            .employees-grid,
            .home-contact-grid {
                grid-template-columns: 1fr;
            }

            .home-contact-card {
                padding: 28px 18px;
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
                            <p class="course-description">{{ \Illuminate\Support\Str::words($data->short_des, 35, '...') }}</p>
                            <button class="course-btn">
                                <a href="{{route('course_details',$data->slug)}}" class="text-white font-weight-700">Apply Now</a>
                            </button>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Partner Section -->
    <section id="partners" class="section partner-section" style="background:#242F6F; padding:50px 0;">
        <div class="container">
            <div class="section-title text-center mb-5">
                <h2 style="color:white;">Our Partners</h2>
                <p style="color: rgba(255,255,255,0.7);">Companies and organizations we proudly collaborate with</p>
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

            <div style="max-width: 1040px; margin: 0 auto; text-align: center;">
                <div class="home-contact-card">
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
                    <a href="mailto:rsdc.rajshahi@gmail.com" class="btn btn-primary" style="display: inline-block;">Contact Us Now</a>
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
                margin:30,
                autoplay:true,
                autoplayTimeout:3000,
                autoplayHoverPause:true,
                nav:false,
                dots:false,
                responsive:{
                    0:{ items:2 },
                    480:{ items:3 },
                    768:{ items:4 },
                    992:{ items:6 }
                }
            });
        });
    </script>
@endsection
