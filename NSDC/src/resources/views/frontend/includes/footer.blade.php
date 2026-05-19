<!-- Professional Footer -->
@php
    $footerCourses = \App\Models\Backend\Course::where('status', 1)->orderBy('order', 'asc')->get();
@endphp
<footer class="main-footer" style="background: var(--secondary-color); color: white; padding: 60px 0 20px;">
    <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 20px;">
        <!-- Main Footer Content -->
        <div class="row" style="margin-bottom: 40px;">
            <!-- Company Info -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="footer-widget">
                    <div class="footer-logo" style="margin-bottom: 20px;">
                        <a href="{{ route('fHome') }}" style="width: 86px; height: 86px; border-radius: 50%; background: #fff; padding: 8px; display: inline-flex; align-items: center; justify-content: center; box-shadow: 0 12px 28px rgba(0,0,0,0.22); overflow: hidden;">
                            <img src="{{asset('frontend/img/mobile-logo.png')}}" alt="RSDC" style="width: 70px; height: 70px; object-fit: contain; border-radius: 50%;">
                        </a>
                    </div>
                    <h5 style="color: var(--primary-color); font-weight: 600; margin-bottom: 15px;">Rajshahi Skill Development Center</h5>
                    <p style="color: rgba(255,255,255,0.8); line-height: 1.6; margin-bottom: 20px;">
                        Empowering entrepreneurs and fostering economic growth through comprehensive skill development programs and monitoring systems.
                    </p>
                    <div class="social-links" style="display: flex; gap: 15px;">
                        <a href="https://www.facebook.com/share/1bWUxMT9mt/" target="_blank" rel="noopener" style="background: var(--primary-color); color: white; width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; text-decoration: none; transition: all 0.3s ease;">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" style="background: var(--primary-color); color: white; width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; text-decoration: none; transition: all 0.3s ease;">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" style="background: var(--primary-color); color: white; width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; text-decoration: none; transition: all 0.3s ease;">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="#" style="background: var(--primary-color); color: white; width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; text-decoration: none; transition: all 0.3s ease;">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="col-lg-2 col-md-6 mb-4">
                <div class="footer-widget">
                    <h5 style="color: var(--primary-color); font-weight: 600; margin-bottom: 20px;">Quick Links</h5>
                    <ul style="list-style: none; padding: 0; margin: 0;">
                        <li style="margin-bottom: 10px;">
                            <a href="{{ route('fHome') }}" style="color: rgba(255,255,255,0.8); text-decoration: none; transition: color 0.3s ease;">Home</a>
                        </li>
                        <li style="margin-bottom: 10px;">
                            <a href="{{ route('fHome') }}#courses" style="color: rgba(255,255,255,0.8); text-decoration: none; transition: color 0.3s ease;">Courses</a>
                        </li>
                        <li style="margin-bottom: 10px;">
                            <a href="{{ route('fHome') }}#partners" style="color: rgba(255,255,255,0.8); text-decoration: none; transition: color 0.3s ease;">Partners</a>
                        </li>
                        <li style="margin-bottom: 10px;">
                            <a href="{{ route('gallery.pictures') }}" style="color: rgba(255,255,255,0.8); text-decoration: none; transition: color 0.3s ease;">Pictures Gallery</a>
                        </li>
                        <li style="margin-bottom: 10px;">
                            <a href="{{ route('gallery.videos') }}" style="color: rgba(255,255,255,0.8); text-decoration: none; transition: color 0.3s ease;">Video Gallery</a>
                        </li>
                        <li style="margin-bottom: 10px;">
                            <a href="{{ route('fHome') }}#employees" style="color: rgba(255,255,255,0.8); text-decoration: none; transition: color 0.3s ease;">Our Team</a>
                        </li>
                        <li style="margin-bottom: 10px;">
                            <a href="{{ route('notices') }}" style="color: rgba(255,255,255,0.8); text-decoration: none; transition: color 0.3s ease;">Notice</a>
                        </li>
                        <li style="margin-bottom: 10px;">
                            <a href="{{ route('fHome') }}#contact" style="color: rgba(255,255,255,0.8); text-decoration: none; transition: color 0.3s ease;">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Services -->
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="footer-widget">
                    <h5 style="color: var(--primary-color); font-weight: 600; margin-bottom: 20px;">Our Course</h5>
                    <ul style="list-style: none; padding: 0; margin: 0;">
                        @forelse($footerCourses as $footerCourse)
                            <li style="margin-bottom: 10px;">
                                <a href="{{ route('course_details', $footerCourse->slug) }}" style="color: rgba(255,255,255,0.8); text-decoration: none; transition: color 0.3s ease;">{{ $footerCourse->title }}</a>
                            </li>
                        @empty
                            <li style="color: rgba(255,255,255,0.8);">No courses available</li>
                        @endforelse
                    </ul>
                </div>
            </div>

            <!-- Contact Info -->
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="footer-widget">
                    <h5 style="color: var(--primary-color); font-weight: 600; margin-bottom: 20px;">Contact Info</h5>
                    <div class="contact-info">
                        <div style="display: flex; align-items: center; margin-bottom: 15px;">
                            <i class="fas fa-map-marker-alt" style="color: var(--primary-color); margin-right: 15px; font-size: 18px;"></i>
                            <div>
                                <p style="margin: 0; color: rgba(255,255,255,0.8);">Shahmokhdum, Rajshahi</p>
                            </div>
                        </div>
                        <div style="display: flex; align-items: flex-start; margin-bottom: 15px;">
                            <i class="fas fa-phone" style="color: var(--primary-color); margin-right: 15px; font-size: 18px;"></i>
                            <div>
                                <a href="tel:01752257387" style="color: rgba(255,255,255,0.8); text-decoration: none;">01752257387</a><br>
                                <a href="tel:01725537792" style="color: rgba(255,255,255,0.8); text-decoration: none;">01725537792</a><br>
                                <a href="tel:01721258411" style="color: rgba(255,255,255,0.8); text-decoration: none;">01721258411</a>
                            </div>
                        </div>
                        <div style="display: flex; align-items: center; margin-bottom: 15px;">
                            <i class="fas fa-envelope" style="color: var(--primary-color); margin-right: 15px; font-size: 18px;"></i>
                            <div>
                                <a href="mailto:rsdc.rajshahi@gmail.com" style="color: rgba(255,255,255,0.8); text-decoration: none;">rsdc.rajshahi@gmail.com</a>
                            </div>
                        </div>
                        <div style="display: flex; align-items: center;">
                            <i class="fas fa-clock" style="color: var(--primary-color); margin-right: 15px; font-size: 18px;"></i>
                            <div>
                                <p style="margin: 0; color: rgba(255,255,255,0.8);">Sat- Thursday 9am to 5pm</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Newsletter Subscription -->
        <div class="newsletter-section" style="background: rgba(255,255,255,0.1); padding: 30px; border-radius: 10px; margin-bottom: 30px;">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12 mb-3">
                    <h5 style="color: var(--primary-color); font-weight: 600; margin-bottom: 10px;">Stay Updated</h5>
                    <p style="color: rgba(255,255,255,0.8); margin: 0;">Subscribe to our newsletter for the latest updates on courses and programs.</p>
                </div>
                <div class="col-lg-6 col-md-12">
                    <form id="newsletter_form" style="display: flex; gap: 10px;">
                        <input type="email" name="email" placeholder="Enter your email" required style="flex: 1; padding: 12px 15px; border: none; border-radius: 5px; font-size: 14px;">
                        <button type="submit" class="btn" style="background: var(--primary-color); color: white; border: none; padding: 12px 25px; border-radius: 5px; font-weight: 600; cursor: pointer; transition: all 0.3s ease;">
                            Subscribe
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Copyright -->
        <div class="copyright-section" style="border-top: 1px solid rgba(255,255,255,0.1); padding-top: 20px;">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12 mb-2">
                    <p style="margin: 0; color: rgba(255,255,255,0.8);">
                        &copy; {{ date('Y') }} Rajshahi Skill Development Center. All rights reserved.
                    </p>
                </div>
                <div class="col-lg-6 col-md-12 text-lg-end text-md-start">
                    <p style="margin: 0; color: rgba(255,255,255,0.8);">
                        Developed by <a href="https://github.com/shomickhasan" style="color: var(--primary-color); text-decoration: none;">Shomick Hasan</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Consultation Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Send Message</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="consultationId" action="#" method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Name:</label>
                        <input type="text" class="form-control" name="name" id="recipient-name">
                    </div>
                    <div class="mb-3">
                        <label for="recipient-id" class="col-form-label">Phone Number:</label>
                        <input type="text" class="form-control" id="recipient-id" name="phone">
                    </div>
                    <div class="mb-3">
                        <label for="recipient-email" class="col-form-label">Email:</label>
                        <input type="email" class="form-control" id="recipient-email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="customize-select" class="col-form-label">Do you want to customise the itinerary?</label>
                        <select class="form-select form-control" id="customize-select" name="customize">
                            <option selected value="">Select One</option>
                            <option value="1">YES</option>
                            <option value="2">NO</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Message:</label>
                        <textarea class="form-control" id="message-text" name="message"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="btn-box animate-3">
                        <a href="#" class="theme-btn btn-style-two" data-bs-dismiss="modal">
                            <span class="btn-title">Close</span>
                        </a>
                        <button type="submit" class="theme-btn btn-style-one">
                            <span class="btn-title">Send</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Subscribe Modal -->
<div class="modal fade" id="subsribeModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
aria-labelledby="subsribeModelLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header error-header">
                <h5 class="modal-title" id="subsribeModelLabel">Error</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Error messages will go here -->
                <p>Something went wrong. Please try again.</p>
            </div>
            <div class="modal-footer">
                <a href="#" class="theme-btn btn-style-two" data-bs-dismiss="modal">
                    <span class="btn-title">Close</span>
                </a>
            </div>
        </div>
    </div>
</div>
