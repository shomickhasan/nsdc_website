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
            <a href="{{ url('/') }}" class="menu-link ">
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

         <!-- courses -->
        <li class="menu-item {{(in_array($routeName, $courses ) !== false ) ? 'active open ':''}}">
            <a href="{{ route('course.index') }}" class="menu-link ">
                <i class="menu-icon tf-icons ti ti-paperclip"></i>
                <div data-i18n="">Courses</div>
            </a>
        </li>
        <li class="menu-item {{(in_array($routeName, $partner ) !== false ) ? 'active open ':''}}">
            <a href="{{ route('our_partner.index') }}" class="menu-link ">
                <i class="menu-icon tf-icons ti ti-paperclip"></i>
                <div data-i18n="">Partners</div>
            </a>
        </li>
    </ul>
</aside>
<!-- End Menu -->
