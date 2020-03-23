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
              <button class="btn btn-primary btn-sm" onclick="add_ruangan()"> <i class="fas fa-plus"></i> &nbsp; Tambah Ruangan</button>
              <button class="btn btn-secondary btn-sm" onclick="reload_table()"> <i class="fas fa-sync"></i> &nbsp; Refresh</button>
              
              <table id="table" class="table table-bordered">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Kode</th>
                    <th>Kelas</th>
                    <th>Nama Ruangan</th>
                    <th>Status</th>
                    <th>Harga</th>
                    <th style="width: 150px">Action</th>
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
            "url": "<?php echo site_url('RuangRawat/ajax_list')?>",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ -1 ], //last column
            "orderable": false, //set not orderable
        },
        ],

    });
});

function add_ruangan()
{
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Tambah Ruangan'); // Set Title to Bootstrap modal title
}

function edit_ruangan(id)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('RuangRawat/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="kode"]').val(data.kode);
            $('[name="kelas"]').val(data.kelas);
            $('[name="nama"]').val(data.nama);
            $('[name="status"]').val(data.status);
            $('[name="harga"]').val(data.harga);
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Ruangan'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}

function reload_table()
{
    table.ajax.reload(null,false); //reload datatable ajax 
}

function save()
{
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    var url;

    if(save_method == 'add') {
        url = "<?php echo site_url('RuangRawat/ajax_add')?>";
    } else {
        url = "<?php echo site_url('RuangRawat/ajax_update')?>";
    }

    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#form').serialize(),
        dataType: "JSON",
        success: function(data)
        {

            if(data.status) //if success close modal and reload ajax table
            {
                $('#modal_form').modal('hide');
                reload_table();
            }

            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 


        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 

        }
    });
}

function delete_ruangan(id)
{
    if(confirm('Are you sure delete this data?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('ruangrawat/ajax_delete')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
                $('#modal_form').modal('hide');
                reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
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
                  <input type="hidden" value="" name="id"/>  
                  <div class="form-group">
                      <label class="control-label col-xs-3" >Kode Ruangan</label>
                      <div class="col-xs-8">
                        <input name="kode" class="form-control" type="text" placeholder="Kode ruangan...">
                      </div>
                    </div>
  
                    <div class="form-group">
                      <label class="control-label col-xs-3" >Kelas Ruangan</label>
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
                      <label class="control-label col-xs-3" >Nama Ruangan</label>
                      <div class="col-xs-8">
                        <input name="nama" class="form-control" type="text" placeholder="Nama Ruangan..." required>
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
                        <select name="status" class="form-control" required>
                          <option value="">-PILIH-</option>
                          <option value="ISI">ISI</option>
                          <option value="KOSONG">KOSONG</option>
                        </select>
                      </div>
                    </div>

                  </div>
  
                  <div class="modal-footer">
                    <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
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