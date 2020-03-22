<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RekamMedis extends CI_Controller
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
        $this->load->model('DetailTransaksiModel');
        $this->load->model('TransaksiModel');
        $this->load->model('RekamMedisModel');
    }
    public function rawat_jalan()
    {

        $data['title'] = 'MANPRO-RS | Rekam Medis Rawat Jalan';
        $data['page'] = 'rekam-jalan';

        $this->load->view('headers/normal_header', $data);
        $this->load->view('pages/rekam_jalan');
        $this->load->view('footers/normal_footer');
    }

    public function rawat_inap()
    {
        $data['title'] = 'MANPRO-RS | Rekam Medis Rawat Inap';
        $data['page'] = 'rekam-inap';

        $this->load->view('headers/normal_header', $data);
        $this->load->view('pages/rekam_inap');
        $this->load->view('footers/normal_footer');
    }

    public function getRekamInap()
    {
        $fetch_data = $this->RekamMedisModel->make_datatables('RAWAT-INAP');
        $data = array();
        foreach ($fetch_data as $key => $row) {
            $sub_array = array();
            $sub_array[] = $key + 1;
            $sub_array[] = $row->no_mr;
            $sub_array[] = $row->nama_pasien;
            $sub_array[] = $row->no_telp;
            $sub_array[] = $row->kecamatan;
            $sub_array[] = $row->kelurahan;
            $sub_array[] = $row->rt;
            $sub_array[] = $row->rw;
            $sub_array[] = '
            <button class="btn btn-sm btn-info" onclick="showRekamMedisByPasienID(' . $row->pasien_id . ');">
                    <i class="far fa-eye"></i> &nbsp; Lihat
            </button>';
            $data[] = $sub_array;
        }

        $output = array(
            "draw" => intval($_POST["draw"]),
            "recordsTotal" => $this->RekamMedisModel->get_all_data('RAWAT-INAP'),
            "recordsFiltered" => $this->RekamMedisModel->get_filtered_data('RAWAT-INAP'),
            "data"  => $data
        );
        echo json_encode($output);
    }

    public function getRekamJalan()
    {
        $fetch_data = $this->RekamMedisModel->make_datatables('RAWAT-JALAN');
        $data = array();
        foreach ($fetch_data as $key => $row) {
            $sub_array = array();
            $sub_array[] = $key + 1;
            $sub_array[] = $row->no_mr;
            $sub_array[] = $row->nama_pasien;
            $sub_array[] = $row->no_telp;
            $sub_array[] = $row->kecamatan;
            $sub_array[] = $row->kelurahan;
            $sub_array[] = $row->rt;
            $sub_array[] = $row->rw;
            $sub_array[] = '
            <button class="btn btn-sm btn-info" onclick="showRekamMedisByPasienID(' . $row->pasien_id . ');">
                    <i class="far fa-eye"></i> &nbsp; Lihat
            </button>';
            $data[] = $sub_array;
        }

        $output = array(
            "draw" => intval($_POST["draw"]),
            "recordsTotal" => $this->RekamMedisModel->get_all_data('RAWAT-JALAN'),
            "recordsFiltered" => $this->RekamMedisModel->get_filtered_data('RAWAT-JALAN'),
            "data"  => $data
        );
        echo json_encode($output);
    }

    public function find()
    {
        $data['transaksi'] = $this->RekamMedisModel->with_pasien()->with_dokter()->with_penyakit()->where('pasien_id', $this->input->get('pasien_id', TRUE))->get_all();
        echo json_encode((array) $data['transaksi']);
    }

    public function add()
    {
        $check = FALSE;
        foreach ($this->input->post('diagnosa') as $key => $value) {
            $data = array(
                'pasien_id' => $this->input->post('pasien_id', TRUE),
                'dokter_id' => $this->input->post('dokter', TRUE),
                'penyakit_id' => $value,
                'jenis_rawat' => 'RAWAT-JALAN',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            );
            $check =  $this->RekamMedisModel->insert($data);
        }

        if ($check) {
            $this->session->set_flashdata('success', 'Rekam medis berhasil ditambahkan');
            redirect(base_url("/rekam-medis/rawat-jalan"));
        }
        $this->session->set_flashdata('error', 'Rekam medis gagal ditambahkan');
        redirect(base_url("/rekam-medis/rawat-jalan"));
    }

    public function add_inap()
    {
        $check = FALSE;
        foreach ($this->input->post('diagnosa') as $key => $value) {
            $data = array(
                'pasien_id' => $this->input->post('pasien_id', TRUE),
                'dokter_id' => $this->input->post('dokter', TRUE),
                'penyakit_id' => $value,
                'jenis_rawat' => 'RAWAT-INAP',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            );
            $check =  $this->RekamMedisModel->insert($data);
        }

        if ($check) {
            $this->session->set_flashdata('success', 'Rekam medis berhasil ditambahkan');
            redirect(base_url("/rekam-medis/rawat-inap"));
        }
        $this->session->set_flashdata('error', 'Rekam medis gagal ditambahkan');
        redirect(base_url("/rekam-medis/rawat-inap"));
    }

    public function delete()
    {
        if ($this->RekamMedisModel->delete($this->input->post('delete_id', TRUE))) {
            $this->session->set_flashdata('success', 'Rekam medis berhasil dihapus');
            if ($this->input->post('jenis_rawat', TRUE) === 'RAWAT-JALAN') {
                redirect(base_url("/rekam-medis/rawat-jalan"));
            }
            redirect(base_url("/rekam-medis/rawat-inap"));
        }
        $this->session->set_flashdata('error', 'Rekam medis gagal dihapus');
        if ($this->input->post('jenis_rawat', TRUE) === 'RAWAT-JALAN') {
            redirect(base_url("/rekam-medis/rawat-jalan"));
        }
        redirect(base_url("/rekam-medis/rawat-inap"));
    }
}
