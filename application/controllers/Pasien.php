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

    public function search()
    {
        $data = $this->PasienModel->or_like(
            array(
                'nama' => $this->input->get('search', TRUE),
                'no_mr' => $this->input->get('search', TRUE)
            )
        )->with_tipe_pasien()->get_all();

        echo json_encode((array) $data);
    }
}
