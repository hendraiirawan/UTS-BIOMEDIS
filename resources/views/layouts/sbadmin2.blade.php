<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Eclipse Medical Center</title>

    <link href="/medilab/assets/img/lgors16x16.png" rel="icon">
    <link href="/medilab/assets/img/lgors16x16.png" rel="apple-touch-icon">

    <!-- Custom fonts for this template-->
    <link href="{{ asset('sbadmin2') }}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="{{ asset('sbadmin2') }}/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="{{ asset('sbadmin2') }}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!-- Custom styles for this page -->

</head>

<body id="page-top" onload="realtimeClock()">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/home">
                <div class="sidebar-brand-icon rotate-n-15">
                <img src="{{ asset ('medilab/assets/img/lgors16x16.png') }}" alt="" class="img-fluid">
                </div>
                <div class="sidebar-brand-text mx-1">Eclipse MediCen</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ Route::is('home*') ? 'active' : '' }}">
                <a class="nav-link" href="/home">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            @if (auth()->user()->role == 'admin')
                <li class="nav-item {{ Route::is('user.*') ? 'active' : '' }} ">
                    <a class="nav-link" href="/user">
                        <i class="fas fa -fw fa-users"></i>
                        <span>Data User</span></a>
                </li>
            @endif

            @if (auth()->user()->role == 'dokter')

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-solid fa-clock"></i>
                    <span>Absensi</span>
                </a>
                <div id="collapsePages" class="collapse {{ Route::is('laporan.*') ? 'show' : '' }} "
                    aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item {{ Route::is('presensi-masuk') ? 'active' : '' }}"
                        href="/presensi-masuk">Presensi Masuk</a>
                        <a class="collapse-item {{ Route::is('presensi-keluar') ? 'active' : '' }}"
                        href="/presensi-keluar">Presensi Keluar</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                        aria-expanded="true" aria-controls="collapseUtilities">
                        <i class="fas fa-fw fa-users"></i>
                        <span>Administrasi</span>
                    </a>
                    <div id="collapseUtilities" class="collapse {{ Route::is('administrasi.*') ? 'show' : '' }} "
                        aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Administrasi Pasien:</h6>
                            <a class="collapse-item {{ Route::is('administrasi.create') ? 'active' : '' }}"
                                href="/administrasi/create">Tambah Pasien</a>
                            <a class="collapse-item {{ Route::is('administrasi.index') ? 'active' : '' }}"
                                href="/administrasi">Daftar Konsultasi Pasien</a>
                        </div>
                    </div>
            </li>
            @endif

            @if (auth()->user()->role == 'pasien')
                <li class="nav-item {{ Route::is('pasien.create') ? 'active' : '' }} ">
                    <a class="nav-link" href="/pasien/create">
                    <i class="fas fa-solid fa-address-card"></i>
                        <span>Registrasi Pasien</span></a>
                </li>
            @endif


            @if (auth()->user()->role == 'pasien')
                <li class="nav-item {{ Route::is('administrasi.index') ? 'active' : '' }} ">
                    <a class="nav-link" href="/administrasi/create">
                        <i class="fas fa -fw fa-users"></i>
                        <span>Konsultasi dokter</span></a>
                </li>
            @endif

            @if (auth()->user()->role == 'pasien')
                <li class="nav-item {{ Route::is('administrasi.index') ? 'active' : '' }}">
                    <a class="nav-link" href="/administrasi">
                        <i class="fas fa-fw fa-users"></i>
                        <span>Hasil dokter</span>
                    </a>
                </li>
            @endif

            <!-- Nav Item - Pages Collapse Menu -->
            @if (auth()->user()->role == 'admin')
                <!-- Divider -->
                <hr class="sidebar-divider">
                <!-- Heading -->
                <div class="sidebar-heading">
                    Data Master
                </div>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                        aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-solid fa-hospital"></i>
                        <span>Data Klinik</span>
                    </a>
                    <div id="collapseTwo"
                        class="collapse
                {{ Route::is('dokter.*') ? 'show' : '' }}
                {{ Route::is('pasien.*') ? 'show' : '' }}
                {{ Route::is('poli.*') ? 'show' : '' }}"
                        aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Data Pasien:</h6>
                            <a class="collapse-item {{ Route::is('pasien.create') ? 'active' : '' }}"
                                href="/pasien/create">Tambah Pasien</a>
                            <a class="collapse-item {{ Route::is('pasien.index') ? 'active' : '' }}" href="/pasien">
                                Data Pasien</a>
                            <h6 class="collapse-header">Data Dokter:</h6>
                            <a class="collapse-item {{ Route::is('dokter.create') ? 'active' : '' }}"
                                href="/dokter/create">Tambah Dokter</a>
                            <a class="collapse-item {{ Route::is('dokter.index') ? 'active' : '' }}" href="/dokter">
                                Data Dokter</a>
                            <a class="collapse-item {{ Route::is('filter-data-keseluruhan') ? 'active' : '' }}" href="/filter-data">
                                Absen Dokter</a>
                            <h6 class="collapse-header">Data Poli:</h6>
                            <a class="collapse-item {{ Route::is('poli.create') ? 'active' : '' }}"
                                href="/poli/create">Tambah Poli</a>
                            <a class="collapse-item {{ Route::is('poli.index') ? 'active' : '' }}" href="/poli">
                                Data Poli</a>
                        </div>
                    </div>
                </li>
            @endif


            <!-- Nav Item - Utilities Collapse Menu -->
            @if (auth()->user()->role == 'admin' || auth()->user() == 'operator')
                <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                        aria-expanded="true" aria-controls="collapseUtilities">
                        <i class="fas fa-fw fa-wrench"></i>
                        <span>Administrasi</span>
                    </a>
                    <div id="collapseUtilities" class="collapse {{ Route::is('administrasi.*') ? 'show' : '' }} "
                        aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Administrasi:</h6>
                            <a class="collapse-item {{ Route::is('administrasi.create') ? 'active' : '' }}"
                                href="/administrasi/create">Tambah administrasi</a>
                            <a class="collapse-item {{ Route::is('administrasi.index') ? 'active' : '' }}"
                                href="/administrasi">Daftar administrasi</a>
                            <a class="collapse-item {{ Route::is('laporan.adm') ? 'active' : '' }}"
                                href="/laporan/administrasi">Laporan administrasi</a>
                        </div>
                    </div>
                </li> 
            @endif


            <!-- Divider -->


            <!-- Heading -->
             

            <!-- Nav Item - Pages Collapse Menu -->
            

            
            <!-- Divider -->


            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
            

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">
                                    {{ \App\Models\Administrasi::where('status', 'baru')->count() }}
                                </span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Pendaftaran Baru
                                </h6>
                                @forelse (\App\Models\Administrasi::where('status', 'baru')->get() as $item)
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <div class="mr-3">
                                            <div class="icon-circle bg-primary">
                                                <i class="fas fa-file-alt text-white"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="small text-gray-500">{{ $item->tanggal->format('d F Y') }}
                                            </div>
                                            <span class="font-weight-bold">{{ $item->pasien->nama_pasien }} berobat ke
                                                poli {{ $item->poli }}</span>
                                        </div>
                                    </a>
                                @empty
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <div class="mr-3">
                                            <div class="icon-circle bg-primary">
                                                <i class="fas fa-file-alt text-white"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <span class="font-weight-bold">Data tidak ada</span>
                                        </div>
                                    </a>
                                @endforelse

                                <a class="dropdown-item text-center small text-gray-500"
                                    href="/administrasi">Tampillkan Semua</a>
                            </div>
                        </li>
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span
                                    class="mr-2 d-none d-lg-inline text-gray-600 small">{{ auth()->user()->name }}</span>
                                <img class="img-profile rounded-circle"
                                    src="{{ asset('sbadmin2/img/undraw_profile.svg') }}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="/profil/create">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="/logout">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    @include('flash::message')

                    @yield('content')

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Kelompok2 &copy; Eclipse Medical Center</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="/logout">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('sbadmin2') }}/vendor/jquery/jquery.min.js"></script>
    <script src="{{ asset('sbadmin2') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="{{ asset('sbadmin2') }}/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="{{ asset('sbadmin2') }}/js/jam.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="{{ asset('sbadmin2') }}/js/sb-admin-2.min.js"></script>
    <script src="{{ asset('sbadmin2') }}/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('sbadmin2') }}/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>
</body>

</html>