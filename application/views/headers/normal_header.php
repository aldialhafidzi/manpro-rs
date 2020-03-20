<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> <?= $title; ?> </title>
    <link rel="stylesheet" href="<?= base_url() ?>public/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="<?= base_url() ?>public/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>public/plugins/toastr/toastr.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>public/dist/css/adminlte.css">
    <link rel="stylesheet" href="<?= base_url() ?>public/dist/scss/style-gue.scss">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url() ?>public/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>public/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>public/plugins/daterangepicker/daterangepicker.css">

    <script src="<?= base_url() ?>public/plugins/jquery/jquery.js"></script>
    <script src="<?= base_url() ?>public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>public/plugins/datatables/jquery.dataTables.js"></script>
    <script src="<?= base_url() ?>public/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
    <script src="<?= base_url() ?>/public/dist/js/adminlte.js"></script>
    <script src="<?= base_url() ?>public/plugins/chart.js/Chart.min.js"></script>
    <script src="<?= base_url() ?>public/dist/js/demo.js"></script>
    <script src="<?= base_url() ?>public/dist/js/pages/dashboard3.js"></script>
    <script src="<?= base_url() ?>public/plugins/select2/js/select2.full.min.js"></script>
    <script src="<?= base_url() ?>public/plugins/moment/moment.min.js"></script>
    <script src="<?= base_url() ?>public/plugins/daterangepicker/daterangepicker.js"></script>
    <script src="<?= base_url() ?>public/plugins/jquery-validation/jquery.validate.min.js"></script>
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to to the body tag
to get the desired effect
|---------------------------------------------------------|
|LAYOUT OPTIONS | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <form class="form-inline ml-3">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-comments"></i>
                        <span class="badge badge-danger navbar-badge">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="#" class="dropdown-item">
                            <div class="media">
                                <img src="<?= base_url() ?>public/dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Brad Diesel
                                        <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">Call me whenever you can...</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <div class="media">
                                <img src="<?= base_url() ?>public/dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        John Pierce
                                        <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">I got your message bro</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <div class="media">
                                <img src="<?= base_url() ?>public/dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Nora Silvester
                                        <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">The subject goes here</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>

        <aside class="main-sidebar sidebar-light-warning elevation-4">
            <a href="index3.html" class="brand-link">
                <img src="<?= base_url() ?>public/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <h4 class="brand-text font-weight-light text-center text-light">MANPRO-APP</h4>
            </a>

            <div class="sidebar">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?= base_url() ?>public/dist/img/admin.png" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">
                            <?= $this->session->userdata('name') ?>
                        </a>
                        <small class="text-light">Your login as <span style="text-transform: capitalize;"><?= $this->session->userdata('role_name') ?></span></small>
                    </div>
                </div>
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="<?= base_url() ?>admin" class="nav-link <?= ($page == 'dashboard') ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                    <span class="badge badge-info right">87</span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon far fa-plus-square"></i>
                                <p>
                                    Pendaftaran
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= base_url() ?>pendaftaran/rawat-jalan" class="nav-link <?= ($page == 'rawat_jalan') ? 'active' : '' ?>">
                                        <i class="fas fa-ambulance nav-icon"></i>
                                        <p>Rawat Jalan</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url() ?>pendaftaran/rawat-inap" class="nav-link <?= ($page == 'rawat_inap') ? 'active' : '' ?>">
                                        <i class="fas fa-clinic-medical nav-icon"></i>
                                        <p>Rawat Inap</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- <li class="nav-header">REKAM MEDIS</li> -->
                        <li class="nav-item has-treeview <?= ($page == 'rekam_medis_jalan' || $page == 'rekam_medis_inap') ? 'menu-open' : '' ?>">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-notes-medical"></i>
                                <p>
                                    Rekam Medis
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= base_url() ?>admin/rekam-medis/rawat-jalan" class="nav-link <?= ($page == 'rekam-medis') ? 'active' : '' ?>">
                                        <i class="fas fa-user-injured nav-icon"></i>
                                        <p>List Diagnosa Rajal</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url() ?>admin/rekam-medis/rawat-inap" class="nav-link <?= ($page == 'rawat-inap') ? 'active' : '' ?>">
                                        <i class="fas fa-book-medical nav-icon"></i>
                                        <p>List Diagnosa Ranap</p>
                                    </a>
                                </li>
                            </ul>
                        </li>


                        <li class="nav-header">Master</li>

                        <li class="nav-item">
                            <a href="<?= base_url() ?>admin/transaksi" class="nav-link <?= ($page == 'admin-transaksi') ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-money-bill"></i>
                                <p>
                                    Transaksi
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?= base_url() ?>admin/poliklinik" class="nav-link <?= ($page == 'admin-poliklinik') ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-clinic-medical"></i>
                                <p>
                                    Poliklinik
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?= base_url() ?>admin/dokter" class="nav-link <?= ($page == 'admin-dokter') ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-user-nurse"></i>
                                <p>
                                    Dokter
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?= base_url() ?>admin/pasien" class="nav-link <?= ($page == 'admin-pasien') ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Pasien
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?= base_url() ?>admin/specialization" class="nav-link <?= ($page == 'admin-specialization') ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-user-tag"></i>
                                <p>
                                    Dokter Specialization
                                </p>
                            </a>
                        </li>

                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon far fa-plus-square"></i>
                                <p>
                                    Ruangan
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= base_url() ?>ruangrawat/ruangan" class="nav-link <?= ($page == 'ruangan') ? 'active' : '' ?>">
                                        <i class="fas fa-ambulance nav-icon"></i>
                                        <p>List Ruangan</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url() ?>ruangrawat/ruang_rawat" class="nav-link <?= ($page == 'ruang_rawat') ? 'active' : '' ?>">
                                        <i class="fas fa-clinic-medical nav-icon"></i>
                                        <p>Ruang Rawat</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="<?= base_url() ?>admin/tindakan" class="nav-link <?= ($page == 'admin-tindakan') ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-medkit"></i>
                                <p>
                                    Tindakan
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?= base_url() ?>admin/penyakit" class="nav-link <?= ($page == 'admin-penyakit') ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-biohazard"></i>
                                <p>
                                    Penyakit
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?= base_url() ?>admin/obat" class="nav-link <?= ($page == 'admin-obat') ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-capsules"></i>
                                <p>
                                    Obat
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?= base_url() ?>admin/user" class="nav-link <?= ($page == 'admin-user') ? 'active' : '' ?>">
                                <i class="nav-icon far fa-user"></i>
                                <p>
                                    Users
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?= base_url() ?>admin/role" class="nav-link <?= ($page == 'admin-role') ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-users-cog"></i>
                                <p>
                                    User Roles
                                </p>
                            </a>
                        </li>

                        <li class="nav-header"></li>

                        <li class="nav-item mb-5">
                            <a href="<?= base_url() ?>/logout" class="nav-link">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p>
                                    Logout
                                </p>
                            </a>
                        </li>

                    </ul>
                </nav>
            </div>
        </aside>