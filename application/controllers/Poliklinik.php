<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Poliklinik extends CI_Controller
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
        $this->load->model('PoliklinikModel');
        $this->load->model('JadwalDokterModel');
        $this->load->model('M_jadwal_poli');
        $this->load->model('m_getDok');
        $this->load->model('m_getPer');
        $this->load->model('M_treatment');
        $this->load->model('m_obat');
        $this->load->model('m_dokter_poli');
        $this->load->model('m_list_poli');
        $this->load->model('m_jadwal_poli');
    }

    public function index()
    {
        // $data['user'] = $this->db->get_where('user', ['email' =>
        // $this->session->userdata('email')])->row_array();
        $this->load->model('M_jadwal_poli');
        $this->load->model('M_getDok');
        $this->load->model('M_getPer');

        $data['title'] = 'MANPRO-RS | Jadwal Poliklinik';
        $data['page'] = 'poliklinik';

        $data['poliklinik'] = $this->m_jadwal_poli->getPoliklinik();
        $data['M_jadwal_poli'] = $this->db->get('poliklinik')->result_array();

        $data['dokter'] = $this->m_getDok->getDokter();
        $data['M_getDok'] = $this->db->get('dokter')->result_array();

        $data['perawat'] = $this->m_getPer->getPer();
        $data['M_getPer'] = $this->db->get('perawat')->result_array();

        $this->load->view('headers/normal_header', $data);
        // $this->load->view('sidebar/sidebar', $data);
        $data['jadwal_poli'] = $this->m_jadwal_poli->tampil_data()->result();
        // echo json_encode($data['jadwal_poli']); die;
        $this->load->view('pages/poliklinik/jadwal_poli', $data);
        $this->load->view('footers/normal_footer');
    }

    public function list_poli()
    {
        // $data['user'] = $this->db->get_where('user', ['email' =>
        // $this->session->userdata('email')])->row_array();
        $data['title'] = 'MANPRO-RS | List Poliklinik';
        $data['page'] = 'poliklinik';

        $this->load->view('headers/normal_header', $data);
        // $this->load->view('sidebar/sidebar', $data);
        $data['list_poli'] = $this->m_list_poli->tampil_data()->result();
        $this->load->view('pages/poliklinik/list_poli', $data);
        $this->load->view('footers/normal_footer');
    }

    public function dokter_poli()
    {
        $data['page'] = 'dokter';
        $data['title'] = 'MANPRO-RS | Dokter Poliklinik';
        $this->load->view('headers/normal_header', $data);
        $data['dokter_poli'] = $this->m_dokter_poli->tampil_data()->result();
        $this->load->view('pages/poliklinik/dokter_poli', $data);
        $this->load->view('footers/normal_footer');
    }

    public function pasien()
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['title'] = 'MANPRO-RS | Pasien';
        $data['page'] = 'pasien';
        $this->load->view('headers/normal_header', $data);
        $this->load->view('sidebar/sidebar', $data);
        $data['pasien'] = $this->m_pasien->tampil_data()->result();
        $this->load->view('pages/poliklinik/pasien', $data);
        $this->load->view('footers/normal_footer');
    }

    public function perawat_poli()
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['title'] = 'MANPRO-RS | Perawat Poliklinik';
        $data['page'] = 'perawat_poli';
        $this->load->view('headers/normal_header', $data);
        $this->load->view('sidebar/sidebar', $data);
        $data['perawat_poli'] = $this->m_perawat_poli->tampil_data()->result();
        $this->load->view('pages/poliklinik/perawat_poli', $data);
        $this->load->view('footers/normal_footer');
    }

    public function obat()
    {
        // $data['user'] = $this->db->get_where('user', ['email' =>
        // $this->session->userdata('email')])->row_array();
        $data['title'] = 'MANPRO-RS | Obat';
        $data['page'] = 'poliklinik';
        $this->load->view('headers/normal_header', $data);
        // $this->load->view('sidebar/sidebar', $data);
        $data['obat'] = $this->m_obat->tampil_data()->result();
        $this->load->view('pages/poliklinik/obat', $data);
        $this->load->view('footers/normal_footer');
    }

    public function tindakan()
    {
        // $data['user'] = $this->db->get_where('user', ['email' =>
        // $this->session->userdata('email')])->row_array();
        $data['title'] = 'MANPRO-RS | tindakan';
        $data['page'] = 'POLIKLINIK';
        $this->load->view('headers/normal_header', $data);
        // $this->load->view('sidebar/sidebar', $data);
        $data['tindakan'] = $this->M_treatment->tampil_data()->result();
        $this->load->view('pages/poliklinik/treatment', $data);
        $this->load->view('footers/normal_footer');
    }

    public function regis_poli()
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->model('M_regis_poli');

        $data['title'] = 'MANPRO-RS | Resgistrasi';

        $data['getPasien'] = $this->m_regis_poli->getPasien();
        $data['M_regis_poli'] = $this->db->get('pasien')->result_array();

        $this->load->view('headers/normal_header', $data);
        $this->load->view('sidebar/sidebar', $data);
        $data['regis_poli'] = $this->m_regis_poli->tampil_data()->result();
        $this->load->view('pages/poliklinik/regis_poli', $data);
        $this->load->view('footers/normal_footer');
    }

    public function medrec()
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->model('M_medrec');
        $data['getPasien'] = $this->m_medrec->getPasien();
        $data['M_medrec'] = $this->db->get('pasien')->result_array();

        $this->load->model('M_getDok');
        $data['dokter'] = $this->m_getDok->getDokter();
        $data['M_getDok'] = $this->db->get('dokter')->result_array();

        $this->load->model('M_getDiagnosa');
        $data['getDiagnosa'] = $this->M_getDiagnosa->getDiagnosa();
        $data['M_getDiagnosa'] = $this->db->get('tindakan')->result_array();

        $this->load->model('M_getObat');
        $data['getObat'] = $this->m_getObat->getObat();
        $data['M_getObat'] = $this->db->get('obat')->result_array();

        $data['title'] = 'MANPRO-RS | Medical Recapitulate';
        $this->load->view('headers/normal_header', $data);
        $this->load->view('sidebar/sidebar', $data);
        $data['medrec'] = $this->m_medrec->tampil_data()->result();
        $this->load->view('pages/poliklinik/medrec', $data);
        $this->load->view('footers/normal_footer');
    }

    public function tambah_aksi_dokter()
    {
        $nama           = $this->input->post('nama');
        $no_telp        = $this->input->post('no_telp');
        $spec_id      = $this->input->post('spec_id');
        $status         = $this->input->post('status');

        $data = array(
            'nama'      => $nama,
            'no_telp'   => $no_telp,
            'spec_id' => $spec_id,
            'status'    => $status,
        );

        $this->m_dokter_poli->input_data($data, 'dokter');
        redirect('poliklinik/dokter_poli');
    }

    public function tambah_aksi_perawat()
    {
        $nama           = $this->input->post('nama');
        $no_telp        = $this->input->post('no_telp');
        $spec_id      = $this->input->post('spec_id');
        $status         = $this->input->post('status');

        $data = array(
            'nama'      => $nama,
            'no_telp'   => $no_telp,
            'spec_id' => $spec_id,
            'status'    => $status,
        );

        $this->m_perawat_poli->input_data($data, 'perawat');
        redirect('poliklinik/perawat_poli');
    }

    public function tambah_aksi_jadwal()
    {
        $poli_id           = $this->input->post('poli_id');
        $dokter_id        = $this->input->post('dokter_id');
        $id_perawat      = $this->input->post('id_perawat');
        $hari         = $this->input->post('hari');
        $jam_awal         = $this->input->post('jam_awal');

        $data = array(
            'poli_id'      => $poli_id,
            'dokter_id'   => $dokter_id,
            'id_perawat' => $id_perawat,
            'hari'    => $hari,
            'jam_awal'    => $jam_awal,
        );

        $this->m_jadwal_poli->input_data($data, 'jadwal_dokter');
        redirect('poliklinik/index');
    }

    public function tambah_aksi_medrec()
    {
        $pasien_id           = $this->input->post('pasien_id');
        $tgl_check        = $this->input->post('tgl_check');
        $diagnosa      = $this->input->post('diagnosa');
        $dokter_id         = $this->input->post('dokter_id');
        $tindakan_id         = $this->input->post('tindakan_id');
        $id_drugs         = $this->input->post('id_drugs');
        $dosis         = $this->input->post('dosis');
        $aturan_pakai         = $this->input->post('aturan_pakai');

        $data = array(
            'pasien_id'      => $pasien_id,
            'tgl_check'         => $tgl_check,
            'diagnosa' => $diagnosa,
            'dokter_id'    => $dokter_id,
            'tindakan_id'    => $tindakan_id,
            'id_drugs'    => $id_drugs,
            'dosis'    => $dosis,
            'aturan_pakai'    => $aturan_pakai
        );

        $this->m_medrec->input_data($data, 'detail_transaksi');
        redirect('poliklinik/medrec');
    }


    public function tambah_aksi_list_poli()
    {
        $nama           = $this->input->post('nama');
        $ruangan        = $this->input->post('ruangan');
        $jenis      = $this->input->post('jenis');

        $data = array(
            'nama'      => $nama,
            'ruangan' => $ruangan,
            'jenis' => $jenis,
        );

        $this->m_list_poli->input_data($data, 'poliklinik');
        redirect('poliklinik/list_poli');
    }

    public function tambah_aksi_pasien()
    {
        $nama           = $this->input->post('nama');
        $no_telp        = $this->input->post('no_telp');
        $alamat         = $this->input->post('alamat');
        $tgl_lahir      = $this->input->post('tgl_lahir');
        $pekerjaan      = $this->input->post('pekerjaan');

        $data = array(
            'nama'      => $nama,
            'no_telp'   => $no_telp,
            'alamat'    => $alamat,
            'tgl_lahir' => $tgl_lahir,
            'pekerjaan' => $pekerjaan,
        );

        $this->m_pasien->input_data($data, 'pasien');
        redirect('poliklinik/pasien');
    }

    public function tambah_aksi_obat()
    {
        $nama           = $this->input->post('nama');
        $merk        = $this->input->post('merk');
        $jenis      = $this->input->post('jenis');

        $data = array(
            'nama'      => $nama,
            'merk' => $merk,
            'jenis' => $jenis,
        );

        $this->m_obat->input_data($data, 'obat');
        redirect('poliklinik/obat');
    }

    public function tambah_aksi_tindakan()
    {
        $tindakan        = $this->input->post('tindakan');

        $data = array(
            'tindakan'      => $tindakan,
        );

        $this->M_treatment->input_data($data, 'tindakan');
        redirect('poliklinik/tindakan');
    }

    public function hapus_dokter($dokter_id)
    {
        $where = array('dokter_id' => $dokter_id);
        $this->m_dokter_poli->hapus_data($where, 'dokter');
        redirect('poliklinik/dokter_poli');
    }

    public function hapus_jadwal($jadwal_id)
    {
        $where = array('jadwal_id' => $jadwal_id);
        $this->m_jadwal_poli->hapus_data($where, 'jadwal_dokter');
        redirect('poliklinik/index');
    }

    public function hapus_list($poli_id)
    {
        $where = array('poli_id' => $poli_id);
        $this->m_list_poli->hapus_data($where, 'poliklinik');
        redirect('poliklinik/list_poli');
    }

    public function hapus_perawat($id_perawat)
    {
        $where = array('id_perawat' => $id_perawat);
        $this->m_perawat_poli->hapus_data($where, 'perawat');
        redirect('poliklinik/perawat_poli');
    }

    public function hapus_pasien($pasien_id)
    {
        $where = array('pasien_id' => $pasien_id);
        $this->m_pasien->hapus_data($where, 'pasien');
        redirect('poliklinik/pasien');
    }

    public function hapus_obat($id_drugs)
    {
        $where = array('id_drugs' => $id_drugs);
        $this->m_obat->hapus_data($where, 'obat');
        redirect('poliklinik/obat');
    }

    public function hapus_tindakan($tindakan_id)
    {
        $where = array('tindakan_id' => $tindakan_id);
        $this->M_treatment->hapus_data($where, 'tindakan');
        redirect('poliklinik/tindakan');
    }

    public function edit_dokter($dokter_id)
    {
        $where = array('dokter_id' => $dokter_id);
        $data['dokter_poli'] = $this->m_dokter_poli->edit_data($where, 'dokter')->result();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['title'] = 'MANPRO-RS | Dokter Poliklinik';
        $this->load->view('headers/normal_header', $data);
        $this->load->view('sidebar/sidebar', $data);
        // $data['dokter_poli'] = $this->m_dokter_poli->tampil_data()->result();
        $this->load->view('pages/poliklinik/edit_dokter', $data);
        $this->load->view('footers/normal_footer');
    }

    public function update_dokter()
    {
        $dokter_id  = $this->input->post('dokter_id');
        $nama       = $this->input->post('nama');
        $no_telp    = $this->input->post('no_telp');
        $spec_id  = $this->input->post('spec_id');
        $status     = $this->input->post('status');

        $data = array(
            'nama'          => $nama,
            'no_telp'       => $no_telp,
            'spec_id'     => $spec_id,
            'status'        => $status
        );

        $where = array(
            'dokter_id'  => $dokter_id
        );

        $this->m_dokter_poli->update_data($where, 'dokter', $data);
        redirect('poliklinik/dokter_poli');
    }

    public function edit_list($poli_id)
    {
        $where = array('poli_id' => $poli_id);
        $data['list_poli'] = $this->m_list_poli->edit_data($where, 'poliklinik')->result();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['title'] = 'MANPRO-RS | List Poliklinik';
        $this->load->view('headers/normal_header', $data);
        $this->load->view('sidebar/sidebar', $data);
        // $data['dokter_poli'] = $this->m_dokter_poli->tampil_data()->result();
        $this->load->view('pages/poliklinik/edit_list', $data);
        $this->load->view('footers/normal_footer');
    }

    public function update_list()
    {
        $poli_id    = $this->input->post('poli_id');
        $nama  = $this->input->post('nama');
        $ruangan    = $this->input->post('ruangan');
        $jenis       = $this->input->post('jenis');

        $data = array(
            'nama'          => $nama,
            'ruangan'            => $ruangan,
            'jenis'               => $jenis
        );

        $where = array(
            'poli_id'  => $poli_id
        );

        $this->m_list_poli->update_data($where, 'poliklinik', $data);
        redirect('poliklinik/list_poli');
    }

    public function edit_perawat($id_perawat)
    {
        $where = array('id_perawat' => $id_perawat);
        $data['perawat_poli'] = $this->m_perawat_poli->edit_data($where, 'perawat')->result();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['title'] = 'MANPRO-RS | Dokter Perawat';
        $this->load->view('headers/normal_header', $data);
        $this->load->view('sidebar/sidebar', $data);
        // $data['perawat_poli'] = $this->m_dokter_poli->tampil_data()->result();
        $this->load->view('pages/poliklinik/edit_perawat', $data);
        $this->load->view('footers/normal_footer');
    }

    public function update_perawat()
    {
        $id_perawat  = $this->input->post('id_perawat');
        $nama       = $this->input->post('nama');
        $no_telp    = $this->input->post('no_telp');
        $spec_id  = $this->input->post('spec_id');
        $status     = $this->input->post('status');

        $data = array(
            'nama'          => $nama,
            'no_telp'       => $no_telp,
            'spec_id'     => $spec_id,
            'status'        => $status
        );

        $where = array(
            'id_perawat'  => $id_perawat
        );

        $this->m_perawat_poli->update_data($where, 'perawat', $data);
        redirect('poliklinik/perawat_poli');
    }

    public function edit_pasien($pasien_id)
    {
        $where = array('pasien_id' => $pasien_id);
        $data['pasien'] = $this->m_pasien->edit_data($where, 'pasien')->result();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['title'] = 'MANPRO-RS | Pasien';
        $this->load->view('headers/normal_header', $data);
        $this->load->view('sidebar/sidebar', $data);
        // $data['pasien'] = $this->m_dokter_poli->tampil_data()->result();
        $this->load->view('pages/poliklinik/edit_pasien', $data);
        $this->load->view('footers/normal_footer');
    }

    public function update_pasien()
    {
        $pasien_id  = $this->input->post('pasien_id');
        $nama       = $this->input->post('nama');
        $no_telp    = $this->input->post('no_telp');
        $alamat     = $this->input->post('alamat');
        $tgl_lahir  = $this->input->post('tgl_lahir');
        $pekerjaan  = $this->input->post('pekerjaan');

        $data = array(
            'nama'          => $nama,
            'no_telp'       => $no_telp,
            'alamat'        => $alamat,
            'tgl_lahir'        => $tgl_lahir,
            'pekerjaan'        => $pekerjaan
        );

        $where = array(
            'pasien_id'  => $pasien_id
        );

        $this->m_pasien->update_data($where, 'pasien', $data);
        redirect('poliklinik/pasien');
    }

    public function edit_obat($id_drugs)
    {
        $where = array('id_drugs' => $id_drugs);
        $data['obat'] = $this->m_obat->edit_data($where, 'obat')->result();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['title'] = 'MANPRO-RS | Obat-obatan';
        $this->load->view('headers/normal_header', $data);
        $this->load->view('sidebar/sidebar', $data);
        // $data['obat'] = $this->m_dokter_poli->tampil_data()->result();
        $this->load->view('pages/poliklinik/edit_obat', $data);
        $this->load->view('footers/normal_footer');
    }

    public function update_obat()
    {
        $id_drugs   = $this->input->post('id_drugs');
        $nama       = $this->input->post('nama');
        $merk       = $this->input->post('merk');
        $jenis       = $this->input->post('jenis');


        $data = array(
            'nama'          => $nama,
            'merk'       => $merk,
            'jenis'        => $jenis,
        );

        $where = array(
            'id_drugs'  => $id_drugs
        );

        $this->m_obat->update_data($where, 'obat', $data);
        redirect('poliklinik/obat');
    }

    public function edit_tindakan($tindakan_id)
    {
        $where = array('tindakan_id' => $tindakan_id);
        $data['tindakan'] = $this->M_treatment->edit_data($where, 'tindakan')->result();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['title'] = 'MANPRO-RS | tindakan-tindakanan';
        $this->load->view('headers/normal_header', $data);
        $this->load->view('sidebar/sidebar', $data);
        // $data['tindakan'] = $this->m_dokter_poli->tampil_data()->result();
        $this->load->view('pages/poliklinik/edit_tindakan', $data);
        $this->load->view('footers/normal_footer');
    }

    public function update_tindakan()
    {
        $tindakan_id  = $this->input->post('tindakan_id');
        $tindakan       = $this->input->post('tindakan');

        $data = array(
            'tindakan'          => $tindakan
        );

        $where = array(
            'tindakan_id'  => $tindakan_id
        );

        $this->M_treatment->update_data($where, 'tindakan', $data);
        redirect('poliklinik/tindakan');
    }

    public function edit_jadwal($jadwal_id)
    {
        $where = array('jadwal_id' => $jadwal_id);
        $data['jadwal_poli'] = $this->m_jadwal_poli->edit_data($where, 'jadwal_dokter')->result();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['title'] = 'MANPRO-RS | Edit Jadwal';
        $this->load->view('headers/normal_header', $data);
        $this->load->view('sidebar/sidebar', $data);
        // $data['perawat_poli'] = $this->m_dokter_poli->tampil_data()->result();
        $this->load->view('pages/poliklinik/edit_jadwal', $data);
        $this->load->view('footers/normal_footer');
    }

    public function update_jadwal()
    {
        $jadwal_id  = $this->input->post('jadwal_id');
        $poli_id       = $this->input->post('poli_id');
        $dokter_id    = $this->input->post('dokter_id');
        $id_perawat  = $this->input->post('id_perawat');
        $hari     = $this->input->post('hari');
        $jam_awal     = $this->input->post('jam_awal');

        $data = array(
            'poli_id'          => $poli_id,
            'dokter_id'       => $dokter_id,
            'id_perawat'     => $id_perawat,
            'hari'        => $hari,
            'jam_awal'        => $jam_awal
        );

        $where = array(
            'jadwal_id'  => $jadwal_id
        );

        $this->m_jadwal_poli->update_data($where, 'jadwal_dokter', $data);
        redirect('poliklinik/perawat_poli');
    }

    public function edit_regis($transaksi_id)
    {
        $where = array('transaksi_id' => $transaksi_id);
        $data['regis_poli'] = $this->m_regis_poli->edit_data($where, 'transaksi')->result();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['title'] = 'MANPRO-RS | Edit Registrasi';
        $this->load->view('headers/normal_header', $data);
        $this->load->view('sidebar/sidebar', $data);
        $this->load->view('pages/poliklinik/edit_regis', $data);
        $this->load->view('footers/normal_footer');
    }

    public function update_regis()
    {
        $transaksi_id  = $this->input->post('transaksi_id');
        $pasien_id       = $this->input->post('pasien_id');
        $jadwal_id    = $this->input->post('jadwal_id');
        $tanggal  = $this->input->post('tanggal');
        $status     = $this->input->post('status');

        $data = array(
            'pasien_id'          => $pasien_id,
            'jadwal_id'       => $jadwal_id,
            'tanggal'     => $tanggal,
            'status'        => $status,
        );

        $where = array(
            'id'  => $transaksi_id
        );

        $this->m_regis_poli->update_data($where, 'transaksi', $data);
        redirect('poliklinik/regis_poli');
    }

    public function edit_medrec($id_medrec)
    {
        $where = array('id_medrec' => $id_medrec);
        $data['medrec'] = $this->m_medrec->edit_data($where, 'detail_transaksi')->result();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['title'] = 'MANPRO-RS | Edit Medical Recaptulate';
        $this->load->view('headers/normal_header', $data);
        $this->load->view('sidebar/sidebar', $data);
        $this->load->view('pages/poliklinik/edit_medrec', $data);
        $this->load->view('footers/normal_footer');
    }

    public function update_medrec()
    {
        $id_medrec  = $this->input->post('id_medrec');
        $pasien_id       = $this->input->post('pasien_id');
        $tgl_check    = $this->input->post('tgl_check');
        $diagnosa  = $this->input->post('diagnosa');
        $dokter_id     = $this->input->post('dokter_id');
        $tindakan_id     = $this->input->post('tindakan_id');
        $id_drugs     = $this->input->post('id_drugs');
        $dosis     = $this->input->post('dosis');
        $aturan_pakai     = $this->input->post('aturan_pakai');

        $data = array(
            'pasien_id'          => $pasien_id,
            'tgl_check'       => $tgl_check,
            'diagnosa'     => $diagnosa,
            'dokter_id'        => $dokter_id,
            'tindakan_id'        => $tindakan_id,
            'id_drugs'        => $id_drugs,
            'dosis'        => $dosis,
            'aturan_pakai'        => $aturan_pakai,

        );

        $where = array(
            'id_medrec'  => $id_medrec
        );

        $this->m_medrec->update_data($where, 'detail_transaksi', $data);
        redirect('poliklinik/medrec');
    }

    public function all()
    {
        $data =  $this->PoliklinikModel->get_all();
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
        $data = $this->JadwalDokterModel->with_dokter()->with_poliklinik()->get_all();
        $list = array();
        if ($data) {
            foreach ($data as $key => $value) {
                $list[$key]['id'] = $value->id;
                $list[$key]['text'] = $value->poliklinik->nama;
                $list[$key]['lokasi'] = $value->poliklinik->lokasi;
                $list[$key]['jam_awal'] = $value->jam_awal;
                $list[$key]['jam_akhir'] = $value->jam_akhir;
                $list[$key]['dokter'] = $value->dokter;
                $list[$key]['poliklinik'] = $value->poliklinik;
            }
        }
        echo json_encode($list);
    }

    public function get()
    {
        $data = $this->PoliklinikModel->get($this->input->get('poliklinik_id'));
        echo json_encode($data);
    }

    public function delete()
    {
        if ($this->PoliklinikModel->where('id', $this->input->post('delete_id', TRUE))->delete()) {
            $this->session->set_flashdata('success', 'Data poliklinik berhasil dihapus');
            redirect(base_url("/admin/poliklinik"));
        }
        $this->session->set_flashdata('error', 'Data poliklinik gagal dihapus');
        redirect(base_url("/admin/poliklinik"));
    }

    public function create()
    {
        $poliklinik = array(
            'kode' => $this->input->post('kode', TRUE),
            'nama' => $this->input->post('nama', TRUE),
            'lokasi' => $this->input->post('lokasi', TRUE)
        );

        if ($this->input->post('poliklinik_id', TRUE)) {
            if ($this->PoliklinikModel->update($poliklinik, $this->input->post('poliklinik_id', TRUE))) {
                $this->session->set_flashdata('success', 'Poliklinik berhasil diupdate');
            } else {
                $this->session->set_flashdata('error', 'Poliklinik gagal diupdate');
            }
        } else {
            if ($this->PoliklinikModel->insert($poliklinik)) {
                $this->session->set_flashdata('success', 'Poliklinik berhasil ditambahkan');
            } else {
                $this->session->set_flashdata('error', 'Poliklinik gagal ditambahkan');
            }
        }
        redirect(base_url("/admin/poliklinik"));
    }
}
