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
        color: #242F6F !important;
    }

    /* Dropdown styling */
    .header-style-transparent .navigation li.dropdown:hover > ul {
        display: block;
    }

    .header-style-transparent .navigation li ul {
        display: none;
        position: absolute;
        background: #F57A1C;
        padding: 10px 0;
        margin-top: 5px;
        border-radius: 4px;
        min-width: 150px;
        z-index: 1000;
    }

    .header-style-transparent .navigation li ul li a {
        color: #fff !important;
        padding: 8px 15px;
        display: block;
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

    body.scrolled .sticky-header {
        display: block;
    }

    body.scrolled .header-style-transparent .transparent-header {
        opacity: 0;
        pointer-events: none;
        transition: opacity 0.3s ease;
    }

    /* Mobile menu */
    .mobile-menu {
        position: fixed;
        top: 0;
        right: -100%;
        width: 280px;
        height: 100%;
        background: #F57A1C;
        z-index: 10001; /* highest so menu items are clickable */
        transition: right 0.3s ease;
    }

    .mobile-menu.active {
        right: 0;
    }

    /* Backdrop behind menu */
    .mobile-menu .menu-backdrop {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(245, 122, 28, 0.1);
        z-index: 10000; /* behind menu, above header */
        display: none;
    }

    .mobile-menu.active .menu-backdrop {
        display: block;
        z-index: auto !important;
    }

    .mobile-menu .close-btn {
        cursor: pointer;
        color: #fff;
        font-size: 24px;
        margin: 10px;
    }

    /* Hide sticky header on mobile */
    @media (max-width: 991px) {
        .sticky-header {
            display: none !important;
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
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li class="dropdown">
                        <a href="#">Gallery</a>
                        <ul>
                            <li><a href="#">Picture</a></li>
                            <li><a href="#">Video</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Our Courses</a></li>
                    <li><a href="#">Notice</a></li>
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
                    <a href="#"><img src="frontend/img/mobile-logo.png" alt="NSDC" title="NSDC"></a>
                </div>
                <div class="close-btn">&times;</div>
            </div>
            <ul class="navigation clearfix">
                <li><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li class="dropdown">
                    <a href="#">Gallery</a>
                    <ul>
                        <li><a href="#">Picture</a></li>
                        <li><a href="#">Video</a></li>
                    </ul>
                </li>
                <li><a href="#">Our Courses</a></li>
                <li><a href="#">Notice</a></li>
            </ul>
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
                        <li><a href="#" class="active-menu-two">Home</a></li>
                        <li><a href="#">About</a></li>
                        <li class="dropdown">
                            <a href="#">Gallery</a>
                            <ul>
                                <li><a href="#">Pictures</a></li>
                                <li><a href="#">Video</a></li>
                            </ul>
                        </li>

                        <!-- ✅ Logo in middle of menu -->
                        <li class="logo new-custom-logo" style="flex-shrink:0;">
                            <a href="#">
                                <img style="height:60px; vertical-align:middle;"
                                     src="frontend/img/logo.png" alt="nsdc" title="nsdc">
                            </a>
                        </li>

                        <li><a href="#">Our Courses</a></li>
                        <li><a href="#">Notice</a></li>
                    </ul>

                </nav>

            </div>
        </div>
    </div>



</header>

<script>
    // Sticky header on scroll
    window.addEventListener('scroll', function() {
        if (window.innerWidth > 991) {
            if (window.scrollY > 100) {
                document.body.classList.add('scrolled');
            } else {
                document.body.classList.remove('scrolled');
            }
        }
    });

    // Mobile menu toggle
    document.addEventListener('DOMContentLoaded', function() {
        const toggler = document.querySelector('.mobile-nav-toggler');
        const mobileMenu = document.querySelector('.mobile-menu');
        const closeBtn = document.querySelector('.mobile-menu .close-btn');
        const backdrop = document.querySelector('.mobile-menu .menu-backdrop');

        toggler.addEventListener('click', () => {
            mobileMenu.classList.add('active');
        });

        closeBtn.addEventListener('click', () => {
            mobileMenu.classList.remove('active');
        });

        backdrop.addEventListener('click', () => {
            mobileMenu.classList.remove('active');
        });
    });
</script>
