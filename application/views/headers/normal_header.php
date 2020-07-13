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
    <link rel="stylesheet" href="<?= base_url() ?>public/dist/scss/style-gue.css">
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
    <script src="https://cdn.jsdelivr.net/npm/jquery-easy-loading@2.0.0-rc.2/dist/jquery.loading.min.js"></script>
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

<body class="hold-transition sidebar-mini app">
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
                        <li class="nav-header">SHORTCUT</li>
                        <?php if ($this->session->userdata('role_id') == '1' || $this->session->userdata('role_id') == '2') { ?>
                            <li class="nav-item has-treeview <?= ($page == 'rawat_jalan' || $page == 'rawat_inap') ? 'menu-open' : '' ?>">
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
                        <?php } ?>

                        <li class="nav-item has-treeview <?= ($page == 'rekam-jalan' || $page == 'rekam-inap' || $page == 'rekam-medis') ? 'menu-open' : '' ?>">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-notes-medical"></i>
                                <p>
                                    Rekam Medis
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= base_url() ?>rekam-medis/rawat-jalan" class="nav-link <?= ($page == 'rekam-jalan') ? 'active' : '' ?>">
                                        <i class="fas fa-user-injured nav-icon"></i>
                                        <p>Rekam Jalan</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url() ?>rekam-medis/rawat-inap" class="nav-link <?= ($page == 'rekam-inap') ? 'active' : '' ?>">
                                        <i class="fas fa-procedures nav-icon"></i>
                                        <p>Rekam Inap</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url() ?>rekam-medis" class="nav-link <?= ($page == 'rekam-medis') ? 'active' : '' ?>">
                                        <i class="fas fa-users nav-icon"></i>
                                        <p>All Data</p>
                                    </a>
                                </li>
                            </ul>
                        </li>


                        <li class="nav-header">Master</li>

                        <li class="nav-item has-treeview <?= ($page == 'transaksi-jalan' || $page == 'transaksi-inap') ? 'menu-open' : '' ?>">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-money-bill"></i>
                                <p>
                                    Transaksi
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= base_url() ?>transaksi/rawat-jalan" class="nav-link <?= ($page == 'transaksi-jalan') ? 'active' : '' ?>">
                                        <i class="fas fa-user-injured nav-icon"></i>
                                        <p>Transaksi Jalan</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url() ?>transaksi/rawat-inap" class="nav-link <?= ($page == 'transaksi-inap') ? 'active' : '' ?>">
                                        <i class="fas fa-procedures nav-icon"></i>
                                        <p>Transaksi Inap</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <?php if ($this->session->userdata('role_id') == '1') { ?>
                            <li class="nav-item has-treeview <?= ($page == 'admin-poliklinik' || $page == 'admin-poliklinik-jadwal') ? 'menu-open' : '' ?>">
                                <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-clinic-medical"></i>
                                    <p>
                                        Poliklinik
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?= base_url() ?>admin/poliklinik" class="nav-link <?= ($page == 'admin-poliklinik') ? 'active' : '' ?>">
                                            <i class="fas fa-user-injured nav-icon"></i>
                                            <p>List Poliklinik</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= base_url() ?>admin/jadwal-poliklinik" class="nav-link <?= ($page == 'admin-poliklinik-jadwal') ? 'active' : '' ?>">
                                            <i class="fas fa-procedures nav-icon"></i>
                                            <p>Jadwal Poliklinik</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item has-treeview <?= ($page == 'ruangan' || $page == 'ruang_rawat') ? 'menu-open' : '' ?>">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-hospital-alt"></i>
                                    <p>
                                        Ruangan
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview ">
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
                        <?php } ?>

                        <li class="nav-item">
                            <a href="<?= base_url() ?>admin/guides" class="nav-link <?= ($page == 'admin-guides') ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    Guides
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