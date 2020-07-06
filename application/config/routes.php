<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['admin/login'] = 'login/index';
$route['user/login'] = 'login/user_index';
$route['logout'] = 'login/logout';

$route['rekam-medis/rawat-jalan'] = 'RekamMedis/rawat_jalan';
$route['rekam-medis/rawat-inap'] = 'RekamMedis/rawat_inap';

$route['rekam-medis'] = 'RekamMedis/index';
$route['rekam-medis/find'] = 'RekamMedis/find';
$route['rekam-medis/delete'] = 'RekamMedis/delete';
$route['rekam-medis/add'] = 'RekamMedis/add';
$route['rekam-medis/add-inap'] = 'RekamMedis/add_inap';
$route['rekam-medis/rekam-all'] = 'RekamMedis/getRekamMedis';
$route['rekam-medis/rekam-jalan-all'] = 'RekamMedis/getRekamJalan';
$route['rekam-medis/rekam-inap-all'] = 'RekamMedis/getRekamInap';

$route['pendaftaran/rawat-jalan'] = 'pendaftaran/rawat_jalan';
$route['pendaftaran/rawat-inap'] = 'pendaftaran/rawat_inap';

$route['transaksi/find'] = 'transaksi/find';
$route['transaksi/rawat-jalan'] = 'transaksi/rawat_jalan';
$route['transaksi/rawat-inap'] = 'transaksi/rawat_inap';
$route['transaksi/transaksi-jalan-all'] = 'transaksi/getRekamJalan';
$route['transaksi/transaksi-inap-all'] = 'transaksi/getRekamInap';

$route['tipepasien/search'] = 'TipePasien/search';
$route['tindakan/search'] = 'Tindakan/search';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Randy
$route['ruangrawat/ruangan'] = 'RuangRawat/ruangan';
$route['ruangrawat/ruang_rawat'] = 'RuangRawat/ruang_rawat';
$route['ruangrawat/lantai1'] = 'RuangRawat/lantai1';
$route['ruangrawat/lantai2'] = 'RuangRawat/lantai2';
$route['ruangrawat/lantai3'] = 'RuangRawat/lantai3';
