<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Igd extends CI_Controller
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
        $this->load->model('M_igd');
    }
    public function index()
    {
        $data['title'] = 'MANPRO-RS | Pendaftaran';
        $data['page'] = 'bedigd';
        $this->load->view('headers/normal_header', $data);
        $this->load->view('pages/bedigd');
        $this->load->view('footers/normal_footer');
    }



    public function pendaftaranigd($id)
    {
        $data['title'] = 'MANPRO-RS | IGD';
        $data['page'] = 'pendaftaranigd';

        $where = array('id' => $id);
        $data['idbedigd'] = $this->M_igd->edit_data($where, 'igd_bed')->result();
        $data['idpasienbaru'] = $this->M_igd->idpasienbaru() + 1;
        $data['idrekam'] = $this->M_igd->idrekambaru() + 1;

        $this->load->view('headers/normal_header', $data);
        $this->load->view('pages/pendaftaranigd', $data);
        $this->load->view('footers/normal_footer');
    }


    public function tambah_transaksi()
    {
        $id_rekam_medis       = $this->input->post('id_rekam_medis');
        $jumlah        = $this->input->post('jumlah');
        $layanan  = $this->input->post('layanan');


        $data = array(
            'id_rekam_medis'      => $id_rekam_medis,
            'jumlah'       => $jumlah,
            'layanan' => $layanan,

        );

        $this->M_igd->input_datatr($data, 'igd_transaksi');
        redirect('igd/rekammedisdetail/' . $id_rekam_medis);
        //var_dump($_POST);die();
    }

    public function rekammedisawal()
    {
        $data['title'] = 'MANPRO-RS | IGD';
        $data['page'] = 'rekammedisawal';
        $data['pasien'] = $this->M_igd->pasien();
        $this->load->view('headers/normal_header', $data);
        $this->load->view('pages/rekammedisawal');
        $this->load->view('footers/normal_footer');
    }

    public function rekammedisawaldetail()
    {
        $data['title'] = 'MANPRO-RS | IGD';
        $data['page'] = 'rekammedisawal';
        $this->load->view('headers/normal_header', $data);
        $this->load->view('pages/rekammedisawaldetail');
        $this->load->view('footers/normal_footer');
    }


    public function datapasieninap()
    {
        $data['title'] = 'MANPRO-RS | IGD';
        $data['page'] = 'datapasieninap';
        $this->load->view('headers/normal_header', $data);
        $this->load->view('pages/datapasieninap');
        $this->load->view('footers/normal_footer');
    }

    public function datapasieninapdetail()
    {
        $data['title'] = 'MANPRO-RS | IGD';
        $data['page'] = 'datapasieninapdetail';
        $this->load->view('headers/normal_header', $data);
        $this->load->view('pages/datapasieninapdetail');
        $this->load->view('footers/normal_footer');
    }




    public function datapasienjalan()
    {
        $data['title'] = 'MANPRO-RS | IGD';
        $data['page'] = 'datapasieninap';
        $this->load->view('headers/normal_header', $data);
        $this->load->view('pages/datapasienjalan');
        $this->load->view('footers/normal_footer');
    }

    public function datapasienjalandetail()
    {
        $data['title'] = 'MANPRO-RS | IGD';
        $data['page'] = 'datapasieninapdetail';
        $this->load->view('headers/normal_header', $data);
        $this->load->view('pages/datapasienjalandetail');
        $this->load->view('footers/normal_footer');
    }
    public function inventoryobatigd()
    {
        $data['title'] = 'MANPRO-RS | IGD';
        $data['page'] = 'inventoryobatigd';
        $data['obat'] = $this->M_igd->tampil_dataobat();
        //  var_dump($data);die();
        $this->load->view('headers/normal_header', $data);
        $this->load->view('pages/inventoryobatigd', $data);
        $this->load->view('footers/normal_footer');
    }

    public function inventoryedit($id_inventory)
    {


        $where = array('id_inventory' => $id_inventory);
        $data['obat'] = $this->M_igd->edit_data($where, 'igd_inventory')->result();
        $data['title'] = 'MANPRO-RS | IGD';
        $data['page'] = 'inventoryobatigd';

        //  var_dump($data);die();
        $this->load->view('headers/normal_header', $data);
        $this->load->view('pages/editobat', $data);
        $this->load->view('footers/normal_footer');
    }

    public function inventoryedit2($id_inventory)
    {


        $where = array('id_inventory' => $id_inventory);
        $data['obat'] = $this->M_igd->edit_data($where, 'igd_inventory')->result();
        $data['title'] = 'MANPRO-RS | IGD';
        $data['page'] = 'inventoryobatigd';

        //  var_dump($data);die();
        $this->load->view('headers/normal_header', $data);
        $this->load->view('pages/edittindakan', $data);
        $this->load->view('footers/normal_footer');
    }
    public function updateinventory()
    {
        $id_inventory = $this->input->post('id_inventory');
        $nama_inv = $this->input->post('nama_inv');
        $harga_inv = $this->input->post('harga_inv');

        $data = array(
            'nama_inv' => $nama_inv,
            'harga_inv' => $harga_inv,

        );
        $where = array(
            'id_inventory' => $id_inventory
        );
        $this->M_igd->update_data($where, $data, 'igd_inventory');
        redirect('igd/inventoryobatigd');
    }

    public function updateinventory2()
    {
        $id_inventory = $this->input->post('id_inventory');
        $nama_inv = $this->input->post('nama_inv');
        $harga_inv = $this->input->post('harga_inv');

        $data = array(
            'nama_inv' => $nama_inv,
            'harga_inv' => $harga_inv,

        );
        $where = array(
            'id_inventory' => $id_inventory
        );
        $this->M_igd->update_data($where, $data, 'igd_inventory');
        redirect('igd/inventorytindakanigd');
    }


    public function tambah_obatigd()
    {
        $nama_inv       = $this->input->post('nama_inv');
        $harga_inv        = $this->input->post('harga_inv');



        $data = array(
            'nama_inv'      => $nama_inv,
            'harga_inv'       => $harga_inv,
            'jenis' => "obat",

        );

        $this->M_igd->input_obat($data, 'igd_inventory');
        redirect('igd/inventoryobatigd');
    }

    public function tambah_tindakanigd()
    {
        $nama_inv       = $this->input->post('nama_inv');
        $harga_inv        = $this->input->post('harga_inv');



        $data = array(
            'nama_inv'      => $nama_inv,
            'harga_inv'       => $harga_inv,
            'jenis' => "Tindakan",

        );

        $this->M_igd->input_obat($data, 'igd_inventory');
        redirect('igd/inventorytindakanigd');
    }

    public function hapusinvigd($id_inventory)
    {
        $where = array('id_inventory' => $id_inventory);
        $this->M_igd->hapus_data($where, 'igd_inventory');
        redirect('igd/inventoryobatigd');
    }

    public function hapusinvigd2($id_inventory)
    {
        $where = array('id_inventory' => $id_inventory);
        $this->M_igd->hapus_data($where, 'igd_inventory');
        redirect('igd/inventorytindakanigd');
    }

    public function inventorytindakanigd()
    {
        $data['title'] = 'MANPRO-RS | IGD';
        $data['page'] = 'inventoryobatigd';
        $data['tindakan'] = $this->M_igd->tampil_datatindakan();
        $this->load->view('headers/normal_header', $data);
        $this->load->view('pages/inventorytindakanigd', $data);
        $this->load->view('footers/normal_footer');
    }

    public function jadwaldokterigd()
    {
        $data['title'] = 'MANPRO-RS | IGD';
        $data['page'] = 'jadwaligd';
        $data['jadwaldokter'] = $this->M_igd->tampil_datajadwaldokter();
        $this->load->view('headers/normal_header', $data);
        $this->load->view('pages/jadwaldokterigd', $data);
        $this->load->view('footers/normal_footer');
    }



    public function tambah_jadwaldokterigd()
    {
        $hari       = $this->input->post('hari');
        $waktu        = $this->input->post('waktu');
        $nama  = $this->input->post('nama');


        $data = array(
            'hari'      => $hari,
            'waktu'       => $waktu,
            'nama' => $nama,

        );

        $this->M_igd->input_jadwaldokter($data, 'igd_jadwaldokter');
        redirect('igd/jadwaldokterigd');
    }

    public function hapusjadwaldokterigd($id_jadwaldokter)
    {
        $where = array('id_jadwaldokter' => $id_jadwaldokter);
        $this->M_igd->hapus_data($where, 'igd_jadwaldokter');
        redirect('igd/jadwaldokterigd');
    }

    public function jadwalperawatigd()
    {
        $data['title'] = 'MANPRO-RS | IGD';
        $data['page'] = 'jadwaligd';
        $data['jadwalperawat'] = $this->M_igd->tampil_datajadwalperawat();
        $this->load->view('headers/normal_header', $data);
        $this->load->view('pages/jadwalperawatigd', $data);
        $this->load->view('footers/normal_footer');
    }




    public function hapusjadwalperawatigd($id_jadwalperawat)
    {
        $where = array('id_jadwalperawat' => $id_jadwalperawat);
        $this->M_igd->hapus_data($where, 'igd_jadwalperawat');
        redirect('igd/jadwalperawatigd');
    }

    public function jadwaligd()
    {
        $data['title'] = 'MANPRO-RS | IGD';
        $data['page'] = 'jadwaligd';
        $this->load->view('headers/normal_header', $data);
        $this->load->view('pages/jadwaligd');
        $this->load->view('footers/normal_footer');
    }

    public function bedigddetail($id)
    {
        $data['title'] = 'MANPRO-RS | IGD';
        $data['page'] = 'bedigd';

        $where = array('id' => $id);

        $data['detail'] = $this->M_igd->beddetail($id);
        $data['detail2'] = $this->M_igd->beddetailtransaksi($id);
        //var_dump($data2);die();

        $this->load->view('headers/normal_header', $data);
        $this->load->view('pages/bedigddetail', $data);
        $this->load->view('footers/normal_footer');
    }





    public function rekammedisdetail($id_rekam_medis)
    {
        $data['title'] = 'MANPRO-RS | IGD';
        $data['page'] = 'bedigd';

        $where = array('id_rekam_medis' => $id_rekam_medis);

        $data['detail'] = $this->M_igd->rm2($id_rekam_medis);
        $data['detailtransaksi'] = $this->M_igd->rm($id_rekam_medis);
        $data['pasien'] = $this->M_igd->rm3($id_rekam_medis);
        $data['transaksi'] = $this->M_igd->rm4($id_rekam_medis);
        // var_dump($data); die;
        $data['total'] = $this->M_igd->total($id_rekam_medis);
        $data['obat'] = $this->M_igd->tampil_dataobat();
        $data['tindakan'] = $this->M_igd->tampil_datatindakan();
        // $data['detail2'] = $this->M_igd->beddetailtransaksi($id);
        // var_dump($data);die();

        $this->load->view('headers/normal_header', $data);
        $this->load->view('pages/rekammedisdetail', $data);
        $this->load->view('footers/normal_footer');
    }




    public function bedigd()
    {
        $data['title'] = 'MANPRO-RS | IGD';
        $data['page'] = 'bedigd';
        // $data['bedigd'] =$this->M_igd->tampil_data()->result(); 
        $data['count'] = $this->M_igd->countbed();
        $data['count2'] = $this->M_igd->countbed2();
        $data['join2'] = $this->M_igd->duatable();
        $this->load->view('headers/normal_header', $data);
        $this->load->view('pages/bedigd', $data);
        $this->load->view('footers/normal_footer');
    }

    public function kosongkan_bed($id)
    {
        $where = array('id' => $id);
        $data = array(
            'kondisi' => "Kosong",
            'id_pasien' => NULL

        );
        $where = array(
            'id' => $id
        );
        $this->M_igd->kosongkan($where, $data, 'igd_bed');
        redirect('igd/bedigd');
    }

    public function daftarigd()

    {
        $id_pasien                   = $this->M_igd->idpasienbaru() + 1;
        $nama                        = $this->input->post('nama');
        $jenis_kelamin               = $this->input->post('jenis_kelamin');
        $tanggal_lahir               = $this->input->post('tanggal_lahir');
        $alamat                       = $this->input->post('alamat');
        $no_telp                       = $this->input->post('no_telp');
        $no_mr                      = $this->input->post('no_mr');
        $id                      = $this->input->post('id');


        $id_rekam_medis = $this->input->post('id_rekam_medis');
        $diagnosa = $this->input->post('diagnosa');
        $darurat = $this->input->post('darurat');

        $data = array(
            'id_pasien'      => $id_pasien,
            'no_mr'   => $no_mr,
            'nama'       => $nama,
            'jenis_kelamin' => $jenis_kelamin,
            'tanggal_lahir'   => $tanggal_lahir,
            'alamat'   => $alamat,
            'no_telp'   => $no_telp,
            'no_mr'   => $no_mr,
        );

        $data3 = array(
            'id_pasien'      => $id_pasien,
            'id_rekam_medis'      => $id_rekam_medis,
            'diagnosa'   => $diagnosa,
            'darurat'       => $darurat,

        );


        $where = array('id' => $id);
        $data2 = array(
            'kondisi' => "Terisi",
            'id_pasien'      => $id_pasien,
        );
        $where = array(
            'id' => $id
        );


        $this->M_igd->input_daftarigd($data, 'igd_pasien');
        $this->M_igd->input_daftarigd2($where, $data2, 'igd_bed');


        $this->M_igd->input_daftarigd3($data3, 'igd_rekam_medis');

        redirect('igd/bedigd');
    }

    public function print($id_rekam_medis)
    {
        $where = array('id_rekam_medis' => $id_rekam_medis);

        $data['detail'] = $this->M_igd->rm2($id_rekam_medis);
        $data['detailtransaksi'] = $this->M_igd->rm($id_rekam_medis);
        $data['pasien'] = $this->M_igd->rm3($id_rekam_medis);
        $data['transaksi'] = $this->M_igd->rm4($id_rekam_medis);
        $data['total'] = $this->M_igd->total($id_rekam_medis);
        $data['obat'] = $this->M_igd->tampil_dataobat();
        $data['tindakan'] = $this->M_igd->tampil_datatindakan();

        $this->load->view('print', $data);
    }

    public function print2($id_rekam_medis)
    {
        $where = array('id_rekam_medis' => $id_rekam_medis);

        $data['detail'] = $this->M_igd->rm2($id_rekam_medis);
        $data['detailtransaksi'] = $this->M_igd->rm($id_rekam_medis);
        $data['pasien'] = $this->M_igd->rm3($id_rekam_medis);
        $data['transaksi'] = $this->M_igd->rm4($id_rekam_medis);
        $data['total'] = $this->M_igd->total($id_rekam_medis);
        $data['obat'] = $this->M_igd->tampil_dataobat();
        $data['tindakan'] = $this->M_igd->tampil_datatindakan();

        $this->load->view('print2', $data);
    }
}
