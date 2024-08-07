<!DOCTYPE html>
<!--
  HOW TO USE:
  data-layout: fluid (default), boxed
  data-sidebar-theme: dark (default), colored, light
  data-sidebar-position: left (default), right
  data-sidebar-behavior: sticky (default), fixed, compact
-->
<html lang="en" data-bs-theme="light" data-layout="fluid" data-sidebar-theme="light" data-sidebar-position="left"
    data-sidebar-behavior="sticky">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Bootstrap 5 Admin &amp; Dashboard Template">
    <meta name="author" content="Bootlab">

    <title>PHL</title>

    <link rel="canonical" href="https://appstack.bootlab.io/pages-blank.html" />
    <link rel="shortcut icon" href="img/favicon.ico">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">

    <link href="{{ url('appstack/css/app.css') }}" rel="stylesheet">

    <!-- BEGIN SETTINGS -->
    <!-- Remove this after purchasing -->
    <script src="js/settings.js"></script>
    <!-- END SETTINGS -->

    
    @yield('header')
</head>

<body>
    <div class="wrapper">
        <nav id="sidebar" class="sidebar">
            <div class="sidebar-content js-simplebar">
                <a class="sidebar-brand" href="index.html">
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                        x="0px" y="0px" width="20px" height="20px" viewBox="0 0 20 20"
                        enable-background="new 0 0 20 20" xml:space="preserve">
                        <path d="M19.4,4.1l-9-4C10.1,0,9.9,0,9.6,0.1l-9,4C0.2,4.2,0,4.6,0,5s0.2,0.8,0.6,0.9l9,4C9.7,10,9.9,10,10,10s0.3,0,0.4-0.1l9-4
              C19.8,5.8,20,5.4,20,5S19.8,4.2,19.4,4.1z" />
                        <path d="M10,15c-0.1,0-0.3,0-0.4-0.1l-9-4c-0.5-0.2-0.7-0.8-0.5-1.3c0.2-0.5,0.8-0.7,1.3-0.5l8.6,3.8l8.6-3.8c0.5-0.2,1.1,0,1.3,0.5
              c0.2,0.5,0,1.1-0.5,1.3l-9,4C10.3,15,10.1,15,10,15z" />
                        <path d="M10,20c-0.1,0-0.3,0-0.4-0.1l-9-4c-0.5-0.2-0.7-0.8-0.5-1.3c0.2-0.5,0.8-0.7,1.3-0.5l8.6,3.8l8.6-3.8c0.5-0.2,1.1,0,1.3,0.5
              c0.2,0.5,0,1.1-0.5,1.3l-9,4C10.3,20,10.1,20,10,20z" />
                    </svg>

                    <span class="align-middle me-3">AppStack</span>
                </a>

                <ul class="sidebar-nav">
                    <li class="sidebar-header">
                        Navigation
                    </li>
                 
                    @if(auth()->user()->role_id == 1)

                    <li class="sidebar-item">
                        <a href="{{route('dashboard')}}" class="sidebar-link">
                            <i class="align-middle text-body" data-lucide="home"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a href="{{route('anggota.index')}}" class="sidebar-link">
                            <i class="align-middle text-body" data-lucide="users"></i>
                            <span>Anggota</span>
                        </a>
                    </li>

                    @endif 

                    @if(auth()->user()->role_id == 2)

                    <li class="sidebar-item">
                        <a href="{{route('dashboard')}}" class="sidebar-link">
                            <i class="align-middle text-body" data-lucide="home"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a href="{{route('satuan-kerja.index')}}" class="sidebar-link">
                            <i class="align-middle text-body" data-lucide="file"></i>
                            <span>Satuan Kerja</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a href="{{route('anggota.index')}}" class="sidebar-link">
                            <i class="align-middle text-body" data-lucide="users"></i>
                            <span>Anggota</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a href="{{route('user.index')}}" class="sidebar-link">
                            <i class="align-middle text-body" data-lucide="user-check"></i>
                            <span>Pegawai</span>
                        </a>
                    </li>

                    @endif

                </ul>

                {{-- <div class="sidebar-cta">
                    <div class="sidebar-cta-content">
                        <strong class="d-inline-block mb-2">Monthly Sales Report</strong>
                        <div class="mb-3 text-sm">
                            Your monthly sales report is ready for download!
                        </div>

                        <div class="d-grid">
                            <a href="https://themes.getbootstrap.com/product/appstack-responsive-admin-template/"
                                class="btn btn-primary" target="_blank">Download</a>
                        </div>
                    </div>
                </div> --}}
            </div>
        </nav>
        <div class="main">
            <nav class="navbar navbar-expand navbar-bg">
                <a class="sidebar-toggle">
                    <i class="hamburger align-self-center"></i>
                </a>

                <div class="navbar-collapse collapse">
                    <ul class="navbar-nav navbar-align">
                        <li class="nav-item dropdown">
                            <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#"
                                data-bs-toggle="dropdown">
                                <i class="align-middle" data-lucide="settings"></i>
                            </a>

                            <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#"
                                data-bs-toggle="dropdown">
                                {{-- <img src="img/avatars/avatar.jpg" class="img-fluid rounded-circle me-1 mt-n2 mb-n2"
                                    alt="Chris Wood" width="40" height="40" /> <span>Chris Wood</span> --}}
                                    <span>{{auth()->user()->email}}</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="pages-profile.html"><i class="align-middle me-1"
                                        data-lucide="user"></i> Profile</a>
                                <a class="dropdown-item" href="#"><i class="align-middle me-1"
                                        data-lucide="pie-chart"></i> Analytics</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="pages-settings.html">Settings & Privacy</a>
                                <a class="dropdown-item" href="#">Help</a>
                                <a class="dropdown-item" href="#">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="content">
                
                @yield('content')
            </main>

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row text-muted">
                        <div class="col-6 text-start">
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <a class="text-muted" href="#">Support</a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="text-muted" href="#">Help Center</a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="text-muted" href="#">Privacy</a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="text-muted" href="#">Terms of Service</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-6 text-end">
                            <p class="mb-0">
                                &copy; 2024 - <a href="index.html" class="text-muted">AppStack</a>
                            </p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="{{ url('appstack/js/jquery.min.js') }}"></script>
    <script src="{{ url('appstack/js/app.js') }}"></script>
    <script> 
        window.BASE_URL = "{{url('/')}}";
        window.UPLOAD_URL = BASE_URL + '/uploads';
    </script> 
    @yield('footer')

</body>

</html>
