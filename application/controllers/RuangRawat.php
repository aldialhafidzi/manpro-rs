<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RuangRawat extends CI_Controller
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
        $this->load->model('RuanganModel', 'ruangan');
        $this->load->model('PasienModel');
        $this->load->model('DokterModel');
        $this->load->model('UserModel');
    }

    public function ruangan()
    {
        $data['title'] = 'MANPRO-RS | List Ruang Rawat';
        $data['page'] = 'ruangan';

        $this->load->view('headers/normal_header', $data);
        $this->load->view('pages/ruangan', $data);
        $this->load->view('footers/normal_footer');
    }

    public function ruang_rawat()
    {
        $data['title'] = 'MANPRO-RS | Ruang Rawat';
        $data['page'] = 'ruang_rawat';
        $data['detail_ruangan'] = $this->ruangan->get_detail_ruangan();
        $this->load->view('headers/normal_header', $data);
        $this->load->view('pages/ruang_rawat', $data);
        $this->load->view('footers/normal_footer');

    }

    public function lantai1()
    {
        $data['title'] = 'MANPRO-RS | Ruang Rawat';
        $data['page'] = 'lantai1';
        $data['det_ruangan'] = $this->ruangan->get_ruangan_exe();
        $data['detail_ruangan'] = $this->ruangan->get_detail_ruangan();
        $this->load->view('headers/normal_header', $data);
        $this->load->view('pages/class_rr/l1', $data);
        $this->load->view('footers/normal_footer');
    }

    public function lantai2()
    {
        $data['title'] = 'MANPRO-RS | Ruang Rawat';
        $data['page'] = 'lantai2';
        $data['det_ruangan'] = $this->ruangan->get_ruangan_eko();
        $data['detail_ruangan'] = $this->ruangan->get_detail_ruangan();
        $this->load->view('headers/normal_header', $data);
        $this->load->view('pages/class_rr/l2', $data);
        $this->load->view('footers/normal_footer');
    }

    public function lantai3()
    {
        $data['title'] = 'MANPRO-RS | Ruang Rawat';
        $data['page'] = 'lantai3';
        $this->load->view('headers/normal_header', $data);
        $this->load->view('pages/class_rr/l3');
        $this->load->view('footers/normal_footer');
    }

    public function index()
    {
      $this->load->helper('url');
      $this->load->view('pages/ruangan');
    }

    public function ajax_list()
    {
      $list = $this->ruangan->get_datatables();
      $data = array();
      $no = $_POST['start'];
      foreach ($list as $ruangan) {
        $no++;
        $row = array();
        $row[] = $no;
        $row[] = $ruangan->kode;
        $row[] = $ruangan->kelas;
        $row[] = $ruangan->nama;
        $row[] = $ruangan->status;
        $row[] = $ruangan->harga;

        //add html for action
        $row[] = '<a class="btn btn-sm btn-secondary" href="javascript:void(0)" title="lihat" onclick="lihat_ruangan('."'".$ruangan->id."'".')"><i class="fas fa-eye"></i></a>
                  <a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_ruangan('."'".$ruangan->id."'".')"><i class="fas fa-edit"></i></a>
                  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_ruangan('."'".$ruangan->id."'".')"><i class="fas fa-trash"></i></a>';
      
        $data[] = $row;
      }

      $output = array(
              "draw" => $_POST['draw'],
              "recordsTotal" => $this->ruangan->count_all(),
              "recordsFiltered" => $this->ruangan->count_filtered(),
              "data" => $data,
          );
      //output to json format
      echo json_encode($output);
    }

    public function ajax_list_bed()
    {
      $list = $this->ruangan->get_datatables();
      $data = array();
      $no = $_POST['start'];
      foreach ($list as $ruangan) {
        $row = array();
        $row[] = $ruangan->kode;
        $row[] = $ruangan->status;
        
        $data[] = $row;
      }

      $output = array(
              "draw" => $_POST['draw'],
              "recordsTotal" => $this->ruangan->count_all(),
              "recordsFiltered" => $this->ruangan->count_filtered(),
              "data" => $data,
          );
      //output to json format
      echo json_encode($output);
    }

    public function bed_info($status) {
      $data = $this->ruangan->get_by_status($status);
      echo json_encode($status);
    }

    public function ajax_edit($id)
    {
      $data = $this->ruangan->get_by_id($id);
      echo json_encode($data);
    }
    
    public function ajax_lihat($id)
    {
      $data = $this->ruangan->get_by_id($id);
      echo json_encode($data);
    }

    public function ajax_add()
    {
      $data = array(
          'kode' => $this->input->post('kode'),
          'kelas' => $this->input->post('kelas'),
          'nama' => $this->input->post('nama'),
          'status' => $this->input->post('status'),
          'harga' => $this->input->post('harga'),
        );
      $insert = $this->ruangan->save($data);
      echo json_encode(array("status" => TRUE));
    }

    public function add_pasien()
    {
      $data = array(
          'kode' => $this->input->post('kode'),
          'kelas' => $this->input->post('kelas'),
          'nama' => $this->input->post('nama'),
          'status' => $this->input->post('status'),
          'harga' => $this->input->post('harga'),
        );
      $insert = $this->ruangan->save($data);
      echo json_encode(array("status" => TRUE));
    }

    public function ajax_update()
    {
      $data = array(
          'kode' => $this->input->post('kode'),
          'kelas' => $this->input->post('kelas'),
          'nama' => $this->input->post('nama'),
          'status' => $this->input->post('status'),
          'harga' => $this->input->post('harga'),
        );
      $this->ruangan->update_data(array('id' => $this->input->post('id')), $data);
      echo json_encode(array("status" => TRUE));
    }

    public function ajax_delete($id)
    {
      $this->ruangan->delete_by_id($id);
      echo json_encode(array("statuss" => TRUE));
    }

}
