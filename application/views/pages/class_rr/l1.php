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
          <button type="button" class="btn btn-default" style="width: 140px">Lantai 1</button>
          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
            <span class="caret"></span>
          </button>
          <ul class="dropdown-menu" role="menu">
            <li><a class="dropdown-item active" href="<?= base_url() ?>ruangrawat/lantai1">Lantai 1</a></li>
            <li><a class="dropdown-item " href="<?= base_url() ?>ruangrawat/lantai2">Lantai 2</a></li>
            <li><a class="dropdown-item " href="<?= base_url() ?>ruangrawat/lantai3">Lantai 3</a></li>
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
          "url": "<?php echo site_url('RuangRawat/ajax_list_bed') ?>",
          "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [{
          "targets": [-1], //last column
          "orderable": false, //set not orderable
        }, ],

      });
    });
  </script>
  <div class="content">
    <div class="container-fluid">

      <div class="row">

      <?php foreach ($detail_ruangan as $key => $value) :?>
        <div class="col-md-6 col-xs-6">
          <div class="small-box bg-white">
            <div class="inner">
              <h4><?php echo $value->nama?></h4>
              <table class="table text-center">
                <tbody>
                  <tr>
                    
                    <td>
                      <div class="small-box bg-white">
                        <div class="inner">
                          <h4>Kelas 1</h4>
                          <table class="table text-center">
                            <tbody>
                              <tr>
                                <td>
                                  <a type="button" class="btn btn-block btn-danger" data-toggle="modal" data-target="#ruang_rawat_info">Bed 1</a>
                                </td>
                                </th>
                                <td>
                                  <a type="button" class="btn btn-block btn-danger" data-toggle="modal" data-target="#ruang_rawat_info">Bed 2</a>
                                </td>
                                </th>
                              </tr>
                              <tr>
                                <td>
                                  <a type="button" class="btn btn-block btn-success" data-toggle="modal" data-target="#ruang_rawat_info">Bed 3</a>
                                </td>
                                </th>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </td>
                    
                    <!-- <td>
                      <div class="small-box bg-white">
                        <div class="inner">
                          <h4>Kelas 2</h4>
                          <table class="table text-center">
                            <tbody>
                              <tr>
                                <td>
                                  <a type="button" class="btn btn-block btn-success" data-toggle="modal" data-target="#ruang_rawat_info">Bed 1</a>
                                </td>
                                </th>
                                <td>
                                  <a type="button" class="btn btn-block btn-danger" data-toggle="modal" data-target="#ruang_rawat_info">Bed 2</a>
                                </td>
                                </th>
                              </tr>
                              <tr>
                                <td>
                                  <a type="button" class="btn btn-block btn-danger" data-toggle="modal" data-target="#ruang_rawat_info">Bed 3</a>
                                </td>
                                </th>
                                <td>
                                  <a type="button" class="btn btn-block btn-danger" data-toggle="modal" data-target="#ruang_rawat_info">Bed 4</a>
                                </td>
                                </th>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </td> -->
                  </tr>
                  <!-- <td colspan="2">
                    <div class="small-box bg-white">
                      <div class="inner">
                        <h4>Kelas 3</h4>
                        <table class="table text-center">
                          <tbody>
                            <tr>
                              <td>
                                <a type="button" class="btn btn-block btn-success" data-toggle="modal" data-target="#ruang_rawat_info">Bed 1</a>
                              </td>
                              </th>
                              <td>
                                <a type="button" class="btn btn-block btn-success" data-toggle="modal" data-target="#ruang_rawat_info">Bed 2</a>
                              </td>
                              </th>
                              <td>
                                <a type="button" class="btn btn-block btn-success" data-toggle="modal" data-target="#ruang_rawat_info">Bed 3</a>
                              </td>
                              </th>
                            </tr>
                            <tr>
                              <td>
                                <a type="button" class="btn btn-block btn-danger" data-toggle="modal" data-target="#ruang_rawat_info">Bed 4</a>
                              </td>
                              </th>
                              <td>
                                <a type="button" class="btn btn-block btn-danger" data-toggle="modal" data-target="#ruang_rawat_info">Bed 5</a>
                              </td>
                              </th>
                              <td>
                                <a type="button" class="btn btn-block btn-danger" data-toggle="modal" data-target="#ruang_rawat_info">Bed 6</a>
                              </td>
                              </th>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </td> -->
                  </th>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <?php endforeach; ?>

        <div class="col-md-6 col-xs-6">
          <div class="small-box bg-white">
            <div class="inner">
              <h4>Ruang 102</h4>
              <table class="table text-center">
                <tbody>
                  <tr>
                    <td>
                      <div class="small-box bg-white">
                        <div class="inner">
                          <h4>Kelas 1</h4>
                          <table class="table text-center">
                            <tbody>
                              <tr>
                                <td>
                                  <a type="button" class="btn btn-block btn-danger" data-toggle="modal" data-target="#ruang_rawat_info">Bed 1</a>
                                </td>
                                </th>
                                <td>
                                  <a type="button" class="btn btn-block btn-danger" data-toggle="modal" data-target="#ruang_rawat_info">Bed 2</a>
                                </td>
                                </th>
                              </tr>
                              <tr>
                                <td>
                                  <a type="button" class="btn btn-block btn-success" data-toggle="modal" data-target="#ruang_rawat_info">Bed 3</a>
                                </td>
                                </th>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="small-box bg-white">
                        <div class="inner">
                          <h4>Kelas 2</h4>
                          <table class="table text-center">
                            <tbody>
                              <tr>
                                <td>
                                  <a type="button" class="btn btn-block btn-success" data-toggle="modal" data-target="#ruang_rawat_info">Bed 1</a>
                                </td>
                                </th>
                                <td>
                                  <a type="button" class="btn btn-block btn-success" data-toggle="modal" data-target="#ruang_rawat_info">Bed 2</a>
                                </td>
                                </th>
                              </tr>
                              <tr>
                                <td>
                                  <a type="button" class="btn btn-block btn-success" data-toggle="modal" data-target="#ruang_rawat_info">Bed 3</a>
                                </td>
                                </th>
                                <td>
                                  <a type="button" class="btn btn-block btn-danger" data-toggle="modal" data-target="#ruang_rawat_info">Bed 4</a>
                                </td>
                                </th>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <td colspan="2">
                    <div class="small-box bg-white">
                      <div class="inner">
                        <h4>Kelas 3</h4>
                        <table class="table text-center">
                          <tbody>
                            <tr>
                              <td>
                                <a type="button" class="btn btn-block btn-danger" data-toggle="modal" data-target="#ruang_rawat_info">Bed 1</a>
                              </td>
                              </th>
                              <td>
                                <a type="button" class="btn btn-block btn-success" data-toggle="modal" data-target="#ruang_rawat_info">Bed 2</a>
                              </td>
                              </th>
                              <td>
                                <a type="button" class="btn btn-block btn-success" data-toggle="modal" data-target="#ruang_rawat_info">Bed 3</a>
                              </td>
                              </th>
                            </tr>
                            <tr>
                              <td>
                                <a type="button" class="btn btn-block btn-danger" data-toggle="modal" data-target="#ruang_rawat_info">Bed 4</a>
                              </td>
                              </th>
                              <td>
                                <a type="button" class="btn btn-block btn-danger" data-toggle="modal" data-target="#ruang_rawat_info">Bed 5</a>
                              </td>
                              </th>
                              <td>
                                <a type="button" class="btn btn-block btn-danger" data-toggle="modal" data-target="#ruang_rawat_info">Bed 6</a>
                              </td>
                              </th>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </td>
                  </th>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 col-xs-6">
          <div class="small-box bg-white">
            <div class="inner">
              <h4>Ruang 103</h4>
              <table class="table text-center">
                <tbody>
                  <tr>
                    <td>
                      <div class="small-box bg-white">
                        <div class="inner">
                          <h4>Kelas 1</h4>
                          <table class="table text-center">
                            <tbody>
                              <tr>
                                <td>
                                  <a type="button" class="btn btn-block btn-danger" data-toggle="modal" data-target="#ruang_rawat_info">Bed 1</a>
                                </td>
                                </th>
                                <td>
                                  <a type="button" class="btn btn-block btn-danger" data-toggle="modal" data-target="#ruang_rawat_info">Bed 2</a>
                                </td>
                                </th>
                              </tr>
                              <tr>
                                <td>
                                  <a type="button" class="btn btn-block btn-danger" data-toggle="modal" data-target="#ruang_rawat_info">Bed 3</a>
                                </td>
                                </th>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="small-box bg-white">
                        <div class="inner">
                          <h4>Kelas 2</h4>
                          <table class="table text-center">
                            <tbody>
                              <tr>
                                <td>
                                  <a type="button" class="btn btn-block btn-success" data-toggle="modal" data-target="#ruang_rawat_info">Bed 1</a>
                                </td>
                                </th>
                                <td>
                                  <a type="button" class="btn btn-block btn-danger" data-toggle="modal" data-target="#ruang_rawat_info">Bed 2</a>
                                </td>
                                </th>
                              </tr>
                              <tr>
                                <td>
                                  <a type="button" class="btn btn-block btn-danger" data-toggle="modal" data-target="#ruang_rawat_info">Bed 3</a>
                                </td>
                                </th>
                                <td>
                                  <a type="button" class="btn btn-block btn-danger" data-toggle="modal" data-target="#ruang_rawat_info">Bed 4</a>
                                </td>
                                </th>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <td colspan="2">
                    <div class="small-box bg-white">
                      <div class="inner">
                        <h4>Kelas 3</h4>
                        <table class="table text-center">
                          <tbody>
                            <tr>
                              <td>
                                <a type="button" class="btn btn-block btn-danger" data-toggle="modal" data-target="#ruang_rawat_info">Bed 1</a>
                              </td>
                              </th>
                              <td>
                                <a type="button" class="btn btn-block btn-success" data-toggle="modal" data-target="#ruang_rawat_info">Bed 2</a>
                              </td>
                              </th>
                              <td>
                                <a type="button" class="btn btn-block btn-success" data-toggle="modal" data-target="#ruang_rawat_info">Bed 3</a>
                              </td>
                              </th>
                            </tr>
                            <tr>
                              <td>
                                <a type="button" class="btn btn-block btn-success" data-toggle="modal" data-target="#ruang_rawat_info">Bed 4</a>
                              </td>
                              </th>
                              <td>
                                <a type="button" class="btn btn-block btn-success" data-toggle="modal" data-target="#ruang_rawat_info">Bed 5</a>
                              </td>
                              </th>
                              <td>
                                <a type="button" class="btn btn-block btn-success" data-toggle="modal" data-target="#ruang_rawat_info">Bed 6</a>
                              </td>
                              </th>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </td>
                  </th>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-xs-6">
          <div class="small-box bg-white">
            <div class="inner">
              <h4>Ruang 104</h4>
              <table class="table text-center">
                <tbody>
                  <tr>
                    <td>
                      <div class="small-box bg-white">
                        <div class="inner">
                          <h4>Kelas 1</h4>
                          <table class="table text-center">
                            <tbody>
                              <tr>
                                <td>
                                  <a type="button" class="btn btn-block btn-success" data-toggle="modal" data-target="#ruang_rawat_info">Bed 1</a>
                                </td>
                                </th>
                                <td>
                                  <a type="button" class="btn btn-block btn-success" data-toggle="modal" data-target="#ruang_rawat_info">Bed 2</a>
                                </td>
                                </th>
                              </tr>
                              <tr>
                                <td>
                                  <a type="button" class="btn btn-block btn-success" data-toggle="modal" data-target="#ruang_rawat_info">Bed 3</a>
                                </td>
                                </th>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="small-box bg-white">
                        <div class="inner">
                          <h4>Kelas 2</h4>
                          <table class="table text-center">
                            <tbody>
                              <tr>
                                <td>
                                  <a type="button" class="btn btn-block btn-success" data-toggle="modal" data-target="#ruang_rawat_info">Bed 1</a>
                                </td>
                                </th>
                                <td>
                                  <a type="button" class="btn btn-block btn-danger" data-toggle="modal" data-target="#ruang_rawat_info">Bed 2</a>
                                </td>
                                </th>
                              </tr>
                              <tr>
                                <td>
                                  <a type="button" class="btn btn-block btn-danger" data-toggle="modal" data-target="#ruang_rawat_info">Bed 3</a>
                                </td>
                                </th>
                                <td>
                                  <a type="button" class="btn btn-block btn-danger" data-toggle="modal" data-target="#ruang_rawat_info">Bed 4</a>
                                </td>
                                </th>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <td colspan="2">
                    <div class="small-box bg-white">
                      <div class="inner">
                        <h4>Kelas 3</h4>
                        <table class="table text-center">
                          <tbody>
                            <tr>
                              <td>
                                <a type="button" class="btn btn-block btn-danger" data-toggle="modal" data-target="#ruang_rawat_info">Bed 1</a>
                              </td>
                              </th>
                              <td>
                                <a type="button" class="btn btn-block btn-danger" data-toggle="modal" data-target="#ruang_rawat_info">Bed 2</a>
                              </td>
                              </th>
                              <td>
                                <a type="button" class="btn btn-block btn-danger" data-toggle="modal" data-target="#ruang_rawat_info">Bed 3</a>
                              </td>
                              </th>
                            </tr>
                            <tr>
                              <td>
                                <a type="button" class="btn btn-block btn-danger" data-toggle="modal" data-target="#ruang_rawat_info">Bed 4</a>
                              </td>
                              </th>
                              <td>
                                <a type="button" class="btn btn-block btn-danger" data-toggle="modal" data-target="#ruang_rawat_info">Bed 5</a>
                              </td>
                              </th>
                              <td>
                                <a type="button" class="btn btn-block btn-danger" data-toggle="modal" data-target="#ruang_rawat_info">Bed 6</a>
                              </td>
                              </th>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </td>
                  </th>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

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
                        <input name="kode" class="form-control" type="text" placeholder="Kode ruangan..." disabled>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-xs-3">Status Ruangan</label>
                      <div class="col-xs-6">
                        <input name="status" class="form-control" type="text" placeholder="Status Ruangan..." disabled>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-8">
                    <div class="form-group">
                      <label class="control-label col-xs-3">No.Medrec</label>
                      <div class="col-xs-8">
                        <input name="nama_ruangan" class="form-control" type="text" placeholder="Status Ruangan..." disabled>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-xs-3">Nama Pasien</label>
                      <div class="col-xs-8">
                        <input name="nama_ruangan" class="form-control" type="text" placeholder="Status Ruangan..." disabled>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-xs-3">Jenis Kelamin</label>
                      <div class="col-xs-8">
                        <input name="nama_ruangan" class="form-control" type="text" placeholder="Status Ruangan..." disabled>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-xs-3">No.Telp Pasien</label>
                      <div class="col-xs-8">
                        <input name="nama_ruangan" class="form-control" type="text" placeholder="Status Ruangan..." disabled>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-xs-3">Alamat Pasien</label>
                      <div class="col-xs-8">
                        <input name="nama_ruangan" class="form-control" type="text" placeholder="Status Ruangan..." disabled>
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