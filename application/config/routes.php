<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['admin/login'] = 'login/index';
$route['user/login'] = 'login/user_index';
$route['logout'] = 'login/logout';

$route['rekam-medis/rawat-jalan'] = 'rekammedis/rawat_jalan';
$route['rekam-medis/rawat-inap'] = 'rekammedis/rawat_inap';

$route['rekam-medis/find'] = 'rekammedis/find';
$route['rekam-medis/delete'] = 'rekammedis/delete';
$route['rekam-medis/add'] = 'rekammedis/add';
$route['rekam-medis/add-inap'] = 'rekammedis/add_inap';
$route['rekam-medis/rekam-jalan-all'] = 'rekammedis/getRekamJalan';
$route['rekam-medis/rekam-inap-all'] = 'rekammedis/getRekamInap';

$route['pendaftaran/rawat-jalan'] = 'pendaftaran/rawat_jalan';
$route['pendaftaran/rawat-inap'] = 'pendaftaran/rawat_inap';

$route['transaksi/find'] = 'transaksi/find';
$route['transaksi/rawat-jalan'] = 'transaksi/rawat_jalan';
$route['transaksi/rawat-inap'] = 'transaksi/rawat_inap';
$route['transaksi/transaksi-jalan-all'] = 'transaksi/getRekamJalan';
$route['transaksi/transaksi-inap-all'] = 'transaksi/getRekamInap';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
