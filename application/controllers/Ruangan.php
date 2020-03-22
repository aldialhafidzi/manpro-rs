<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ruangan extends CI_Controller
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
    }

    public function all()
    {
        $data =  $this->RuanganModel->get_all();
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
        $data = $this->RuanganModel->like(
            array("nama" => $this->input->get('search', TRUE))
        )->with_kamar(
            array('with' => array('bed'))
        )->get_all();

        $list = array();
        if ($data) {
            foreach ($data as $key => $value) {
                $list[$key]['id']       = $value->id;
                $list[$key]['text']     = $value->nama;
                $list[$key]['harga']    = $value->harga;
                $list[$key]['kelas']    = $value->kelas;
                $list[$key]['status']   = $value->status;
            }
        }
        echo json_encode($list);
    }
}
