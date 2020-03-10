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

    public function ruang_rawat()
    {
        $data['title'] = 'MANPRO-RS | Ruang Rawat';
        $data['page'] = 'ruang_rawat';
        $this->load->view('headers/normal_header', $data);
        $this->load->view('pages/ruang_rawat');
        $this->load->view('footers/normal_footer');
    }
    
    public function info_ruang_rawat()
    {
        $data['title'] = 'MANPRO-RS | Informasi Ruang Rawat';
        $data['page'] = 'info_ruang_rawat';
        $this->load->view('headers/normal_header', $data);
        $this->load->view('pages/info_ruang_rawat');
        $this->load->view('footers/normal_footer');
    }

    public function ruang_vvip()
    {
        $data['title'] = 'MANPRO-RS | Ruang Rawat VVIP';
        $data['page'] = 'vvip';
        $this->load->view('headers/normal_header', $data);
        $this->load->view('pages/class_rr/vvip');
        $this->load->view('footers/normal_footer');
    }

    public function ruang_vip()
    {
        $data['title'] = 'MANPRO-RS | Ruang Rawat VIP';
        $data['page'] = 'vip';
        $this->load->view('headers/normal_header', $data);
        $this->load->view('pages/class_rr/vip');
        $this->load->view('footers/normal_footer');
    }

    public function ruang_k1()
    {
        $data['title'] = 'MANPRO-RS | Ruang Rawat Kelas 1';
        $data['page'] = 'k1';
        $this->load->view('headers/normal_header', $data);
        $this->load->view('pages/class_rr/k1');
        $this->load->view('footers/normal_footer');
    }

    public function ruang_k2()
    {
        $data['title'] = 'MANPRO-RS | Ruang Rawat Kelas 2';
        $data['page'] = 'k2';
        $this->load->view('headers/normal_header', $data);
        $this->load->view('pages/class_rr/k2');
        $this->load->view('footers/normal_footer');
    }

    public function ruang_k3()
    {
        $data['title'] = 'MANPRO-RS | Ruang Rawat Kelas 3';
        $data['page'] = 'k3';
        $this->load->view('headers/normal_header', $data);
        $this->load->view('pages/class_rr/k3');
        $this->load->view('footers/normal_footer');
    }

}
