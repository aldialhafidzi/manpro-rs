<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
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
    }
    public function rawat_jalan()
    {

        $data['title'] = 'MANPRO-RS | Transaksi Rawat Jalan';
        $data['page'] = 'transaksi-jalan';

        $this->load->view('headers/normal_header', $data);
        $this->load->view('pages/transaksi_jalan');
        $this->load->view('footers/normal_footer');
    }

    public function rawat_inap()
    {
        $data['title'] = 'MANPRO-RS | Transaksi Rawat Inap';
        $data['page'] = 'transaksi-inap';

        $this->load->view('headers/normal_header', $data);
        $this->load->view('pages/transaksi_inap');
        $this->load->view('footers/normal_footer');
    }

    public function getRekamInap()
    {
        $fetch_data = $this->TransaksiModel->make_datatables('RAWAT-INAP');
        $data = array();
        foreach ($fetch_data as $key => $row) {
            $sub_array = array();
            $sub_array[] = $key + 1;
            $sub_array[] = $row->no_mr;
            $sub_array[] = $row->nama;
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
            "recordsTotal" => $this->TransaksiModel->get_all_data('RAWAT-INAP'),
            "recordsFiltered" => $this->TransaksiModel->get_filtered_data('RAWAT-INAP'),
            "data"  => $data
        );
        echo json_encode($output);
    }

    public function getRekamJalan()
    {
        $fetch_data = $this->TransaksiModel->make_datatables('RAWAT-JALAN');
        $data = array();
        foreach ($fetch_data as $key => $row) {
            $sub_array = array();
            $sub_array[] = $key + 1;
            $sub_array[] = $row->no_mr;
            $sub_array[] = $row->nama;
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
            "recordsTotal" => $this->TransaksiModel->get_all_data('RAWAT-JALAN'),
            "recordsFiltered" => $this->TransaksiModel->get_filtered_data('RAWAT-JALAN'),
            "data"  => $data
        );
        echo json_encode($output);
    }

    public function find()
    {
        $data['transaksi'] = $this->DetailTransaksiModel->find($this->input->get('jenis_rawat', TRUE), $this->input->get('pasien_id', TRUE));
        echo json_encode($data['transaksi']);
    }

    public function delete()
    {
        if ($this->DetailTransaksiModel->delete('pasien_id', $this->input->post('delete_id', TRUE))) {
            $this->session->set_flashdata('success', 'Rekam medis berhasil dihapus');
            redirect(base_url("/rekam-medis/rawat-jalan"));
        }

        $this->session->set_flashdata('error', 'Rekam medis gagal dihapus');
        redirect(base_url("/rekam-medis/rawat-jalan"));
    }
}
