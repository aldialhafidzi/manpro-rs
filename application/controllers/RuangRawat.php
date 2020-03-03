<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RuangRawat extends CI_Controller
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
        $data['title'] = 'MANPRO-RS | Ruang Rawat';
        $data['page'] = 'ruang rawat';
        $this->load->view('headers/normal_header', $data);
        $this->load->view('pages/index');
        $this->load->view('footers/normal_footer');
    }

    public function rawat_jalan()
    {
        $data['title'] = 'MANPRO-RS | Pendaftaran';
        $data['page'] = 'rawat_jalan';
        $this->load->view('headers/normal_header', $data);
        $this->load->view('pages/rawat_jalan');
        $this->load->view('footers/normal_footer');
    }

    public function rawat_inap()
    {
        $data['title'] = 'MANPRO-RS | Pendaftaran';
        $data['page'] = 'rawat_inap';
        $this->load->view('headers/normal_header', $data);
        $this->load->view('pages/rawat_inap');
        $this->load->view('footers/normal_footer');
    }
}
