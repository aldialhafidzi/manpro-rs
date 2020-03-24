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

        $this->load->model('DokterModel');
        $this->load->model('PoliklinikModel');
        $this->load->model('PasienModel');
        $this->load->model('TipePasienModel');
        $this->load->model('UserModel');
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
            $sub_array[] = $row->no_bill;
            $sub_array[] = $row->no_mr;
            $sub_array[] = $row->nama;
            $sub_array[] = $row->no_telp;
            $sub_array[] = $row->total_tarif;
            $sub_array[] = '
            <button class="btn btn-sm btn-info" onclick="showDetailTransaksiByTransaksiID(' . $row->id . ');">
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
            $sub_array[] = $row->no_bill;
            $sub_array[] = $row->no_mr;
            $sub_array[] = $row->nama;
            $sub_array[] = $row->no_telp;
            $sub_array[] = $row->total_tarif;
            $sub_array[] = '
            <button class="btn btn-sm btn-info" onclick="showDetailTransaksiByTransaksiID(' . $row->id . ');">
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
        $data['transaksi'] = $this->TransaksiModel
            ->with_pasien()
            ->with_user()
            ->where('id', $this->input->get('id', TRUE))->get();

        $data['detail_transaksi'] = (array) $this->DetailTransaksiModel
            ->with_jadwal_dokter()
            ->with_penyakit()
            ->with_tindakan()
            ->with_obat()
            ->with_ruangan()
            ->with_kamar()
            ->with_bed()
            ->where('transaksi_id', $this->input->get('id', TRUE))->get_all();

        foreach ($data['detail_transaksi'] as $item) {

            if ($item->jadwal_dokter) {
                $dokter         = $this->DokterModel->get($item->jadwal_dokter->dokter_id);
                $poliklinik     = $this->PoliklinikModel->get($item->jadwal_dokter->poli_id);
                $item->jadwal_dokter->dokter        = $dokter;
                $item->jadwal_dokter->poliklinik    = $poliklinik;
            }
        }

        echo json_encode($data);
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
