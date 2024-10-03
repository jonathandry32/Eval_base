<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <title>LARACROFT</title>
        <meta content="" name="description">
        <meta content="" name="keywords">

        <!-- Favicons -->
        <link href="{{ asset('img/itu.jpg') }}" rel="icon">
        <link href="{{ asset('img/apple-touch-icon.png') }}" rel="apple-touch-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.gstatic.com" rel="preconnect">
        <link
            href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
            rel="stylesheet">

        <!-- Vendor CSS Files -->
        <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
        <link href="{{ asset('vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
        <link href="{{ asset('vendor/quill/quill.snow.css') }}" rel="stylesheet">
        <link href="{{ asset('vendor/quill/quill.bubble.css') }}" rel="stylesheet">
        <link href="{{ asset('vendor/remixicon/remixicon.css') }}" rel="stylesheet">
        <link href="{{ asset('vendor/simple-datatables/style.css') }}" rel="stylesheet">
        <!-- Template Main CSS File -->
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    </head>
    <body>
        <!-- ======= Header ======= -->
        <header id="header" class="header fixed-top d-flex align-items-center">

            <div class="d-flex align-items-center justify-content-between">
                <a href="#" class="logo d-flex align-items-center">
                    <img src="{{ asset('img/itu.jpg') }}" alt="">
                    <span class="d-none d-lg-block">
                        <h4 style="margin-left: 10px; padding-top: 10px;">LARACROFT</h4>
                    </span>
                </a>
                <i class="bi bi-list toggle-sidebar-btn"></i>
            </div><!-- End Logo -->

            <div class="search-bar">
                <form action="InsertForm/rechercher" method="post" class="search-form d-flex align-items-center">
                    <input type="text" name="mot" placeholder="Search" title="Enter search keyword">
                    <button type="submit" title="Search"><i class="bi bi-search"></i></button>
                </form>
            </div>

           <nav class="header-nav ms-auto">
                <ul class="d-flex align-items-center">
                    <li class="nav-item d-block d-lg-none">
                        <a class="nav-link nav-icon search-bar-toggle " href="#">
                            <i class="bi bi-search"></i>
                        </a>
                    </li><!-- End Search Icon-->



                    <li class="nav-item dropdown pe-3">

                        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                            data-bs-toggle="dropdown">
                            <img src="{{ asset('img/itu.jpg') }}" alt="Profil"
                                class="rounded-circle">
                            <span class="d-none d-md-block dropdown-toggle ps-2">
                                
                            </span>
                        </a><!-- End Profile Iamge Icon -->

                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                            <li class="dropdown-header">
                                <h6>
                                    
                                </h6>
                                <span>Admin</span>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}">
                                    <i class="bi bi-box-arrow-right"></i>
                                    <span>Deconnexion</span>
                                </a>
                            </li>

                        </ul><!-- End Profile Dropdown Items -->
                    </li><!-- End Profile Nav -->

                </ul>
            </nav><!-- End Icons Navigation -->

        </header><!-- End Header -->

        <!-- ======= Sidebar ======= -->
        <aside id="sidebar" class="sidebar">

            <ul class="sidebar-nav" id="sidebar-nav">
                <li class="nav-heading">General</li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false"
                                aria-controls="ui-basic">
                                <i class="menu-icon mdi mdi-floor-plan"></i>
                                <span class="menu-title">Rôle et Permission</span>
                                <i class="menu-arrow"></i>
                            </a>
                            <div class="collapse" id="ui-basic">
                                <ul class="nav flex-column sub-menu">
                                    {{-- @can('gestion roles et permissions') --}}
                                    <li class="nav-item"> <a class="nav-link" href="{{ route('role.new') }}">Creation
                                            role</a></li>
                                    {{-- @endcan --}}
                                    <li class="nav-item"> <a class="nav-link"
                                            href="{{ route('role.attributPermissionToRole') }}">Attribution permission</a>
                                    </li>
                                    <li class="nav-item"> <a class="nav-link"
                                            href="{{ route('role.attributRoleUser') }}">Attribution Rôle aux User</a></li>
                                    <li class="nav-item"> <a class="nav-link" href="{{ route('role.list') }}">list</a>
                                    </li>
                                </ul>
                            </div>
                        </li> -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ route('dashboard') }}">
                        <i class="bi bi-house"></i>
                        <span>Accueil</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#services" data-bs-toggle="collapse" href="#">
                      <i class="bi bi-person-plus"></i><span>Services</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                     <ul id="services" class="nav-content collapse " data-bs-parent="#sidebar-nav">   <li class="nav-item">
                        <li>
                        <a class="nav-link collapsed"  href="{{ route('services.nouveau') }}">
                            <i class="bi bi-circle"></i><span>Insertion</span>
                        </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link collapsed"  href="{{ route('services.liste') }}">
                                <i class="bi bi-circle"></i><span>Liste</span>
                            </a>
                        </li>
                     </ul>
                </li>

                <li class="nav-heading">Admin</li>
                @role('admin')
                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#roleetpermissions" data-bs-toggle="collapse" href="#">
                      <i class="bi bi-person-plus"></i><span>Roles et permission</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                     <ul id="roleetpermissions" class="nav-content collapse " data-bs-parent="#sidebar-nav">   <li class="nav-item">
                        <li>
                        <a class="nav-link collapsed"  href="{{ route('role.new') }}">
                            <i class="bi bi-circle"></i><span>Insertion role</span>
                        </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link collapsed"  href="{{ route('role.attributPermissionToRole') }}">
                                <i class="bi bi-circle"></i><span>Attribution permission</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link collapsed"  href="{{ route('role.attributRoleUser') }}">
                                <i class="bi bi-circle"></i><span>Attribution Rôle aux User</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link collapsed"  href="{{ route('role.roleLists') }}">
                                <i class="bi bi-circle"></i><span>Liste rôles</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link collapsed"  href="{{ route('role.roleUsers') }}">
                                <i class="bi bi-circle"></i><span>Rôles utilisateur</span>
                            </a>
                        </li>
                     </ul>
                </li>
                @endrole
            </ul>

        </aside><!-- End Sidebar-->

            <!-- CONTENU -->
            
                        @yield('page-content')

<footer id="footer" class="footer">
    <div class="copyright">
        &copy; Copyright
    </div>
    <div class="credits">Chef de projet: <strong><span>ETU002040 : </span></strong>RANDRIANALY Andry Jonathan</div>
    <div class="credits">
                <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
        <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> -->
    </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="{{ asset('vendor/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('vendor/chart.js/chart.min.js') }}"></script>
<script src="{{ asset('vendor/echarts/echarts.min.js') }}"></script>
<script src="{{ asset('vendor/quill/quill.min.js') }}"></script>
<script src="{{ asset('vendor/simple-datatables/simple-datatables.js') }}"></script>
<script src="{{ asset('vendor/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('vendor/php-email-form/validate.js') }}"></script>

<!-- Template Main JS File -->
<script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
