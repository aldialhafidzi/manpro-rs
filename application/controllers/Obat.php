<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Obat extends CI_Controller
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
        $this->load->model('ObatModel');
    }

    public function all()
    {
        $data =  $this->ObatModel->get_all();
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
        $data = $this->ObatModel->or_like(
            array(
                'nama' => $this->input->get('search', TRUE),
                'kode' => $this->input->get('search', TRUE)
            )
        )->get_all();

        echo json_encode((array) $data);
    }

    public function get()
    {
        $data = $this->ObatModel->get($this->input->get('obat_id'));
        echo json_encode($data);
    }

    public function delete()
    {
        if ($this->ObatModel->where('id', $this->input->post('delete_id', TRUE))->delete()) {
            $this->session->set_flashdata('success', 'Data obat berhasil dihapus');
            redirect(base_url("/admin/obat"));
        }
        $this->session->set_flashdata('error', 'Data obat gagal dihapus');
        redirect(base_url("/admin/obat"));
    }

    public function create()
    {
        $obat = array(
            'kode' => $this->input->post('kode', TRUE),
            'nama' => $this->input->post('nama', TRUE),
            'jenis' => $this->input->post('jenis', TRUE),
            'harga' => $this->input->post('harga', TRUE)
        );

        if ($this->input->post('obat_id', TRUE)) {
            if ($this->ObatModel->update($obat, $this->input->post('obat_id', TRUE))) {
                $this->session->set_flashdata('success', 'Obat berhasil diupdate');
            } else {
                $this->session->set_flashdata('error', 'Obat gagal diupdate');
            }
        } else {
            if ($this->ObatModel->insert($obat)) {
                $this->session->set_flashdata('success', 'Obat berhasil ditambahkan');
            } else {
                $this->session->set_flashdata('error', 'Obat gagal ditambahkan');
            }
        }
        redirect(base_url("/admin/obat"));
    }
}
