<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Skydash Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('vendors') }}/feather/feather.css">
    <link rel="stylesheet" href="{{ asset('vendors') }}/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="{{ asset('vendors') }}/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="{{ asset('vendors') }}/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('vendors') }}/mdi/css/materialdesignicons.min.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- <link rel="stylesheet" href="assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css"> -->
    <link rel="stylesheet" href="{{ asset('vendors') }}/datatables.net-bs5/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="{{ asset('vendors') }}/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('js') }}/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('css') }}/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('images') }}/favicon.png" />
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css" rel="stylesheet">

</head>
<!-- Bootstrap 5 JS (dropdown support) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row justify-content-between"
            style="background-color: #ffffff;">
            {{-- Kiri: Logo --}}
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start ps-3">
                <a class="navbar-brand brand-logo me-5" href="#"><img src="{{ asset('images/logo.svg') }}" class="me-2"
                        alt="logo" /></a>
                <a class="navbar-brand brand-logo-mini" href="#"><img src="{{ asset('images/logo-mini.svg') }}"
                        alt="logo" /></a>
            </div>

            {{-- Kanan: Profile, Nama, dan Logout Dropdown --}}
            <div class="d-flex align-items-center pe-4">
                @if(Auth::check())
                    <div class="dropdown">
                        <a class="d-flex align-items-center text-dark text-decoration-none dropdown-toggle" href="#"
                            id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="mdi mdi-account-circle" style="font-size: 24px;"></i>
                            <span class="ms-2 fw-bold">{{ Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="dropdownUser">
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">
                                        <i class="mdi mdi-logout me-2"></i> Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>

                @endif
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/">
                            <i class="icon-grid menu-icon"></i>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>

                    @if(punya_akses('akses_galeri'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('galeri') }}">
                                <i class="icon-grid menu-icon"></i>
                                <span class="menu-title">Galeri</span>
                            </a>
                        </li>
                    @endif

                    @if(punya_akses('akses_kontak'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('kontak') }}">
                                <i class="icon-grid menu-icon"></i>
                                <span class="menu-title">Informasi Kontak</span>
                            </a>
                        </li>
                    @endif

                    @if(punya_akses('akses_tentang'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('tentangkami') }}">
                                <i class="icon-grid menu-icon"></i>
                                <span class="menu-title">Tentang Kami</span>
                            </a>
                        </li>
                    @endif

                    @if(punya_akses('akses_berita'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('berita') }}">
                                <i class="icon-grid menu-icon"></i>
                                <span class="menu-title">Berita</span>
                            </a>
                        </li>
                    @endif

                    @if(punya_akses('akses_roles'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/roles') }}">
                                <i class="icon-grid menu-icon"></i>
                                <span class="menu-title">Role</span>
                            </a>
                        </li>
                    @endif

                    @if(punya_akses('akses_user'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('users') }}">
                                <i class="icon-grid menu-icon"></i>
                                <span class="menu-title">User</span>
                            </a>
                        </li>
                    @endif
                </ul>
            </nav>
            <!-- partial -->
            <div class="main-panel">