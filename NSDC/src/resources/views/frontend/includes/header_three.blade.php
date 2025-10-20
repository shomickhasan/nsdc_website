
<header class="main-header header-style-three">
    <div class="header-lower">
        <div class="main-box">
            <div class="logo-box">
                <div class="logo"><a href="{{ route('fHome') }}"><img class="header-logo" src="{{asset('/')}}frontend/img/otithi_logo.png" alt="Otithi" title="Otithi"></a></div>
            </div>
            <div class="nav-outer">
                <nav class="nav main-menu">
                    <ul class="navigation">
                        <li><a href="{{ route('fHome') }}" class="{{ request()->routeIs('fHome') ? 'active-menu' : '' }}">Home</a></li>
                        <li><a href="{{ route('fabout') }}" class="{{ request()->routeIs('fabout') ? 'active-menu' : '' }}">About</a></li>
                        <li><a href="{{ route('fpackages') }}" class="{{ request()->routeIs('fpackages') ? 'active-menu' : '' }}">Packages</a></li>
                        <li class="dropdown">
                            <a href="#">Book a Tour</a>
                            @if(isset($cities) &&  count($cities) > 0)
                                <ul>
                                    @foreach($cities as $city)
                                        <li class="dropdown"><a href="#">{{$city->city_name ?? ''}}</a>
                                            @if(isset($city->tourPackages) &&  count($city->tourPackages) > 0)
                                                <ul class="">
                                                    @foreach($city->tourPackages as  $gtourPackage)
                                                        @if (!empty($gtourPackage->slug))
                                                        <li class={{ request()->routeIs('fbookTour', ['slug' => $gtourPackage->slug]) ? 'active-menu' : '' }}>
                                                                <a href="{{ route('fbookTour', ['slug' => $gtourPackage->slug]) }}">{{ $gtourPackage->title }}</a>
                                                            </li>
                                                        @else
                                                            <li>{{ $gtourPackage->title }}</li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </li>
                                    @endforeach
                                   
                                </ul>
                            @endif
                        </li>
                        <li><a href="{{ route('fblog') }}" class="{{ request()->routeIs('fblog') ? 'active-menu' : '' }}">Blog</a></li>
                        <li><a href="{{ route('fgallery') }}" class="{{ request()->routeIs('fgallery') ? 'active-menu' : '' }}">Gallery</a></li>
                        <li><a href="{{ route('fFaq') }}" class="{{ request()->routeIs('fFaq') ? 'active-menu' : '' }}">FAQ</a></li>
                        @if (Auth::guard('users')->check())
                            <li class="auth_menu"><a href="{{ route('user.profile') }}" class="{{ request()->routeIs('user.profile') ? 'active-menu' : '' }}">Profile</a></li>
                            <li class="auth_menu"><a href="{{ route('user.logout') }}" class="{{ request()->routeIs('user.logout') ? 'active-menu' : '' }}">Log out</a></li>
                        @else
                            <li class="auth_menu"><a href="{{ route('user.login') }}" class="{{ request()->routeIs('user.login') ? 'active-menu' : '' }}">Login</a></li>
                        @endif
                    </ul>
                </nav>
                <div class="outer-box">
                    <div class="outher_auth">
                        @if (Auth::guard('users')->check())
                            <a href="{{route('user.profile')}}" class="theme-btn btn-style-header {{ request()->routeIs('user.profile') ? 'active-menu' : '' }}"><i class="icon fa fa-user"></i><span class="btn-title">&nbsp;{{ Auth::guard('users')->user()->full_name }}</span></a>
                        @else
                            <a href="{{route('user.login')}}" class="theme-btn btn-style-header {{ route('user.login') }}" class="{{ request()->routeIs('user.login') ? 'active-menu' : '' }}"><i class="icon fa fa-sign-in"></i><span class="btn-title">&nbsp;Login</span></a>
                        @endif
                    </div>
                    <div class="mobile-nav-toggler"><span class="icon lnr-icon-bars"></span></div>
                </div>
            </div>
            <!--- End Start Main Menu !---->
        </div>
    </div>
    <!--- start mobile Menu and logo !---->
    <div class="mobile-menu">
        <div class="menu-backdrop"></div>
        <nav class="menu-box">
            <div class="upper-box">
                <div class="nav-logo"><a href="{{ route('fHome') }}"><img src="{{asset('/')}}frontend/img/mobile-logo.png" alt="otithi" title="otithi"></a></div>
                <div class="close-btn"><i class="icon fa fa-times"></i></div>
            </div>
            <ul class="navigation clearfix">
            </ul>
            <ul class="contact-list-one">
                @if(isset($site->phone))
                <li>
                    <div class="contact-info-box">
                        <i class="icon lnr-icon-phone-handset"></i>
                        <span class="title">Call Now</span>
                        <a href="tel:{{ $site->phone }}">{{ $site->phone }}</a>
                    </div>
                </li>
                @endif
                @if(isset($site->email))
                <li>
                    <div class="contact-info-box">
                        <span class="icon lnr-icon-envelope1"></span>
                        <span class="title">Send Email</span>
                        <a href="mail:{{ $site->email }}"><span class="__cf_email__" data-cfemail="">{{ $site->email }}</span></a>
                    </div>
                </li>
                @endif
            </ul>
          <!---  <ul class="social-links">
                @if (isset($socialIcon->facebook))
                    <li><a href="{{ $socialIcon->facebook }}"><i class="fab fa-facebook-f"></i></a></li>
                @endif
                @if (isset($socialIcon->instagram))
                    <li><a href="{{ $socialIcon->instagram }}"><i class="fab fa-instagram"></i></a></li>
                @endif
                @if (isset($socialIcon->youtube))
                    <li><a href="{{ $socialIcon->youtube }}"><i class="fab fa-youtube"></i></a></li>
                @endif
                @if (isset($socialIcon->linkdin))
                    <li><a href="{{ $socialIcon->linkdin }}"><i class="fab fa-linkedin"></i></a></li>
                @endif
            </ul> !---->
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

