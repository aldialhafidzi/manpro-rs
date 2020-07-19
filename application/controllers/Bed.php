<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bed extends CI_Controller
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
        $this->load->model('BedModel');
    }

    public function all()
    {
        $data =  $this->BedModel->get_all();
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
        $search = $this->input->get('search', TRUE);
        $data = $this->BedModel->getBed($search);
        $list = array();
        if ($data) {
            foreach ($data as $key => $value) {
                $list[$key]['id'] = $value["id"];
                $list[$key]['text'] = $value["nama"];
                $list[$key]['harga'] = $value["harga"];
                $list[$key]['kode'] = $value["kode"];
                $list[$key]['kamar_id'] = $value["kamar_id"];
                $list[$key]['kamar_kode'] = $value["kamar_kode"];
                $list[$key]['ruangan_id'] = $value["ruangan_id"];
                $list[$key]['ruangan_kode'] = $value["ruangan_kode"];
                $list[$key]['nama'] = $value["nama"];
                $list[$key]['kelas'] = $value["kelas"];
                $list[$key]['ruangan_status']   = $value["ruangan_status"];
            }
        }
        echo json_encode($list);
    }


    public function get()
    {
        $data = $this->BedModel->get($this->input->get('bed_id'));
        echo json_encode($data);
    }

    public function delete()
    {
        if ($this->BedModel->where('id', $this->input->post('delete_id', TRUE))->delete()) {
            $this->session->set_flashdata('success', 'Data bed berhasil dihapus');
            redirect(base_url("/admin/bed"));
        }
        $this->session->set_flashdata('error', 'Data bed gagal dihapus');
        redirect(base_url("/admin/bed"));
    }

    public function create()
    {
        $bed = array(
            'kode' => $this->input->post('kode', TRUE),
            'nama' => $this->input->post('nama', TRUE),
            'jenis' => $this->input->post('jenis', TRUE),
            'harga' => $this->input->post('harga', TRUE)
        );

        if ($this->input->post('bed_id', TRUE)) {
            if ($this->BedModel->update($bed, $this->input->post('bed_id', TRUE))) {
                $this->session->set_flashdata('success', 'Bed berhasil diupdate');
            } else {
                $this->session->set_flashdata('error', 'Bed gagal diupdate');
            }
        } else {
            if ($this->BedModel->insert($bed)) {
                $this->session->set_flashdata('success', 'Bed berhasil ditambahkan');
            } else {
                $this->session->set_flashdata('error', 'Bed gagal ditambahkan');
            }
        }
        redirect(base_url("/admin/bed"));
    }
}
