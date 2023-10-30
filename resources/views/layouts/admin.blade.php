<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-name" content="quixlab" />
    <title>@yield('title','admin')</title>

    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('admin')}}/images/favicon.png">
    <link href="{{asset('admin')}}/plugins/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('admin')}}/plugins/chartist/css/chartist.min.css">
    <link rel="stylesheet" href="{{asset('admin')}}/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css">
    <link href="{{asset('admin')}}/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    @stack('css')

</head>

<body>

    <div id="main-wrapper">

        <div class="nav-header">
            <div class="brand-logo">
                <a href="{{url('admin/dashboard')}}">
                    <b class="logo-abbr"><img src="{{asset('admin')}}/images/logo.png" alt=""> </b>
                    <span class="logo-compact"><img src="{{asset('admin')}}/images/logo-compact.png" alt=""></span>
                    
                    <span class="brand-title">
                        <h5 class="text-white">BMSC Admin Pannel</h5>
                        {{-- <img src="{{asset('admin')}}/images/scholl-logo.png" alt="logo"> --}}
                        {{-- <img src="{{asset('admin')}}/images/logo-text.png" alt="logo"> --}}
                    </span>
                </a>
            </div>
        </div>
        <div class="header">
            <div class="header-content clearfix">
                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="nk-sidebar">
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label">Dashboard</li>
                    <li>
                        <a href="{{url('admin/dashboard')}}" aria-expanded="false"
                            class="{{Request::is('admin/dashboard') ? 'active':''}}">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('admin/users')}}" aria-expanded="false"
                            class="{{Request::is('admin/users*') ? 'active':''}}">
                            <i class="icon-people menu-icon"></i><span class="nav-text">Users</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('admin/teachers')}}" aria-expanded="false"
                            class="{{Request::is('admin/teachers*') ? 'active':''}}">
                            <i class="icon-grid menu-icon"></i><span class="nav-text">Teachers</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('admin/departments')}}" aria-expanded="false"
                            class="{{Request::is('admin/departments*') ? 'active':''}}">
                            <i class="icon-badge menu-icon"></i><span class="nav-text">Department</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('admin/news/')}}" aria-expanded="false"
                            class="{{Request::is('admin/news*') ? 'active':''}}">
                            <i class="icon-notebook menu-icon"></i><span class="nav-text">News</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('admin/future/')}}" aria-expanded="false"
                            class="{{Request::is('admin/future*') ? 'active':''}}">
                            <i class="icon-note menu-icon"></i><span class="nav-text">Upcomeing Event</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('admin/contact')}}" aria-expanded="false"
                            class="{{Request::is('admin//contact*') ? 'active':''}}">
                            <i class="icon-envelope menu-icon"></i><span class="nav-text">Contact</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('/')}}" aria-expanded="false">
                            <i class="icon-globe menu-icon"></i><span class="nav-text">Visit Website</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}" aria-expanded="false"
                            onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                            <i class="icon-power menu-icon"></i><span class="nav-text">Logout</span>
                        </a>
                        <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>

                </ul>
            </div>
        </div>

        <div class="content-body">

            <div class="container-fluid mt-3">
                @yield('contents')
            </div>

            <div class="footer">
                <div class="copyright">
                    <p>Copyright &copy; Designed & Developed by <a
                            href="https://themeforest.net/user/quixlab">Quixlab</a> 2023</p>
                </div>
            </div>
        </div>


        <script src="{{asset('admin')}}/plugins/common/common.min.js"></script>
        <script src="{{asset('admin')}}/js/custom.min.js"></script>
        <script src="{{asset('admin')}}/js/settings.js"></script>
        <script src="{{asset('admin')}}/js/gleek.js"></script>
        <script src="{{asset('admin')}}/js/styleSwitcher.js"></script>
        <script src="{{asset('admin')}}/plugins/chart.js/Chart.bundle.min.js"></script>
        <script src="{{asset('admin')}}/plugins/circle-progress/circle-progress.min.js"></script>
        <script src="{{asset('admin')}}/plugins/d3v3/index.js"></script>
        <script src="{{asset('admin')}}/plugins/topojson/topojson.min.js"></script>
        <script src="{{asset('admin')}}/plugins/datamaps/datamaps.world.min.js"></script>
        <script src="{{asset('admin')}}/plugins/raphael/raphael.min.js"></script>
        <script src="{{asset('admin')}}/plugins/morris/morris.min.js"></script>
        <script src="{{asset('admin')}}/plugins/moment/moment.min.js"></script>
        <script src="{{asset('admin')}}/plugins/pg-calendar/js/pignose.calendar.min.js"></script>
        <script src="{{asset('admin')}}/plugins/chartist/js/chartist.min.js"></script>
        <script src="{{asset('admin')}}/plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js"></script>

        <script src="{{asset('admin')}}/js/dashboard/dashboard-1.js"></script>
        <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
        <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
        {!! Toastr::message() !!}
        @stack('js')

</body>

</html>
