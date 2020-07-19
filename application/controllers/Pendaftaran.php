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
    $this->load->model('DetailTransaksiModel');
    $this->load->model('PasienModel');
    $this->load->model('JadwalDokterModel');
    $this->load->model('RuanganModel');
    $this->load->model('KamarModel');
    $this->load->model('TipePasienModel');
    $this->load->model('PenyakitModel');
    $this->load->model('BedModel');
    $this->load->model('RekamMedisModel');
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

  public function nextTransactionRajal()
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

  public function nextTransactionRanap()
  {
    $data['tanggal'] = date('d/m/Y');

    $data['nextBill'] = $this->formatBill('I', '00000');
    $data['nextMR'] = $this->formatMR('00000');
    $data['nextReg'] = $this->formatReg('00000');

    $data['lastPasien'] = $this->PasienModel->lastRecord();
    $data['lastPasien'] ? $data['nextMR'] = $this->formatMR($data['lastPasien']->id) : '';

    $data['lastTransaksi'] = $this->TransaksiModel->lastRecord();
    if ($data['lastTransaksi']) {
      $data['nextBill'] = $this->formatBill('I', $data['lastTransaksi']->id);
      $data['nextReg'] = $this->formatReg($data['lastTransaksi']->no_reg);
    }

    return $data;
  }

  public function generateBuktiPendaftaranRajal($data)
  {
    $this->pdf->setPaper('A4', 'potrait');

    $diagnosa_awal = '';
    foreach ($data['tr_with_penyakit']->detail_transaksi as $key => $value) {
      $diagnosa_awal = $diagnosa_awal . '
      <tr style="border:1px solid #d6d6d6;">
      <td width="30%" style="padding:1rem;border-bottom: 1px solid #d6d6d6;">' . $value->penyakit->kode . '</td>
      <td width="70%" style="padding:1rem;border-bottom: 1px solid #d6d6d6;">' . $value->penyakit->nama . '</td>
      </tr>
      ';
    }

    $nama_poli = '';
    foreach ($data['tr_with_jadwal_dokter']->detail_transaksi as $key => $value) {
      if ($nama_poli === '') {
        $nama_poli = $value->poliklinik->nama;
      }
    }

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
                <h1 style="text-align:center;">BUKTI PENDAFTARAN RAWAT JALAN</h1>
                <h3 style="text-align:center;">MANPRO-RS</h3>
                <p style="text-align:center;font-weight: 500;">Jl. Gunung Puntang No.3 Kabupaten Bandung Kecamatan Banjaran 40377
                </p>
                <hr style="border: 2px solid;margin-bottom:2rem;">
                <div style="border: 1px dashed rgb(138, 138, 138); padding: 1rem; border-radius: 8px; position: relative;margin-bottom:1rem;">
            
                  <table>
                    <tr>
                      <td width="250px">
                        <p>No. Bill</p>
                      </td>
                      <td>
                        <p>: ' . $data['tr']->no_bill . '</p>
                      </td>
                    </tr>
                    <tr>
                      <td width="250px">
                        <p>No. MR</p>
                      </td>
                      <td>
                        <p>: ' . $data['tr']->pasien->no_mr . '</p>
                      </td>
                    </tr>
                    <tr>
                      <td width="250px">
                        <p>Nama Pasien</p>
                      </td>
                      <td>
                        <p>: ' . $data['tr']->pasien->nama . ' - [ ' . $data['tr']->pasien->tipe_pasien->nama . ' ]</p>
                      </td>
                    </tr>
                    <tr>
                      <td width="250px">
                        <p>Poliklinik</p>
                      </td>
                      <td>
                        <p>: ' . $nama_poli . '</p>
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

                <p>Diagnosa Awal</p>

                <div style="border: 1px dashed rgb(138, 138, 138); padding: 1rem; border-radius: 8px; position: relative;margin-bottom:1rem;">
                  <table style="width:100%;">
                    <tr style="padding:1rem;background-color:#d6d6d6;border:1px solid #d6d6d6;">
                      <td style="padding:1rem;"> Kode </td>
                      <td style="padding:1rem;"> Diagnosa</td>
                    </tr>
                    ' . $diagnosa_awal . '
                  </table>
                </div>

                <div>
                  <p style="border: 2px solid rgb(56, 56, 56); padding: 1rem; text-align: center;">
                    <span style="font-weight: 600; font-size: 25px;">' . $this->formatReg($data['tr']->no_reg - 1) . '</span>
                  </p>
                </div>
              </div>
            </body>
            </html>
            ';
    $this->pdf->load_html($html);
    $this->pdf->render();
    $output = $this->pdf->output();
    file_put_contents('public/pdf/bukti-pendaftaran/' . date('Y-m-d H-m-ss') . $data['tr']->pasien->no_mr . '.pdf', $output);
    return  base_url() . '/public/pdf/bukti-pendaftaran/' . date('Y-m-d H-m-ss') . $data['tr']->pasien->no_mr . '.pdf';
  }

  public function generateBuktiPendaftaranRanap($data)
  {
    $this->pdf->setPaper('A4', 'potrait');

    $diagnosa_awal = '';
    foreach ($data['tr_with_detail_tr_penyakit']->detail_transaksi as $key => $value) {
      $diagnosa_awal = $diagnosa_awal . '
        <tr style="border:1px solid #d6d6d6;">
          <td width="30%" style="padding:1rem;border-bottom: 1px solid #d6d6d6;">' . $value->penyakit->kode . '</td>
          <td width="70%" style="padding:1rem;border-bottom: 1px solid #d6d6d6;">' . $value->penyakit->nama . '</td>
        </tr>
      ';
    }

    $book_kamar = '';
    foreach ($data['tr_with_detail_tr_bed']->detail_transaksi as $key => $value) {
      $book_kamar = $book_kamar . '
        <tr style="border:1px solid #d6d6d6;">
          <td width="40%" style="padding:1rem;border-bottom: 1px solid #d6d6d6;">' . $value->bed->ruangan->nama . '</td>
          <td width="20%" style="padding:1rem;border-bottom: 1px solid #d6d6d6;">' . $value->bed->ruangan->kelas . '</td>
          <td width="20%" style="padding:1rem;border-bottom: 1px solid #d6d6d6;">' . $value->bed->kamar->kode . '</td>
          <td width="20%" style="padding:1rem;border-bottom: 1px solid #d6d6d6;">' . $value->bed->kode . '</td>
        </tr>
      ';
    }

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
                <h1 style="text-align:center;">BUKTI PENDAFTARAN RAWAT INAP</h1>
                <h3 style="text-align:center;">MANPRO-RS</h3>
                <p style="text-align:center;font-weight: 500;">Jl. Gunung Puntang No.3 Kabupaten Bandung Kecamatan Banjaran 40377
                </p>
                <hr style="border: 2px solid;margin-bottom:2rem;">
                <div style="border: 1px dashed rgb(138, 138, 138); padding: 1rem; border-radius: 8px; position: relative; margin-bottom:1rem;">
                  <table>
                    <tr>
                      <td width="250px">
                        <p>No. Bill</p>
                      </td>
                      <td>
                        <p>: ' . $data['tr_with_pasien']->no_bill . '</p>
                      </td>
                    </tr>
                    <tr>
                      <td width="250px">
                        <p>No. MR</p>
                      </td>
                      <td>
                        <p>: ' . $data['tr_with_pasien']->pasien->no_mr . '</p>
                      </td>
                    </tr>
                    <tr>
                      <td width="250px">
                        <p>Nama Pasien</p>
                      </td>
                      <td>
                        <p>: ' . $data['tr_with_pasien']->pasien->nama . ' - [ ' . $data['tr_with_pasien']->pasien->tipe_pasien->nama . ' ]</p>
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

                <p>Diagnosa Awal</p>

                <div style="border: 1px dashed rgb(138, 138, 138); padding: 1rem; border-radius: 8px; position: relative;margin-bottom:1rem;">
                  <table style="width:100%;">
                    <tr style="padding:1rem;background-color:#d6d6d6;border:1px solid #d6d6d6;">
                      <td style="padding:1rem;"> Kode </td>
                      <td style="padding:1rem;"> Diagnosa</td>
                    </tr>
                    ' . $diagnosa_awal . '
                  </table>
                </div>

                <p>Detail Kamar</p>

                <div style="border: 1px dashed rgb(138, 138, 138); padding: 1rem; border-radius: 8px; position: relative;margin-bottom:1rem;">
                  <table style="width:100%;">
                    <tr style="padding:1rem;background-color:#d6d6d6;border:1px solid #d6d6d6;">
                      <td style="padding:1rem;"> Ruangan </td>
                      <td style="padding:1rem;"> Kelas </td>
                      <td style="padding:1rem;"> Kamar </td>
                      <td style="padding:1rem;"> Bed</td>
                    </tr>
                    ' . $book_kamar . '
                  </table>
                </div>
                
                <div>
                  <p style="border: 2px solid rgb(56, 56, 56); padding: 1rem; text-align: center;">
                    <span style="font-weight: 600; font-size: 25px;">' . $this->formatReg($data['tr_with_pasien']->no_reg - 1) . '</span>
                  </p>
                </div>
              </div>
            </body>
            </html>
            ';
    $this->pdf->load_html($html);
    $this->pdf->render();
    $output = $this->pdf->output();
    file_put_contents('public/pdf/bukti-pendaftaran/' . date('Y-m-d H-m-ss') . $data['tr_with_pasien']->pasien->no_mr . '.pdf', $output);
    return base_url() . '/public/pdf/bukti-pendaftaran/' . date('Y-m-d H-m-ss') . $data['tr_with_pasien']->pasien->no_mr . '.pdf';
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
    $data                 = $this->nextTransactionRajal();
    $data['tipe_pasien']  = $this->TipePasienModel->get_all();
    $data['title']        = 'MANPRO-RS | Pendaftaran';
    $data['page']         = 'rawat_jalan';

    $this->load->view('headers/normal_header', $data);
    $this->load->view('pages/rawat_jalan');
    $this->load->view('footers/normal_footer');
  }

  public function rawat_inap()
  {
    $data                 = $this->nextTransactionRanap();
    $data['tipe_pasien']  = $this->TipePasienModel->get_all();
    $data['title']        = 'MANPRO-RS | Pendaftaran';
    $data['page']         = 'rawat_inap';

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
    $data['dob']        = strtotime($this->input->post('tanggal_lahir', TRUE));

    // Data ini yang akan dimasukan ke table pasien
    $pasien = array(
      'tipe_id'       => $this->input->post('tipe_pasien', TRUE),
      'no_asuransi'   => $this->input->post('no_asuransi', TRUE),
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
      'tanggal_lahir' => date("Y-m-d", $data['dob']),
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

    $insert_or_update = NULL;

    if ($this->input->post('pasien_id', TRUE) === '') {
      // Jika pasien baru
      $insert_or_update = $this->PasienModel->insert($pasien);
    } else {
      // Jika pasien lama
      $pasien['no_mr']  = $this->input->post('no_mr', TRUE);
      $insert_or_update = $this->PasienModel->update($pasien, $this->input->post('pasien_id', TRUE));
    }

    // Script ini untuk menyimpan sekaligus mengecek status penyimpanan data pasien
    if ($insert_or_update) {
      // Prepare data transaksi setelah berhasil menyimpan data pasien
      $data['lastPasien']     = $this->input->post('pasien_id', TRUE) === '' ? $this->PasienModel->lastRecord() : $this->PasienModel->get($this->input->post('pasien_id', TRUE));
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

        // Jika pasien memiliki diagnosa awal maka masukan ke table rekam medis
        $data['jadwal']       = $this->JadwalDokterModel->get($this->input->post('poliklinik_id', TRUE));
        $data['penyakit']     = $this->PenyakitModel->where('id', $this->input->post('diagnosa_id', TRUE))->get();
        if ($data['penyakit']) {
          $this->RekamMedisModel->insert(array(
            'penyakit_id' => $data['penyakit']->id,
            'pasien_id'   => $data['lastPasien']->id,
            'dokter_id'   => $data['jadwal']->dokter_id,
            'jenis_rawat' => 'RAWAT-JALAN',
            'created_at'  => date("Y-m-d"),
            'updated_at'  => date("Y-m-d"),
          ));
        }

        $data_detail_transaksi = array(
          'transaksi_id'      => $transaksi_id,
          'jadwal_dokter_id'  => $data['jadwal']->id,
          'penyakit_id'       => $data['penyakit'] ? $data['penyakit']->id : NULL,
          'tindakan_id'       => NULL,
          'obat_id'           => NULL,
          'ruangan_id'        => NULL,
          'kamar_id'          => NULL,
          'bed_id'            => NULL,
          'tanggal_masuk'     => NULL,
          'tanggal_keluar'    => NULL,
          'tarif_pendaftaran' => $this->input->post('tarif_awal', TRUE),
          'tarif_dokter'      => $data['jadwal']->tarif,
          'tarif_kamar'       => NULL,
          'tarif_tindakan'    => NULL,
          'created_at'        => date("Y-m-d"),
          'updated_at'        => date("Y-m-d")
        );

        if ($this->DetailTransaksiModel->insert($data_detail_transaksi)) {

          // Update total tarif transaksi
          $this->TransaksiModel->update(array('total_tarif' => $this->input->post('tarif_awal', TRUE) + $data['jadwal']->tarif), $transaksi_id);

          // Generate PDF untuk membuat bukti transaksi
          $transaksi['tr']                      = $this->TransaksiModel->with_pasien(array('with' => array('tipe_pasien')))->with_user()->get($transaksi_id);
          $transaksi['tr_with_jadwal_dokter']   = $this->TransaksiModel->with_detail_transaksi(array('with' => array('jadwal_dokter')))->get($transaksi_id);

          foreach ($transaksi['tr_with_jadwal_dokter']->detail_transaksi as $key => $value) {
            $jadwal_dokter = $this->JadwalDokterModel->with_poliklinik()->get($value->jadwal_dokter_id);
            $value->poliklinik = $jadwal_dokter->poliklinik;
          }

          $transaksi['tr_with_penyakit']        = $this->TransaksiModel->with_detail_transaksi(array('with' => array('penyakit')))->get($transaksi_id);
          $transaksi['tr_with_tindakan']        = $this->TransaksiModel->with_detail_transaksi(array('with' => array('tindakan')))->get($transaksi_id);
          $transaksi['tr_with_obat']            = $this->TransaksiModel->with_detail_transaksi(array('with' => array('obat')))->get($transaksi_id);

          $download_url             = $this->generateBuktiPendaftaranRajal($transaksi);

          // Script ini untuk memberikan response success ke client yang melakukan request
          $data                     = $this->nextTransactionRajal();
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
    }

    // Script ini untuk memberikan response error ke client yang melakukan request
    return $this->output
      ->set_content_type('application/json')
      ->set_status_header(500)
      ->set_output(json_encode(array(
        'status' => '500',
      )));
  }

  public function ranap()
  {
    // Check apakah pasien_id sudah terdaftar
    $data['pasien'] = $this->PasienModel->where('id', $this->input->post('pasien_id', TRUE))->get();
    if (!$data['pasien']) {
      return $this->output
        ->set_content_type('application/json')
        ->set_status_header(500)
        ->set_output(json_encode(array(
          'status' => '500',
          'message' => 'Pasien belum terdaftar'
        )));
    }

    $data['bed'] = $this->BedModel->with_kamar(array('with' => array('ruangan')))->where('id', $this->input->post('bed_id', TRUE))->get();
    if (!$data['bed']) {
      return $this->output
        ->set_content_type('application/json')
        ->set_status_header(500)
        ->set_output(json_encode(array(
          'status' => '500',
          'message' => 'Kamar tidak ditemukan'
        )));
    }

    $data['nextBill']       = $this->formatBill('I', '00000');
    $data['nextReg']        = 1;
    $data['lastTransaksi']  = $this->TransaksiModel->lastRecord();

    if ($data['lastTransaksi']) {
      $data['nextBill']   = $this->formatBill('I', $data['lastTransaksi']->id);

      $current_time       = strtotime($data['lastTransaksi']->created_at);
      $current_date       = date("Y-m-d", $current_time);

      // Reset nomor register rawat inap setiap ganti tanggal
      if ($current_date === date("Y-m-d")) {
        $data['nextReg']    = $data['lastTransaksi']->no_reg + 1;
      }
    }

    // Data ini akan dimasukan ke table transaksi
    $data_transaksi = array(
      'pasien_id'     => $data['pasien']->id,
      'user_id'       => $this->session->userdata('id'),
      'no_bill'       => $data['nextBill'],
      'no_reg'        => $data['nextReg'],
      'total_tarif'   => $this->input->post('tarif_awal', TRUE),
      'jenis_rawat'   => 'RAWAT-INAP',
      'status'        => 'REGISTERED',
      'created_at'    => date("Y-m-d"),
      'updated_at'    => date("Y-m-d"),
    );

    // Script ini untuk menyimpan sekaligus mengecek status penyimpanan data transaksi
    $transaksi_id = $this->TransaksiModel->post($data_transaksi);
    if ($transaksi_id) {

      // Jika pasien memiliki diagnosa awal maka masukan ke table rekam medis
      $data['penyakit']     = $this->PenyakitModel->where('id', $this->input->post('diagnosa_id', TRUE))->get();
      if ($data['penyakit']) {
        $this->RekamMedisModel->insert(array(
          'penyakit_id' => $data['penyakit']->id,
          'pasien_id'   => $data['pasien']->id,
          'jenis_rawat' => 'RAWAT-INAP',
          'created_at'  => date("Y-m-d"),
          'updated_at'  => date("Y-m-d"),
        ));
      }

      // Prepare data untuk dimasukan ke dalam detail transaksi
      $data_detail_transaksi = array(
        'transaksi_id'      => $transaksi_id,
        'penyakit_id'       => $data['penyakit'] ? $data['penyakit']->id : NULL,
        'tindakan_id'       => NULL,
        'obat_id'           => NULL,
        'bed_id'            => $data['bed']->id,
        'kamar_id'          => $data['bed']->kamar->id,
        'ruangan_id'        => $data['bed']->kamar->ruangan->id,
        'tarif_kamar'       => $data['bed']->kamar->ruangan->harga,
        'tarif_pendaftaran' => $this->input->post('tarif_awal', TRUE),
        'tarif_dokter'      => NULL,
        'tarif_tindakan'    => NULL,
        'tanggal_masuk'     => date('Y-m-d'),
        'tanggal_keluar'    => NULL,
        'created_at'        => date("Y-m-d"),
        'updated_at'        => date("Y-m-d")
      );

      if ($this->DetailTransaksiModel->insert($data_detail_transaksi)) {
        // Generate PDF untuk membuat bukti transaksi
        $transaksi['tr_with_pasien'] = $this->TransaksiModel->with_pasien(array('with' => array('tipe_pasien')))->get($transaksi_id);
        $transaksi['tr_with_user'] = $this->TransaksiModel->with_user()->get($transaksi_id);
        $transaksi['tr_with_detail_tr_penyakit'] = $this->TransaksiModel->with_detail_transaksi(array('with' => array('penyakit')))->get($transaksi_id);
        $transaksi['tr_with_detail_tr_bed'] = $this->TransaksiModel->with_detail_transaksi(array('with' => array('bed')))->get($transaksi_id);

        foreach ($transaksi['tr_with_detail_tr_bed']->detail_transaksi as $key => $value) {
          $kamar = $this->KamarModel->where('id', $value->bed->kamar_id)->get();
          $ruangan = $this->RuanganModel->where('id', $kamar->ruangan_id)->get();
          $value->bed->kamar = $kamar;
          $value->bed->ruangan = $ruangan;
        }

        $download_url          = $this->generateBuktiPendaftaranRanap($transaksi);

        // Script ini untuk memberikan response success ke client yang melakukan request
        $data                  = $this->nextTransactionRanap();
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

  public function raigd()
  {
    // Check apakah pasien_id sudah terdaftar
    $data['pasien'] = $this->PasienModel->where('id', $this->input->post('pasien_id', TRUE))->get();
    if (!$data['pasien']) {
      return $this->output
        ->set_content_type('application/json')
        ->set_status_header(500)
        ->set_output(json_encode(array(
          'status' => '500',
          'message' => 'Pasien belum terdaftar'
        )));
    }

    $data['bed'] = $this->BedModel->with_kamar(array('with' => array('ruangan')))->where('id', $this->input->post('bed_id', TRUE))->get();
    if (!$data['bed']) {
      return $this->output
        ->set_content_type('application/json')
        ->set_status_header(500)
        ->set_output(json_encode(array(
          'status' => '500',
          'message' => 'Kamar tidak ditemukan'
        )));
    }

    $data['nextBill']       = $this->formatBill('I', '00000');
    $data['nextReg']        = 1;
    $data['lastTransaksi']  = $this->TransaksiModel->lastRecord();

    if ($data['lastTransaksi']) {
      $data['nextBill']   = $this->formatBill('I', $data['lastTransaksi']->id);

      $current_time       = strtotime($data['lastTransaksi']->created_at);
      $current_date       = date("Y-m-d", $current_time);

      // Reset nomor register rawat inap setiap ganti tanggal
      if ($current_date === date("Y-m-d")) {
        $data['nextReg']    = $data['lastTransaksi']->no_reg + 1;
      }
    }

    // Data ini akan dimasukan ke table transaksi
    $data_transaksi = array(
      'pasien_id'     => $data['pasien']->id,
      'user_id'       => $this->session->userdata('id'),
      'no_bill'       => $data['nextBill'],
      'no_reg'        => $data['nextReg'],
      'total_tarif'   => $this->input->post('tarif_awal', TRUE),
      'jenis_rawat'   => 'RAWAT-INAP',
      'status'        => 'REGISTERED',
      'created_at'    => date("Y-m-d"),
      'updated_at'    => date("Y-m-d"),
    );

    // Script ini untuk menyimpan sekaligus mengecek status penyimpanan data transaksi
    $transaksi_id = $this->TransaksiModel->post($data_transaksi);
    if ($transaksi_id) {

      // Jika pasien memiliki diagnosa awal maka masukan ke table rekam medis
      $data['penyakit']     = $this->PenyakitModel->where('id', $this->input->post('diagnosa_id', TRUE))->get();
      if ($data['penyakit']) {
        $this->RekamMedisModel->insert(array(
          'penyakit_id' => $data['penyakit']->id,
          'pasien_id'   => $data['pasien']->id,
          'jenis_rawat' => 'RAWAT-INAP',
          'created_at'  => date("Y-m-d"),
          'updated_at'  => date("Y-m-d"),
        ));
      }

      // Prepare data untuk dimasukan ke dalam detail transaksi
      $data_detail_transaksi = array(
        'transaksi_id'      => $transaksi_id,
        'penyakit_id'       => $data['penyakit'] ? $data['penyakit']->id : NULL,
        'tindakan_id'       => NULL,
        'obat_id'           => NULL,
        'bed_id'            => $data['bed']->id,
        'kamar_id'          => $data['bed']->kamar->id,
        'ruangan_id'        => $data['bed']->kamar->ruangan->id,
        'tarif_kamar'       => $data['bed']->kamar->ruangan->harga,
        'tarif_pendaftaran' => $this->input->post('tarif_awal', TRUE),
        'tarif_dokter'      => NULL,
        'tarif_tindakan'    => NULL,
        'tanggal_masuk'     => date('Y-m-d'),
        'tanggal_keluar'    => NULL,
        'created_at'        => date("Y-m-d"),
        'updated_at'        => date("Y-m-d")
      );

      if ($this->DetailTransaksiModel->insert($data_detail_transaksi)) {
        // Generate PDF untuk membuat bukti transaksi
        $transaksi['tr_with_pasien'] = $this->TransaksiModel->with_pasien(array('with' => array('tipe_pasien')))->get($transaksi_id);
        $transaksi['tr_with_user'] = $this->TransaksiModel->with_user()->get($transaksi_id);
        $transaksi['tr_with_detail_tr_penyakit'] = $this->TransaksiModel->with_detail_transaksi(array('with' => array('penyakit')))->get($transaksi_id);
        $transaksi['tr_with_detail_tr_bed'] = $this->TransaksiModel->with_detail_transaksi(array('with' => array('bed')))->get($transaksi_id);

        foreach ($transaksi['tr_with_detail_tr_bed']->detail_transaksi as $key => $value) {
          $kamar = $this->KamarModel->where('id', $value->bed->kamar_id)->get();
          $ruangan = $this->RuanganModel->where('id', $kamar->ruangan_id)->get();
          $value->bed->kamar = $kamar;
          $value->bed->ruangan = $ruangan;
        }

        $download_url          = $this->generateBuktiPendaftaranRanap($transaksi);

        // Script ini untuk memberikan response success ke client yang melakukan request
        $data                  = $this->nextTransactionRanap();
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
