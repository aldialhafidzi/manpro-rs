<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tindakan extends CI_Controller
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
        $this->load->model('TindakanModel');
    }

    public function all()
    {
        $data =  $this->TindakanModel->get_all();
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
        $data =  $this->TindakanModel->like(array("nama" => $this->input->get('search', TRUE)))->get_all();
        $list = array();
        if ($data) {
            foreach ($data as $key => $value) {
                $list[$key]['id'] = $value->id;
                $list[$key]['text'] = $value->nama;
                $list[$key]['kode'] = $value->kode;
                $list[$key]['harga'] = $value->harga;
            }
        }
        echo json_encode($list);
    }


    public function get()
    {
        $data = $this->TindakanModel->get($this->input->get('tindakan_id'));
        echo json_encode($data);
    }

    public function delete()
    {
        if ($this->TindakanModel->where('id', $this->input->post('delete_id', TRUE))->delete()) {
            $this->session->set_flashdata('success', 'Data tindakan berhasil dihapus');
            redirect(base_url("/admin/tindakan"));
        }
        $this->session->set_flashdata('error', 'Data tindakan gagal dihapus');
        redirect(base_url("/admin/tindakan"));
    }

    public function create()
    {
        $tindakan = array(
            'kode' => $this->input->post('kode', TRUE),
            'nama' => $this->input->post('nama', TRUE),
            'harga' => $this->input->post('harga', TRUE)
        );

        if ($this->input->post('tindakan_id', TRUE)) {
            if ($this->TindakanModel->update($tindakan, $this->input->post('tindakan_id', TRUE))) {
                $this->session->set_flashdata('success', 'tindakan berhasil diupdate');
            } else {
                $this->session->set_flashdata('error', 'tindakan gagal diupdate');
            }
        } else {
            if ($this->TindakanModel->insert($tindakan)) {
                $this->session->set_flashdata('success', 'tindakan berhasil ditambahkan');
            } else {
                $this->session->set_flashdata('error', 'tindakan gagal ditambahkan');
            }
        }
        redirect(base_url("/admin/tindakan"));
    }
}
