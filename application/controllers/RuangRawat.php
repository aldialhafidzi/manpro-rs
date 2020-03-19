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
        
        $this->load->model('RuanganModel');
        $this->load->model('PasienModel');
    }
    public function index()
    {
        $data['title'] = 'MANPRO-RS | Ruang Rawat';
        $data['page'] = 'ruang rawat';
        $this->load->view('headers/normal_header', $data);
        $this->load->view('pages/index');
        $this->load->view('footers/normal_footer');
    }

    public function ruangan()
    {
        $data['title'] = 'MANPRO-RS | List Ruang Rawat';
        $data['page'] = 'ruangan';
        $data['ruangans'] = $this->RuanganModel->get_all();
        $this->load->view('headers/normal_header', $data);
        $this->load->view('pages/ruangan', $data);
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

    public function lantai1()
    {
        $data['title'] = 'MANPRO-RS | Ruang Rawat';
        $data['page'] = 'lantai1';
        $data['ruangans'] = $this->RuanganModel->get_all();
        $this->load->view('headers/normal_header', $data);
        $this->load->view('pages/class_rr/l1');
        $this->load->view('footers/normal_footer');
    }

    public function lantai2()
    {
        $data['title'] = 'MANPRO-RS | Ruang Rawat';
        $data['page'] = 'lantai2';
        $this->load->view('headers/normal_header', $data);
        $this->load->view('pages/class_rr/l2');
        $this->load->view('footers/normal_footer');
    }

    public function lantai3()
    {
        $data['title'] = 'MANPRO-RS | Ruang Rawat';
        $data['page'] = 'lantai3';
        $this->load->view('headers/normal_header', $data);
        $this->load->view('pages/class_rr/l3');
        $this->load->view('footers/normal_footer');
    }

    public function detail_ruangan($kode = null)
    {
        $data['title'] = 'MANPRO-RS | Ruang Rawat';
        $data['page'] = 'lantai3';
        $data['detail_ruangans'] = $this->RuanganModel->get_kode($kode);
        $this->load->view('headers/normal_header', $data);
        $this->load->view('pages/ruangan', $data);
        $this->load->view('footers/normal_footer');
    }

    public function edit_ruangan($lookup)
    {
        $data['get_kode'] = $this->RuanganModel->get_kode($lookup);
    }

    public function hapus_ruangan($where, $table)
    {
        
    }
}
