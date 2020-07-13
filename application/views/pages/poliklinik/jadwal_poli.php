<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Jadwal Poliklinik</h1>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
  <?php
  $user =$this->session->userdata('role_id');
   ?>
  <?php if ($user == 1 ) : ?>
    <button class="btn btn-primary" data-toggle="modal" data-target="#newPoliklinikModal"><i class="fa fa-plus"></i> Tambah Jadwal</button>
<?php endif; ?>
    <div class="card-body">
      <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
        <div class="row">
          <div class="col-sm-12 col-md-6">
            <!--<div class="dataTables_length" id="example1_length"><label>Show <select name="example1_length" aria-controls="example1" class="custom-select custom-select-sm form-control form-control-sm">
                  <option value="10">10</option>
                  <option value="25">25</option>
                  <option value="50">50</option>
                  <option value="100">100</option>
                </select> entries</label></div> -->
          </div>
          <div class="col-sm-12 col-md-6">
            <div id="example1_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="example1"></label></div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
              <thead>
                <tr role="row">
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">No</th>
                  <th class=" sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 203.4px;">Poliklinik</th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 262.6px;">Dokter</th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 233px;">Perawat</th>
                  <!-- <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 174.6px;">Hari</th> -->
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 123.6px;">Jam Awal</th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 123.6px;">Jam Akhir</th>
                  <?php if ($user == 1) : ?>
                  <th colspan="2">Action</th>
<?php endif;?>
                </tr>
              </thead>
              <?php
              $no = 1;
              foreach ($jadwal_poli as $jdw_pl) : ?>
                <tr>
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $jdw_pl->nama ?></td>
                  <td><?php echo $jdw_pl->nama ?></td>
                  <td><?php echo $jdw_pl->nama ?></td>
                  <!-- <td><?php echo $jdw_pl->hari ?></td> -->
                  <td><?php echo $jdw_pl->jam_awal ?></td>
                  <td><?php echo $jdw_pl->jam_akhir ?></td>
                  <?php if ($user == 1) : ?>
                  <td onclick="javascript:return confirm('Anda yakin hapus ?')"><?php echo anchor('Poliklinik/hapus_jadwal/' . $jdw_pl->id, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?></td>
                  <td><?php echo anchor('poliklinik/edit_jadwal/' . $jdw_pl->id, '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>') ?></td>
<?php endif; ?>
                </tr>
              <?php endforeach ?>
            </table>
          </div>
        </div>
        <div class="row">
        <!--  
        <div class="col-sm-12 col-md-5">
            <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div>
          </div>
          <div class="col-sm-12 col-md-7">
            <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
              <ul class="pagination">
                <li class="paginate_button page-item previous disabled" id="example1_previous"><a href="#" aria-controls="example1" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                <li class="paginate_button page-item active"><a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                <li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
                <li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="3" tabindex="0" class="page-link">3</a></li>
                <li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="4" tabindex="0" class="page-link">4</a></li>
                <li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="5" tabindex="0" class="page-link">5</a></li>
                <li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="6" tabindex="0" class="page-link">6</a></li>
                <li class="paginate_button page-item next" id="example1_next"><a href="#" aria-controls="example1" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li>
              </ul>
            </div>
          </div> -->
        </div>
      </div>
    </div>

  </section>


  <!-- Modal -->
  <!-- ieu id label na diganti -->
  <div class="modal fade" id="newPoliklinikModal" tabindex="-1" role="dialog" aria-labelledby="newPoliklinikModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="newPoliklinikModalLabel">Input Jadwal Poli</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form method="post" action="<?= base_url('poliklinik/tambah_aksi_jadwal') ?>">
          <div class="modal-body">
            <div class="form-grup">

              <label>Poliklinik</label>
              <!-- ieu -->
              <select name="poli_id" id="poli_id" class="form-control">
                <option value="">Pilih Poliklinik</option>
                <?php foreach ($M_jadwal_poli as $ls_pl) : ?>
                  <option value="<?= $ls_pl['poli_id']; ?>"><?= $ls_pl['nama']; ?> </option>
                <?php endforeach; ?>
              </select>
              <!-- <input type="text" name="poli_id" class="form-control"> -->
            </div>
            <div class="form-grup">
              <label>Dokter</label>
              <select name="dokter_id" id="dokter_id" class="form-control">
                <option value="">Pilih Dokter</option>
                <?php foreach ($M_getDok as $dr_pl) : ?>
                  <option value="<?= $dr_pl['dokter_id']; ?>"><?= $dr_pl['nama']; ?> </option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-grup">
              <label>Perawat</label>
              <select name="id_perawat" id="id_perawat" class="form-control">
                <option value="">Pilih Perawat</option>
                <?php foreach ($M_getPer as $prw_pl) : ?>
                  <option value="<?= $prw_pl['id_perawat']; ?>"><?= $prw_pl['nama']; ?> </option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-grup">
              <label>Hari</label>
              <select name="hari" id="hari" class="form-control">
                <option>Pilih Hari</option>
                <option>Senin</option>
                <option>Selasa</option>
                <option>Rabu</option>
                <option>Kamis</option>
                <option>Jum'at</option>
                <option>Sabtu</option>
                <option>Minggu</option>
              </select>
            </div>
            <div class="form-grup">
              <label>Jam</label>
              <input type="time" name="jam_awal" class="form-control">
            </div>
            <div class="modal-footer">
              <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </div>