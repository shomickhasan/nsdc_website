@php

//Administration Module
$dashboard = [
    'dashboard',
];

// Administration  start

$administration = [
    'users.create','users.index','users.edit',
    'activityLog.index',
];


$uddokta = ['uddoktas.index', 'uddoktas.create', 'uddoktas.edit','uddoktas.view'];

$reports = ['uddoktasReport.index'];
$configaration = ['training.index', 'training.create',
'training.edit','loan.index', 'loan.create', 'loan.edit','fields.index'];
//Maintenance Mood
$maintenances_route = ['maintenances.index'];


//course route
$courses = ['course.index', 'course.create'];

$partner = ['our_partner.index'];

$content = ['slider.index', 'slider.delete', 'slider.edit', 'slider.update'];
$batch = ['batch.index', 'batch.create', 'batch.edit'];


$routeName = \Request::route()->getName();

@endphp



<!-- Menu -->
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ url('/') }}" class="app-brand-link">
            <span class="app-brand-logo demo">

            </span>
            <img src="{{asset('/image/joyeeta-logo.png')}}" alt="NSDC" width="90" height="50">
            <!-- <span class="app-brand-text demo menu-text fw-bold">NSDC</span> -->
        </a>


    </div>

    <!-- Apps & Pages -->
    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboards -->
        <li class="menu-item {{(in_array($routeName, $dashboard ) !== false ) ? 'active open ':''}}">
            <a href="{{ url('/admin') }}" class="menu-link ">
                <i class="menu-icon tf-icons ti ti-home"></i>
                <div data-i18n="{{ __('menu.dashboard') }}">{{ __('menu.dashboard') }}</div>
            </a>
        </li>



        <!-- Administration -->
        <li class="menu-item {{(in_array($routeName, $administration ) !== false ) ? 'active open ':''}}">
            <a href="#" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-shield"></i>
                <div data-i18n="Administration">{{ __('menu.administration') }}</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item {{ $routeName ==  'users.index' ? 'active' : '' }}
                {{ $routeName ==  'users.create' ? 'active' : '' }}
                {{ $routeName ==  'users.edit' ? 'active' : '' }}
                {{ $routeName ==  'users.userRole' ? 'active' : '' }}">
                    <a href="{{route('users.index')}}" class="menu-link">
                        <div data-i18n="Users">{{ __('menu.users') }}</div>
                    </a>
                </li>

            </ul>
        </li>

        {{-- content menu --}}
        @php
            // Hero Slider related routes
            $heroSliderRoutes = [
                'hero_slider.index',
                'hero_slider.create',
                'hero_slider.edit',
                'hero_slider.update',
                'hero_slider.store',
            ];

            $partnerRoutes = [
                    'partner.index',
                    'partner.store',
                    'partner.update',
                    'partner.destroy',
                    'partner.order_update',
            ];

             $employeeRoutes = [
                'employee.index',
                'employee.store',
                'employee.update',
                'employee.destroy',
                'employee.order_update',
            ];
        @endphp
        <li class="menu-item {{
            (
            in_array($routeName, $heroSliderRoutes) ||
            in_array($routeName, $partnerRoutes) ||
            in_array($routeName, $employeeRoutes)
            ) ? 'active open' : '' }}">
            <a href="#" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-shield"></i>
                <div data-i18n="Administration">Content</div>
            </a>

            <ul class="menu-sub">
                <!-- Hero Slider -->
                <li class="menu-item {{ in_array($routeName, $heroSliderRoutes) ? 'active' : '' }}">
                    <a href="{{route('hero_slider.index')}}" class="menu-link">
                        <div data-i18n="Users">Home Hero Section</div>
                    </a>
                </li>

                <!-- Partner -->
                <li class="menu-item {{ in_array($routeName, $partnerRoutes) ? 'active' : '' }}">
                    <a href="{{ route('partner.index') }}" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-users"></i>
                        <div data-i18n="Partners">Partners</div>
                    </a>
                </li>
                <li class="menu-item {{ in_array($routeName, $employeeRoutes) ? 'active' : '' }}">
                    <a href="{{ route('employee.index') }}" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="Employees">Employees</div>
                    </a>
                </li>
            </ul>
        </li>


        <!-- courses -->
        <li class="menu-item {{(in_array($routeName, $courses ) !== false ) ? 'active open ':''}}">
            <a href="{{ route('course.index') }}" class="menu-link ">
                <i class="menu-icon tf-icons ti ti-paperclip"></i>
                <div data-i18n="">Courses</div>
            </a>
        </li>
        <li class="menu-item {{ (in_array($routeName, $batch) !== false) ? 'active open' : '' }}">
            <a href="{{ route('batch.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-layout-grid"></i>
                <div data-i18n="">Batch</div>
            </a>
        </li>

        <li class="menu-item {{(in_array($routeName, $partner ) !== false ) ? 'active open ':''}}">
            <a href="{{ route('registration.index') }}" class="menu-link ">
                <i class="menu-icon tf-icons ti ti-paperclip"></i>
                <div data-i18n="">Registration</div>
            </a>
        </li>
    </ul>
</aside>
<!-- End Menu -->
