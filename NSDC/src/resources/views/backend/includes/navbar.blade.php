                <!-- Navbar -->
                <nav class="layout-navbar navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme container-fluid" id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                            <i class="ti ti-menu-2 ti-sm"></i>
                        </a>
                    </div>

                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                        <!-- Search -->

                        <!-- /Search -->

                        <ul class="navbar-nav flex-row align-items-center ms-auto">

                            <li class="nav-item dropdown-language dropdown me-2 me-xl-0">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false">
                                  {{-- <i class="ti ti-language rounded-circle ti-md"></i> --}}
                                  Language
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                  <li>
                                    <a class="dropdown-item {{ app()->getLocale() ==  'en' ? 'active' : '' }}" href="{{ route('change.language', 'en') }}" data-language="en">
                                      <span class="align-middle">English</span>
                                    </a>
                                  </li>
                                  <li>
                                    <a class="dropdown-item {{ app()->getLocale() == 'bn' ? 'active' : '' }}" href="{{ route('change.language', 'bn') }}" data-language="bn">
                                      <span class="align-middle">Bangla</span>
                                    </a>
                                  </li>
                                </ul>
                              </li>
                            <!-- Quick links  -->

                            <!-- Quick links -->

                            <!-- User -->
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                                    <div class="avatar avatar-online">
                                        <img
                                            src="{{ !empty(Auth::user()->photo)
                                                    ? Storage::url(Auth::user()->photo)
                                                    : asset('path/to/your/default/user_icon.jpg') }}"
                                            alt="{{ auth()->user()->full_name ?? 'User Profile' }}"
                                            class="h-auto rounded-circle"
                                        />
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="pages-account-settings-account.html">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar avatar-online">
                                                      <img
                                                            src="{{ !empty(Auth::user()->photo)
                                                                    ? Storage::url(Auth::user()->photo)
                                                                    : asset('path/to/your/dummy/image.jpg') }}"
                                                            alt="user photo"
                                                            class="h-auto rounded-circle"
                                                        />
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <span class="fw-medium d-block">{{ auth()->user()->full_name }}</span>
                                                    <small class="text-muted">{{ auth()->user()->user_name}}</small>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    {{--  <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="ti ti-user-check me-2 ti-sm"></i>
                                            <span class="align-middle">{{ __('dashboard.dashboard.profile') }}</span>
                                        </a>
                                    </li>
                                     <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="ti ti-help me-2 ti-sm"></i>
                                            <span class="align-middle">Help</span>
                                        </a>
                                    </li>

                                  <li>
                                        <div class="dropdown-divider"></div>
                                    </li> --}}
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}">
                                            <i class="ti ti-logout me-2 ti-sm"></i>
                                            <span class="align-middle">{{ __('dashboard.dashboard.logout') }}</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!--/ User -->
                        </ul>
                    </div>

                    <!-- Search Small Screens -->
                    <div class="navbar-search-wrapper search-input-wrapper d-none">
                        <input type="text" class="form-control search-input container-xxl border-0" placeholder="Search..." aria-label="Search..." />
                        <i class="ti ti-x ti-sm search-toggler cursor-pointer"></i>
                    </div>
                </nav>
                <!-- / Navbar -->
