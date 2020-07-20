<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ParameterRadiologi extends CI_Controller
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
        $this->load->model('ParameterRadiologiModel');
    }

    public function all()
    {
        $data =  $this->ParameterRadiologiModel->get_all();
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
        $data =  $this->ParameterRadiologiModel->like(array("nama" => $this->input->get('search', TRUE)))->get_all();
        $list = array();
        if ($data) {
            foreach ($data as $key => $value) {
                $list[$key]['id'] = $value->id;
                $list[$key]['text'] = $value->nama;
                $list[$key]['kode'] = $value->kode;
            }
        }
        echo json_encode($list);
    }


    public function get()
    {
        $data = $this->ParameterRadiologiModel->get($this->input->get('parameter_radiologi_id'));
        echo json_encode($data);
    }

    public function delete()
    {
        if ($this->ParameterRadiologiModel->where('id', $this->input->post('delete_id', TRUE))->delete()) {
            $this->session->set_flashdata('success', 'Data parameter_radiologi berhasil dihapus');
            redirect(base_url("/admin/parameter_radiologi"));
        }
        $this->session->set_flashdata('error', 'Data parameter_radiologi gagal dihapus');
        redirect(base_url("/admin/parameter_radiologi"));
    }

    public function create()
    {
        $parameter_radiologi = array(
            'kode' => $this->input->post('kode', TRUE),
            'nama' => $this->input->post('nama', TRUE),
            'type' => $this->input->post('type', TRUE)
        );

        if ($this->input->post('parameter_radiologi_id', TRUE)) {
            if ($this->ParameterRadiologiModel->update($parameter_radiologi, $this->input->post('parameter_radiologi_id', TRUE))) {
                $this->session->set_flashdata('success', 'ParameterRadiologi berhasil diupdate');
            } else {
                $this->session->set_flashdata('error', 'ParameterRadiologi gagal diupdate');
            }
        } else {
            if ($this->ParameterRadiologiModel->insert($parameter_radiologi)) {
                $this->session->set_flashdata('success', 'ParameterRadiologi berhasil ditambahkan');
            } else {
                $this->session->set_flashdata('error', 'ParameterRadiologi gagal ditambahkan');
            }
        }
        redirect(base_url("/admin/parameter_radiologi"));
    }
}
