<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TipePasien extends CI_Controller
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
        $this->load->model('TipePasienModel');
    }

    public function all()
    {
        $data =  $this->TipePasienModel->get_all();
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
        $data =  $this->TipePasienModel->like(array(
            "nama" => $this->input->get('search', TRUE)
        ))->get_all();

        $list = array();
        if ($data) {
            foreach ($data as $key => $value) {
                $list[$key]['id'] = $value->id;
                $list[$key]['text'] = $value->nama;
                $list[$key]['kode'] = $value->kode;
                $list[$key]['no_sep'] = $value->no_sep;
            }
        }
        echo json_encode($list);
    }
}
