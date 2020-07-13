<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">List Poliklinik</h1>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="modal_add" tabindex="-1" role="dialog" aria-labelledby="modal_addTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="<?= base_url() ?>poliklinik/create" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Buat Poliklinik</h5>
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
                            <label for="nama" class="col-3">Nama</label>
                            <input id="nama" name="nama" type="text" class="form-control form-control-sm col-9">
                        </div>
                        <div class="form-group row">
                            <label for="lokasi" class="col-3">Lokasi</label>
                            <textarea id="lokasi" name="lokasi" type="text" class="form-control form-control-sm col-9"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" id="poliklinik_id" name="poliklinik_id">
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
                    <h5 class="modal-title" id="exampleModalLongTitle">Hapus Poliklinik</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="padding: 1rem;">
                    <div class="row mb-3">
                        <div class="col-12">
                            <p>Apa anda yakin akan menghapus data poliklinik ini ? </p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <form action="<?= base_url() ?>poliklinik/delete" method="POST">
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
                            <button class="btn btn-primary btn-sm" onclick="initBuatPoliklinik()"> <i class="fas fa-plus"></i> &nbsp;Buat Poliklinik Baru</button>
                            <button class="btn btn-secondary btn-sm" onclick="refresh()"> <i class="fas fa-sync"></i> &nbsp; Refresh</button>
                            <table id="tablePoliklinik" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Kode</th>
                                        <th>Nama Poli</th>
                                        <th>Lokasi</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($polikliniks as $key => $poli) {
                                        echo '
                                            <tr>
                                                <td class="text-center"> ' . ($key + 1) . '</td>
                                                <td class="text-uppercase">' . $poli->kode . '</td>
                                                <td>' . $poli->nama . '</td>
                                                <td>' . $poli->lokasi . '</td>
                                                <td>' . $poli->created_at . '</td>
                                                <td style="width:160px;text-align:center;">
                                                    <button value="' . $poli->id . '" class="btn-hapusPoliklinik btn btn-sm btn-danger" onclick="deletePoliklinik(' . $poli->id . ')">
                                                        <i class="far fa-trash-alt"></i> &nbsp; Hapus
                                                    </button>
                                                    <button value="' . $poli->id . '" class="btn-lihatPoliklinik btn btn-sm btn-info" onclick="showDetailPoliklinik(' . $poli->id . ')">
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
    $('#tablePoliklinik').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
    });

    function initBuatPoliklinik() {
        $('#exampleModalLongTitle').html('Buat Poliklinik');
        $('#kode').val('');
        $('#nama').val('');
        $('#lokasi').val('');
        $('#poliklinik_id').val('');
        $('#modal_add').modal('show');
    }

    function refresh() {
        window.location.reload();
    }

    function deletePoliklinik(id) {
        $('#delete_id').val(id);
        $('#modal_hapus').modal('show');
    }

    function showDetailPoliklinik(id) {
        $.ajax({
            url: `<?= base_url() ?>poliklinik/get?poliklinik_id=${id}`,
            type: 'GET',
            dataType: 'JSON',
            success: function(data) {
                $('#exampleModalLongTitle').html('Update Poliklinik');
                $('#kode').val(data.kode);
                $('#nama').val(data.nama);
                $('#lokasi').val(data.lokasi);
                $('#poliklinik_id').val(data.id);
                $('#modal_add').modal('show');
            },
            error: function(err) {}
        });
    }
</script>