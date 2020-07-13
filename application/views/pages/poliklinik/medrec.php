<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Medical Recaptulate</h1>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
  <?php
  $user =$this->session->userdata('role_id');
   ?>
   <?php if ($user == 1 || $user == 2) : ?>
  <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> Medrec Baru</button>
<?php endif;?>  
  <div class="card-body">
      <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
        <div class="row">
          <!--
          <div class="col-sm-12 col-md-6">
            
            <div class="dataTables_length" id="example1_length"><label>Show <select name="example1_length" aria-controls="example1" class="custom-select custom-select-sm form-control form-control-sm">
                  <option value="10">10</option>
                  <option value="25">25</option>
                  <option value="50">50</option>
                  <option value="100">100</option>
                </select> entries</label></div>
          </div>
          <div class="col-sm-12 col-md-6">
            <div id="example1_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="example1"></label></div>
          </div>
        </div>
-->
        <div class="row">
          <div class="col-sm-12">
            <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
              <thead>
                <tr role="row">
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" >No</th>
                  <th class=" sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 203.4px;">Nama Pasien</th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 262.6px;">Tanggal Cek</th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 233px;">Diagnosa</th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 174.6px;">Dokter</th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 123.6px;">tindakan</th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 123.6px;">Obat</th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 123.6px;">Dosis</th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 123.6px;">Aturan Pakai</th>
                  <?php if ($user == 1 || $user == 2) : ?>
                  <th colspan="2">Action</th>
                  <?php endif;?>
                </tr>
              </thead>
              <?php 
               $no = 1;
               foreach ($medrec as $mrc): ?>
                <tr>
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $mrc->nama?></td>
                  <td><?php echo $mrc->tgl_check?></td>
                  <td><?php echo $mrc->diagnosa?></td>
                  <td><?php echo $mrc->nama?></td>
                  <td><?php echo $mrc->tindakan?></td>
                  <td><?php echo $mrc->nama?></td>
                  <td><?php echo $mrc->dosis?></td>
                  <td><?php echo $mrc->aturan_pakai?></td>
                  <?php if ($user == 1 || $user == 2) : ?>
                  <td onclick="javascript:return confirm('Anda yakin hapus ?')"><?php echo anchor('Poliklinik/hapus_medrec/'.$mrc->id_medrec, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?></td>
                  <td><?php echo anchor('poliklinik/edit_medrec/'.$mrc->id_medrec,'<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>') ?></td>
                  <?php endif;?>
                </tr>
              <?php endforeach ?>
            </table>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12 col-md-5">
            <!--
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
-->
          </div>
        </div>
      </div>
    </div>

  </section>

  
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Medrec Baru</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo base_url().'Poliklinik/tambah_aksi_medrec'?>">
          <div class="form-grup">
            <label>Pasien</label>
            <select name="id_pasien" id="id_pasien" class="form-control">
                <option value="">Nama Pasien</option>
                <?php foreach ($M_medrec as $mrc) : ?>
                  <option value="<?= $mrc['id_pasien']; ?>"><?= $mrc['nama']; ?> </option>
                <?php endforeach; ?>
            </select>
            <!-- <input type="text" name="poli_id" class="form-control"> -->
          </div>
          <div class="form-grup">
            <label>Tanggal Check</label>
            <input type="date" name="tgl_check" class="form-control">
          </div>
          <div class="form-grup">
            <label>Diagnosa</label>
            <input type="text" name="diagnosa" class="form-control">
          </div>
          <div class="form-grup">
            <label>Dokter</label>
            <select name="dokter_id" id="dokter_id" class="form-control">
                <option value="">Pilih Dokter</option>
                <?php foreach ($M_getDok as $mrc) : ?>
                  <option value="<?= $mrc['dokter_id']; ?>"><?= $mrc['nama']; ?> </option>
                <?php endforeach; ?>
            </select>
          </div>
          <div class="form-grup">
            <label>tindakan</label>
            <select name="tindakan_id" id="tindakan_id" class="form-control">
                <option value="">tindakan</option>
                <?php foreach ($M_getDiagnosa as $mrc) : ?>
                  <option value="<?= $mrc['tindakan_id']; ?>"><?= $mrc['tindakan']; ?> </option>
                <?php endforeach; ?>
            </select>
          </div>
          <div class="form-grup">
            <label>Obat</label>
            <select name="id_drugs" id="id_drugs" class="form-control">
                <option value="">Pilih Obat</option>
                <?php foreach ($M_getObat as $mrc) : ?>
                  <option value="<?= $mrc['id_drugs']; ?>"><?= $mrc['nama']; ?> </option>
                <?php endforeach; ?>
            </select>
          </div>
          <div class="form-grup">
            <label>Dosis</label>
            <input type="text" name="dosis" class="form-control">
          </div>
          <div class="form-grup">
            <label>Aturan Pakai</label>
            <input type="text" name="aturan_pakai" class="form-control">
          </div>
          <div class="modal-footer">
            <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
            <button type="submit" class="btn btn-primary">Simpan</button> 
          </div>
</div>