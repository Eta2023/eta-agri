<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>

    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>ETA Agriculture
    </title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('ETA.png') }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ asset('dashboard/assets/vendor/fonts/boxicons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('dashboard/assets/vendor/css/core.css') }}"
        class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('dashboard/assets/vendor/css/theme-default.css') }}"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('dashboard/assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('dashboard/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{ asset('dashboard/assets/vendor/js/helpers.js') }}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('dashboard/assets/js/config.js') }}"></script>

    {{-- ********* --}}
    <link href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet" />
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css"
        rel="stylesheet" /> --}}
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <!-- Add these to your HTML layout or page -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<!-- Add this in your HTML file, preferably in the head section -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Add this to the end of your Blade layout file, just before the closing </body> tag -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                {{-- <div class="app-brand demo"> --}}
                <center><img src="{{ asset('ETA.png') }}" alt="" width="150px"></center>
                {{-- </div> --}}

                <div class="menu-inner-shadow"></div>

                <ul class="menu-inner py-1">
                    @if (Route::has('login'))
                        @auth
                            <!-- Dashboard -->
                            <li class="menu-item @if (request()->routeIs('dashboard')) active @endif ">
                                <a href="/admin/adminDashboard" class="menu-link">
                                    <i class="menu-icon tf-icons bx bx-home-circle"></i>
                                    <div data-i18n="Analytics">Dashboard</div>
                                </a>
                            </li>

                            @if (auth()->user()->role == 'admin')
                                <li class="menu-item {{ set_active(['kingdom-admin.*']) }}">
                                    <a href="{{ route('kingdom-admin.index') }}" class="menu-link">
                                        <i class="menu-icon tf-icons bx bxs-crown"></i>
                                        <div data-i18n="Analytics">Kingdom-المملكة</div>
                                    </a>
                                </li>
                            @endif

                            @if (auth()->user()->role == 'admin' || auth()->user()->role == 'volunteer')
                            
                            <li class="menu-item">
                                {{-- <label for="category-dropdown" class="menu-link">
                                    <i class="menu-icon tf-icons bx bxs-group"></i>
                                    <div data-i18n="Analytics">التصنيفات</div>
                                </label> --}}
                                <select id="category-dropdown" class="dropdown-list menu-link" onchange="window.location.href=this.value">
                                    <option>التصنيفات</option>

                                    <option value="{{ route('phylum-admin.index') }}" {{ set_active(['phylum-admin.*']) }}>Phylum-الشعبة</option>
                                    <option value="{{ route('class-admin.index') }}" {{ set_active(['class-admin.*']) }}>Class-الصف</option>
                                    <option value="{{ route('rank-admin.index') }}" {{ set_active(['rank-admin.*']) }}>Rank-الرتبة</option>
                                    <option value="{{ route('family-admin.index') }}" {{ set_active(['family-admin.*']) }}>Family-العائلة</option>
                                    <option value="{{ route('genus-admin.index') }}" {{ set_active(['genus-admin.*']) }}>Genus-الجنس</option>
                                    <option value="{{ route('types-admin.index') }}" {{ set_active(['types-admin.*']) }}>types-النوع</option>
                                    <option value="{{ route('species-admin.index') }}" {{ set_active(['species-admin.*', 'showDetails']) }}>Species-الصنف</option>
                                </select>
                            </li>
                            
                                <li class="menu-item {{ set_active(['companies-admin.*']) }}">
                                    <a href="{{ route('companies-admin.index') }}" class="menu-link">
                                        <i class="menu-icon bx bxs-user"></i>
                                        <div data-i18n="Analytics">Company-الشركة</div>
                                    </a>
                                </li>
                            @endif
                            @if (auth()->user()->role == 'admin')
                                <li class="menu-item {{ set_active(['user-admin.*']) }}">
                                    <a href="{{ route('user-admin.index') }}" class="menu-link">
                                        <i class="menu-icon bx bxs-user"></i>
                                        <div data-i18n="Analytics">User</div>
                                    </a>
                                </li>
                            @endif
                            @if (auth()->user()->role == 'admin')
                            <li class="menu-item {{ set_active(['user-admin.*']) }}">
                                <a href="{{ route('pesticides-admin.index') }}" class="menu-link">
                                    <i class="menu-icon bx bxs-user"></i>
                                    <div data-i18n="Analytics">Pesticide-المبيدات</div>
                                </a>
                            </li>
                        @endif
                        @if (auth()->user()->role == 'admin')
                        <li class="menu-item {{ set_active(['user-admin.*']) }}">
                            <a href="{{ route('AgricultureTypes-admin.index') }}" class="menu-link">
                                <i class="menu-icon bx bxs-user"></i>
                                <div data-i18n="Analytics">agriculture_types-انواع الزراعة</div>
                            </a>
                        </li>
                    @endif
                    @if (auth()->user()->role == 'admin')
                    <li class="menu-item {{ set_active(['user-admin.*']) }}">
                        <a href="{{ route('IrrigationTypes-admin.index') }}" class="menu-link">
                            <i class="menu-icon bx bxs-user"></i>
                            <div data-i18n="Analytics">irrigation_types-انواع الري</div>
                        </a>
                    </li>
                @endif
                        @endauth
                    @endif
                </ul>
            </aside>
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                    id="layout-navbar">

                
                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                        <!-- Search -->

                        <!-- /Search -->
                        @if (Route::has('login'))
                        <ul class="navbar-nav flex-row align-items-center ms-auto">
                         

                            <!-- User -->
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                @auth
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                                    data-bs-toggle="dropdown">
                                    <div class="avatar avatar-online">
                                        <span class="fw-semibold d-block"> {{ auth()->user()->name }}</span>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    
                                                </div>
                                                <div class="flex-grow-1">
                                                    <span class="fw-semibold d-block"> {{ auth()->user()->name }}</span>
                                                    <small class="text-muted">Admin</small>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="bx bx-user me-2"></i>
                                            <span class="align-middle">My Profile</span>
                                        </a>
                                    </li>

                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}">
                                            <i class="bx bx-power-off me-2"></i>
                                            <span class="align-middle">Log Out</span>
                                        </a>
                                    </li>
                                    @else
                                    <a class="nav-link btn-primary" style="color: white" href="{{ route('login') }}">Log
                                        in</a>
                                </ul>
                            </li>
                            @endif
                            <!--/ User -->
                        </ul>
                    </div>
                    @endif
                </nav>
