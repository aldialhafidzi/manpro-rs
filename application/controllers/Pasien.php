<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pasien extends CI_Controller
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
    }

    public function all()
    {
        $data =  $this->PasienModel->get_all();
        if ($data) {
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(200)
                ->set_output(json_encode(array(
                    'status' => '200',
                    'data' => $data
                )));
        } else {
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(500)
                ->set_output(json_encode(array(
                    'status' => '500',
                )));
        }
    }

    public function post()
    {
        var_dump($this->input->post());
        die;
        $alamat = $this->input->post('kota', TRUE) . "," . $this->input->post('kecamatan', TRUE) . "," . $this->input->post('kelurahan', TRUE) . $this->input->post('rt', TRUE) . "/" . $this->input->post('rw', TRUE);
        $data = array(
            'tipe_id'       => $this->input->post('tipe_id', TRUE),
            'no_mr'         => $this->input->post('no_mr', TRUE),
            'nama'          => $this->input->post('nama', TRUE),
            'jenis_kelamin' => $this->input->post('jenis_kelamin', TRUE),
            'no_telp'       => $this->input->post('no_telp', TRUE),
            'alamat'        => $alamat,
            'tanggal_lahir' => $this->input->post('tanggal_lahir', TRUE),
            'created_at'    => date("Y-m-d"),
            'updated_at'    => date("Y-m-d"),
        );

        if ($this->PasienModel->post($data)) {
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(200)
                ->set_output(json_encode(array(
                    'status' => '200',
                    'data' => $data
                )));
        } else {
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(500)
                ->set_output(json_encode(array(
                    'status' => '500',
                )));
        }
    }
}
