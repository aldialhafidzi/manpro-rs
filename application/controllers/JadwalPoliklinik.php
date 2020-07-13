<?php
defined('BASEPATH') or exit('No direct script access allowed');

class JadwalPoliklinik extends CI_Controller
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
        $this->load->model('JadwalDokterModel');
    }

    public function all()
    {
        $data =  $this->JadwalDokterModel->get_all();
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
        $data = $this->JadwalDokterModel->or_like(
            array(
                'nama' => $this->input->get('search', TRUE),
                'kode' => $this->input->get('search', TRUE)
            )
        )->get_all();

        echo json_encode((array) $data);
    }

    public function get()
    {
        $data = $this->JadwalDokterModel->get($this->input->get('jadwal_id'));
        echo json_encode($data);
    }

    public function delete()
    {
        if ($this->JadwalDokterModel->where('id', $this->input->post('delete_id', TRUE))->delete()) {
            $this->session->set_flashdata('success', 'Data jadwal berhasil dihapus');
            redirect(base_url("/admin/jadwal-poliklinik"));
        }
        $this->session->set_flashdata('error', 'Data jadwal gagal dihapus');
        redirect(base_url("/admin/jadwal-poliklinik"));
    }

    public function create()
    {
        $jadwal = array(
            'poli_id' => $this->input->post('poli_id', TRUE),
            'dokter_id' => $this->input->post('dokter_id', TRUE),
            'perawat_id' => $this->input->post('perawat_id', TRUE),
            'jam_awal' => $this->input->post('jam_awal', TRUE),
            'jam_akhir' => $this->input->post('jam_akhir', TRUE),
        );

        if ($this->input->post('jadwal_id', TRUE)) {
            if ($this->JadwalDokterModel->update($jadwal, $this->input->post('jadwal_id', TRUE))) {
                $this->session->set_flashdata('success', 'Jadwal Poliklinik berhasil diupdate');
            } else {
                $this->session->set_flashdata('error', 'Jadwal Poliklinik gagal diupdate');
            }
        } else {
            if ($this->JadwalDokterModel->insert($jadwal)) {
                $this->session->set_flashdata('success', 'Jadwal Poliklinik berhasil ditambahkan');
            } else {
                $this->session->set_flashdata('error', 'Jadwal Poliklinik gagal ditambahkan');
            }
        }
        redirect(base_url("/admin/jadwal-poliklinik"));
    }
}
