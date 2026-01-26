<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Page Title -->
    <title>@yield('title', 'Jobick : Job Admin Dashboard Tailwind CSS Template')</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="DexignLab">
    <meta name="robots" content="">
    <meta name="keywords" content="admin dashboard, admin template, analytics, Tailwind CSS, Tailwind CSS admin template, job board admin, job portal admin, modern, responsive admin dashboard, sales dashboard,  ui kit, web app">
    <meta name="description" content="We proudly present Jobick, a Job Admin dashboard HTML Template, If you are hiring a job expert you would like to build a superb website for your Jobick, it's a best choice.">
    <meta property="og:title" content="Jobick : Job Admin Dashboard Tailwind CSS Template">
    <meta property="og:description" content="We proudly present Jobick, a Job Admin dashboard HTML Template, If you are hiring a job expert you would like to build a superb website for your Jobick, it's a best choice.">
    <meta property="og:image" content="../jobick.dexignlab.com/tailwind/social-image.html">
    <meta name="format-detection" content="telephone=no">

    <meta name="twitter:title" content="Jobick : Job Admin Dashboard Tailwind CSS Template">
    <meta name="twitter:description" content="We proudly present Jobick, a Job Admin dashboard HTML Template, If you are hiring a job expert you would like to build a superb website for your Jobick, it's a best choice.">
    <meta name="twitter:image" content="../jobick.dexignlab.com/tailwind/social-image.html">
    <meta name="twitter:card" content="summary_large_image">

    <!-- Mobile Specific -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- FAVICONS ICON -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('template/assets/images/favicon.png') }}">

    <!-- ICONS -->
    <link rel="stylesheet" href="{{ asset('template/assets/icons/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/assets/icons/line-awesome/css/line-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/assets/icons/flaticon/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('template/assets/icons/flaticon_1/flaticon_1.css') }}">
    <link rel="stylesheet" href="{{ asset('template/assets/icons/themify-icons/css/themify-icons.css') }}">

    <!-- NICE SELECT -->
    <link href="{{ asset('template/assets/vendor/niceselect/css/nice-select.css') }}" rel="stylesheet">
    <link href="{{ asset('template/assets/vendor/flatpickr-master/css/flatpicker.css') }}" rel="stylesheet">
    @stack('css')

    <!-- STYLE CSS -->
    <link href="{{ asset('template/assets/css/style.css') }}" rel="stylesheet">
    <style>
        .dlab-demo-panel {
            display: none !important;
        }
    </style>
</head>

