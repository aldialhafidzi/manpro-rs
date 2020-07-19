<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">List Bed</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal_add" tabindex="-1" role="dialog" aria-labelledby="modal_addTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="<?= base_url() ?>bed/create" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Buat Bed</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="padding: 2rem;">
                        <div class="form-group row">
                            <label for="kode" class="col-3">Kode</label>
                            <input id="kode" name="kode" type="text" class="form-control form-control-sm col-9">
                        </div>
                        <div class="form-group row">
                            <label for="status" class="col-3">Status</label>
                            <input id="status" name="status" type="text" class="form-control form-control-sm col-9">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" id="bed_id" name="bed_id">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="button" class="btn" data-dismiss="modal">Kembali</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal_hapus" tabindex="-1" role="dialog" aria-labelledby="modal_hapusTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Hapus Bed</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="padding: 1rem;">
                    <div class="row mb-3">
                        <div class="col-12">
                            <p>Apa anda yakin akan menghapus data bed ini ? </p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <form action="<?= base_url() ?>bed/delete" method="POST">
                        <input type="hidden" id="delete_id" name="delete_id">
                        <button type="submit" class="btn">Konfirmasi</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
                    </form>
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
                            <button class="btn btn-primary btn-sm" onclick="initBuatBed()"> <i class="fas fa-plus"></i> &nbsp;Buat Bed Baru</button>
                            <button class="btn btn-secondary btn-sm" onclick="refresh()"> <i class="fas fa-sync"></i> &nbsp; Refresh</button>
                            <table id="tableBed" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Kode</th>
                                        <th>Nama Bed</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($beds as $key => $item) {
                                        $status = $item->status == 1 ? 'TERISI' : 'KOSONG';
                                        echo '
                                            <tr>
                                                <td class="text-center"> ' . ($key + 1) . '</td>
                                                <td class="text-uppercase">' . $item->kode . '</td>
                                                <td>' . $status  . '</td>
                                                <td style="text-align:center;">
                                                    <button value="' . $item->id . '" class="btn-hapusBed btn btn-sm btn-danger" onclick="deleteBed(' . $item->id . ')">
                                                        <i class="far fa-trash-alt"></i> &nbsp; Hapus
                                                    </button>
                                                    <a value="' . $item->id . '" class="btn-lihatBed btn btn-sm btn-info" href="' .base_url().'igd/bedigddetail/'.$item->id .'">
                                                        <i class="far fa-eye"></i> &nbsp; Lihat
                                                    </a>
                                                     <button value="' . $item->id . '" class="btn-lihatBed btn btn-sm btn-warning" onclick="goTO(' . $item->id . ')">
                                                        <i class="far fa-eye"></i> &nbsp; Daftar
                                                    </button>                                                   
                                                </td>
                                            </tr>';
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    $('#tableBed').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
    });

    function initBuatBed() {
        $('#exampleModalLongTitle').html('Buat Bed');
        $('#kode').val('');
        $('#status').val('');
        // $('#jenis').val('');
        // $('#harga').val('');
        $('#bed_id').val('');
        $('#modal_add').modal('show');
    }

    function refresh() {
        window.location.reload();
    }

    function deleteBed(id) {
        $('#delete_id').val(id);
        $('#modal_hapus').modal('show');
    }

    function goTO(id) {
        window.location.href = "<?= base_url() ?>pendaftaran/rawat-igd";
    }

    function showDetailBed(id) {
        $.ajax({
            url: `<?= base_url() ?>bed/get?bed_id=${id}`,
            type: 'GET',
            dataType: 'JSON',
            success: function(data) {
                $('#exampleModalLongTitle').html('Update Bed');
                $('#kode').val(data.kode);
                $('#status').val(data.status == 1 ? 'TERISI': 'KOSONG');
                // $('#jenis').val(data.jenis);
                // $('#harga').val(data.harga);
                $('#bed_id').val(data.id);
                $('#modal_add').modal('show');
            },
            error: function(err) {}
        });
    }
</script>