<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['title'] = 'MANPRO-RS | Menu Management';

        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('headers/normal_header', $data);
            $this->load->view('sidebar/sidebar', $data);
            $this->load->view('pages/menu/index');
            $this->load->view('footers/normal_footer');
        } else {
            $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Menu added!</div>');
            redirect('menu');
        }
    }

    public function submenu()
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->model('Menu_model', 'menu');
        $data['title'] = 'MANPRO-RS | Sub Menu Management';

        $data['subMenu'] = $this->menu->getSubMenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('title', 'Menu', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'Menu', 'required');
        $this->form_validation->set_rules('icon', 'Menu', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('headers/normal_header', $data);
            $this->load->view('sidebar/sidebar', $data);
            $this->load->view('pages/menu/submenu');
            $this->load->view('footers/normal_footer');
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];
            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Sub Menu added!</div>');
            redirect('menu/submenu');
        }
    }
}
