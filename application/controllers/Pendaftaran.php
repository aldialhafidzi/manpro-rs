<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendaftaran extends CI_Controller
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
        $this->load->model('PasienModel');
        $this->load->model('TransaksiModel');
    }

    public function formatBill($firstChar, $number)
    {
        $currentYear = substr(date('Y'), -2);
        $currentMonth = date('m');
        $number = str_pad($number + 1, 4, '0', STR_PAD_LEFT);
        return "$firstChar$currentYear-$currentMonth-$number";
    }

    public function formatMR($number)
    {
        $currentYear = substr(date('Y'), -2);
        $currentMonth = date('m');
        $number = str_pad($number + 1, 4, '0', STR_PAD_LEFT);
        return "MR-$currentYear-$currentMonth-$number";
    }

    public function index()
    {
        $data['title'] = 'MANPRO-RS | Pendaftaran';
        $data['page'] = 'pendaftaran';
        $this->load->view('headers/normal_header', $data);
        $this->load->view('pages/index');
        $this->load->view('footers/normal_footer');
    }

    public function rawat_jalan()
    {
        $data['title'] = 'MANPRO-RS | Pendaftaran';
        $data['page'] = 'rawat_jalan';
        $data['tanggal'] = date('d/m/Y');
        $data['nextBill'] = $this->formatBill('J', '00001');
        $data['nextMR'] = $this->formatMR('00001');
        $data['lastPasien'] = $this->PasienModel->lastRecord();
        $data['lastTransaksi'] = $this->TransaksiModel->lastRecord();
        $data['lastTransaksi'] ? $data['nextBill'] = $this->formatBill('J', $data['lastTransaksi']->id) : '';
        $data['lastPasien'] ? $data['nextMR'] = $this->formatMR($data['lastPasien']->id) : '';

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
