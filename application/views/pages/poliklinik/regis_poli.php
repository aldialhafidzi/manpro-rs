<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Registrasi</h1>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
  <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> Registrasi Baru</button>
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
-->
        </div>
        <div class="row">
          <div class="col-sm-12">
            <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
              <thead>
                <tr role="row">
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" >No</th>
                  <!-- <th class=" sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 203.4px;">Registrasi</th> -->
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 262.6px;">Pasien</th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 233px;">Jadwal</th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 174.6px;">Tanggal</th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 123.6px;">Status</th>
                  <th colspan="2">Action</th>
                </tr>
              </thead>
              <?php 
               $no = 1;
               foreach ($regis_poli as $rgs_pl): ?>
                <tr>
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $rgs_pl->nama?></td>
                  <td><?php echo $rgs_pl->hari?></td>
                  <td><?php echo $rgs_pl->tanggal?></td>
                  <td><?php echo $rgs_pl->status?></td>
                  <td onclick="javascript:return confirm('Anda yakin hapus ?')"><?php echo anchor('Poliklinik/hapus_regis/'.$rgs_pl->transaksi_id, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?></td>
                  <td><?php echo anchor('poliklinik/edit_regis/'.$rgs_pl->transaksi_id,'<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>') ?></td>
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
        <h4 class="modal-title" id="exampleModalLabel">Registrasi Baru</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo base_url().'Poliklinik/regis_poli'?>">
          <div class="form-grup">
            <label>Pasien</label>
                <?php foreach ($M_regis_poli as $rgs_pl) : ?>
                  <option value="<?= $rgs_pl['id_pasien']; ?>"><?= $rgs_pl['nama']; ?> </option>
                <?php endforeach; ?>
            </select>
          </div>
<!--
<div class="form-grup">
            <label>Nama</label>
            <input type="text" name="id_pasien" class="form-control">
          </div>    
-->      
          <div class="form-grup">
            <label>Jadwal</label>
            <input type="text" name="dokter_id" class="form-control">
          </div>

          <div class="form-grup">
            <label>Jadwal</label>
            <?php foreach ($jadwal_poli as $jdw_pl) : ?>
              <option value="<?= $jdw_pl['jadwal_id']; ?>"><?= $jdw_pl['nama']; ?> </option>
            <?php endforeach; ?>
            </select>
          </div>

          <div class="form-grup">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control">
          </div>
          <br>
          <div class="form-grup">
            <label>Status</label>
            <input type="text" name="status" class="form-control">
          </div>
          <div class="modal-footer">
            <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
            <button type="submit" class="btn btn-primary">Simpan</button> 
          </div>
</div>