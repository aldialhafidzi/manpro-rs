<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bed extends CI_Controller
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
        $this->load->model('BedModel');
    }

    public function all()
    {
        $data =  $this->BedModel->get_all();
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
        $search = $this->input->get('search', TRUE);
        $data = $this->BedModel->getBed($search);
        $list = array();
        if ($data) {
            foreach ($data as $key => $value) {
                $list[$key]['id'] = $value["id"];
                $list[$key]['text'] = $value["nama"];
                $list[$key]['harga'] = $value["harga"];
                $list[$key]['kode'] = $value["kode"];
                $list[$key]['kamar_id'] = $value["kamar_id"];
                $list[$key]['kamar_kode'] = $value["kamar_kode"];
                $list[$key]['ruangan_id'] = $value["ruangan_id"];
                $list[$key]['ruangan_kode'] = $value["ruangan_kode"];
                $list[$key]['nama'] = $value["nama"];
                $list[$key]['kelas'] = $value["kelas"];
                $list[$key]['ruangan_status']   = $value["ruangan_status"];
            }
        }
        echo json_encode($list);
    }
}
