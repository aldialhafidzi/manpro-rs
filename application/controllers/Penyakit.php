<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penyakit extends CI_Controller
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
        $this->load->model('PenyakitModel');
    }

    public function all()
    {
        $data =  $this->PenyakitModel->get_all();
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
        $data =  $this->PenyakitModel->like(array("nama" => $this->input->get('search', TRUE)))->get_all();
        $list = array();
        if ($data) {
            foreach ($data as $key => $value) {
                $list[$key]['id'] = $value->id;
                $list[$key]['text'] = $value->nama;
                $list[$key]['kode'] = $value->kode;
                $list[$key]['type'] = $value->type;
            }
        }
        echo json_encode($list);
    }


    public function get()
    {
        $data = $this->PenyakitModel->get($this->input->get('penyakit_id'));
        echo json_encode($data);
    }

    public function delete()
    {
        if ($this->PenyakitModel->where('id', $this->input->post('delete_id', TRUE))->delete()) {
            $this->session->set_flashdata('success', 'Data penyakit berhasil dihapus');
            redirect(base_url("/admin/penyakit"));
        }
        $this->session->set_flashdata('error', 'Data penyakit gagal dihapus');
        redirect(base_url("/admin/penyakit"));
    }

    public function create()
    {
        $penyakit = array(
            'kode' => $this->input->post('kode', TRUE),
            'nama' => $this->input->post('nama', TRUE),
            'type' => $this->input->post('type', TRUE)
        );

        if ($this->input->post('penyakit_id', TRUE)) {
            if ($this->PenyakitModel->update($penyakit, $this->input->post('penyakit_id', TRUE))) {
                $this->session->set_flashdata('success', 'Penyakit berhasil diupdate');
            } else {
                $this->session->set_flashdata('error', 'Penyakit gagal diupdate');
            }
        } else {
            if ($this->PenyakitModel->insert($penyakit)) {
                $this->session->set_flashdata('success', 'Penyakit berhasil ditambahkan');
            } else {
                $this->session->set_flashdata('error', 'Penyakit gagal ditambahkan');
            }
        }
        redirect(base_url("/admin/penyakit"));
    }
}
