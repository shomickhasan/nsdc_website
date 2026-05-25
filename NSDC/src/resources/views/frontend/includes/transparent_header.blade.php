<style>
    /* Transparent header on top of hero section */
    .header-style-transparent {
        position: absolute;
        top: 0;
        width: 100%;
        z-index: 9999; /* below mobile menu */
        background: transparent;
    }

    .header-style-transparent .transparent-header {
        background: transparent !important;
    }

    .header-style-transparent .main-box,
    .header-style-transparent .nav-outer,
    .header-style-transparent .header-lower {
        background: transparent !important;
    }

    /* Transparent menu centered */
    .header-style-transparent .nav-outer {
        flex: 1;
        display: flex;
        justify-content: center;
        margin: 0 auto;
    }

    .header-style-transparent .navigation {
        display: flex;
        gap: 25px;
        margin: 0 auto; /* only for transparent menu */
    }

    /* White menu items for transparent state */
    .header-style-transparent .navigation > li > a {
        color: #fff !important;
        transition: color 0.3s ease;
    }

    .header-style-transparent .navigation > li > a:hover {
        color: #fff !important;
        background: rgba(245, 122, 28, 0.95);
    }

    /* Dropdown styling */
    .header-style-transparent .navigation li.dropdown:hover > ul,
    .header-style-transparent .navigation li.dropdown:focus-within > ul {
        display: block;
    }

    .header-style-transparent .navigation li ul {
        display: none;
        position: absolute;
        background: #fff;
        padding: 8px;
        margin-top: 5px;
        border-radius: 8px;
        min-width: 190px;
        z-index: 1000;
        box-shadow: 0 18px 45px rgba(18, 25, 66, 0.18);
    }

    .header-style-transparent .navigation li ul li a {
        color: #242F6F !important;
        padding: 9px 12px;
        display: block;
        border-radius: 6px;
    }

    .header-style-transparent .navigation li ul li a:hover {
        color: #fff !important;
        background: #F57A1C;
    }

    /* Sticky header */
    .sticky-header {
        background: #F57A1C !important;
        position: fixed;
        top: 0;
        width: 100%;
        height: 70px;
        z-index: 9998;
        display: none;
        transition: all 0.3s ease;
    }

    .sticky-header .new-custom-logo {
        margin: 0 24px;
        position: relative;
        z-index: 2;
    }

    .sticky-header .new-custom-logo > a {
        width: 104px !important;
        height: 104px !important;
        padding: 8px !important;
        border-radius: 12px !important;
        background: #fff;
        border: 2px solid rgba(245, 122, 28, 0.9);
        overflow: hidden;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        box-shadow:
            0 18px 34px rgba(18, 25, 66, 0.20),
            0 0 0 rgba(245, 122, 28, 0);
        transform: translateY(30px) rotate(45deg) scale(0.92);
        opacity: 0;
        transition: border-color 0.35s ease, box-shadow 0.35s ease, transform 0.45s ease, opacity 0.35s ease;
    }

    .sticky-header .new-custom-logo > a::before {
        content: "";
        position: absolute;
        inset: 7px;
        border: 2px solid rgba(245, 122, 28, 0.28);
        border-radius: 8px;
        pointer-events: none;
    }

    .sticky-header .new-custom-logo img {
        width: 86px !important;
        height: 86px !important;
        max-width: 86px !important;
        max-height: 86px !important;
        border-radius: 0 !important;
        object-fit: contain;
        object-position: center;
        transform: rotate(-45deg);
        transition: transform 0.45s ease;
    }

    body.scrolled .sticky-header .new-custom-logo > a {
        border-color: rgba(245, 122, 28, 0.95);
        box-shadow:
            0 20px 38px rgba(18, 25, 66, 0.22),
            0 0 0 6px rgba(245, 122, 28, 0.12),
            0 0 28px rgba(245, 122, 28, 0.42);
        opacity: 1;
        transform: translateY(30px) rotate(45deg) scale(1);
        animation: stickyLogoGlow 2.4s ease-in-out infinite;
    }

    @keyframes stickyLogoGlow {
        0%, 100% {
            box-shadow:
                0 20px 38px rgba(18, 25, 66, 0.22),
                0 0 0 5px rgba(245, 122, 28, 0.10),
                0 0 20px rgba(245, 122, 28, 0.28);
        }
        50% {
            box-shadow:
                0 20px 38px rgba(18, 25, 66, 0.22),
                0 0 0 9px rgba(245, 122, 28, 0.16),
                0 0 34px rgba(245, 122, 28, 0.48);
        }
    }

    body.scrolled .sticky-header {
        display: block;
        animation: stickyHeaderDrop 0.35s ease both;
    }

    @keyframes stickyHeaderDrop {
        from {
            opacity: 0;
            transform: translateY(-100%);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    body.scrolled .header-style-transparent .transparent-header {
        opacity: 0;
        pointer-events: none;
        transition: opacity 0.3s ease;
    }

    .header-style-transparent .mobile-menu .menu-box {
        background: #242F6F;
    }

    .header-style-transparent .mobile-menu .menu-backdrop {
        background: rgba(18, 25, 66, 0.62);
    }

    .header-style-transparent .mobile-menu .close-btn {
        cursor: pointer;
        color: #fff;
        font-size: 24px;
        margin: 10px;
    }

    .header-style-transparent .mobile-menu .navigation li.open > ul {
        display: block;
    }

    /* Hide sticky header on mobile */
    @media (max-width: 1023px) {
        .header-style-transparent .header-lower {
            min-height: 58px;
        }

        .header-style-transparent .main-box {
            justify-content: flex-start !important;
            overflow-x: auto;
            overflow-y: visible;
            padding: 0 10px;
            scrollbar-width: none;
            -webkit-overflow-scrolling: touch;
        }

        .header-style-transparent .main-box::-webkit-scrollbar {
            display: none;
        }

        .header-style-transparent .outer-box,
        .header-style-transparent .mobile-menu {
            display: none !important;
        }

        .header-style-transparent .main-menu,
        .header-style-transparent .sticky-header .main-menu {
            display: flex !important;
            align-items: center;
            justify-content: center;
            width: 100%;
        }

        .header-style-transparent .main-menu ul.navigation {
            display: grid !important;
            grid-template-columns: repeat(3, max-content) 68px repeat(2, max-content);
            align-items: center;
            justify-content: center;
            gap: clamp(10px, 3.2vw, 18px) !important;
            min-width: 0;
            width: max-content;
            margin: 0 auto !important;
        }

        .header-style-transparent .navigation > li > a {
            min-height: 34px;
            padding: 7px 7px !important;
            font-size: 11px;
            white-space: nowrap;
        }

        .sticky-header {
            height: auto !important;
            min-height: 56px;
            overflow: visible;
        }

        body.scrolled .sticky-header {
            display: block !important;
        }

        body.scrolled .header-style-transparent .transparent-header {
            opacity: 1;
            pointer-events: auto;
        }

        .sticky-header .inner-container {
            height: 70px !important;
            min-height: 70px;
            justify-content: center !important;
            overflow-x: visible;
            overflow-y: visible;
            padding: 0 8px;
            scrollbar-width: none;
            -webkit-overflow-scrolling: touch;
        }

        .sticky-header .inner-container::-webkit-scrollbar {
            display: none;
        }

        .sticky-header .new-custom-logo {
            width: 68px;
            min-width: 68px;
            margin: 0 12px;
            flex: 0 0 68px;
        }

        .sticky-header .new-custom-logo > a,
        body.scrolled .sticky-header .new-custom-logo > a {
            width: 68px !important;
            height: 68px !important;
            padding: 7px !important;
            border-radius: 12px !important;
            opacity: 1;
            transform: translateY(32px) rotate(45deg) scale(0.94);
            animation: stickyLogoMobileGlow 2.4s ease-in-out infinite;
        }

        body.scrolled .sticky-header .new-custom-logo > a {
            transform: translateY(32px) rotate(45deg) scale(1);
        }

        .header-style-transparent .navigation li.dropdown.open > ul,
        .header-style-transparent .navigation li.dropdown:focus-within > ul,
        .header-style-transparent .navigation li.dropdown:hover > ul {
            display: block !important;
            position: fixed !important;
            top: 56px !important;
            left: 10px !important;
            right: 10px !important;
            width: auto !important;
            min-width: 0 !important;
            max-width: calc(100vw - 20px);
            z-index: 100000;
        }

        .sticky-header .new-custom-logo img {
            width: 52px !important;
            height: 52px !important;
            max-width: 52px !important;
            max-height: 52px !important;
            transform: rotate(-45deg);
        }

        @media (max-width: 430px) {
            .header-style-transparent .main-box {
                padding: 0 4px;
            }

            .header-style-transparent .main-menu ul.navigation {
                grid-template-columns: repeat(3, max-content) 56px repeat(2, max-content);
                gap: 7px !important;
            }

            .header-style-transparent .navigation > li > a {
                padding: 6px 7px !important;
                font-size: 12.5px;
            }

            .sticky-header .new-custom-logo {
                width: 56px;
                min-width: 56px;
                margin: 0 6px;
                flex-basis: 56px;
            }

            .sticky-header .new-custom-logo > a,
            body.scrolled .sticky-header .new-custom-logo > a {
                width: 58px !important;
                height: 58px !important;
                transform: translateY(30px) rotate(45deg) scale(1);
            }

            .sticky-header .new-custom-logo img {
                width: 44px !important;
                height: 44px !important;
                max-width: 44px !important;
                max-height: 44px !important;
            }
        }

        @keyframes stickyLogoMobileGlow {
            0%, 100% {
                box-shadow:
                    0 10px 22px rgba(18, 25, 66, 0.18),
                    0 0 0 4px rgba(245, 122, 28, 0.10),
                    0 0 16px rgba(245, 122, 28, 0.24);
            }
            50% {
                box-shadow:
                    0 12px 24px rgba(18, 25, 66, 0.20),
                    0 0 0 7px rgba(245, 122, 28, 0.15),
                    0 0 26px rgba(245, 122, 28, 0.38);
            }
        }

        /* Remove auto margin for mobile menu */
        .mobile-menu .navigation {
            margin: 0;
            flex-direction: column;
        }
    }
</style>

<header class="main-header header-style-transparent">

    <!-- Transparent Top Header -->
    <div class="header-lower transparent-header">
        <div class="main-box m-auto"
             style="display:flex; align-items:center; justify-content:center; width:100%;">

            <!-- Navigation (Centered) -->
            <nav class="nav main-menu">
                <ul class="navigation white-menu"
                    style="display:flex; align-items:center; gap:25px; margin:0; list-style:none;">
                    <li><a href="{{route('fHome')}}">Home</a></li>
                    <li><a href="{{ route('fHome') }}#employees">About</a></li>
                    <li class="dropdown">
                        <a href="#">Gallery</a>
                        <ul>
                            <li><a href="{{ route('gallery.pictures') }}">Pictures Gallery</a></li>
                            <li><a href="{{ route('gallery.videos') }}">Video Gallery</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ route('fHome') }}#courses">Our Courses</a></li>
                    <li><a href="{{ route('notices') }}">Notice</a></li>
                </ul>
            </nav>

            <!-- Mobile Toggler (Right) -->
            <div class="outer-box" style="position:absolute; right:20px;">
                <div class="mobile-nav-toggler">
                    <span class="icon lnr-icon-bars" style="color:white; font-size:24px; cursor:pointer;"></span>
                </div>
            </div>

        </div>
    </div>



    <!-- Mobile Menu -->
    <div class="mobile-menu">
        <div class="menu-backdrop"></div>
        <nav class="menu-box">
            <div class="upper-box">
                <div class="nav-logo">
                    <a href="{{ route('fHome') }}"><img class="frontend-brand-logo" src="{{asset('frontend/img/mobile-logo.png')}}" alt="NSDC" title="NSDC"></a>
                </div>
                <div class="close-btn">&times;</div>
            </div>
            <ul class="navigation clearfix"></ul>
        </nav>
    </div>

    <!-- ✅ Fixed Sticky Header -->
    <div class="sticky-header">
        <div class="auto-container">
            <div class="inner-container" style="height:70px; display:flex; align-items:center; justify-content:center;">

                <!-- Navigation -->
                <nav class="main-menu" style="display:flex; align-items:center; gap:25px;">

                    <ul class="navigation"
                        style="display:flex; align-items:center; gap:25px; margin:0; list-style:none; padding:0;">
                        <li><a href="{{route('fHome')}}" class="active-menu-two">Home</a></li>
                        <li><a href="{{ route('fHome') }}#employees">About</a></li>
                        <li class="dropdown">
                            <a href="#">Gallery</a>
                            <ul>
                                <li><a href="{{ route('gallery.pictures') }}">Pictures Gallery</a></li>
                                <li><a href="{{ route('gallery.videos') }}">Video Gallery</a></li>
                            </ul>
                        </li>

                        <!-- ✅ Logo in middle of menu -->
                        <li class="logo new-custom-logo" style="flex-shrink:0;">
                            <a href="{{ route('fHome') }}">
                                <img class="frontend-brand-logo"
                                     src="{{asset('frontend/img/logo.png')}}" alt="nsdc" title="nsdc">
                            </a>
                        </li>

                        <li><a href="{{ route('fHome') }}#courses">Our Courses</a></li>
                        <li><a href="{{ route('notices') }}">Notice</a></li>
                    </ul>

                </nav>

            </div>
        </div>
    </div>



