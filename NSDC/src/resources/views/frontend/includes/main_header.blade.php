<header class="main-header header-style-three" style="background: var(--secondary-color); box-shadow: 0 2px 20px rgba(0,0,0,0.1); position: relative; z-index: 999;">
    <div class="header-lower" style="padding: 15px 0;">
        <div class="main-box" style="display: flex; align-items: center; justify-content: space-between; max-width: 1200px; margin: 0 auto; padding: 0 20px;">
            <div class="logo-box">
                <div class="logo">
                    <a href="{{ route('fHome') }}" style="display: flex; align-items: center;">
                        <img class="header-logo" src="{{asset('image/uddokta.png')}}" alt="NSDC" title="NSDC" style="height: 60px; width: auto; transition: transform 0.3s ease;">
                    </a>
                </div>
            </div>

            <!--- Start Main Menu !---->
            <div class="nav-outer" style="display: flex; align-items: center;">
                <nav class="nav main-menu" style="margin-right: 30px;">
                    <ul class="navigation" style="display: flex; list-style: none; margin: 0; padding: 0; gap: 30px; align-items: center;">
                        <li><a href="/" style="color: white; text-decoration: none; font-weight: 500; padding: 10px 15px; border-radius: 5px; transition: all 0.3s ease;">Home</a></li>
                        <li><a href="#courses" style="color: white; text-decoration: none; font-weight: 500; padding: 10px 15px; border-radius: 5px; transition: all 0.3s ease;">Courses</a></li>
                        <li><a href="#testimonials" style="color: white; text-decoration: none; font-weight: 500; padding: 10px 15px; border-radius: 5px; transition: all 0.3s ease;">Testimonials</a></li>
                        <li><a href="#employees" style="color: white; text-decoration: none; font-weight: 500; padding: 10px 15px; border-radius: 5px; transition: all 0.3s ease;">Our Team</a></li>
                        <li><a href="#contact" style="color: white; text-decoration: none; font-weight: 500; padding: 10px 15px; border-radius: 5px; transition: all 0.3s ease;">Contact</a></li>
                    </ul>
                </nav>

                <div class="outer-box" style="display: flex; align-items: center; gap: 15px;">
                    <div class="outher_auth">
                        <a href="#" class="theme-btn btn-style-header" style="background: var(--primary-color); color: white; padding: 12px 25px; border-radius: 25px; text-decoration: none; font-weight: 600; display: flex; align-items: center; gap: 8px; transition: all 0.3s ease;">
                            <i class="icon fa fa-sign-in"></i>
                            <span class="btn-title">Login</span>
                        </a>
                    </div>
                    <div class="mobile-nav-toggler" onclick="toggleMobileMenu()" style="display: none; background: var(--primary-color); color: white; border: none; padding: 10px 15px; border-radius: 5px; cursor: pointer; font-size: 18px; transition: all 0.3s ease;">
                        <span class="icon lnr-icon-bars"></span>
                    </div>
                </div>
            </div>
            <!--- End Start Main Menu !---->
        </div>
    </div>
    <!--- start mobile Menu and logo !---->
    <div class="mobile-menu" style="position: fixed; top: 0; left: -100%; width: 100%; height: 100vh; background: linear-gradient(135deg, var(--secondary-color) 0%, #1a2560 100%); z-index: 9999; transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1); overflow-y: auto; box-shadow: -5px 0 30px rgba(0,0,0,0.3);">
        <div class="menu-backdrop" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.6); z-index: -1; backdrop-filter: blur(5px);"></div>
        <nav class="menu-box" style="padding: 0; height: 100%; display: flex; flex-direction: column; position: relative;">
            <!-- Header Section -->
            <div class="mobile-header" style="background: rgba(255,255,255,0.1); backdrop-filter: blur(10px); padding: 20px; border-bottom: 1px solid rgba(255,255,255,0.2);">
                <div class="upper-box" style="display: flex; justify-content: space-between; align-items: center;">
                    <div class="nav-logo">
                        <a href="/" style="display: flex; align-items: center; text-decoration: none;">
                            <img src="{{asset('image/uddokta.png')}}" alt="NSDC" title="NSDC" style="height: 45px; width: auto; margin-right: 10px;">
                            <div style="color: white;">
                                <h4 style="margin: 0; font-size: 18px; font-weight: 700; color: var(--primary-color);">NSDC</h4>
                                <p style="margin: 0; font-size: 12px; color: rgba(255,255,255,0.8);">Skills Development</p>
                            </div>
                        </a>
                    </div>
                    <div class="close-btn" onclick="closeMobileMenu()" style="background: linear-gradient(45deg, var(--primary-color), #e06a0a); color: white; border: none; padding: 12px; border-radius: 50%; cursor: pointer; font-size: 18px; width: 45px; height: 45px; display: flex; align-items: center; justify-content: center; transition: all 0.3s ease; box-shadow: 0 4px 15px rgba(245, 122, 28, 0.3);">
                        <i class="fa fa-times"></i>
                    </div>
                </div>
            </div>

            <!-- Navigation Section -->
            <div class="mobile-nav-section" style="flex: 1; padding: 30px 20px; overflow-y: auto;">
                <ul class="navigation clearfix" style="list-style: none; padding: 0; margin: 0;">
                    <li style="margin-bottom: 8px;">
                        <a href="/" class="mobile-nav-item" style="color: white; text-decoration: none; font-size: 16px; font-weight: 600; padding: 18px 25px; display: flex; align-items: center; border-radius: 12px; transition: all 0.3s ease; background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); backdrop-filter: blur(10px);">
                            <i class="fas fa-home" style="margin-right: 15px; font-size: 18px; color: var(--primary-color); width: 20px; text-align: center;"></i>
                            <span>Home</span>
                            <i class="fas fa-chevron-right" style="margin-left: auto; font-size: 12px; opacity: 0.7;"></i>
                        </a>
                    </li>
                    <li style="margin-bottom: 8px;">
                        <a href="#courses" class="mobile-nav-item" style="color: white; text-decoration: none; font-size: 16px; font-weight: 600; padding: 18px 25px; display: flex; align-items: center; border-radius: 12px; transition: all 0.3s ease; background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); backdrop-filter: blur(10px);">
                            <i class="fas fa-graduation-cap" style="margin-right: 15px; font-size: 18px; color: var(--primary-color); width: 20px; text-align: center;"></i>
                            <span>Courses</span>
                            <i class="fas fa-chevron-right" style="margin-left: auto; font-size: 12px; opacity: 0.7;"></i>
                        </a>
                    </li>
                    <li style="margin-bottom: 8px;">
                        <a href="#testimonials" class="mobile-nav-item" style="color: white; text-decoration: none; font-size: 16px; font-weight: 600; padding: 18px 25px; display: flex; align-items: center; border-radius: 12px; transition: all 0.3s ease; background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); backdrop-filter: blur(10px);">
                            <i class="fas fa-quote-left" style="margin-right: 15px; font-size: 18px; color: var(--primary-color); width: 20px; text-align: center;"></i>
                            <span>Testimonials</span>
                            <i class="fas fa-chevron-right" style="margin-left: auto; font-size: 12px; opacity: 0.7;"></i>
                        </a>
                    </li>
                    <li style="margin-bottom: 8px;">
                        <a href="#employees" class="mobile-nav-item" style="color: white; text-decoration: none; font-size: 16px; font-weight: 600; padding: 18px 25px; display: flex; align-items: center; border-radius: 12px; transition: all 0.3s ease; background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); backdrop-filter: blur(10px);">
                            <i class="fas fa-users" style="margin-right: 15px; font-size: 18px; color: var(--primary-color); width: 20px; text-align: center;"></i>
                            <span>Our Team</span>
                            <i class="fas fa-chevron-right" style="margin-left: auto; font-size: 12px; opacity: 0.7;"></i>
                        </a>
                    </li>
                    <li style="margin-bottom: 8px;">
                        <a href="#contact" class="mobile-nav-item" style="color: white; text-decoration: none; font-size: 16px; font-weight: 600; padding: 18px 25px; display: flex; align-items: center; border-radius: 12px; transition: all 0.3s ease; background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); backdrop-filter: blur(10px);">
                            <i class="fas fa-envelope" style="margin-right: 15px; font-size: 18px; color: var(--primary-color); width: 20px; text-align: center;"></i>
                            <span>Contact</span>
                            <i class="fas fa-chevron-right" style="margin-left: auto; font-size: 12px; opacity: 0.7;"></i>
                        </a>
                    </li>
            </ul>

                <!-- Login Button -->
                <div style="margin: 30px 0; padding: 0 5px;">
                    <a href="#" class="mobile-login-btn" style="background: linear-gradient(45deg, var(--primary-color), #e06a0a); color: white; text-decoration: none; font-size: 16px; font-weight: 600; padding: 18px 25px; display: flex; align-items: center; justify-content: center; border-radius: 12px; transition: all 0.3s ease; box-shadow: 0 4px 15px rgba(245, 122, 28, 0.3);">
                        <i class="fas fa-sign-in-alt" style="margin-right: 10px; font-size: 18px;"></i>
                        <span>Login / Register</span>
                    </a>
                </div>
            </div>

            <!-- Contact Section -->
            <div class="mobile-contact-section" style="background: rgba(255,255,255,0.1); backdrop-filter: blur(10px); padding: 25px 20px; border-top: 1px solid rgba(255,255,255,0.2);">
                <h5 style="color: var(--primary-color); font-weight: 600; margin-bottom: 20px; font-size: 16px; text-align: center;">Get In Touch</h5>
                <ul class="contact-list-one" style="list-style: none; padding: 0; margin: 0;">
                    <li style="margin-bottom: 15px;">
                        <div class="contact-info-box" style="display: flex; align-items: center; gap: 15px; color: white; padding: 15px; background: rgba(255,255,255,0.05); border-radius: 10px; border: 1px solid rgba(255,255,255,0.1);">
                            <div style="background: linear-gradient(45deg, var(--primary-color), #e06a0a); color: white; width: 45px; height: 45px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 18px; box-shadow: 0 4px 15px rgba(245, 122, 28, 0.3);">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div>
                                <span class="title" style="font-weight: 600; display: block; margin-bottom: 5px; color: var(--primary-color); font-size: 14px;">Call Now</span>
                                <a href="tel:+8801234567890" style="color: white; text-decoration: none; font-size: 14px; font-weight: 500;">+880 1234 567890</a>
                            </div>
                        </div>
                    </li>
                    <li style="margin-bottom: 15px;">
                        <div class="contact-info-box" style="display: flex; align-items: center; gap: 15px; color: white; padding: 15px; background: rgba(255,255,255,0.05); border-radius: 10px; border: 1px solid rgba(255,255,255,0.1);">
                            <div style="background: linear-gradient(45deg, var(--primary-color), #e06a0a); color: white; width: 45px; height: 45px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 18px; box-shadow: 0 4px 15px rgba(245, 122, 28, 0.3);">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div>
                                <span class="title" style="font-weight: 600; display: block; margin-bottom: 5px; color: var(--primary-color); font-size: 14px;">Send Email</span>
                                <a href="mailto:info@nsdc.gov.bd" style="color: white; text-decoration: none; font-size: 14px; font-weight: 500;">info@nsdc.gov.bd</a>
                            </div>
                    </div>
                </li>
                    <li>
                        <div class="contact-info-box" style="display: flex; align-items: center; gap: 15px; color: white; padding: 15px; background: rgba(255,255,255,0.05); border-radius: 10px; border: 1px solid rgba(255,255,255,0.1);">
                            <div style="background: linear-gradient(45deg, var(--primary-color), #e06a0a); color: white; width: 45px; height: 45px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 18px; box-shadow: 0 4px 15px rgba(245, 122, 28, 0.3);">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div>
                                <span class="title" style="font-weight: 600; display: block; margin-bottom: 5px; color: var(--primary-color); font-size: 14px;">Address</span>
                                <span style="color: white; font-size: 14px; font-weight: 500;">Dhaka, Bangladesh</span>
                            </div>
                    </div>
                </li>
            </ul>
            </div>
        </nav>
    </div>
    <!--- end start mobile Menu and logo !---->
    <div class="search-popup">
        <span class="search-back-drop"></span>
        <button class="close-search"><span class="fa fa-times sicon"></span></button>
        <div class="search-inner">
            <form method="post" action="">
                <div class="form-group">
                    <input type="search" name="search-field" value placeholder="Search..." required>
                    <button type="submit"><i class="fa fa-search"></i></button>
                </div>
            </form>
        </div>
    </div>
</header>

