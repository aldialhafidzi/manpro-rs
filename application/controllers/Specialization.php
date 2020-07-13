<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Specialization extends CI_Controller
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
        $this->load->model('SpecializationModel');
    }

    public function all()
    {
        $data =  $this->SpecializationModel->get_all();
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
        $data = $this->SpecializationModel->or_like(
            array(
                'nama' => $this->input->get('search', TRUE),
                'kode' => $this->input->get('search', TRUE)
            )
        )->get_all();

        echo json_encode((array) $data);
    }

    public function get()
    {
        $data = $this->SpecializationModel->get($this->input->get('specialization_id'));
        echo json_encode($data);
    }

    public function delete()
    {
        if ($this->SpecializationModel->where('id', $this->input->post('delete_id', TRUE))->delete()) {
            $this->session->set_flashdata('success', 'Data specialization berhasil dihapus');
            redirect(base_url("/admin/specialization"));
        }
        $this->session->set_flashdata('error', 'Data specialization gagal dihapus');
        redirect(base_url("/admin/specialization"));
    }

    public function create()
    {
        $specialization = array(
            'kode' => $this->input->post('kode', TRUE),
            'nama' => $this->input->post('nama', TRUE),
        );

        if ($this->input->post('specialization_id', TRUE)) {
            if ($this->SpecializationModel->update($specialization, $this->input->post('specialization_id', TRUE))) {
                $this->session->set_flashdata('success', 'Specialization berhasil diupdate');
            } else {
                $this->session->set_flashdata('error', 'Specialization gagal diupdate');
            }
        } else {
            if ($this->SpecializationModel->insert($specialization)) {
                $this->session->set_flashdata('success', 'Specialization berhasil ditambahkan');
            } else {
                $this->session->set_flashdata('error', 'Specialization gagal ditambahkan');
            }
        }
        redirect(base_url("/admin/specialization"));
    }
}
