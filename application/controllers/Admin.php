<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
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

        $this->load->model('UserModel');
        $this->load->model('RoleModel');
        $this->load->model('SpecializationModel');
        $this->load->model('PoliklinikModel');
        $this->load->model('JadwalDokterModel');
        $this->load->model('DokterModel');
        $this->load->model('PasienModel');
        $this->load->model('BedModel');
        $this->load->model('PenyakitModel');
        $this->load->model('RoleModel');
        $this->load->model('ObatModel');
        $this->load->model('PerawatModel');
        $this->load->model('TindakanModel');
        $this->load->model('RuanganModel');
        $this->load->model('TipePasienModel');
        $this->load->model('TransaksiModel');
        $this->load->model('Wilayah_2020Model');
    }
    public function index()
    {
        $data['title'] = 'MANPRO-RS | Dashboard';
        $data['page'] = 'dashboard';
        $this->load->view('headers/normal_header', $data);
        $this->load->view('pages/index');
        $this->load->view('footers/normal_footer');
    }

    public function user()
    {
        $data['title'] = 'MANPRO-RS | List User';
        $data['page'] = 'admin-user';
        $data['users'] = $this->UserModel->with_roles()->get_all();
        $data['roles'] = $this->RoleModel->get_all();
        $this->load->view('headers/normal_header', $data);
        $this->load->view('pages/user', $data);
        $this->load->view('footers/normal_footer');
    }

    public function specialization()
    {
        $data['title'] = 'MANPRO-RS | List Specialization';
        $data['page'] = 'admin-specialization';
        $data['specializations'] = $this->SpecializationModel->get_all();
        $this->load->view('headers/normal_header', $data);
        $this->load->view('pages/specialization', $data);
        $this->load->view('footers/normal_footer');
    }

    public function poliklinik()
    {
        $data['title'] = 'MANPRO-RS | List Poliklinik';
        $data['page'] = 'admin-poliklinik';
        $data['polikliniks'] = $this->PoliklinikModel->get_all();
        $this->load->view('headers/normal_header', $data);
        $this->load->view('pages/poliklinik', $data);
        $this->load->view('footers/normal_footer');
    }

    public function jadwal_poliklinik()
    {
        $data['title'] = 'MANPRO-RS | Jadwal Poliklinik';
        $data['page'] = 'admin-poliklinik-jadwal';
        $data['jadwalPolikliniks'] = $this->JadwalDokterModel->with_poliklinik()->with_dokter()->get_all();
        $data['polikliniks'] = $this->PoliklinikModel->get_all();
        $data['dokters'] = $this->DokterModel->get_all();
        $this->load->view('headers/normal_header', $data);
        $this->load->view('pages/jadwal_poliklinik', $data);
        $this->load->view('footers/normal_footer');
    }

    public function dokter()
    {
        $data['title'] = 'MANPRO-RS | List Dokter';
        $data['page'] = 'admin-dokter';
        $data['dokters'] = $this->DokterModel->with_specialization()->with_poliklinik()->get_all();
        $data['specializations'] = $this->SpecializationModel->get_all();
        $this->load->view('headers/normal_header', $data);
        $this->load->view('pages/dokter', $data);
        $this->load->view('footers/normal_footer');
    }

    public function perawat()
    {
        $data['title'] = 'MANPRO-RS | List Dokter';
        $data['page'] = 'admin-perawat';
        $data['perawats'] = $this->PerawatModel->get_all();
        $this->load->view('headers/normal_header', $data);
        $this->load->view('pages/perawat', $data);
        $this->load->view('footers/normal_footer');
    }

    public function pasien()
    {
        $data['title'] = 'MANPRO-RS | List Pasien';
        $data['page'] = 'admin-pasien';
        $data['pasiens'] = $this->PasienModel->get_all();
        $data['categories'] = $this->TipePasienModel->get_all();
        $this->load->view('headers/normal_header', $data);
        $this->load->view('pages/pasien', $data);
        $this->load->view('footers/normal_footer');
    }

    public function penyakit()
    {
        $data['title'] = 'MANPRO-RS | List Penyakit';
        $data['page'] = 'admin-penyakit';
        $data['penyakits'] = $this->PenyakitModel->get_all();
        $this->load->view('headers/normal_header', $data);
        $this->load->view('pages/penyakit', $data);
        $this->load->view('footers/normal_footer');
    }

    public function role()
    {
        $data['title'] = 'MANPRO-RS | List Role';
        $data['page'] = 'admin-role';
        $data['roles'] = $this->RoleModel->get_all();
        $this->load->view('headers/normal_header', $data);
        $this->load->view('pages/role', $data);
        $this->load->view('footers/normal_footer');
    }

    public function obat()
    {
        $data['title'] = 'MANPRO-RS | List Obat';
        $data['page'] = 'admin-obat';
        $data['obats'] = $this->ObatModel->get_all();
        $this->load->view('headers/normal_header', $data);
        $this->load->view('pages/obat', $data);
        $this->load->view('footers/normal_footer');
    }

    public function bed()
    {
        $data['title'] = 'MANPRO-RS | List Obat';
        $data['page'] = 'admin-bed';
        $data['beds'] = $this->BedModel->get_all();
        $this->load->view('headers/normal_header', $data);
        $this->load->view('pages/bed', $data);
        $this->load->view('footers/normal_footer');
    }

    public function tindakan()
    {
        $data['title'] = 'MANPRO-RS | List Tindakan';
        $data['page'] = 'admin-tindakan';
        $data['tindakans'] = $this->TindakanModel->get_all();
        $this->load->view('headers/normal_header', $data);
        $this->load->view('pages/tindakan', $data);
        $this->load->view('footers/normal_footer');
    }

    public function ruangan()
    {
        $data['title'] = 'MANPRO-RS | List ruangan';
        $data['page'] = 'admin-ruangan';
        $data['ruangans'] = $this->RuanganModel->get_all();
        $this->load->view('headers/normal_header', $data);
        $this->load->view('pages/ruangan', $data);
        $this->load->view('footers/normal_footer');
    }

    public function transaksi()
    {
        $data['title'] = 'MANPRO-RS | List Transaksi';
        $data['page'] = 'admin-transaksi';
        $data['transaksis'] = $this->TransaksiModel->with_pasien()->get_all();
        $this->load->view('headers/normal_header', $data);
        $this->load->view('pages/transaksi', $data);
        $this->load->view('footers/normal_footer');
    }

    public function guides()
    {
        $data['title'] = 'MANPRO-RS | Guides';
        $data['page'] = 'admin-guides';

        $this->load->view('headers/normal_header', $data);
        $this->load->view('pages/guides', $data);
        $this->load->view('footers/normal_footer');
    }

    public function search_kota()
    {
        $data =  $this->Wilayah_2020Model->kota($this->input->get('search', TRUE));
        $list = array();
        if ($data) {
            foreach ($data as $key => $value) {
                $list[$key]['id'] = $value['kode'];
                $list[$key]['text'] = $value['nama'];
                $list[$key]['kode'] = $value['kode'];
            }
        }
        echo json_encode($list);
    }

    public function search_kecamatan()
    {
        $data =  $this->Wilayah_2020Model->kecamatan($this->input->get('search', TRUE));
        $list = array();
        if ($data) {
            foreach ($data as $key => $value) {
                $list[$key]['id'] = $value['kode'];
                $list[$key]['text'] = $value['nama'];
                $list[$key]['kode'] = $value['kode'];
            }
        }
        echo json_encode($list);
    }

    public function search_kelurahan()
    {
        $data =  $this->Wilayah_2020Model->kelurahan($this->input->get('search', TRUE));
        $list = array();
        if ($data) {
            foreach ($data as $key => $value) {
                $list[$key]['id'] = $value['kode'];
                $list[$key]['text'] = $value['nama'];
                $list[$key]['kode'] = $value['kode'];
            }
        }
        echo json_encode($list);
    }

    public function wilayah()
    {
        echo json_encode($this->Wilayah_2020Model->where('kode', $this->input->get('kode', TRUE))->get());
    }

    public function provinsi()
    {
        echo json_encode($this->Wilayah_2020Model->provinsi());
    }

    public function kota()
    {
        echo json_encode($this->Wilayah_2020Model->kota());
    }

    public function testing()
    {
        $kelurahan = $this->Wilayah_2020Model->kelurahan();
        foreach ($kelurahan as $key => $value) {
            $new_code = str_replace(".", "", $value['kode']);
            $this->Wilayah_2020Model->where('kode', $value['kode'])->update(array('kode' => $new_code));
            echo 'good' . $key;
        }
        echo "Success";
    }

    public function kecamatan()
    {
        echo json_encode($this->Wilayah_2020Model->kecamatan());
    }

    public function kelurahan()
    {
        echo json_encode($this->Wilayah_2020Model->kelurahan());
    }
}
