<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dokter extends CI_Controller
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
        $this->load->model('DokterModel');
    }

    public function all()
    {
        $data =  $this->DokterModel->get_all();
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
        $data =  $this->DokterModel->like(array(
            "nama" => $this->input->get('search', TRUE)
        ))->get_all();

        $list = array();
        if ($data) {
            foreach ($data as $key => $value) {
                $list[$key]['id'] = $value->id;
                $list[$key]['text'] = $value->nama;
                $list[$key]['alamat'] = $value->alamat;
            }
        }
        echo json_encode($list);
    }


    public function get()
    {
        $data = $this->DokterModel->get($this->input->get('dokter_id'));
        echo json_encode($data);
    }

    public function delete()
    {
        if ($this->DokterModel->where('id', $this->input->post('delete_id', TRUE))->delete()) {
            $this->session->set_flashdata('success', 'Data dokter berhasil dihapus');
            redirect(base_url("/admin/dokter"));
        }
        $this->session->set_flashdata('error', 'Data dokter gagal dihapus');
        redirect(base_url("/admin/dokter"));
    }

    public function create()
    {
        $dokter = array(
            'kode' => $this->input->post('kode', TRUE),
            'nama' => $this->input->post('nama', TRUE),
            'harga' => $this->input->post('harga', TRUE)
        );

        if ($this->input->post('dokter_id', TRUE)) {
            if ($this->DokterModel->update($dokter, $this->input->post('dokter_id', TRUE))) {
                $this->session->set_flashdata('success', 'dokter berhasil diupdate');
            } else {
                $this->session->set_flashdata('error', 'dokter gagal diupdate');
            }
        } else {
            if ($this->DokterModel->insert($dokter)) {
                $this->session->set_flashdata('success', 'dokter berhasil ditambahkan');
            } else {
                $this->session->set_flashdata('error', 'dokter gagal ditambahkan');
            }
        }
        redirect(base_url("/admin/dokter"));
    }
}
