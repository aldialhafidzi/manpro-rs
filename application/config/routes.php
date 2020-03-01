<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['admin/login'] = 'login/index';
$route['user/login'] = 'login/user_index';
$route['logout'] = 'login/logout';

$route['pendaftaran/rawat-jalan'] = 'pendaftaran/rawat_jalan';
$route['pendaftaran/rawat-inap'] = 'pendaftaran/rawat_inap';

$route['jadwal_poliklinik/jadwal_poli'] = 'jadwal_poliklinik/jadwal_poli';
$route['jadwal_poliklinik/dokter_poli'] = 'jadwal_poliklinik/dokter_poli';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
