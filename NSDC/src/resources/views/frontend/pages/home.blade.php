@extends('frontend.template.template')

@section('ftitle', 'NSDC - National Skills Development Corporation')

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
        .hero-text h1 {
            color: #fff;
        }

        .hero-text p {
            font-size: 1.3rem;
            margin-bottom: 30px;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
            opacity: 0.9;
            color: #fff;
        }
        .carousel-indicators {
            position: absolute;
            bottom: 30px;
            left: 36% !important;
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

    </style>
@endpush
@section('content')
    <!-- Hero Section with Carousel -->
    <section class="hero-section">
        <div class="hero-carousel">
            <!-- Slide 1 -->
            <div class="hero-slide active" style="background-image: url('https://images.unsplash.com/photo-1521737604893-d14cc237f11d?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80');">
                <div class="hero-content">
                    <div class="hero-text">
                        <h1>Empowering Entrepreneurs</h1>
                        <p>Join thousands of successful entrepreneurs who have transformed their businesses with our comprehensive skill development programs.</p>
                        <div class="hero-buttons">
                            <a href="#courses" class="btn btn-primary">Explore Courses</a>
                            <a href="#contact" class="btn btn-outline">Get Started</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="hero-slide" style="background-image: url('https://images.unsplash.com/photo-1551434678-e076c223a692?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80');">
                <div class="hero-content">
                    <div class="hero-text">
                        <h1>Professional Training</h1>
                        <p>Master the skills you need to succeed in today's competitive business environment with our expert-led training programs.</p>
                        <div class="hero-buttons">
                            <a href="#courses" class="btn btn-primary">View Programs</a>
                            <a href="#testimonials" class="btn btn-outline">See Success Stories</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="hero-slide" style="background-image: url('https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80');">
                <div class="hero-content">
                    <div class="hero-text">
                        <h1>Expert Mentorship</h1>
                        <p>Learn from industry experts and successful entrepreneurs who will guide you on your journey to business success.</p>
                        <div class="hero-buttons">
                            <a href="#employees" class="btn btn-primary">Meet Our Team</a>
                            <a href="#contact" class="btn btn-outline">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
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
            <span class="indicator active" onclick="currentSlide(1)"></span>
            <span class="indicator" onclick="currentSlide(2)"></span>
            <span class="indicator" onclick="currentSlide(3)"></span>
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
                <!-- Course 1 -->
                <div class="course-card fade-in">
                    <div class="course-image" style="background-image: url('https://images.unsplash.com/photo-1552664730-d307ca884978?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80');">
                        <div class="course-overlay">
                            <i class="fas fa-play-circle" style="font-size: 3rem; color: white;"></i>
                        </div>
                    </div>
                    <div class="course-content">
                        <h3 class="course-title">Digital Marketing Mastery</h3>
                        <div class="course-duration">Duration: 12 Weeks</div>
                        <p class="course-description">Learn the latest digital marketing strategies, social media management, SEO, and online advertising techniques to grow your business.</p>
                        <button class="course-btn">Apply Now</button>
                    </div>
                </div>

                <!-- Course 2 -->
                <div class="course-card fade-in">
                    <div class="course-image" style="background-image: url('https://images.unsplash.com/photo-1554224155-6726b3ff858f?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80');">
                        <div class="course-overlay">
                            <i class="fas fa-chart-line" style="font-size: 3rem; color: white;"></i>
                        </div>
                    </div>
                    <div class="course-content">
                        <h3 class="course-title">Business Analytics</h3>
                        <div class="course-duration">Duration: 10 Weeks</div>
                        <p class="course-description">Master data analysis, business intelligence, and decision-making tools to drive your business forward with data-driven insights.</p>
                        <button class="course-btn">Apply Now</button>
                    </div>
                </div>

                <!-- Course 3 -->
                <div class="course-card fade-in">
                    <div class="course-image" style="background-image: url('https://images.unsplash.com/photo-1559136555-9303baea8ebd?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80');">
                        <div class="course-overlay">
                            <i class="fas fa-users" style="font-size: 3rem; color: white;"></i>
                        </div>
                    </div>
                    <div class="course-content">
                        <h3 class="course-title">Leadership & Management</h3>
                        <div class="course-duration">Duration: 8 Weeks</div>
                        <p class="course-description">Develop essential leadership skills, team management, and strategic thinking to lead your organization to success.</p>
                        <button class="course-btn">Apply Now</button>
                    </div>
                </div>

                <!-- Course 4 -->
                <div class="course-card fade-in">
                    <div class="course-image" style="background-image: url('https://images.unsplash.com/photo-1553877522-43269d4ea984?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80');">
                        <div class="course-overlay">
                            <i class="fas fa-laptop-code" style="font-size: 3rem; color: white;"></i>
                        </div>
                    </div>
                    <div class="course-content">
                        <h3 class="course-title">E-commerce Development</h3>
                        <div class="course-duration">Duration: 14 Weeks</div>
                        <p class="course-description">Build and manage your online store with modern e-commerce platforms, payment systems, and customer experience optimization.</p>
                        <button class="course-btn">Apply Now</button>
                    </div>
                </div>

                <!-- Course 5 -->
                <div class="course-card fade-in">
                    <div class="course-image" style="background-image: url('https://images.unsplash.com/photo-1559136555-9303baea8ebd?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80');">
                        <div class="course-overlay">
                            <i class="fas fa-handshake" style="font-size: 3rem; color: white;"></i>
                        </div>
                    </div>
                    <div class="course-content">
                        <h3 class="course-title">Financial Management</h3>
                        <div class="course-duration">Duration: 10 Weeks</div>
                        <p class="course-description">Learn financial planning, budgeting, investment strategies, and risk management to ensure your business's financial health.</p>
                        <button class="course-btn">Apply Now</button>
                    </div>
                </div>

                <!-- Course 6 -->
                <div class="course-card fade-in">
                    <div class="course-image" style="background-image: url('https://images.unsplash.com/photo-1552664730-d307ca884978?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80');">
                        <div class="course-overlay">
                            <i class="fas fa-lightbulb" style="font-size: 3rem; color: white;"></i>
                        </div>
                    </div>
                    <div class="course-content">
                        <h3 class="course-title">Innovation & Creativity</h3>
                        <div class="course-duration">Duration: 6 Weeks</div>
                        <p class="course-description">Unlock your creative potential and learn innovation methodologies to develop unique solutions and competitive advantages.</p>
                        <button class="course-btn">Apply Now</button>
                    </div>
                </div>
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
                <div class="partner-logo"><img src="{{asset('image/partner.jpg')}}" alt="Partner 1"></div>
                <div class="partner-logo"><img src="{{asset('image/partner.jpg')}}" alt="Partner 1"></div>
                <div class="partner-logo"><img src="{{asset('image/partner.jpg')}}" alt="Partner 1"></div>
                <div class="partner-logo"><img src="{{asset('image/partner.jpg')}}" alt="Partner 1"></div>
                <div class="partner-logo"><img src="{{asset('image/partner.jpg')}}" alt="Partner 1"></div>
                <div class="partner-logo"><img src="{{asset('image/partner.jpg')}}" alt="Partner 1"></div>
                <div class="partner-logo"><img src="{{asset('image/partner.jpg')}}" alt="Partner 1"></div>
                <div class="partner-logo"><img src="{{asset('image/partner.jpg')}}" alt="Partner 1"></div>
                <div class="partner-logo"><img src="{{asset('image/partner.jpg')}}" alt="Partner 1"></div>
                <div class="partner-logo"><img src="{{asset('image/partner.jpg')}}" alt="Partner 1"></div>
                <div class="partner-logo"><img src="{{asset('image/partner.jpg')}}" alt="Partner 1"></div>
                <div class="partner-logo"><img src="{{asset('image/partner.jpg')}}" alt="Partner 1"></div>
                <div class="partner-logo"><img src="{{asset('image/partner.jpg')}}" alt="Partner 1"></div>

            </div>
        </div>
    </section>

    <!-- Our Employees Section -->
    <section id="employees" class="section employees-section">
        <div class="container">
            <div class="section-title">
                <h2>Our Expert Team</h2>
                <p>Meet our experienced instructors and mentors who are dedicated to your success</p>
        </div>

            <div class="employees-grid">
                <!-- Employee 1 -->
                <div class="employee-card slide-in-left">
                    <div class="employee-image" style="background-image: url('https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=150&q=80');"></div>
                    <h3 class="employee-name">Dr. Ahmed Hassan</h3>
                    <div class="employee-designation">Senior Business Consultant</div>
                    <div class="employee-contact">ahmed.hassan@nsdc.gov.bd</div>
                </div>

                <!-- Employee 2 -->
                <div class="employee-card slide-in-left">
                    <div class="employee-image" style="background-image: url('https://images.unsplash.com/photo-1494790108755-2616b612b786?ixlib=rb-4.0.3&auto=format&fit=crop&w=150&q=80');"></div>
                    <h3 class="employee-name">Fatima Rahman</h3>
                    <div class="employee-designation">Digital Marketing Expert</div>
                    <div class="employee-contact">fatima.rahman@nsdc.gov.bd</div>
                </div>

                <!-- Employee 3 -->
                <div class="employee-card slide-in-right">
                    <div class="employee-image" style="background-image: url('https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.0.3&auto=format&fit=crop&w=150&q=80');"></div>
                    <h3 class="employee-name">Mohammad Ali</h3>
                    <div class="employee-designation">Financial Advisor</div>
                    <div class="employee-contact">mohammad.ali@nsdc.gov.bd</div>
                </div>

                <!-- Employee 4 -->
                <div class="employee-card slide-in-right">
                    <div class="employee-image" style="background-image: url('https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-4.0.3&auto=format&fit=crop&w=150&q=80');"></div>
                    <h3 class="employee-name">Ayesha Khan</h3>
                    <div class="employee-designation">Leadership Coach</div>
                    <div class="employee-contact">ayesha.khan@nsdc.gov.bd</div>
                </div>

                <!-- Employee 5 -->
                <div class="employee-card slide-in-left">
                    <div class="employee-image" style="background-image: url('https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-4.0.3&auto=format&fit=crop&w=150&q=80');"></div>
                    <h3 class="employee-name">Karim Uddin</h3>
                    <div class="employee-designation">E-commerce Specialist</div>
                    <div class="employee-contact">karim.uddin@nsdc.gov.bd</div>
                </div>

                <!-- Employee 6 -->
                <div class="employee-card slide-in-right">
                    <div class="employee-image" style="background-image: url('https://images.unsplash.com/photo-1544005313-94ddf0286df2?ixlib=rb-4.0.3&auto=format&fit=crop&w=150&q=80');"></div>
                    <h3 class="employee-name">Nusrat Jahan</h3>
                    <div class="employee-designation">Innovation Consultant</div>
                    <div class="employee-contact">nusrat.jahan@nsdc.gov.bd</div>
                </div>
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

            <div style="max-width: 800px; margin: 0 auto; text-align: center;">
                <div style="background: white; padding: 40px; border-radius: 15px; box-shadow: var(--shadow);">
                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 30px; margin-bottom: 30px;">
                        <div>
                            <div style="background: var(--primary-color); color: white; width: 60px; height: 60px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 15px; font-size: 1.5rem;">
                                <i class="fas fa-phone"></i>
                            </div>
                            <h4 style="color: var(--secondary-color); margin-bottom: 10px;">Phone</h4>
                            <p style="color: var(--text-gray);">+880 1234 567890</p>
                        </div>
                        <div>
                            <div style="background: var(--primary-color); color: white; width: 60px; height: 60px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 15px; font-size: 1.5rem;">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <h4 style="color: var(--secondary-color); margin-bottom: 10px;">Email</h4>
                            <p style="color: var(--text-gray);">info@nsdc.gov.bd</p>
                        </div>
                        <div>
                            <div style="background: var(--primary-color); color: white; width: 60px; height: 60px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 15px; font-size: 1.5rem;">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <h4 style="color: var(--secondary-color); margin-bottom: 10px;">Address</h4>
                            <p style="color: var(--text-gray);">Dhaka, Bangladesh</p>
                        </div>
                    </div>
                    <a href="mailto:info@nsdc.gov.bd" class="btn btn-primary" style="display: inline-block;">Contact Us Now</a>
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
        setInterval(() => {
            changeSlide(1);
        }, 5000);

        // Testimonial Carousel
        let currentTestimonial = 0;
        const testimonialSlides = document.querySelectorAll('.testimonial-slide');

        function showTestimonial(n) {
            testimonialSlides[currentTestimonial].classList.remove('active');
            currentTestimonial = (n + testimonialSlides.length) % testimonialSlides.length;
            testimonialSlides[currentTestimonial].classList.add('active');
        }

        function changeTestimonial(direction) {
            showTestimonial(currentTestimonial + direction);
        }

        // Auto-play testimonial carousel
        setInterval(() => {
            changeTestimonial(1);
        }, 4000);

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
        document.querySelectorAll('.course-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const originalText = this.textContent;
                this.innerHTML = '<span class="loading"></span> Processing...';
                this.disabled = true;

                setTimeout(() => {
                    this.textContent = originalText;
                    this.disabled = false;
                }, 2000);
            });
        });

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
