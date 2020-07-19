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
    $this->load->library('pdf');
    
    $this->load->model('DokterModel');
    $this->load->model('ObatModel');
    $this->load->model('PoliklinikModel');
    $this->load->model('PasienModel');
    $this->load->model('TipePasienModel');
    $this->load->model('UserModel');
    $this->load->model('BedModel');
    $this->load->model('KamarModel');
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

  public function rawat_igd()
  {
    $data['title'] = 'MANPRO-RS | Transaksi Rawat IGD';
    $data['page'] = 'transaksi-igd';

    $this->load->view('headers/normal_header', $data);
    $this->load->view('pages/transaksi_igd');
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
      $sub_array[] = $row->status;
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

  public function getRekamIgd()
  {
    $fetch_data = $this->TransaksiModel->make_datatables('RAWAT-IGD');
    $data = array();
    foreach ($fetch_data as $key => $row) {
      $sub_array = array();
      $sub_array[] = $key + 1;
      $sub_array[] = $row->no_bill;
      $sub_array[] = $row->no_mr;
      $sub_array[] = $row->nama;
      $sub_array[] = $row->no_telp;
      $sub_array[] = $row->total_tarif;
      $sub_array[] = $row->status;
      $sub_array[] = '
            <button class="btn btn-sm btn-info" onclick="showDetailTransaksiByTransaksiID(' . $row->id . ');">
                    <i class="far fa-eye"></i> &nbsp; Lihat
            </button>';
      $data[] = $sub_array;
    }

    $output = array(
      "draw" => intval($_POST["draw"]),
      "recordsTotal" => $this->TransaksiModel->get_all_data('RAWAT-IGD'),
      "recordsFiltered" => $this->TransaksiModel->get_filtered_data('RAWAT-IGD'),
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
      $sub_array[] = $row->status;
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

      if ($item->jadwal_dokter_id) {
        $dokter         = $this->DokterModel->get($item->jadwal_dokter->dokter_id);
        $poliklinik     = $this->PoliklinikModel->get($item->jadwal_dokter->poli_id);
        $item->jadwal_dokter->dokter        = $dokter;
        $item->jadwal_dokter->poliklinik    = $poliklinik;
      }
    }

    echo json_encode($data);
  }

  public function tambah_obat()
  {
    $detail_transaksi = $this->DetailTransaksiModel->where('transaksi_id', $this->input->post('transaksi_id', TRUE))->get();

    if ($detail_transaksi) {
      foreach ($this->input->post('obat_id', TRUE) as $key => $item) {
        $obat = $this->ObatModel->get($item);
        $data = array(
          'transaksi_id'      => $this->input->post('transaksi_id', TRUE),
          'jadwal_dokter_id'  => $detail_transaksi->jadwal_dokter_id,
          'penyakit_id'       => $detail_transaksi->penyakit_id,
          'tarif_pendaftaran' => $detail_transaksi->tarif_pendaftaran,
          'tarif_dokter'      => $detail_transaksi->tarif_dokter,
          'obat_id'           => $item,
          'qty_obat'          => $this->input->post('qty_obat', TRUE)[$key],
          'tarif_obat'        => $obat->harga
        );
        $this->DetailTransaksiModel->insert($data);
      }
      return $this->output
        ->set_content_type('application/json')
        ->set_status_header(200)
        ->set_output(json_encode(array(
          'status'            => '200',
          'message'           => 'success',
        )));
    }

    return $this->output
      ->set_content_type('application/json')
      ->set_status_header(500)
      ->set_output(json_encode(array(
        'status'            => '500',
        'message'           => 'error',
      )));
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

  public function save()
  {
    // If exists transaksi
    $tr = $this->TransaksiModel->get($this->input->post('transaksi_id', TRUE));
    if ($tr) {
      // Update transaksi status
      $this->TransaksiModel->where('id', $this->input->post('transaksi_id', TRUE))->update(array('status' => 'SUCCESS'));

      // if exists detail transaksi
      $detail_transaksi = (array) $this->DetailTransaksiModel->where('transaksi_id', $this->input->post('transaksi_id', TRUE))->get_all();
      if ($detail_transaksi) {
        foreach ($detail_transaksi as $key => $dt) {
          // Update detail transaksi tanggal keluar
          $this->DetailTransaksiModel->update(array('tanggal_keluar' => date("Y-m-d")), $dt->id);
          // if not null bed_id
          if ($dt->bed_id) {
            // update bed status
            $this->BedModel->update(array('status' => 0), $dt->bed_id);
          }

          if ($dt->kamar_id) {
            // update kamar status
            $this->KamarModel->update(array('status' => 0), $dt->kamar_id);
          }
        }

        // Generate PDF untuk membuat bukti transaksi
        $transaksi['tr_with_pasien'] = $this->TransaksiModel->with_pasien(array('with' => array('tipe_pasien')))->get($this->input->post('transaksi_id', TRUE));
        $transaksi['tr_with_user'] = $this->TransaksiModel->with_user()->get($this->input->post('transaksi_id', TRUE));
        $transaksi['tr_with_detail_tr_penyakit'] = $this->TransaksiModel->with_detail_transaksi(array('with' => array('penyakit')))->get($this->input->post('transaksi_id', TRUE));
        $transaksi['tr_with_detail_tr_bed'] = $this->TransaksiModel->with_detail_transaksi(array('with' => array('bed')))->get($this->input->post('transaksi_id', TRUE));
        $transaksi['tr_with_detail_tr_jadwal_dokter'] = $this->TransaksiModel->with_detail_transaksi(array('with' => array('jadwal_dokter')))->get($this->input->post('transaksi_id', TRUE));
        $transaksi['tr_with_detail_tr_obat'] = $this->TransaksiModel->with_detail_transaksi(array('with' => array('obat')))->get($this->input->post('transaksi_id', TRUE));

        foreach ($transaksi['tr_with_detail_tr_bed']->detail_transaksi as $key => $value) {
          if ($value->bed_id) {
            $kamar = $this->KamarModel->where('id', $value->bed->kamar_id)->get();
            $ruangan = $this->RuanganModel->where('id', $kamar->ruangan_id)->get();
            $value->bed->kamar = $kamar;
            $value->bed->ruangan = $ruangan;
          }
        }

        foreach ($transaksi['tr_with_detail_tr_jadwal_dokter']->detail_transaksi as $key => $value) {
          if ($value->jadwal_dokter_id) {
            $dokter = $this->DokterModel->where('id', $value->jadwal_dokter->dokter_id)->get();
            $value->jadwal_dokter->dokter = $dokter;
          }
        }

        $download_url = null;
        if ($transaksi['tr_with_pasien']->jenis_rawat == 'RAWAT-IGD') {
          $download_url = $this->generateTransaksiIgd($transaksi);
          $this->session->set_flashdata('success', 'Transaksi berhasil di cetak');
        }

        if ($transaksi['tr_with_pasien']->jenis_rawat == 'RAWAT-INAP') {
          $download_url = $this->generateTransaksiInap($transaksi);
          $this->session->set_flashdata('success', 'Transaksi berhasil di cetak');
        }

        if ($transaksi['tr_with_pasien']->jenis_rawat == 'RAWAT-JALAN') {
          $download_url = $this->generateTransaksiJalan($transaksi);
          $this->session->set_flashdata('success', 'Transaksi berhasil di cetak');
        }

        if ($download_url) {
          redirect($download_url);
        }
      }

      $this->session->set_flashdata('error', 'Transaksi gagal di cetak');
      return $this->output
        ->set_content_type('application/json')
        ->set_status_header(500)
        ->set_output(json_encode(array(
          'status' => '500',
        )));
    }
  }

  public function generateTransaksiIgd($data)
  {
    $this->pdf->setPaper('A4', 'potrait');

    $diagnosa_awal = '';
    foreach ($data['tr_with_detail_tr_penyakit']->detail_transaksi as $key => $value) {
      if ($value->penyakit_id) {
        $diagnosa_awal = $diagnosa_awal . '
            <tr style="border:1px solid #d6d6d6;">
              <td width="30%" style="padding:1rem;border-bottom: 1px solid #d6d6d6;">' . $value->penyakit->kode . '</td>
              <td width="70%" style="padding:1rem;border-bottom: 1px solid #d6d6d6;">' . $value->penyakit->nama . '</td>
            </tr>
          ';
      }
    }

    $book_kamar = '';
    $no_kamar = 0;
    $total_kamar = 0;
    foreach ($data['tr_with_detail_tr_bed']->detail_transaksi as $key => $value) {
      if ($value->bed_id) {
        $no_kamar += 1;
        $total_kamar += $value->tarif_kamar;
        $book_kamar = $book_kamar . '
            <tr style="border:1px solid #d6d6d6;">
              <td width="10%" style="padding:1rem;border-bottom: 1px solid #d6d6d6;">' . $no_kamar . '</td>
              <td width="30%" style="padding:1rem;border-bottom: 1px solid #d6d6d6;">' . $value->bed->kode . '</td>
              <td width="60%" style="padding:1rem;border-bottom: 1px solid #d6d6d6; text-align:right;"> IDR ' . number_format($value->tarif_kamar) . '</td>
            </tr>
          ';
      }
    }

    $book_dokter = '';
    $no_dokter = 0;
    $total_dokter = 0;
    $temp_dokter = '';

    // echo json_encode($data['tr_with_detail_tr_jadwal_dokter']); die;
    foreach ($data['tr_with_detail_tr_jadwal_dokter']->detail_transaksi as $key => $value) {
      if ($value->jadwal_dokter_id) {
        if ($temp_dokter != $value->jadwal_dokter->dokter->id) {
          $no_dokter += 1;
          $temp_dokter = $value->jadwal_dokter->dokter->id;
          $total_dokter += $value->jadwal_dokter->tarif;
          $book_dokter = $book_dokter . '
            <tr style="border:1px solid #d6d6d6;">
              <td width="10%" style="padding:1rem;border-bottom: 1px solid #d6d6d6;">' . $no_dokter . '</td>
              <td width="30%" style="padding:1rem;border-bottom: 1px solid #d6d6d6;">' . $value->jadwal_dokter->dokter->nama . '</td>
              <td width="60%" style="padding:1rem;border-bottom: 1px solid #d6d6d6; text-align:right;"> IDR ' . number_format($value->jadwal_dokter->tarif) . '</td>
            </tr>
          ';
        }
      }
    }

    $book_obat = '';
    $no_obat = 0;
    $total_obat = 0;

    // echo json_encode($data['tr_with_detail_tr_jadwal); die;
    foreach ($data['tr_with_detail_tr_obat']->detail_transaksi as $key => $value) {
      if ($value->obat_id) {
        $total_obat += $value->tarif_obat;
        $no_obat += 1;
        $book_obat = $book_obat . '
            <tr style="border:1px solid #d6d6d6;">
              <td width="10%" style="padding:1rem;border-bottom: 1px solid #d6d6d6;">' . $no_obat . '</td>
              <td width="30%" style="padding:1rem;border-bottom: 1px solid #d6d6d6;">' . $value->obat->nama . '</td>
              <td width="60%" style="padding:1rem;border-bottom: 1px solid #d6d6d6; text-align:right;"> IDR ' . number_format($value->tarif_obat) . '</td>
            </tr>
          ';
      }
    }

    $total_biaya = $total_obat + $total_dokter + $total_kamar;
    $masuk = date("Y/m/d H:m:s", strtotime($data['tr_with_pasien']->created_at));
    $keluar = date("Y/m/d H:m:s", strtotime($data['tr_with_pasien']->updated_at));

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
                <h1 style="text-align:center;">BUKTI TRANSAKSI RAWAT IGD</h1>
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
                        <p>: ' . $masuk . '</p>
                      </td>
                    </tr>
                    <tr>
                      <td width="250px">
                        <p>Tanggal Keluar</p>
                      </td>
                      <td>
                        <p>: ' . $keluar . '</p>
                      </td>
                    </tr>
                  </table>
                </div>

                <br>
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

                <br>

                <p>Tarif Bed</p>

                <div style="border: 1px dashed rgb(138, 138, 138); padding: 1rem; border-radius: 8px; position: relative;margin-bottom:1rem;">
                  <table style="width:100%;">
                    <tr style="padding:1rem;background-color:#d6d6d6;border:1px solid #d6d6d6;">
                      <td style="padding:1rem;"> No</td>
                      <td style="padding:1rem;"> Bed</td>
                      <td style="padding:1rem;"> Tarif</td>
                    </tr>
                    ' . $book_kamar . '
                    <tr>
                        <td colspan="2" class="text-center text-bold">Total Biaya Bed</td>
                        <td style="text-align:right;"><b>IDR ' . number_format($total_kamar) . ',-</b></td>
                    </tr>
                  </table>
                </div>

                <br>

                <p>Tarif Dokter</p>

                <div style="border: 1px dashed rgb(138, 138, 138); padding: 1rem; border-radius: 8px; position: relative;margin-bottom:1rem;">
                  <table style="width:100%;">
                    <tr style="padding:1rem;background-color:#d6d6d6;border:1px solid #d6d6d6;">
                      <td style="padding:1rem;"> No</td>
                      <td style="padding:1rem;"> Dokter</td>
                      <td style="padding:1rem;"> Tarif</td>
                    </tr>
                    ' . $book_dokter . '
                    <tr>
                        <td colspan="2" class="text-center text-bold">Total Biaya Dokter</td>
                        <td style="text-align:right;"><b>IDR ' . number_format($total_dokter) . ',-</b></td>
                    </tr>
                  </table>
                </div>
                
                <p>Tarif Obat</p>

                <div style="border: 1px dashed rgb(138, 138, 138); padding: 1rem; border-radius: 8px; position: relative;margin-bottom:1rem;">
                  <table style="width:100%;">
                    <tr style="padding:1rem;background-color:#d6d6d6;border:1px solid #d6d6d6;">
                      <td style="padding:1rem;"> No</td>
                      <td style="padding:1rem;"> Obat</td>
                      <td style="padding:1rem;"> Tarif</td>
                    </tr>
                    ' . $book_obat . '
                    <tr>
                        <td colspan="2" class="text-center text-bold">Total Biaya Obat</td>
                        <td style="text-align:right;"><b>IDR ' . number_format($total_obat) . ',-</b></td>
                    </tr>
                  </table>
                </div>
                <table style="width:100%; border: 2px solid rgb(56, 56, 56); padding: 1rem;">
                    <tr>
                        <td colspan="2"><h3>Total Biaya Keseluruhan</h3></td>
                        <td style="text-align:right;"><b><h3>IDR ' . number_format($total_biaya) . ',-</h3></b></td>
                    </tr>
                </table>
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

  public function generateTransaksiInap($data)
  {
    $this->pdf->setPaper('A4', 'potrait');

    $diagnosa_awal = '';
    foreach ($data['tr_with_detail_tr_penyakit']->detail_transaksi as $key => $value) {
      if ($value->penyakit_id) {
        $diagnosa_awal = $diagnosa_awal . '
            <tr style="border:1px solid #d6d6d6;">
              <td width="30%" style="padding:1rem;border-bottom: 1px solid #d6d6d6;">' . $value->penyakit->kode . '</td>
              <td width="70%" style="padding:1rem;border-bottom: 1px solid #d6d6d6;">' . $value->penyakit->nama . '</td>
            </tr>
          ';
      }
    }

    $book_kamar = '';
    $no_kamar = 0;
    $total_kamar = 0;
    foreach ($data['tr_with_detail_tr_bed']->detail_transaksi as $key => $value) {
      if ($value->bed_id) {
        $no_kamar += 1;
        $total_kamar += $value->tarif_kamar;
        $book_kamar = $book_kamar . '
            <tr style="border:1px solid #d6d6d6;">
              <td width="10%" style="padding:1rem;border-bottom: 1px solid #d6d6d6;">' . $no_kamar . '</td>
              <td width="30%" style="padding:1rem;border-bottom: 1px solid #d6d6d6;">' . $value->bed->kode . '</td>
              <td width="60%" style="padding:1rem;border-bottom: 1px solid #d6d6d6; text-align:right;"> IDR ' . number_format($value->tarif_kamar) . '</td>
            </tr>
          ';
      }
    }

    $book_dokter = '';
    $no_dokter = 0;
    $total_dokter = 0;
    $temp_dokter = '';

    // echo json_encode($data['tr_with_detail_tr_jadwal_dokter']); die;
    foreach ($data['tr_with_detail_tr_jadwal_dokter']->detail_transaksi as $key => $value) {
      if ($value->jadwal_dokter_id) {
        if ($temp_dokter != $value->jadwal_dokter->dokter->id) {
          $no_dokter += 1;
          $temp_dokter = $value->jadwal_dokter->dokter->id;
          $total_dokter += $value->jadwal_dokter->tarif;
          $book_dokter = $book_dokter . '
            <tr style="border:1px solid #d6d6d6;">
              <td width="10%" style="padding:1rem;border-bottom: 1px solid #d6d6d6;">' . $no_dokter . '</td>
              <td width="30%" style="padding:1rem;border-bottom: 1px solid #d6d6d6;">' . $value->jadwal_dokter->dokter->nama . '</td>
              <td width="60%" style="padding:1rem;border-bottom: 1px solid #d6d6d6; text-align:right;"> IDR ' . number_format($value->jadwal_dokter->tarif) . '</td>
            </tr>
          ';
        }
      }
    }

    $book_obat = '';
    $no_obat = 0;
    $total_obat = 0;

    // echo json_encode($data['tr_with_detail_tr_jadwal); die;
    foreach ($data['tr_with_detail_tr_obat']->detail_transaksi as $key => $value) {
      if ($value->obat_id) {
        $total_obat += $value->tarif_obat;
        $no_obat += 1;
        $book_obat = $book_obat . '
            <tr style="border:1px solid #d6d6d6;">
              <td width="10%" style="padding:1rem;border-bottom: 1px solid #d6d6d6;">' . $no_obat . '</td>
              <td width="30%" style="padding:1rem;border-bottom: 1px solid #d6d6d6;">' . $value->obat->nama . '</td>
              <td width="60%" style="padding:1rem;border-bottom: 1px solid #d6d6d6; text-align:right;"> IDR ' . number_format($value->tarif_obat) . '</td>
            </tr>
          ';
      }
    }

    $total_biaya = $total_obat + $total_dokter + $total_kamar;
    $masuk = date("Y/m/d H:m:s", strtotime($data['tr_with_pasien']->created_at));
    $keluar = date("Y/m/d H:m:s", strtotime($data['tr_with_pasien']->updated_at));

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
                <h1 style="text-align:center;">BUKTI TRANSAKSI RAWAT INAP</h1>
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
                        <p>: ' . $masuk . '</p>
                      </td>
                    </tr>
                    <tr>
                      <td width="250px">
                        <p>Tanggal Keluar</p>
                      </td>
                      <td>
                        <p>: ' . $keluar . '</p>
                      </td>
                    </tr>
                  </table>
                </div>

                <br>
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

                <br>

                <p>Tarif Bed</p>

                <div style="border: 1px dashed rgb(138, 138, 138); padding: 1rem; border-radius: 8px; position: relative;margin-bottom:1rem;">
                  <table style="width:100%;">
                    <tr style="padding:1rem;background-color:#d6d6d6;border:1px solid #d6d6d6;">
                      <td style="padding:1rem;"> No</td>
                      <td style="padding:1rem;"> Bed</td>
                      <td style="padding:1rem;"> Tarif</td>
                    </tr>
                    ' . $book_kamar . '
                    <tr>
                        <td colspan="2" class="text-center text-bold">Total Biaya Bed</td>
                        <td style="text-align:right;"><b>IDR ' . number_format($total_kamar) . ',-</b></td>
                    </tr>
                  </table>
                </div>

                <br>

                <p>Tarif Dokter</p>

                <div style="border: 1px dashed rgb(138, 138, 138); padding: 1rem; border-radius: 8px; position: relative;margin-bottom:1rem;">
                  <table style="width:100%;">
                    <tr style="padding:1rem;background-color:#d6d6d6;border:1px solid #d6d6d6;">
                      <td style="padding:1rem;"> No</td>
                      <td style="padding:1rem;"> Dokter</td>
                      <td style="padding:1rem;"> Tarif</td>
                    </tr>
                    ' . $book_dokter . '
                    <tr>
                        <td colspan="2" class="text-center text-bold">Total Biaya Dokter</td>
                        <td style="text-align:right;"><b>IDR ' . number_format($total_dokter) . ',-</b></td>
                    </tr>
                  </table>
                </div>
                
                <p>Tarif Obat</p>

                <div style="border: 1px dashed rgb(138, 138, 138); padding: 1rem; border-radius: 8px; position: relative;margin-bottom:1rem;">
                  <table style="width:100%;">
                    <tr style="padding:1rem;background-color:#d6d6d6;border:1px solid #d6d6d6;">
                      <td style="padding:1rem;"> No</td>
                      <td style="padding:1rem;"> Obat</td>
                      <td style="padding:1rem;"> Tarif</td>
                    </tr>
                    ' . $book_obat . '
                    <tr>
                        <td colspan="2" class="text-center text-bold">Total Biaya Obat</td>
                        <td style="text-align:right;"><b>IDR ' . number_format($total_obat) . ',-</b></td>
                    </tr>
                  </table>
                </div>
                <table style="width:100%; border: 2px solid rgb(56, 56, 56); padding: 1rem;">
                    <tr>
                        <td colspan="2"><h3>Total Biaya Keseluruhan</h3></td>
                        <td style="text-align:right;"><b><h3>IDR ' . number_format($total_biaya) . ',-</h3></b></td>
                    </tr>
                </table>
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

  public function generateTransaksiJalan($data)
  {
    $this->pdf->setPaper('A4', 'potrait');

    $diagnosa_awal = '';
    foreach ($data['tr_with_detail_tr_penyakit']->detail_transaksi as $key => $value) {
      if ($value->penyakit_id) {
        $diagnosa_awal = $diagnosa_awal . '
            <tr style="border:1px solid #d6d6d6;">
              <td width="30%" style="padding:1rem;border-bottom: 1px solid #d6d6d6;">' . $value->penyakit->kode . '</td>
              <td width="70%" style="padding:1rem;border-bottom: 1px solid #d6d6d6;">' . $value->penyakit->nama . '</td>
            </tr>
          ';
      }
    }

    $book_kamar = '';
    $no_kamar = 0;
    $total_kamar = 0;
    foreach ($data['tr_with_detail_tr_bed']->detail_transaksi as $key => $value) {
      if ($value->bed_id) {
        $no_kamar += 1;
        $total_kamar += $value->tarif_kamar;
        $book_kamar = $book_kamar . '
            <tr style="border:1px solid #d6d6d6;">
              <td width="10%" style="padding:1rem;border-bottom: 1px solid #d6d6d6;">' . $no_kamar . '</td>
              <td width="30%" style="padding:1rem;border-bottom: 1px solid #d6d6d6;">' . $value->bed->kode . '</td>
              <td width="60%" style="padding:1rem;border-bottom: 1px solid #d6d6d6; text-align:right;"> IDR ' . number_format($value->tarif_kamar) . '</td>
            </tr>
          ';
      }
    }

    $book_dokter = '';
    $no_dokter = 0;
    $total_dokter = 0;
    $temp_dokter = '';

    // echo json_encode($data['tr_with_detail_tr_jadwal_dokter']); die;
    foreach ($data['tr_with_detail_tr_jadwal_dokter']->detail_transaksi as $key => $value) {
      if ($value->jadwal_dokter_id) {
        if ($temp_dokter != $value->jadwal_dokter->dokter->id) {
          $no_dokter += 1;
          $temp_dokter = $value->jadwal_dokter->dokter->id;
          $total_dokter += $value->jadwal_dokter->tarif;
          $book_dokter = $book_dokter . '
            <tr style="border:1px solid #d6d6d6;">
              <td width="10%" style="padding:1rem;border-bottom: 1px solid #d6d6d6;">' . $no_dokter . '</td>
              <td width="30%" style="padding:1rem;border-bottom: 1px solid #d6d6d6;">' . $value->jadwal_dokter->dokter->nama . '</td>
              <td width="60%" style="padding:1rem;border-bottom: 1px solid #d6d6d6; text-align:right;"> IDR ' . number_format($value->jadwal_dokter->tarif) . '</td>
            </tr>
          ';
        }
      }
    }

    $book_obat = '';
    $no_obat = 0;
    $total_obat = 0;

    // echo json_encode($data['tr_with_detail_tr_jadwal); die;
    foreach ($data['tr_with_detail_tr_obat']->detail_transaksi as $key => $value) {
      if ($value->obat_id) {
        $total_obat += $value->tarif_obat;
        $no_obat += 1;
        $book_obat = $book_obat . '
            <tr style="border:1px solid #d6d6d6;">
              <td width="10%" style="padding:1rem;border-bottom: 1px solid #d6d6d6;">' . $no_obat . '</td>
              <td width="30%" style="padding:1rem;border-bottom: 1px solid #d6d6d6;">' . $value->obat->nama . '</td>
              <td width="60%" style="padding:1rem;border-bottom: 1px solid #d6d6d6; text-align:right;"> IDR ' . number_format($value->tarif_obat) . '</td>
            </tr>
          ';
      }
    }

    $total_biaya = $total_obat + $total_dokter + $total_kamar;
    $masuk = date("Y/m/d H:m:s", strtotime($data['tr_with_pasien']->created_at));
    $keluar = date("Y/m/d H:m:s", strtotime($data['tr_with_pasien']->updated_at));

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
                <h1 style="text-align:center;">BUKTI TRANSAKSI RAWAT JALAN</h1>
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
                        <p>: ' . $masuk . '</p>
                      </td>
                    </tr>
                    <tr>
                      <td width="250px">
                        <p>Tanggal Keluar</p>
                      </td>
                      <td>
                        <p>: ' . $keluar . '</p>
                      </td>
                    </tr>
                  </table>
                </div>

                <br>
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

                <br>

                <p>Tarif Bed</p>

                <div style="border: 1px dashed rgb(138, 138, 138); padding: 1rem; border-radius: 8px; position: relative;margin-bottom:1rem;">
                  <table style="width:100%;">
                    <tr style="padding:1rem;background-color:#d6d6d6;border:1px solid #d6d6d6;">
                      <td style="padding:1rem;"> No</td>
                      <td style="padding:1rem;"> Bed</td>
                      <td style="padding:1rem;"> Tarif</td>
                    </tr>
                    ' . $book_kamar . '
                    <tr>
                        <td colspan="2" class="text-center text-bold">Total Biaya Bed</td>
                        <td style="text-align:right;"><b>IDR ' . number_format($total_kamar) . ',-</b></td>
                    </tr>
                  </table>
                </div>

                <br>

                <p>Tarif Dokter</p>

                <div style="border: 1px dashed rgb(138, 138, 138); padding: 1rem; border-radius: 8px; position: relative;margin-bottom:1rem;">
                  <table style="width:100%;">
                    <tr style="padding:1rem;background-color:#d6d6d6;border:1px solid #d6d6d6;">
                      <td style="padding:1rem;"> No</td>
                      <td style="padding:1rem;"> Dokter</td>
                      <td style="padding:1rem;"> Tarif</td>
                    </tr>
                    ' . $book_dokter . '
                    <tr>
                        <td colspan="2" class="text-center text-bold">Total Biaya Dokter</td>
                        <td style="text-align:right;"><b>IDR ' . number_format($total_dokter) . ',-</b></td>
                    </tr>
                  </table>
                </div>
                
                <p>Tarif Obat</p>

                <div style="border: 1px dashed rgb(138, 138, 138); padding: 1rem; border-radius: 8px; position: relative;margin-bottom:1rem;">
                  <table style="width:100%;">
                    <tr style="padding:1rem;background-color:#d6d6d6;border:1px solid #d6d6d6;">
                      <td style="padding:1rem;"> No</td>
                      <td style="padding:1rem;"> Obat</td>
                      <td style="padding:1rem;"> Tarif</td>
                    </tr>
                    ' . $book_obat . '
                    <tr>
                        <td colspan="2" class="text-center text-bold">Total Biaya Obat</td>
                        <td style="text-align:right;"><b>IDR ' . number_format($total_obat) . ',-</b></td>
                    </tr>
                  </table>
                </div>
                <table style="width:100%; border: 2px solid rgb(56, 56, 56); padding: 1rem;">
                    <tr>
                        <td colspan="2"><h3>Total Biaya Keseluruhan</h3></td>
                        <td style="text-align:right;"><b><h3>IDR ' . number_format($total_biaya) . ',-</h3></b></td>
                    </tr>
                </table>
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

  public function formatReg($number)
  {
    $currentYear = substr(date('Y'), -2);
    $currentMonth = date('m');
    $number = str_pad($number + 1, 4, '0', STR_PAD_LEFT);
    return "REG-$currentYear-$currentMonth-$number";
  }
}
