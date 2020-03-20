<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Poliklinik extends CI_Controller
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
        $this->load->model('PoliklinikModel');
        $this->load->model('JadwalDokterModel');
    }

    public function all()
    {
        $data =  $this->PoliklinikModel->get_all();
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
        // $data =  $this->PoliklinikModel->like(array(
        //     "nama" => $this->input->get('search', TRUE)
        // ))->with_jadwal_dokter(array('with' => array('dokter')))->get_all();
        $data = $this->JadwalDokterModel->with_dokter()->with_poliklinik()->get_all();
        // var_dump($data); die;
        $list = array();
        if ($data) {
            foreach ($data as $key => $value) {
                $list[$key]['id'] = $value->id;
                $list[$key]['text'] = $value->poliklinik->nama;
                $list[$key]['lokasi'] = $value->poliklinik->lokasi;
                $list[$key]['jam_awal'] = $value->jam_awal;
                $list[$key]['jam_akhir'] = $value->jam_akhir;
                $list[$key]['dokter'] = $value->dokter;
                $list[$key]['poliklinik'] = $value->poliklinik;
            }
        }
        echo json_encode($list);
    }
}