</header>

<script>
    (function () {
        const setHomeStickyState = () => {
            document.body.classList.toggle('scrolled', window.scrollY > 100);
        };

        window.addEventListener('scroll', setHomeStickyState, { passive: true });
        window.addEventListener('resize', setHomeStickyState);
        setHomeStickyState();
    })();
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // 🔹 Prevent any clone/append from template JS
        // Override jQuery append/clone for .main-menu
        if (window.jQuery) {
            const originalAppend = jQuery.fn.append;
            jQuery.fn.append = function() {
                // যদি .mobile-menu এ main-menu append করতে চায়, block করে দাও
                if (this.is('.mobile-menu') && arguments[0].classList && arguments[0].classList.contains('main-menu')) {
                    return this; // ignore append
                }
                return originalAppend.apply(this, arguments);
            };
        }

        // 🔹 Mobile menu toggle
        const mobileMenu = document.querySelector('.mobile-menu');
        const toggler = document.querySelector('.mobile-nav-toggler');
        const closeBtn = mobileMenu ? mobileMenu.querySelector('.close-btn') : null;
        const backdrop = mobileMenu ? mobileMenu.querySelector('.menu-backdrop') : null;

        if (mobileMenu && toggler && closeBtn && backdrop) {
            toggler.addEventListener('click', () => mobileMenu.classList.add('active'));
            closeBtn.addEventListener('click', () => mobileMenu.classList.remove('active'));
            backdrop.addEventListener('click', () => mobileMenu.classList.remove('active'));

            mobileMenu.querySelectorAll('.dropdown > a').forEach(item => {
                item.addEventListener('click', e => {
                    e.preventDefault();
                    item.parentElement.classList.toggle('open');
                });
            });
        }
    });
</script>
