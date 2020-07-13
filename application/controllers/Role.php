<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Role extends CI_Controller
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
        $this->load->model('RoleModel');
    }

    public function all()
    {
        $data =  $this->RoleModel->get_all();
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
        $data = $this->RoleModel->or_like(
            array(
                'name' => $this->input->get('search', TRUE),
                'kode' => $this->input->get('search', TRUE)
            )
        )->get_all();

        echo json_encode((array) $data);
    }

    public function get()
    {
        $data = $this->RoleModel->get($this->input->get('role_id'));
        echo json_encode($data);
    }

    public function delete()
    {
        if ($this->RoleModel->where('id', $this->input->post('delete_id', TRUE))->delete()) {
            $this->session->set_flashdata('success', 'Data role berhasil dihapus');
            redirect(base_url("/admin/role"));
        }
        $this->session->set_flashdata('error', 'Data role gagal dihapus');
        redirect(base_url("/admin/role"));
    }

    public function create()
    {
        $role = array(
            'kode' => $this->input->post('kode', TRUE),
            'name' => $this->input->post('name', TRUE),
        );

        if ($this->input->post('role_id', TRUE)) {
            if ($this->RoleModel->update($role, $this->input->post('role_id', TRUE))) {
                $this->session->set_flashdata('success', 'Role berhasil diupdate');
            } else {
                $this->session->set_flashdata('error', 'Role gagal diupdate');
            }
        } else {
            if ($this->RoleModel->insert($role)) {
                $this->session->set_flashdata('success', 'Role berhasil ditambahkan');
            } else {
                $this->session->set_flashdata('error', 'Role gagal ditambahkan');
            }
        }
        redirect(base_url("/admin/role"));
    }
}
