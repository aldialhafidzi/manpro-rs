<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">List Ruang Rawat</h1>
        </div>
      </div>
    </div>
  </div>

  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <button class="btn btn-primary btn-sm"> <i class="fas fa-plus"></i> &nbsp; Tambah Ruangan</button>
              <button class="btn btn-secondary btn-sm"> <i class="fas fa-sync"></i> &nbsp; Refresh</button>
              
              <table id="tableRuangan" class="table table-bordered">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Kode</th>
                    <th>Kelas</th>
                    <th>Nama Ruangan</th>
                    <th>Status</th>
                    <th>Harga</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  foreach ($ruangans as $key => $item) {
                    echo '
                      <tr>
                        <td class="text-center"> ' . ($key + 1) . '</td>
                        <td class="text-uppercase">' . $item->kode . '</td>
                        <td>' . $item->kelas . '</td>
                        <td>' . $item->nama . '</td>
                        <td>' .($item->status=="KOSONG" ? "<button class='btn btn-sm btn-danger'><i class='fa fa-times'></i></button> &nbsp ISI" : "<button class='btn btn-sm btn-success'><i class='fa fa-check'></i></button> &nbsp KOSONG").'</td>
                        <td>Rp.' . $item->harga . '</td>
                        <td style="width:140px;text-align:center;">
                          <button value="' . $item->kode . '"  data-toggle="modal" data-target="#modal_edit" class="btn btn-sm btn-warning">
                            <i class="fa fa-edit"></i> Edit
                          </button>
                          <button value="' . $item->kode . '" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal_hapus">
                            <i class="fa fa-trash-alt"></i> Hapus
                          </button>
                        </td>
                      </tr>';
                    }
                  ?>
                </tbody>
              </table>
            </div>
            
            <!-- ============ MODAL Edit =============== -->
            <div class="modal fade" id="modal_edit" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                  <h3 class="modal-title" id="myModalLabel">Edit Ruangan</h3>
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                </div>
                <form class="form-horizontal">
                  <div class="modal-body">
                    <div class="form-group">
                      <label class="control-label col-xs-3" >Kode Ruangan</label>
                      <div class="col-xs-8">
                        <input name="nama_ruangan" class="form-control" type="text" placeholder="Kode ruangan..." required>
                      </div>
                    </div>
  
                    <div class="form-group">
                      <label class="control-label col-xs-3" >Nama Ruangan</label>
                      <div class="col-xs-8">
                        <input name="nama_ruangan" class="form-control" type="text" placeholder="Nama Ruangan..." required>
                      </div>
                    </div>
  
                    <div class="form-group">
                      <label class="control-label col-xs-3" >Kelas Ruangan</label>
                      <div class="col-xs-8">
                        <select name="satuan" class="form-control" required>
                          <option value="">-PILIH-</option>
                          <option value="VVIP">VVIP</option>
                          <option value="VIP">VIP</option>
                          <option value="k1">Kelas 1</option>
                          <option value="k2">Kelas 2</option>
                          <option value="k3">Kelas 3</option>
                        </select>
                      </div>
                    </div>
  
                    <div class="form-group">
                      <label class="control-label col-xs-3" >Harga Ruangan</label>
                      <div class="col-xs-8">
                        <input name="harga" class="form-control" type="text" placeholder="Harga Ruangan..." required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-xs-3" >Status Ruangan</label>
                      <div class="col-xs-8">
                        <select name="satuan" class="form-control" required>
                          <option value="">-PILIH-</option>
                          <option value="ISI">ISI</option>
                          <option value="KOSONG">KOSONG</option>
                        </select>
                      </div>
                    </div>

                  </div>
  
                  <div class="modal-footer">
                      <button class="btn btn-info" data-dismiss="modal" aria-hidden="true">Tutup</button>
                  </div>
                </form>
              </div>
              </div>
            </div>
            <!--END MODAL Edit-->

            <!--MODAL Hapus-->
            <div class="modal fade" id="modal_hapus" tabindex="-1" role="dialog">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Hapus Ruangan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <p>Konfirmasi untuk menghapus ruangan ?</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger">Hapus</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                  </div>
                </div>
              </div>
            </div>
            <!--END MODAL Hapus-->

          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<script>
  $('#tableRuangan').DataTable({
    "paging": true,
    "lengthChange": false,
    "searching": true,
    "ordering": true,
    "info": true,
    "autoWidth": false,
  });
</script>