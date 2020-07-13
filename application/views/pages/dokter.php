<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">List Dokter</h1>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="modal_add" tabindex="-1" role="dialog" aria-labelledby="modal_addTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="<?= base_url() ?>dokter/create" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Buat Dokter</h5>
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
                            <label for="specialization" class="col-3">Spesialisasi</label>
                            <select name="specialization" id="specialization" class="form-control form-control-sm col-9">
                                <?php foreach ($specializations as $key => $spec) {
                                    echo '<option value="' . $spec->id . '">' . $spec->nama . '</option>';
                                } ?>
                            </select>
                        </div>
                        <div class="form-group row">
                            <label for="jenis_kelamin" class="col-3">Jenis Kelamin</label>
                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control form-control-sm col-9">
                                <option value="L">Laki - Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group row">
                            <label for="alamat" class="col-3">Alamat</label>
                            <textarea id="alamat" name="alamat" type="text" class="form-control form-control-sm col-9"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" id="dokter_id" name="dokter_id">
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
                    <h5 class="modal-title" id="exampleModalLongTitle">Hapus Dokter</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="padding: 1rem;">
                    <div class="row mb-3">
                        <div class="col-12">
                            <p>Apa anda yakin akan menghapus data dokter ini ? </p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <form action="<?= base_url() ?>dokter/delete" method="POST">
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
                            <button class="btn btn-primary btn-sm" onclick="initBuatDokter()"> <i class="fas fa-plus"></i> &nbsp; Buat Dokter Baru</button>
                            <button class="btn btn-secondary btn-sm" onclick="refresh()"> <i class="fas fa-sync"></i> &nbsp; Refresh</button>
                            <table id="tableDokter" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Kode</th>
                                        <th>Nama</th>
                                        <th>No. Telp</th>
                                        <th>Poli</th>
                                        <th>Spec</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($dokters as $key => $doktr) {
                                        echo '
                                            <tr>
                                                <td class="text-center"> ' . ($key + 1) . '</td>
                                                <td>' . $doktr->kode . '</td>
                                                <td>' . $doktr->nama . '</td>
                                                <td>' . $doktr->no_telp . '</td>
                                                <td>' . $doktr->poliklinik->nama . '</td>
                                                <td class="text-uppercase">' . $doktr->specialization->nama . '</td>
                                                <td style="width:160px;text-align:center;">
                                                    <button value="' . $doktr->id . '" class="btn-hapusDokter btn btn-sm btn-danger" onclick="deleteDokter(' . $doktr->id . ')">
                                                        <i class="far fa-trash-alt"></i> &nbsp; Hapus
                                                    </button>
                                                    <button value="' . $doktr->id . '" class="btn-lihatDokter btn btn-sm btn-info" onclick="showDetailDokter(' . $doktr->id . ')">
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
    $('#tableDokter').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
    });


    function initBuatDokter() {
        $('#modal_add').modal('show');
        $('#exampleModalLongTitle').html('Buat Dokter');
        $('#kode').val('');
        $('#specialization').val('');
        $('#nama').val('');
        $('#jenis_kelamin').val('');
        $('#no_telp').val('');
        $('#alamat').val('');
        $('#dokter_id').val('');
    }

    function refresh() {
        window.location.reload();
    }

    function deleteDokter(id) {
        $('#delete_id').val(id);
        $('#modal_hapus').modal('show');
    }

    function showDetailDokter(id) {
        $.ajax({
            url: `<?= base_url() ?>dokter/get?dokter_id=${id}`,
            type: 'GET',
            dataType: 'JSON',
            success: function(data) {
                $('#exampleModalLongTitle').html('Update Dokter');
                $('#kode').val(data.kode);
                $('#specialization').val(data.spec_id);
                $('#nama').val(data.nama);
                $('#jenis_kelamin').val(data.jenis_kelamin);
                $('#no_telp').val(data.no_telp);
                $('#alamat').val(data.alamat);
                $('#dokter_id').val(data.id);
                $('#modal_add').modal('show');
            },
            error: function(err) {}
        });
    }
</script>