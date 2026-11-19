<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>GadgetStore | @yield('title', 'Dashboard')</title>

    <!-- Font Nunito -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}"
        rel="stylesheet">

    <!-- SB Admin 2 CSS -->
    <link href="{{ asset('css/sb-admin-2.min.css') }}"
        rel="stylesheet">

    <!-- Custom Layout Styling -->
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f1f4fa;
            color: #293650;
        }

        #wrapper {
            min-height: 100vh;
        }

        #content-wrapper {
            background-color: #f1f4fa;
        }

        #content {
            padding-bottom: 20px;
        }

        .container-fluid {
            padding-left: 22px;
            padding-right: 22px;
        }

        .page-title {
            color: #263653;
            font-size: 25px;
            font-weight: 800;
            margin-bottom: 8px;
        }

        /* Sidebar */
        #accordionSidebar {
            background: linear-gradient(180deg, #2447b5 0%, #193b9e 100%);
            box-shadow: 3px 0 15px rgba(24, 52, 120, 0.12);
        }

        #accordionSidebar .sidebar-brand {
            height: 75px;
            border-bottom: 1px solid rgba(255,255,255,.13);
        }

        #accordionSidebar .sidebar-brand-text {
            font-size: 14px;
            font-weight: 800;
            letter-spacing: .7px;
        }

        #accordionSidebar .nav-item .nav-link {
            margin: 4px 12px;
            border-radius: 8px;
            transition: all .2s ease;
        }

        #accordionSidebar .nav-item .nav-link:hover {
            background: rgba(255,255,255,.13);
        }

        #accordionSidebar .nav-item.active .nav-link {
            background: rgba(255,255,255,.18);
            color: #fff;
            font-weight: 700;
        }

        #accordionSidebar .sidebar-heading {
            color: rgba(255,255,255,.62);
            font-weight: 700;
        }

        /* Topbar */
        .topbar {
            background: #ffffff;
            border-radius: 0;
            border-bottom: 1px solid #e8edf5;
        }

        /* Footer */
        .sticky-footer {
            background: #ffffff;
            border-top: 1px solid #e8edf5;
        }

        .sticky-footer .copyright {
            color: #8290a8;
            font-size: 12px;
        }

        /* Scroll button */
        .scroll-to-top {
            background: #3478f6;
        }

        .scroll-to-top:hover {
            background: #245fda;
        }

        @media (max-width: 768px) {
            .container-fluid {
                padding-left: 14px;
                padding-right: 14px;
            }

            .page-title {
                font-size: 21px;
            }
        }
    </style>

    @stack('styles')

    <link rel="icon" type="image/png" href="https://th.bing.com/th/id/OIP.-safiTNn72gALUHNzNjNWgAAAA?w=192&h=193&c=7&r=0&o=7&dpr=1.3&pid=1.7&rm=3"

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('layouts.sidebar')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('layouts.topbar')

                <!-- Page Content -->
                <div class="container-fluid">

                    @hasSection('page-heading')
                        <div class="mb-3">
                            <h1 class="page-title">
                                @yield('page-heading')
                            </h1>
                        </div>
                    @endif

                    @yield('content')

                </div>
                <!-- End Page Content -->

            </div>
            <!-- End Main Content -->

            <!-- Footer -->
            @include('layouts.footer')

        </div>
        <!-- End Content Wrapper -->

    </div>
    <!-- End Page Wrapper -->

    <!-- Scroll to Top -->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- jQuery -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>

    <!-- Bootstrap Bundle -->
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- jQuery Easing -->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- SB Admin 2 JS -->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

    <!-- Additional Page Scripts -->
    @stack('scripts')

</body>
</html>
