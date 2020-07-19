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

        $this->load->model('KamarModel');
        $this->load->model('RuanganModel');
        $this->load->model('PenyakitModel');
        $this->load->model('TindakanModel');
        $this->load->model('BedModel');
        $this->load->model('JadwalDokterModel');
        $this->load->model('DokterModel');
        $this->load->model('ObatModel');
        $this->load->model('PoliklinikModel');
        $this->load->model('PasienModel');
        $this->load->model('TipePasienModel');
        $this->load->model('UserModel');
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

    public function index()
    {
        $data['title'] = 'MANPRO-RS | Rekam Medis';
        $data['page'] = 'rekam-medis';

        $this->load->view('headers/normal_header', $data);
        $this->load->view('pages/rekam_medis');
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

    public function rawat_igd()
    {
        $data['title'] = 'MANPRO-RS | Rekam Medis Rawat IGD';
        $data['page'] = 'rekam-igd';

        $this->load->view('headers/normal_header', $data);
        $this->load->view('pages/rekam_igd');
        $this->load->view('footers/normal_footer');
    }


    public function getRekamInap()
    {
        $fetch_data = $this->DetailTransaksiModel->make_datatables('RAWAT-INAP');
        $data = array();
        foreach ($fetch_data as $key => $row) {
            $sub_array = array();
            $sub_array[] = $key + 1;
            $sub_array[] = $row->no_mr;
            $sub_array[] = $row->nama;
            $sub_array[] = $row->no_telp;
            $sub_array[] = $row->kecamatan ? $row->kecamatan : '-';
            $sub_array[] = $row->kelurahan ? $row->kelurahan : '-';
            $sub_array[] = $row->rt ? $row->rt : '-';
            $sub_array[] = $row->rw ? $row->rw : '-';

            $sub_array[] = '
            <button type="button" class="btn btn-sm btn-info" onclick="showRekamMedisByPasienID(' . $row->pasien_id . ');">
                    <i class="far fa-eye"></i> &nbsp; Lihat
            </button>';
            $data[] = $sub_array;
        }

        $output = array(
            "draw" => intval($_POST["draw"]),
            "recordsTotal" => $this->DetailTransaksiModel->get_all_data('RAWAT-INAP'),
            "recordsFiltered" => $this->DetailTransaksiModel->get_filtered_data('RAWAT-INAP'),
            "data"  => $data
        );
        echo json_encode($output);
    }

    public function getRekamIgd()
    {
        $fetch_data = $this->DetailTransaksiModel->make_datatables('RAWAT-IGD');
        $data = array();
        foreach ($fetch_data as $key => $row) {
            $sub_array = array();
            $sub_array[] = $key + 1;
            $sub_array[] = $row->no_mr;
            $sub_array[] = $row->nama;
            $sub_array[] = $row->no_telp;
            $sub_array[] = $row->no_bed;
            $sub_array[] = $row->kecamatan ? $row->kecamatan : '-';
            $sub_array[] = $row->kelurahan ? $row->kelurahan : '-';
            $sub_array[] = $row->rt ? $row->rt : '-';
            $sub_array[] = $row->rw ? $row->rw : '-';

            $sub_array[] = '
            <button type="button" class="btn btn-sm btn-info" onclick="showRekamMedisByPasienID(' . $row->pasien_id . ');">
                    <i class="far fa-eye"></i> &nbsp; Lihat
            </button>';
            $data[] = $sub_array;
        }

        $output = array(
            "draw" => intval($_POST["draw"]),
            "recordsTotal" => $this->DetailTransaksiModel->get_all_data('RAWAT-IGD'),
            "recordsFiltered" => $this->DetailTransaksiModel->get_filtered_data('RAWAT-IGD'),
            "data"  => $data
        );
        echo json_encode($output);
    }

    public function getRekamMedis()
    {
        $fetch_data = $this->DetailTransaksiModel->make_datatables(null);
        $data = array();
        foreach ($fetch_data as $key => $row) {
            $sub_array = array();
            $sub_array[] = $key + 1;
            $sub_array[] = $row->no_mr;
            $sub_array[] = $row->nama;
            $sub_array[] = $row->no_telp;
            $sub_array[] = $row->kecamatan ? $row->kecamatan : '-';
            $sub_array[] = $row->kelurahan ? $row->kelurahan : '-';
            $sub_array[] = $row->rt ? $row->rt : '-';
            $sub_array[] = $row->rw ? $row->rw : '-';

            $sub_array[] = '
            <button type="button" class="btn btn-sm btn-info" onclick="showRekamMedisByPasienID(' . $row->pasien_id . ');">
                    <i class="far fa-eye"></i> &nbsp; Lihat
            </button>';
            $data[] = $sub_array;
        }

        $output = array(
            "draw" => intval($_POST["draw"]),
            "recordsTotal" => $this->DetailTransaksiModel->get_all_data(null),
            "recordsFiltered" => $this->DetailTransaksiModel->get_filtered_data(null),
            "data"  => $data
        );
        echo json_encode($output);
    }

    public function getRekamJalan()
    {
        $fetch_data = $this->DetailTransaksiModel->make_datatables('RAWAT-JALAN');
        $data = array();
        foreach ($fetch_data as $key => $row) {
            $sub_array = array();
            $sub_array[] = $key + 1;
            $sub_array[] = $row->no_mr;
            $sub_array[] = $row->nama;
            $sub_array[] = $row->no_telp;
            $sub_array[] = $row->kecamatan ? $row->kecamatan : '-';
            $sub_array[] = $row->kelurahan ? $row->kelurahan : '-';
            $sub_array[] = $row->rt ? $row->rt : '-';
            $sub_array[] = $row->rw ? $row->rw : '-';

            $sub_array[] = '
            <button type="button" class="btn btn-sm btn-info" onclick="showRekamMedisByPasienID(' . $row->pasien_id . ');">
                    <i class="far fa-eye"></i> &nbsp; Lihat
            </button>';
            $data[] = $sub_array;
        }

        $output = array(
            "draw" => intval($_POST["draw"]),
            "recordsTotal" => $this->DetailTransaksiModel->get_all_data('RAWAT-JALAN'),
            "recordsFiltered" => $this->DetailTransaksiModel->get_filtered_data('RAWAT-JALAN'),
            "data"  => $data
        );
        echo json_encode($output);
    }

    public function find()
    {
        $data['pasien_transaksi'] = $this->TransaksiModel
            ->with_pasien()
            ->with_user()
            ->where('pasien_id', $this->input->get('pasien_id', TRUE))->get();

        $data['rekam'] = null;

        if ($this->input->get('jenis_rawat', TRUE)) {
            $data['rekam'] = (array) $this->TransaksiModel
                ->with_pasien()
                ->with_user()
                ->with_detail_transaksi()
                ->where('jenis_rawat', $this->input->get('jenis_rawat', TRUE))
                ->where('pasien_id', $this->input->get('pasien_id', TRUE))->get_all();
        } else {
            $data['rekam'] = (array) $this->TransaksiModel
                ->with_pasien()
                ->with_user()
                ->with_detail_transaksi()
                ->where('pasien_id', $this->input->get('pasien_id', TRUE))->get_all();
        }


        foreach ($data['rekam'] as $item) {
            if (isset($item->detail_transaksi)) {
                $item->detail_transaksi = (array) $item->detail_transaksi;
                foreach ($item->detail_transaksi as $dt) {
                    if ($dt->jadwal_dokter_id) {
                        $jadwal_dokter       = $this->JadwalDokterModel->get($dt->jadwal_dokter_id);
                        $dokter              = $this->DokterModel->get($jadwal_dokter->dokter_id);
                        $poliklinik          = $this->PoliklinikModel->get($dokter->poli_id);
                        $dt->jadwal_dokter   = $jadwal_dokter;
                        $dt->dokter          = $dokter;
                        $dt->poliklinik      = $poliklinik;
                    }

                    if ($dt->bed_id) {
                        $bed                = $this->BedModel->get($dt->bed_id);
                        $dt->bed            = $bed;
                    }

                    if ($dt->kamar_id) {
                        $kamar              = $this->KamarModel->get($dt->kamar_id);
                        $dt->kamar          = $kamar;
                    }

                    if ($dt->ruangan_id) {
                        $ruangan            = $this->RuanganModel->get($dt->ruangan_id);
                        $dt->ruangan        = $ruangan;
                    }

                    if ($dt->obat_id) {
                        $obat               = $this->ObatModel->get($dt->obat_id);
                        $dt->obat           = $obat;
                    }

                    if ($dt->penyakit_id) {
                        $penyakit           = $this->PenyakitModel->get($dt->penyakit_id);
                        $dt->penyakit       = $penyakit;
                    }

                    if ($dt->tindakan_id) {
                        $tindakan           = $this->TindakanModel->get($dt->tindakan_id);
                        $dt->tindakan       = $tindakan;
                    }
                }
            }
        }
        echo (json_encode((array) $data));
    }

    public function add()
    {
        $check = FALSE;
        foreach ($this->input->post('diagnosa') as $key => $value) {
            $data = array(
                'transaksi_id' => $this->input->post('transaksi_id', TRUE),
                'jadwal_dokter_id' => $this->input->post('jadwal_dokter_id', TRUE),
                'penyakit_id' => $value,
                'tarif_dokter' => 0,
                'tarif_pendaftaran' => 0,
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            );
            $check =  $this->DetailTransaksiModel->insert($data);
        }

        foreach ($this->input->post('obat_id') as $key => $value) {
            $obat = $this->ObatModel->get($value);
            $data = array(
                'transaksi_id' => $this->input->post('transaksi_id', TRUE),
                'jadwal_dokter_id' => $this->input->post('jadwal_dokter_id', TRUE),
                'qty_obat' => $this->input->post('qty_obat')[$key],
                'obat_id' => $obat->id,
                'tarif_obat' => $obat->harga,
                'tarif_pendaftaran' => 0,
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            );
            $check =  $this->DetailTransaksiModel->insert($data);
        }

        foreach ($this->input->post('tindakan') as $key => $value) {
            $data = array(
                'transaksi_id' => $this->input->post('transaksi_id', TRUE),
                'jadwal_dokter_id' => $this->input->post('jadwal_dokter_id', TRUE),
                'tindakan_id' => $value,
                'tarif_tindakan' => 0,
                'tarif_pendaftaran' => 0,
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            );
            $check =  $this->DetailTransaksiModel->insert($data);
        }


        if ($check) {
            $this->session->set_flashdata('success', 'Rekam medis berhasil ditambahkan');
            redirect($_SERVER['HTTP_REFERER']);
        }
        $this->session->set_flashdata('error', 'Rekam medis gagal ditambahkan');
        redirect($_SERVER['HTTP_REFERER']);
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
            redirect($_SERVER['HTTP_REFERER']);
        }
        $this->session->set_flashdata('error', 'Rekam medis gagal ditambahkan');
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function delete()
    {
        // var_dump($this->input->post('delete_id', TRUE)); die;
        if ($this->DetailTransaksiModel->where('transaksi_id', $this->input->post('delete_id', TRUE))->delete()) {
            $this->session->set_flashdata('success', 'Rekam medis berhasil dihapus');
            if ($this->input->post('jenis_rawat', TRUE) === 'RAWAT-JALAN') {
                redirect(base_url("/rekam-medis/rawat-jalan"));
            }
            if ($this->input->post('jenis_rawat', TRUE) === 'RAWAT-IGD') {
                redirect(base_url("/rekam-medis/rawat-igd"));
            }
            redirect(base_url("/rekam-medis/rawat-inap"));
        }
        $this->session->set_flashdata('error', 'Rekam medis gagal dihapus');
        if ($this->input->post('jenis_rawat', TRUE) === 'RAWAT-JALAN') {
            redirect(base_url("/rekam-medis/rawat-jalan"));
        }
        if ($this->input->post('jenis_rawat', TRUE) === 'RAWAT-IGD') {
                redirect(base_url("/rekam-medis/rawat-igd"));
            }
        redirect(base_url("/rekam-medis/rawat-inap"));
    }
}
