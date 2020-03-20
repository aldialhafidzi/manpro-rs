<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendaftaran extends CI_Controller
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

    $this->load->library('pdf');
    $this->load->model('PasienModel');
    $this->load->model('TransaksiModel');
    $this->load->model('PasienModel');
    $this->load->model('JadwalDokterModel');
  }

  public function formatBill($firstChar, $number)
  {
    $currentYear = substr(date('Y'), -2);
    $currentMonth = date('m');
    $number = str_pad($number + 1, 4, '0', STR_PAD_LEFT);
    return "$firstChar$currentYear-$currentMonth-$number";
  }

  public function formatMR($number)
  {
    $currentYear = substr(date('Y'), -2);
    $currentMonth = date('m');
    $number = str_pad($number + 1, 4, '0', STR_PAD_LEFT);
    return "MR-$currentYear-$currentMonth-$number";
  }

  public function formatReg($number)
  {
    $currentYear = substr(date('Y'), -2);
    $currentMonth = date('m');
    $number = str_pad($number + 1, 4, '0', STR_PAD_LEFT);
    return "REG-$currentYear-$currentMonth-$number";
  }

  public function nextTransaction()
  {
    $data['tanggal'] = date('d/m/Y');

    $data['nextBill'] = $this->formatBill('J', '00000');
    $data['nextMR'] = $this->formatMR('00000');
    $data['nextReg'] = $this->formatReg('00000');

    $data['lastPasien'] = $this->PasienModel->lastRecord();
    $data['lastPasien'] ? $data['nextMR'] = $this->formatMR($data['lastPasien']->id) : '';

    $data['lastTransaksi'] = $this->TransaksiModel->lastRecord();
    if ($data['lastTransaksi']) {
      $data['nextBill'] = $this->formatBill('J', $data['lastTransaksi']->id);
      $data['nextReg'] = $this->formatReg($data['lastTransaksi']->no_reg);
    }

    return $data;
  }

  public function generateBuktiPendaftaran($data)
  {
    $this->pdf->setPaper('A4', 'potrait');
    $html =
      '<html>

            <head>
              <style>
                p {
                  display: block;
                  margin-block-start: 0.5em;
                  margin-block-end: 0.5em;
                  margin-inline-start: 0px;
                  margin-inline-end: 0px;
                }
            
              </style>
            </head>
            
            <body>
              <div style="border: 2px dashed rgb(0, 0, 0); padding: 1rem;">
                <h1 style="text-align:center;">BUKTI PENDAFTARAN</h1>
                <h3 style="text-align:center;">MANPRO-RS</h3>
                <p style="text-align:center;font-weight: 500;">Jl. Gunung Puntang No.3 Kabupaten Bandung Kecamatan Banjaran 40377
                </p>
                <hr style="border: 2px solid;margin-bottom:2rem;">
                <div style="border: 1px dashed rgb(138, 138, 138); padding: 1rem; border-radius: 8px; position: relative;">
            
                  <table>
                    <tr>
                      <td width="250px">
                        <p>No. Bill</p>
                      </td>
                      <td>
                        <p>: ' . $data->no_bill . '</p>
                      </td>
                    </tr>
                    <tr>
                      <td width="250px">
                        <p>No. RM</p>
                      </td>
                      <td>
                        <p>: ' . $data->pasien->no_mr . '</p>
                      </td>
                    </tr>
                    <tr>
                      <td width="250px">
                        <p>Nama Pasien</p>
                      </td>
                      <td>
                        <p>: ' . $data->pasien->nama . '</p>
                      </td>
                    </tr>
                    <tr>
                      <td width="250px">
                        <p>Poliklinik</p>
                      </td>
                      <td>
                        <p>: ' . $data->jadwal_dokter->poliklinik->nama . '</p>
                      </td>
                    </tr>
                    <tr>
                      <td width="250px">
                        <p>Tanggal Pendaftaran</p>
                      </td>
                      <td>
                        <p>: ' . date('Y/m/d H:m:s') . '</p>
                      </td>
                    </tr>
                  </table>
                </div>
                <div>
                  <p style="border: 2px solid rgb(56, 56, 56); padding: 1rem; text-align: center;">
                    <span style="font-weight: 600; font-size: 25px;">' . $this->formatReg($data->no_reg - 1) . '</span>
                  </p>
                </div>
              </div>
            </body>
            </html>
            ';
    $this->pdf->load_html($html);
    $this->pdf->render();
    $output = $this->pdf->output();
    file_put_contents('public/pdf/bukti-pendaftaran/' . date('Ymd HH mm ss') . $data->pasien->no_mr . '.pdf', $output);
    return 'http://localhost/manpro-rs/public/pdf/bukti-pendaftaran/' . date('Ymd HH mm ss') . $data->pasien->no_mr . '.pdf';
  }

  public function index()
  {
    $data['title'] = 'MANPRO-RS | Pendaftaran';
    $data['page'] = 'pendaftaran';
    $this->load->view('headers/normal_header', $data);
    $this->load->view('pages/index');
    $this->load->view('footers/normal_footer');
  }

  public function rawat_jalan()
  {
    $data           = $this->nextTransaction();
    $data['title']  = 'MANPRO-RS | Pendaftaran';
    $data['page']   = 'rawat_jalan';

    $this->load->view('headers/normal_header', $data);
    $this->load->view('pages/rawat_jalan');
    $this->load->view('footers/normal_footer');
  }

  public function rawat_inap()
  {
    $data['title'] = 'MANPRO-RS | Pendaftaran';
    $data['page'] = 'rawat_inap';
    $this->load->view('headers/normal_header', $data);
    $this->load->view('pages/rawat_inap');
    $this->load->view('footers/normal_footer');
  }

  public function rajal()
  {
    // Prepare data pasien
    $data['nextMR']     = $this->formatMR('00000');
    $data['lastPasien'] = $this->PasienModel->lastRecord();
    $data['lastPasien'] ? $data['nextMR'] = $this->formatMR($data['lastPasien']->id) : '';

    // Data ini yang akan dimasukan ke table pasien
    $pasien = array(
      'tipe_id'       => $this->input->post('tipe_pasien', TRUE),
      'no_mr'         => $data['nextMR'],
      'nik'           => $this->input->post('nik', TRUE),
      'nama'          => $this->input->post('nama', TRUE),
      'jenis_kelamin' => $this->input->post('jenis_kelamin', TRUE),
      'no_telp'       => $this->input->post('no_telp', TRUE),
      'kota'          => $this->input->post('kota', TRUE),
      'kecamatan'     => $this->input->post('kecamatan', TRUE),
      'kelurahan'     => $this->input->post('kelurahan', TRUE),
      'rt'            => $this->input->post('rt', TRUE),
      'rw'            => $this->input->post('rw', TRUE),
      'tanggal_lahir' => $this->input->post('tanggal_lahir', TRUE),
      'nik_pj'        => $this->input->post('nik_pj', TRUE),
      'no_telp_pj'    => $this->input->post('no_telp_pj', TRUE),
      'nama_pj'       => $this->input->post('nama_pj', TRUE),
      'hubungan_pj'   => $this->input->post('hub', TRUE),
      'kota_pj'       => $this->input->post('kota_pj', TRUE),
      'kecamatan_pj'  => $this->input->post('kecamatan_pj', TRUE),
      'kelurahan_pj'  => $this->input->post('kelurahan_pj', TRUE),
      'rt_pj'         => $this->input->post('rt_pj', TRUE),
      'rw_pj'         => $this->input->post('rw_pj', TRUE),
      'created_at'    => date("Y-m-d"),
      'updated_at'    => date("Y-m-d"),
    );

    // Script ini untuk menyimpan sekaligus mengecek status penyimpanan data pasien
    if ($this->PasienModel->post($pasien)) {
      // Prepare data transaksi setelah berhasil menyimpan data pasien
      $data['lastPasien']     = $this->PasienModel->lastRecord();
      $data['jadwal']         = $this->JadwalDokterModel->get($this->input->post('poliklinik', TRUE));
      $data['nextBill']       = $this->formatBill('J', '00000');
      $data['nextReg']        = 1;
      $data['lastTransaksi']  = $this->TransaksiModel->lastRecord();

      if ($data['lastTransaksi']) {
        $data['nextBill']   = $this->formatBill('J', $data['lastTransaksi']->id);

        $current_time       = strtotime($data['lastTransaksi']->created_at);
        $current_date       = date("Y-m-d", $current_time);

        // Reset nomor register setiap ganti tanggal
        if ($current_date === date("Y-m-d")) {
          $data['nextReg']    = $data['lastTransaksi']->no_reg + 1;
        }
      }

      // Data ini akan dimasukan ke table transaksi
      $data_transaksi = array(
        'pasien_id'       => $data['lastPasien']->id,
        'user_id'       => $this->session->userdata('id'),
        'jadwal_id'     => $data['jadwal']->id,
        'no_bill'       => $data['nextBill'],
        'no_reg'        => $data['nextReg'],
        'total_tarif'   => $this->input->post('tarif_awal', TRUE),
        'jenis_rawat'   => 'RAWAT-JALAN',
        'status'        => 'REGISTERED',
        'created_at'    => date("Y-m-d"),
        'updated_at'    => date("Y-m-d"),
      );
      // Script ini untuk menyimpan sekaligus mengecek status penyimpanan data transaksi
      $transaksi_id = $this->TransaksiModel->post($data_transaksi);
      if ($transaksi_id) {
        // Generate PDF untuk membuat bukti transaksi
        // $data['lastTransaksi'] = $this->TransaksiModel->lastRecord();
        $data                  = $this->TransaksiModel->with_pasien()->with_jadwal_dokter(array('with' => array('poliklinik')))->with_user()->get($transaksi_id);
        $download_url          = $this->generateBuktiPendaftaran($data);

        // Script ini untuk memberikan response success ke client yang melakukan request
        $data                  = $this->nextTransaction();
        return $this->output
          ->set_content_type('application/json')
          ->set_status_header(200)
          ->set_output(json_encode(array(
            'status'            => '200',
            'message'           => 'success',
            'download_url'      => $download_url,
            'next_transaction'  => $data
          )));
      }
    }

    // Script ini untuk memberikan response error ke client yang melakukan request
    return $this->output
      ->set_content_type('application/json')
      ->set_status_header(500)
      ->set_output(json_encode(array(
        'status' => '500',
      )));
  }
}
