


<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand logo -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
            <div class="sidebar-brand-icon rotate-n-10">
                <i class="fa fa-graduation-cap"></i>
            </div>
            <div class="sidebar-brand-text mx-1">SIAwarak </sup></div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="index.html">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                aria-expanded="true" aria-controls="collapseTwo">
                <i class="fa fa-university"></i>
                <span title="Akademik">Akademik</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Sub-Menu Akademik:</h6>
                    <a title="Kelas" class="collapse-item" href="<?php echo base_url('administrator/kelas')?> ">Kelas</a>
                    <a title="Siswa" class="collapse-item" href="<?php echo base_url('administrator/siswa')?>">Siswa</a>
                    <a title="Mata Pelajaran" class="collapse-item" href="<?php echo base_url('administrator/mapel')?>">Mata Pelajaran</a>
                    <a title="Tahun Akademik" class="collapse-item" href="<?php echo base_url('administrator/tahun_akademik')?>">Tahun Akademik</a>
                    <a title="Jadwal Pelajaran" class="collapse-item" href="<?php echo base_url('administrator/jadwal')?>">Jadwal Pelajaran</a>
                    <a title="Guru" class="collapse-item" href="<?php echo base_url('administrator/guru')?>">Guru</a>
                    <a title="Semester" class="collapse-item" href="<?php echo base_url('administrator/semester')?>">Semester</a>
                    <a title="Presensi" class="collapse-item" href="<?php echo base_url('administrator/presensi')?>">Presensi</a>
                    <a title="User" class="collapse-item" href="<?php echo base_url('administrator/users')?>">User</a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Logout -->
        <li class="nav-item">
            <a class="nav-link" href="" data-target="#logoutModal" data-toggle="modal">
                <i class="fas fa-sign-out-alt"></i>
                <span>Logout</span></a>
        </li>
        
        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Anda yakin untuk keluar?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Pilih logout jika Anda ingin mengakhiri sesi ini.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                        <a class="btn btn-primary" href="<?php echo base_url('administrator/auth/logout')?>">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
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
                <form
                    method="post" action="<?php echo base_url('administrator/search/search')?>" n
                    class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                            aria-label="Search" aria-describedby="basic-addon2" name="keyword">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>

               
            </nav>
            <!-- End of Topbar -->