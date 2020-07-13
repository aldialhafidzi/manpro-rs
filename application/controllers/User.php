<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
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
        $this->load->model('UserModel');
    }

    public function all()
    {
        $data =  $this->UserModel->get_all();
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
        $data = $this->UserModel->or_like(
            array(
                'nama' => $this->input->get('search', TRUE),
                'kode' => $this->input->get('search', TRUE)
            )
        )->get_all();

        echo json_encode((array) $data);
    }

    public function get()
    {
        $data = $this->UserModel->get($this->input->get('user_id'));
        echo json_encode($data);
    }

    public function delete()
    {
        if ($this->UserModel->where('id', $this->input->post('delete_id', TRUE))->delete()) {
            $this->session->set_flashdata('success', 'Data user berhasil dihapus');
            redirect(base_url("/admin/user"));
        }
        $this->session->set_flashdata('error', 'Data user gagal dihapus');
        redirect(base_url("/admin/user"));
    }

    public function create()
    {
        $user = array(
            'role_id' => $this->input->post('role_id', TRUE),
            'username' => $this->input->post('username', TRUE),
            'name' => $this->input->post('name', TRUE),
            'nik' => $this->input->post('nik', TRUE),
            'no_telp' => $this->input->post('no_telp', TRUE),
            'dob' => $this->input->post('dob', TRUE),
            'kota' => $this->input->post('kota', TRUE),
            'kecamatan' => $this->input->post('kecamatan', TRUE),
            'kelurahan' => $this->input->post('kelurahan', TRUE),
            'rt' => $this->input->post('rt', TRUE),
            'rw' => $this->input->post('rw', TRUE),
        );

        if ($this->input->post('user_id', TRUE)) {
            if ($this->input->post('isChangePassword', TRUE)) {
                $user['password'] = password_hash($this->input->post('password', TRUE), PASSWORD_DEFAULT);
            } else {
                if ($this->input->post('password', TRUE)) {
                    $user['password'] =  $this->input->post('password', TRUE);
                }
            }
        } else {
            $user['password'] = password_hash($this->input->post('password', TRUE), PASSWORD_DEFAULT);
        }

        if ($this->input->post('user_id', TRUE)) {
            if ($this->UserModel->update($user, $this->input->post('user_id', TRUE))) {
                $this->session->set_flashdata('success', 'User berhasil diupdate');
            } else {
                $this->session->set_flashdata('error', 'User gagal diupdate');
            }
        } else {
            if ($this->UserModel->insert($user)) {
                $this->session->set_flashdata('success', 'User berhasil ditambahkan');
            } else {
                $this->session->set_flashdata('error', 'User gagal ditambahkan');
            }
        }
        redirect(base_url("/admin/user"));
    }
}
