<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal_Poliklinik extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect('/admin/login');
        } else {
            if ($this->session->userdata('role_id') === '4') {
                redirect('/');
            }
        }
    }
    public function index()
    {
        $data['title'] = 'MANPRO-RS | Jadwal Poliklinik';
        $data['page'] = 'jadwal';
        $this->load->view('headers/normal_header', $data);
        $this->load->view('pages/index');
        $this->load->view('footers/normal_footer');
    }

    public function jadwal_poli()
    {
        $data['title'] = 'MANPRO-RS | Jadwal Poliklinik';
        $data['page'] = 'jadwal_poli';
        $this->load->view('headers/normal_header', $data);
        $this->load->view('pages/poliklinik/jadwal_poli');
        $this->load->view('footers/normal_footer');
    }

    public function dokter_poli()
    {
        $data['title'] = 'MANPRO-RS | Dokter Poliklinik';
        $data['page'] = 'dokter_poli';
        $this->load->view('headers/normal_header', $data);
        $this->load->view('pages/poliklinik/dokter_poli');
        $this->load->view('footers/normal_footer');
    }
}
