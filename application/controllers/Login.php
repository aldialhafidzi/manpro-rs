<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('UserModel');
    }

    public function index()
    {
        if ($this->session->userdata('logged_in')) {
            redirect(base_url('/admin'));
        }
        $data['title'] = 'Admin Login | Manpro RS';
        $this->load->view('headers/login_header', $data);
        $this->load->view('pages/login');
        $this->load->view('footers/login_footer');
    }

    public function user_index()
    {
        if ($this->session->userdata('logged_in')) {
            redirect(base_url('/admin'));
        }
        $data['title'] = 'User Login | Manpro RS';
        $this->load->view('headers/login_header', $data);
        $this->load->view('pages/login_user');
        $this->load->view('footers/login_footer');
    }

    function login_as_admin()
    {
        if ($this->session->userdata('logged_in')) {
            if ($this->session->userdata('role_id') === '4') {
                redirect(base_url('/'));
            }
            redirect(base_url('/admin'));
        }

        $user = $this->UserModel->with_roles()->get(array('username' => $this->input->post('username')));
        if ($user) {
            if ($user->role_id !== '4') {
                if (password_verify($this->input->post('password'), $user->password)) {
                    $data_session = array(
                        'id'        => $user->id,
                        'username'  => $user->username,
                        'name'      => $user->name,
                        'role_id'   => $user->role_id,
                        'role_name' => $user->roles->name,
                        'logged_in' => TRUE
                    );
                    $this->session->set_userdata($data_session);
                    $this->session->set_flashdata('success', 'Selamat, Anda berhasil masuk');
                    redirect(base_url("/admin"));
                }
            }
        }
        $this->session->set_flashdata('error', 'Password / Username anda salah !');
        redirect(base_url("/admin/login"));
    }

    function login_as_user()
    {
        if ($this->session->userdata('logged_in')) {
            redirect(base_url('/'));
        }

        $user = $this->UserModel->with_roles()->get(array('username' => $this->input->post('username')));
        if ($user) {
            if ($user->role_id === '4') {
                if (password_verify($this->input->post('password'), $user->password)) {
                    $data_session = array(
                        'id'        => $user->id,
                        'username'  => $user->username,
                        'name'      => $user->name,
                        'role_id'   => $user->role_id,
                        'role_name' => $user->roles->name,
                        'logged_in' => TRUE
                    );
                    $this->session->set_userdata($data_session);
                    $this->session->set_flashdata('success', 'Selamat, Anda berhasil masuk');
                    redirect(base_url("/"));
                }
            }
        }
        $this->session->set_flashdata('error', 'Password / Username anda salah !');
        redirect(base_url("/user/login"));
    }

    public function logout()
    {
        if ($this->session->userdata('role_id') === '4') {
            $this->session->sess_destroy();
            redirect(base_url('/'));
        }
        $this->session->sess_destroy();
        redirect(base_url('admin/login'));
    }
}
