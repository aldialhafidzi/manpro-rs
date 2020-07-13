<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pasien extends CI_Controller
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
        $this->load->model('PasienModel');
    }

    public function all()
    {
        $data =  $this->PasienModel->get_all();
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
        $data = $this->PasienModel->or_like(
            array(
                'nama' => $this->input->get('search', TRUE),
                'no_mr' => $this->input->get('search', TRUE)
            )
        )->with_tipe_pasien()->get_all();

        echo json_encode((array) $data);
    }


    public function get()
    {
        $data = $this->PasienModel->get($this->input->get('pasien_id'));
        echo json_encode($data);
    }

    public function delete()
    {
        if ($this->PasienModel->where('id', $this->input->post('delete_id', TRUE))->delete()) {
            $this->session->set_flashdata('success', 'Data pasien berhasil dihapus');
            redirect(base_url("/admin/pasien"));
        }
        $this->session->set_flashdata('error', 'Data pasien gagal dihapus');
        redirect(base_url("/admin/pasien"));
    }

    public function create()
    {
        $pasien = array(
            'tipe_id' => $this->input->post('tipe_id', TRUE),
            'no_asuransi' => $this->input->post('no_asuransi', TRUE),
            'no_mr' => $this->input->post('no_mr', TRUE),
            'nik' => $this->input->post('nik', TRUE),
            'nama' => $this->input->post('nama', TRUE),
            'jenis_kelamin' => $this->input->post('jenis_kelamin', TRUE),
            'no_telp' => $this->input->post('no_telp', TRUE),
            'kota' => $this->input->post('kota', TRUE),
            'kecamatan' => $this->input->post('kecamatan', TRUE),
            'kelurahan' => $this->input->post('kelurahan', TRUE),
            'rt' => $this->input->post('rt', TRUE),
            'rw' => $this->input->post('rw', TRUE),
            'tanggal_lahir' => $this->input->post('tanggal_lahir', TRUE),
            'nik_pj' => $this->input->post('nik_pj', TRUE),
            'nama_pj' => $this->input->post('nama_pj', TRUE),
            'no_telp_pj' => $this->input->post('no_telp_pj', TRUE),
            'hubungan_pj' => $this->input->post('hubungan_pj', TRUE),
            'kota_pj' => $this->input->post('kota_pj', TRUE),
            'kecamatan_pj' => $this->input->post('kecamatan_pj', TRUE),
            'kelurahan_pj' => $this->input->post('kelurahan_pj', TRUE),
            'rt_pj' => $this->input->post('rt_pj', TRUE),
            'rw_pj' => $this->input->post('rw_pj', TRUE)
        );

        if ($this->input->post('pasien_id', TRUE)) {
            if ($this->PasienModel->update($pasien, $this->input->post('pasien_id', TRUE))) {
                $this->session->set_flashdata('success', 'Pasien berhasil diupdate');
            } else {
                $this->session->set_flashdata('error', 'Pasien gagal diupdate');
            }
        } else {
            if ($this->PasienModel->insert($pasien)) {
                $this->session->set_flashdata('success', 'Pasien berhasil ditambahkan');
            } else {
                $this->session->set_flashdata('error', 'Pasien gagal ditambahkan');
            }
        }
        redirect(base_url("/admin/pasien"));
    }
}
