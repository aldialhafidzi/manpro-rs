<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h5 class="m-0 text-dark" style="background-color: #2090d7;
    display: inline-block;
    padding: 1rem;
    border-radius: 0px 30px 30px 0px;
    color: #ffff !important;"><i class="fas fa-clinic-medical nav-icon"></i> &nbsp;List Ruangan</h5>
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
              <div class="mb-3">
                <button class="btn btn-primary btn-sm" onclick="add_ruangan()"> <i class="fas fa-plus"></i> &nbsp; Tambah Ruangan</button>
                <button class="btn btn-primary btn-sm" onclick="view_facility()"> <i class="fas fa-eye"></i> &nbsp; Lihat Fasilitas</button>
                <button class="btn btn-secondary btn-sm" onclick="reload_table()"> <i class="fas fa-sync"></i> &nbsp; Refresh</button>
              </div>
              <table id="table" class="table table-bordered">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Kode</th>
                    <th>Kelas</th>
                    <th>Nama Ruangan</th>
                    <th>Status</th>
                    <th>Harga</th>
                    <th style="width: 110px">Action</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>

            <script type="text/javascript">
              var save_method; //for save method string
              var table;

              $(document).ready(function() {

                //datatables
                table = $('#table').DataTable({

                  "processing": true, //Feature control the processing indicator.
                  "serverSide": true, //Feature control DataTables' server-side processing mode.
                  "order": [], //Initial no order.

                  // Load data for the table's content from an Ajax source
                  "ajax": {
                    "url": "<?php echo site_url('RuangRawat/ajax_list') ?>",
                    "type": "POST"
                  },

                  //Set column definition initialisation properties.
                  "columnDefs": [{
                    "targets": [-1], //last column
                    "orderable": false, //set not orderable
                  }, ],

                });
              });

              function add_ruangan() {
                save_method = 'add';
                $('#form')[0].reset(); // reset form on modals
                $('.form-group').removeClass('has-error'); // clear error class
                $('.help-block').empty(); // clear error string
                $('#modal_form').modal('show'); // show bootstrap modal
                $('.modal-title').text('Tambah Ruangan'); // Set Title to Bootstrap modal title
                $('input').removeAttr('disabled'); // clear error class
                $('select').removeAttr('disabled'); // clear error class

              }

              function view_facility() {
                $('#form')[0].reset(); // reset form on modals
                $('.form-group').removeClass('has-error'); // clear error class
                $('.help-block').empty(); // clear error string
                $('#modal_fasilitas').modal('show'); // show bootstrap modal
                $('.modal-title').text('Lihat Fasilitas'); // Set Title to Bootstrap modal title
              }

              function lihat_ruangan(id) {
                $('#form')[0].reset(); // reset form on modals
                $('.form-group').removeClass('has-error');
                $('input').attr('disabled', 'disabled'); // clear error class
                $('select').attr('disabled', 'disabled'); // clear error class
                $('.help-block').empty(); // clear error string

                //Ajax Load data from ajax
                $.ajax({
                  url: "<?php echo site_url('RuangRawat/ajax_lihat/') ?>" + id,
                  type: "GET",
                  dataType: "JSON",
                  success: function(data) {

                    $('[name="kode_ruangan"]').val(data.kode_ruangan);
                    $('[name="kelas"]').val(data.kelas);
                    $('[name="nama"]').val(data.nama);
                    $('[name="status"]').val(data.status);
                    $('[name="harga"]').val(data.harga);
                    $('[name="id"]').val(data.id);
                    $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
                    $('.modal-title').text('Lihat Ruangan'); // Set title to Bootstrap modal title

                  },
                  error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error get data from ajax');
                  }
                });
              }


              function edit_ruangan(id) {
                $('#form')[0].reset(); // reset form on modals
                $('.form-group').removeClass('has-error'); // clear error class
                $('.help-block').empty(); // clear error string
                $('input').removeAttr('disabled'); // clear error class
                $('select').removeAttr('disabled');
                //Ajax Load data from ajax
                $.ajax({
                  url: "<?php echo site_url('RuangRawat/ajax_edit/') ?>" + id,
                  type: "GET",
                  dataType: "JSON",
                  success: function(data) {

                    $('[name="kode_ruangan"]').val(data.kode_ruangan);
                    $('[name="kelas"]').val(data.kelas);
                    $('[name="nama"]').val(data.nama);
                    $('[name="status"]').val(data.status);
                    $('[name="harga"]').val(data.harga);
                    $('[name="id"]').val(data.id);
                    $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
                    $('.modal-title').text('Edit Ruangan'); // Set title to Bootstrap modal title

                  },
                  error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error get data from ajax');
                  }
                });
              }

              function reload_table() {
                table.ajax.reload(null, false); //reload datatable ajax 
              }

              function save_edit() {
                var id = $('[name="id"]').val();
                if (id) {
                  save_method = 'update';
                }
                save()

              }

              function save() {
                $('#btnSave').text('saving...'); //change button text
                $('#btnSave').attr('disabled', true); //set button disable 
                var url;

                if (save_method == 'add') {
                  url = "<?php echo site_url('RuangRawat/ajax_add') ?>";
                } else {
                  url = "<?php echo site_url('RuangRawat/ajax_update') ?>";
                }

                // ajax adding data to database
                $.ajax({
                  url: url,
                  type: "POST",
                  data: $('#form').serialize(),
                  dataType: "JSON",
                  success: function(data) {

                    if (data.status) //if success close modal and reload ajax table
                    {
                      $('#modal_form').modal('hide');
                      reload_table();
                    }

                    $('#btnSave').text('save'); //change button text
                    $('#btnSave').attr('disabled', false); //set button enable 


                  },
                  error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error adding / update data');
                    $('#btnSave').text('save'); //change button text
                    $('#btnSave').attr('disabled', false); //set button enable 

                  }
                });
              }

              function delete_ruangan(id) {
                if (confirm('Are you sure delete this data?')) {
                  // ajax delete data to database
                  $.ajax({
                    url: "<?php echo site_url('ruangrawat/ajax_delete') ?>/" + id,
                    type: "POST",
                    dataType: "JSON",
                    success: function(data) {
                      //if success reload ajax table
                      $('#modal_form').modal('hide');
                      $('#modal_hapus').modal('show');
                      $('.modal-title').text('Hapus Berhasil');
                      reload_table();
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                      alert('Error deleting data');
                    }
                  });

                }
              }
            </script>
            <!-- ============ MODAL Edit =============== -->
            <div class="modal fade" id="modal_form" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel">Edit Ruangan</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                  </div>
                  <div class="modal-body form">
                    <form action="#" id="form" class="form-horizontal">
                      <input type="hidden" value="" name="id" />
                      <div class="form-group">
                        <label class="control-label col-xs-3">Kode Ruangan</label>
                        <div class="col-xs-8">
                          <input name="kode_ruangan" class="form-control" type="text" placeholder="Kode ruangan...">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-xs-3">Kelas Ruangan</label>
                        <div class="col-xs-8">
                          <select name="kelas" class="form-control" required>
                            <option value="">-PILIH-</option>
                            <option value="VVIP">VVIP</option>
                            <option value="VIP">VIP</option>
                            <option value="Kelas 1">Kelas 1</option>
                            <option value="Kelas 2">Kelas 2</option>
                            <option value="Kelas 3">Kelas 3</option>
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-xs-3">Nama Ruangan</label>
                        <div class="col-xs-8">
                          <input name="nama" class="form-control" type="text" placeholder="Nama Ruangan..." required>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-xs-3">Harga Ruangan</label>
                        <div class="col-xs-8">
                          <input name="harga" class="form-control" type="text" placeholder="Harga Ruangan..." required>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-xs-3">Status Ruangan</label>
                        <div class="col-xs-8">
                          <select name="status" class="form-control" required>
                            <option value="">-PILIH-</option>
                            <option value="ISI">ISI</option>
                            <option value="KOSONG">KOSONG</option>
                          </select>
                        </div>
                      </div>

                  </div>

                  <div class="modal-footer">
                    <button type="button" id="btnSave" onclick="save_edit()" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>

            <div class="modal fade" id="modal_hapus" tabindex="-1" role="dialog">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Data Terhapus</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                  </div>
                </div>
              </div>

            </div>

            <div class="modal fade" id="modal_fasilitas" tabindex="-1" role="dialog">
              <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Lihat Fasilitas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                      <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="vvip-tab" data-toggle="tab" href="#vvip" role="tab" aria-controls="vvip" aria-selected="true">VVIP</a>
                      </li>
                      <li class="nav-item" role="presentation">
                        <a class="nav-link" id="vip-tab" data-toggle="tab" href="#vip" role="tab" aria-controls="vip" aria-selected="false">VIP</a>
                      </li>
                      <li class="nav-item" role="presentation">
                        <a class="nav-link" id="k1-tab" data-toggle="tab" href="#k1" role="tab" aria-controls="k1" aria-selected="false">Kelas 1</a>
                      </li>
                      <li class="nav-item" role="presentation">
                        <a class="nav-link" id="k2-tab" data-toggle="tab" href="#k2" role="tab" aria-controls="k2" aria-selected="false">Kelas 2</a>
                      </li>
                      <li class="nav-item" role="presentation">
                        <a class="nav-link" id="k3-tab" data-toggle="tab" href="#k3" role="tab" aria-controls="k3" aria-selected="false">Kelas 3</a>
                      </li>
                    </ul>

                    <div class="tab-content" id="myTabContent">
                      <div class="tab-pane fade show active" id="vvip" role="tabpanel" aria-labelledby="vvip-tab">
                        <div class="row">
                          <div class="col-7">
                            <img src="<?= base_url() ?>public/img/vvip.jpg" class="img-fluid rounded mx-auto d-block" width="6600px" />
                          </div>
                          <div class="col-5">
                            <p>Fasilitas :</p>
                            <div class="row">
                              <div class="col-6">
                                <p>- AC &nbsp;</p>
                                <p>- 1 Bed &nbsp;</p>
                                <p>- 1 Kamar mandi dengan air panas & dingin &nbsp;</p>
                                <p>- Bedside cabinet &nbsp;</p>
                                <p>- Kulkas &nbsp;</p>
                                <p>- Kursi tunggu &nbsp;</p>
                                <p>- Overbed Table &nbsp;</p>
                                <p>- Meja TV &nbsp;</p>
                                <p> - Almari pakaian &nbsp;</p>
                              </div>
                              <div class="col-6">
                                <p>- Dispenser &nbsp;</p>
                                <p> - Meja &nbsp;</p>
                                <p> - Sofabed &nbsp;</p>
                                <p> - LCD 32" &nbsp;</p>
                                <p> - Bed Penunggu &nbsp;</p>
                                <p> - Telepon &nbsp;</p>
                                <p> - Ruang keluarga &nbsp;</p>
                                <p> - 1 set meja makan &nbsp;</p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="tab-pane fade" id="vip" role="tabpanel" aria-labelledby="vip-tab">
                        <div class="row">
                          <div class="col-7">
                            <img src="<?= base_url() ?>public/img/vip.jpg" class="img-fluid rounded mx-auto d-block" width="6600px" />
                          </div>
                          <div class="col-5">
                            <p>Fasilitas :</p>
                            <div class="row">
                              <div class="col-6">
                                <p>- AC &nbsp;</p>
                                <p>- 1 Bed &nbsp;</p>
                                <p>- 1 Kamar mandi dengan air panas & dingin &nbsp;</p>
                                <p>- Bedside cabinet &nbsp;</p>
                                <p>- Kulkas &nbsp;</p>
                                <p>- Kursi tunggu &nbsp;</p>
                                <p>- Overbed Table &nbsp;</p>
                                <p>- Meja TV &nbsp;</p>
                                <p> - Almari pakaian &nbsp;</p>
                              </div>
                              <div class="col-6">
                                <p> - Dispenser &nbsp;</p>
                                <p> - Meja &nbsp;</p>
                                <p> - Sofa &nbsp;</p>
                                <p> - LCD 43" &nbsp;</p>
                                <p> - Bed Penunggu &nbsp;</p>
                                <p> - Telepon &nbsp;</p>
                                <p> - Mini Bar &nbsp;</p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="tab-pane fade" id="k1" role="tabpanel" aria-labelledby="k1-tab">
                        <div class="row">
                          <div class="col-7">
                            <img src="<?= base_url() ?>public/img/k1.jpg" class="img-fluid rounded mx-auto d-block" width="6600px" />
                          </div>
                          <div class="col-5">
                            <p>Fasilitas :</p>
                            <p>- AC &nbsp;</p>
                            <p>- 2 Bed &nbsp;</p>
                            <p>- 1 Kamar mandi dengan air panas & dingin &nbsp;</p>
                            <p>- 2 Bedside cabinet &nbsp;</p>
                            <p>- 2 Kursi tunggu &nbsp;</p>
                            <p>- Overbed Table &nbsp;</p>
                            <p>- 2 Buah TV &nbsp;</p>
                          </div>
                        </div>
                      </div>

                      <div class="tab-pane fade" id="k2" role="tabpanel" aria-labelledby="k2-tab">
                        <div class="row">
                          <div class="col-7">
                            <img src="<?= base_url() ?>public/img/k2.jpg" class="img-fluid rounded mx-auto d-block" width="6600px" />
                          </div>
                          <div class="col-5">
                            <p>Fasilitas :</p>
                            <p>- AC &nbsp;</p>
                            <p>- 4 Bed &nbsp;</p>
                            <p>- 2 Kamar mandi dengan air panas & dingin &nbsp;</p>
                            <p>- 4 Buah Bedside cabinet &nbsp;</p>
                            <p>- 4 Kursi tunggu &nbsp;</p>
                            <p>- Overbed Table &nbsp;</p>
                          </div>
                        </div>
                      </div>

                      <div class="tab-pane fade" id="k3" role="tabpanel" aria-labelledby="k3-tab">
                        <div class="row">
                          <div class="col-7">
                            <img src="<?= base_url() ?>public/img/k3.jpg" class="img-fluid rounded mx-auto d-block" width="6600px" />
                          </div>
                          <div class="col-5">
                            <p>Fasilitas :</p>
                            <p>- AC &nbsp;</p>
                            <p>- 6 Bed &nbsp;</p>
                            <p>- 2 Kamar mandi dengan air panas & dingin &nbsp;</p>
                            <p>- 6 Buah Bedside cabinet &nbsp;</p>
                            <p>- 6 Kursi tunggu &nbsp;</p>
                            <p>- Overbed Table &nbsp;</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                    </div>
                  </div>
                </div>
              </div>

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