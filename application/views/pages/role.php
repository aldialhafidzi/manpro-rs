<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">List Role</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal_add" tabindex="-1" role="dialog" aria-labelledby="modal_addTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="<?= base_url() ?>role/create" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Buat Role</h5>
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
                            <label for="nameRole" class="col-3">Nama</label>
                            <input id="nameRole" name="nameRole" type="text" class="form-control form-control-sm col-9">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" id="role_id" name="role_id">
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
                    <h5 class="modal-title" id="exampleModalLongTitle">Hapus Role</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="padding: 1rem;">
                    <div class="row mb-3">
                        <div class="col-12">
                            <p>Apa anda yakin akan menghapus data role ini ? </p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <form action="<?= base_url() ?>role/delete" method="POST">
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
                            <button class="btn btn-primary btn-sm" onclick="initBuatRole()"> <i class="fas fa-plus"></i> &nbsp;Buat Role Baru</button>
                            <button class="btn btn-secondary btn-sm" onclick="refresh()"> <i class="fas fa-sync"></i> &nbsp; Refresh</button>
                            <table id="tableRole" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Kode</th>
                                        <th>Nama Role</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($roles as $key => $item) {
                                        echo '
                                            <tr>
                                                <td class="text-center"> ' . ($key + 1) . '</td>
                                                <td class="text-uppercase">' . $item->kode . '</td>
                                                <td>' . $item->name . '</td>
                                                <td>' . $item->created_at . '</td>
                                                <td style="width:160px;text-align:center;">
                                                    <button value="' . $item->id . '" class="btn-hapusRole btn btn-sm btn-danger" onclick="deleteRole(' . $item->id . ')">
                                                        <i class="far fa-trash-alt"></i> &nbsp; Hapus
                                                    </button>
                                                    <button value="' . $item->id . '" class="btn-lihatRole btn btn-sm btn-info" onclick="showDetailRole(' . $item->id . ')">
                                                        <i class="far fa-eye"></i> &nbsp; Lihat
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
    $('#tableRole').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
    });

    function initBuatRole() {
        $('#exampleModalLongTitle').html('Buat Role');
        $('#kode').val('');
        $('#nameRole').val('');
        $('#role_id').val('');
        $('#modal_add').modal('show');
    }

    function refresh() {
        window.location.reload();
    }

    function deleteRole(id) {
        $('#delete_id').val(id);
        $('#modal_hapus').modal('show');
    }

    function showDetailRole(id) {
        $.ajax({
            url: `<?= base_url() ?>role/get?role_id=${id}`,
            type: 'GET',
            dataType: 'JSON',
            success: function(data) {
                $('#exampleModalLongTitle').html('Update Role');
                $('#kode').val(data.kode);
                $('#nameRole').val(data.name);
                $('#role_id').val(data.id);
                $('#modal_add').modal('show');
            },
            error: function(err) {}
        });
    }
</script>