<body class="selection:text-white selection:bg-primary" data-typography="poppins" data-theme-version="light" data-layout="vertical" data-nav-headerbg="color_1" data-headerbg="color_1" data-sidebar-style="full" data-sibebarbg="color_1" data-sidebar-position="fixed" data-header-position="fixed" data-container="wide" direction="ltr" data-primary="color_1">

    <!-- Preloader start  -->
    <div id="preloader" class="bg-card h-full fixed z-[99999] w-full items-center justify-center">
        <div class="lds-ripple inline-block relative size-20">
            <div class="absolute border-4 border-primary rounded-full"></div>
            <div class="absolute border-4 border-primary rounded-full"></div>
        </div>
    </div>
    <!-- Preloader end -->

    <!-- Main wrapper start -->
    <div id="main-wrapper" class="relative">

        @auth
            <!-- Nav header start -->
            <div class="nav-header">
                <a href="{{ route('business.dashboard') }}" class="brand-logo">
                    <svg class="logo-abbr" xmlns="http://www.w3.org/2000/svg" width="62.074" height="65.771" viewBox="0 0 62.074 65.771">
                        <g id="search_11_" data-name="search (11)" transform="translate(12.731 12.199)">
                            <rect class="rect-primary-rect" id="Rectangle_1" data-name="Rectangle 1" width="60" height="60" rx="30" transform="translate(-10.657 -12.199)" fill="var(--primary)" />
                            <path id="Path_2001" data-name="Path 2001" d="M32.7,5.18a17.687,17.687,0,0,0-25.8,24.176l-19.8,21.76a1.145,1.145,0,0,0,0,1.62,1.142,1.142,0,0,0,.81.336,1.142,1.142,0,0,0,.81-.336l19.8-21.76a17.687,17.687,0,0,0,29.357-13.29A17.57,17.57,0,0,0,32.7,5.18Zm-1.62,23.392A15.395,15.395,0,0,1,9.312,6.8,15.395,15.395,0,1,1,31.083,28.572Zm0,0" transform="translate(1 0)" fill="#fff" stroke="#fff" stroke-width="1" />
                            <path id="Path_2002" data-name="Path 2002" d="M192.859,115.547a4.523,4.523,0,0,0,.7-2.415v-2.284a4.55,4.55,0,0,0-9.1,0v2.284a4.523,4.523,0,0,0,.7,2.415,4.954,4.954,0,0,0-3.708,4.788v1.623a2.4,2.4,0,0,0,2.4,2.4h10.323a2.4,2.4,0,0,0,2.4-2.4v-1.623a4.954,4.954,0,0,0-3.708-4.788Zm-6.114-4.7a2.259,2.259,0,0,1,4.518,0v2.284a2.259,2.259,0,1,1-4.518,0Zm7.53,11.111a.11.11,0,0,1-.11.11H183.843a.11.11,0,0,1-.11-.11v-1.623a2.656,2.656,0,0,1,2.653-2.653h5.237a2.656,2.656,0,0,1,2.653,2.653Zm0,0" transform="translate(-168.591 -98.178)" fill="#fff" stroke="#fff" stroke-width="1" />
                        </g>
                    </svg>
                    <svg class="brand-title" xmlns="http://www.w3.org/2000/svg" width="134.01" height="48.365" viewBox="0 0 134.01 48.365">
                        <g id="Group_38" data-name="Group 38" transform="translate(-133.99 -40.635)">
                            <text id="Job_Admin_Dashboard" data-name="Job Admin Dashboard" transform="translate(134 85)" fill="#787878" font-size="12" font-family="Poppins-Light, Poppins" font-weight="300">
                                <tspan x="0" y="0">Job Admin Dashboard</tspan>
                            </text>
                            <path id="Path_1948" data-name="Path 1948" d="M.36,6.616a1.661,1.661,0,0,0,1.094-.422,1.287,1.287,0,0,0,.5-1.016V-11.738H7.52L7.551,5.271A8.16,8.16,0,0,1,6.91,8.789a4.074,4.074,0,0,1-2.2,1.985,11.542,11.542,0,0,1-4.346.657ZM17.651,9.68A7.316,7.316,0,0,1,13.7,8.617a7.008,7.008,0,0,1-2.626-2.97,9.786,9.786,0,0,1-.922-4.315,9.276,9.276,0,0,1,.907-4.174,6.935,6.935,0,0,1,2.6-2.877,7.438,7.438,0,0,1,4-1.047,7.607,7.607,0,0,1,4.018,1.032,6.8,6.8,0,0,1,2.611,2.861,9.349,9.349,0,0,1,.907,4.205,9.759,9.759,0,0,1-.922,4.33,6.993,6.993,0,0,1-2.642,2.955A7.4,7.4,0,0,1,17.651,9.68Zm0-4.565a1.753,1.753,0,0,0,1.438-.954,5.2,5.2,0,0,0,.625-2.83,4.8,4.8,0,0,0-.594-2.626,1.73,1.73,0,0,0-1.47-.907,1.694,1.694,0,0,0-1.454.907,4.908,4.908,0,0,0-.578,2.626,5.309,5.309,0,0,0,.61,2.83A1.718,1.718,0,0,0,17.651,5.115Zm17.478,4.6q-2.345,0-5.972-.375L27.75,9.18V-12.238h5.44V-6.11q.25-.094.844-.3a6.64,6.64,0,0,1,1.079-.281,6.807,6.807,0,0,1,1.079-.078,5.75,5.75,0,0,1,4.737,1.939q1.579,1.939,1.579,6.285,0,4.377-1.767,6.316T35.129,9.711Zm-.594-4.878a2.3,2.3,0,0,0,1.876-.719A4.131,4.131,0,0,0,37,1.551Q37-1.92,34.754-1.92q-.719,0-1.563.063v6.6A10.43,10.43,0,0,0,34.535,4.834ZM45.134-6.36h5.44V9.274h-5.44Zm.031-6.222h5.44V-7.36h-5.44ZM59.611,9.68a5.9,5.9,0,0,1-4.909-2q-1.595-2-1.595-6.222a12.451,12.451,0,0,1,.844-5.143A4.635,4.635,0,0,1,56.3-6.125a9.87,9.87,0,0,1,3.846-.641,13.2,13.2,0,0,1,2.095.188q1.157.188,3.033.625L65.145-1.7q-2.908-.219-3.627-.219a4.459,4.459,0,0,0-1.845.3,1.565,1.565,0,0,0-.844.985,6.976,6.976,0,0,0-.219,2A7.45,7.45,0,0,0,58.845,3.5a1.625,1.625,0,0,0,.86,1.032,4.362,4.362,0,0,0,1.813.3l3.6-.219L65.27,8.9A27.641,27.641,0,0,1,59.611,9.68Zm8.473-21.918h5.44V-.325l1.032-.406L76.714-6.36H82.78L79.4,1.207,83,9.274H76.9L74.744,3.958l-1.219.406V9.274h-5.44Z" transform="translate(133.63 53.217)" fill="#464646" />
                        </g>
                    </svg>

                </a>
                <div class="nav-control">
                    <div class="hamburger">
                        <span class="line"></span><span class="line"></span><span class="line"></span>
                    </div>
                </div>
            </div>
            <!-- Nav header end -->
            
            <!-- Header start -->
            <div class="header">
                <div class="header-content">
                    <nav class="navbar navbar-expand">
                        <div class="navbar-collapse justify-between">
                            <div class="header-left">
                                <div class="dashboard_bar max-md:hidden">
                                    @yield('header_title', 'Dashboard')
                                </div>
                            </div>
                            <ul class="navbar-nav header-right flex h-full">
                                <li class="nav-item flex items-center h-full relative notification_dropdown">
                                    <a class="nav-link relative leading-[1] text-lg block bell dz-theme-mode" href="javascript:void(0);">
                                        <i id="icon-light" class="fas fa-sun scale-[1.3]"></i>
                                        <i id="icon-dark" class="fas fa-moon scale-[1.3]"></i>
                                    </a>
                                </li>
                                <li class="nav-item flex items-center h-full relative ltr:sm:pl-4 ltr:pl-[.4rem] rtl:sm:pr-4 rtl:pr-[.4rem] header-profile" x-data="{ open: false }">
                                    <a @click="open = true" class="nav-link flex items-center ltr:2xxl:ml-4 rtl:2xxl:mr-4" href="javascript:void(0)">
                                        <img src="{{ asset('template/assets/images/profile/pic1.jpg') }}" class="rounded-lg size-12 max-md:size-10" width="20" alt="">
                                    </a>
                                    <div class="absolute z-[9] shadow-[0_0_37px_rgba(8,21,66,0.05)] min-w-[12.5rem] py-[15px] mt-0.5 top-full ltr:right-0 rtl:left-0 rounded-lg bg-card" x-transition.duration.100ms x-show.transition.origin.top.right="open" x-cloak @click.away="open = false">
                                        <a href="#" class="dropdown-item block text-left w-full py-2 px-6 text-body-text duration-300 hover:bg-bs-dropdown-color hover:text-primary">
                                            <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                <circle cx="12" cy="7" r="4"></circle>
                                            </svg>
                                            <span class="ltr:ml-2 rtl:mr-2">Profile </span>
                                        </a>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="dropdown-item block text-left w-full py-2 px-6 text-body-text duration-300 hover:bg-bs-dropdown-color hover:text-primary">
                                                <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                                    <polyline points="16 17 21 12 16 7"></polyline>
                                                    <line x1="21" y1="12" x2="9" y2="12"></line>
                                                </svg>
                                                <span class="ltr:ml-2 rtl:mr-2">Logout </span>
                                            </button>
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
            <!-- Header end -->

            <!-- Sidebar start -->
            <div class="dlabnav">
                <div class="dlabnav-scroll">
                    <ul class="metismenu" id="menu">
                        <li><a href="{{ route('business.dashboard') }}" aria-expanded="false">
                                <i class="flaticon-025-dashboard"></i>
                                <span class="nav-text">Dashboard</span>
                            </a>
                        </li>
                        <li><a href="{{ route('business.orders.index') }}" aria-expanded="false">
                                <i class="fas fa-shopping-cart"></i>
                                <span class="nav-text">Orders</span>
                            </a>
                        </li>
                        <li><a href="{{ route('business.pos.index') }}" class="" aria-expanded="false">
                                <i class="fas fa-cash-register"></i>
                                <span class="nav-text">POS</span>
                            </a>
                        </li>
                        <li><a href="{{ route('business.products.index') }}" aria-expanded="false">
                                <i class="fas fa-box"></i>
                                <span class="nav-text">Products</span>
                            </a>
                        </li>
                        <li><a href="{{ route('business.services.index') }}" aria-expanded="false">
                                <i class="fas fa-concierge-bell"></i>
                                <span class="nav-text">Services</span>
                            </a>
                        </li>
                        <li><a href="{{ route('business.inventory.index') }}" aria-expanded="false">
                                <i class="fas fa-warehouse"></i>
                                <span class="nav-text">Inventory</span>
                            </a>
                        </li>
                        <li><a href="{{ route('business.staff.index') }}" aria-expanded="false">
                                <i class="fas fa-users"></i>
                                <span class="nav-text">Staff</span>
                            </a>
                        </li>
                        <li><a href="{{ route('business.branches.index') }}" aria-expanded="false">
                                <i class="fas fa-building"></i>
                                <span class="nav-text">Branches</span>
                            </a>
                        </li>
                        <li><a href="{{ route('business.expenses.index') }}" aria-expanded="false">
                                <i class="fas fa-money-bill-wave"></i>
                                <span class="nav-text">Expenses</span>
                            </a>
                        </li>
                        <li><a href="{{ route('business.sales.index') }}" class="" aria-expanded="false">
                                <i class="fas fa-chart-line"></i>
                                <span class="nav-text">Sales</span>
                            </a>
                        </li>
                        <li><a href="{{ route('business.settings') }}" class="" aria-expanded="false">
                                <i class="fas fa-cog"></i>
                                <span class="nav-text">Settings</span>
                            </a>
                        </li>
                    </ul>
                    <div class="copyright">
                        <p><strong>Jobick Job Admin</strong> © 2024 All Rights Reserved</p>
                        <p class="text-xs">Made with <span class="heart"></span> by DexignLab</p>
                    </div>
                </div>
            </div>
            <!-- Sidebar end -->
        @endauth

        <!-- Content body start -->
        <div class="@auth content-body @endauth">
            @yield('content')
        </div>
        <!-- Content body end -->

        @auth
            <!-- Footer start -->
            <div class="footer mt-4 bg-card">
                <div class="copyright p-[15px]">
                    <p class="text-center text-gray sm:text-sm text-xs leading-[1.8]">Copyright © Designed & Developed by <a href="https://dexignlab.com/" target="_blank" class="text-primary">DexignLab</a> 2024</p>
                </div>
            </div>
            <!-- Footer end -->
        @endauth

    </div>
    <!-- Main wrapper end -->

    <script src="{{ asset('template/assets/vendor/global/global.min.js') }}"></script>

    <!-- Alpine.js (Load before other scripts) -->
    <script src="{{ asset('template/assets/vendor/alpine/alpineplugin.js') }}"></script>
    <script src="{{ asset('template/assets/vendor/alpine/alpine.js') }}"></script>

    <!-- Dashboard Scripts (Only load on dashboard page) -->
    @if(request()->is('business/dashboard') || request()->is('dashboard'))
    <!-- Apex Chart -->
    <script src="{{ asset('template/assets/vendor/apexchart/apexchart.js') }}"></script>
    <script src="{{ asset('template/assets/vendor/chartjs/chart.bundle.min.js') }}"></script>

    <!-- Chart piety plugin files -->
    <script src="{{ asset('template/assets/vendor/peity/jquery.peity.min.js') }}"></script>

    <!-- Dashboard 1 -->
    <script src="{{ asset('template/assets/js/dashboard/statistics-page.js') }}"></script>
    @endif

    <script src="{{ asset('template/assets/vendor/niceselect/js/jquery.nice-select.min.js') }}"></script> <!-- nice-select -->

    <script src="{{ asset('template/assets/vendor/flatpickr-master/js/flatpickr.js') }}"></script>
    <script src="{{ asset('template/assets/js/dlabnav-init.js') }}"></script>
    <script src="{{ asset('template/assets/js/custom.min.js') }}"></script>
    <script src="{{ asset('template/assets/js/styleSwitcher.js') }}"></script>
    <script src="{{ asset('template/assets/js/demo.js') }}"></script>

    @stack('scripts')

</body>

</html>