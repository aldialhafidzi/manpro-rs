<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perawat extends CI_Controller
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
        $this->load->model('PerawatModel');
    }

    public function all()
    {
        $data =  $this->PerawatModel->get_all();
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
        $data = $this->PerawatModel->or_like(
            array(
                'nama' => $this->input->get('search', TRUE),
                'kode' => $this->input->get('search', TRUE)
            )
        )->get_all();

        echo json_encode((array) $data);
    }

    public function get()
    {
        $data = $this->PerawatModel->get($this->input->get('perawat_id'));
        echo json_encode($data);
    }

    public function delete()
    {
        if ($this->PerawatModel->where('id', $this->input->post('delete_id', TRUE))->delete()) {
            $this->session->set_flashdata('success', 'Data perawat berhasil dihapus');
            redirect(base_url("/admin/perawat"));
        }
        $this->session->set_flashdata('error', 'Data perawat gagal dihapus');
        redirect(base_url("/admin/perawat"));
    }

    public function create()
    {
        $perawat = array(
            'nama' => $this->input->post('nama', TRUE),
            'no_telp' => $this->input->post('no_telp', TRUE),
            'spesialis' => $this->input->post('spesialis', TRUE)
        );

        if ($this->input->post('perawat_id', TRUE)) {
            if ($this->PerawatModel->update($perawat, $this->input->post('perawat_id', TRUE))) {
                $this->session->set_flashdata('success', 'Perawat berhasil diupdate');
            } else {
                $this->session->set_flashdata('error', 'Perawat gagal diupdate');
            }
        } else {
            if ($this->PerawatModel->insert($perawat)) {
                $this->session->set_flashdata('success', 'Perawat berhasil ditambahkan');
            } else {
                $this->session->set_flashdata('error', 'Perawat gagal ditambahkan');
            }
        }
        redirect(base_url("/admin/perawat"));
    }
}
