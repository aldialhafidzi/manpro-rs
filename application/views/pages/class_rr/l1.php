<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-7">
          <h5 class="m-0 text-dark" style="background-color: #2090d7;
    display: inline-block;
    padding: 1rem;
    border-radius: 0px 30px 30px 0px;
    color: #ffff !important;"><i class="fas fa-procedures nav-icon"></i> &nbsp;Ruang Rawat</h5>
        </div>

        <div class="btn-group" style="margin: 0px 5px 0px 5px">
          <button type="button" class="btn btn-default" style="height:40px; width: 140px">Executive</button>
          <button type="button" class="btn btn-default dropdown-toggle" style="height:40px" data-toggle="dropdown">
            <span class="caret"></span>
          </button>
          <ul class="dropdown-menu" role="menu">
            <li><a class="dropdown-item active" href="<?= base_url() ?>ruangrawat/lantai1">Executive</a></li>
            <li><a class="dropdown-item " href="<?= base_url() ?>ruangrawat/lantai2">Ekonomi</a></li>
          </ul>
        </div>

        <form action="#" method="get" class="sidebar-form" style="margin: 0px 5px 0px 5px">
          <div class="input-group align-right">
            <input type="text" name="q" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
          </div>
        </form>

      </div>
    </div>
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

    function bed_info(status) {
      $('#form')[0].reset(); // reset form on modals
      $('.form-group').removeClass('has-error'); // clear error class
      $('.help-block').empty(); // clear error string
      $('input').removeAttr('disabled'); // clear error class
      $('select').removeAttr('disabled');
      //Ajax Load data from ajax
      $.ajax({
        url: "<?php echo site_url('RuangRawat/bed_info/') ?>" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data) {

          $('[name="kode"]').val(data.kode);
          $('[name="status"]').val(data.status);
          $('[name="no_mr"]').val(data.no_mr);
          $('[name="nama"]').val(data.nama);
          $('[name="jenis_kelamin"]').val(data.jenis_kelamin);
          $('[name="no_telp"]').val(data.no_telp);
          $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
          $('.modal-title').text('Info Ruangan'); // Set title to Bootstrap modal title

        },
        error: function(jqXHR, textStatus, errorThrown) {
          alert('Error get data from ajax');
        }
      });
    }
  </script>

  <div class="content">
    <div class="container-fluid">

      <div class="row">

        <?php foreach ($det_ruangan as $key => $nilai) : ?>
          <div class="col-md-3 col-xs-3">
            <div class="small-box bg-white">
              <div class="inner">
                <h4>
                  <?php
                  echo $nilai->nama;
                  ?>
                </h4>
                <table class="table text-center">
                  <tbody>
                    <tr>
                      <td>
                        <div class="small-box bg-white">
                          <h4><?php echo $nilai->k_kode ?></h4>
                          <table class="table text-center">
                            <td>
                              <a type="button" class="<?php if ($nilai->status == 1) {
                                                        echo 'btn btn-block btn-danger';
                                                      } else {
                                                        echo 'btn btn-block btn-success';
                                                      } ?>" data-toggle="modal" data-target="#ruang_rawat_info" onclick="bed_info(.'.$nilai->id.'.)"><?php echo $nilai->b_kode ?></a>
                            </td>
                            </th>
                          </table>
                        </div>
                      </td>
                    </tr>
                    </th>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        <?php endforeach; ?>

        <!-- ============ MODAL Info =============== -->
        <div class="modal fade" id="ruang_rawat_info" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
          <div class="modal-dialog" style="max-width: 700px">
            <div class="modal-content" style="width: 700px">
              <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel">Info Ruangan</h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
              </div>
              <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                  <input type="hidden" value="" name="id" />
                  <div class="row">
                    <div class="col-md-4">

                      <div class="form-group">
                        <label class="control-label col-xs-3">Kode Ruangan</label>
                        <div class="col-xs-6">
                          <input name="kode" class="form-control" type="text" value="" disabled>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-xs-3">Status Ruangan</label>
                        <div class="col-xs-6">
                          <input name="status" class="form-control" type="text" value="" disabled>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-8">
                      <div class="form-group">
                        <label class="control-label col-xs-3">No.Medrec</label>
                        <div class="col-xs-8">
                          <input name="no_mr" class="form-control" type="text" value="" disabled>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-xs-3">Nama Pasien</label>
                        <div class="col-xs-8">
                          <input name="nama" class="form-control" type="text" value="" disabled>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-xs-3">Jenis Kelamin</label>
                        <div class="col-xs-8">
                          <input name="jenis_kelamin" class="form-control" type="text" value="" disabled>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-xs-3">No.Telp Pasien</label>
                        <div class="col-xs-8">
                          <input name="no_telp" class="form-control" type="text" value="" disabled>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-xs-3">Alamat Pasien</label>
                        <div class="col-xs-8">
                          <input name="kode" class="form-control" type="text" value="" disabled>
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
        </div>

      </div>