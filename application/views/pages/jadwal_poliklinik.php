<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Jadwal Poliklinik</h1>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="modal_add" tabindex="-1" role="dialog" aria-labelledby="modal_addTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="<?= base_url() ?>jadwal-poliklinik/create" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Buat Jadwal Poliklinik</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="padding: 2rem;">
                        <div class="form-group row">

                            <label for="poli_id" class="col-3">Poliklinik</label>
                            <select name="poli_id" id="poli_id" class="form-control form-control-sm col-9">
                                <?php foreach ($polikliniks as $key => $item) {
                                    echo '<option value="' . $item->id . '">' . $item->nama . '</option>';
                                } ?>
                            </select>
                        </div>
                        <div class="form-group row">

                            <label for="dokter_id" class="col-3">Dokter</label>
                            <select name="dokter_id" id="dokter_id" class="form-control form-control-sm col-9">
                                <?php foreach ($dokters as $key => $item) {
                                    echo '<option value="' . $item->id . '">' . $item->nama . '</option>';
                                } ?>
                            </select>
                        </div>
                        <div class="form-group row">
                            <label for="jam_awal" class="col-3">Jam Awal</label>
                            <input id="jam_awal" name="jam_awal" type="time" class="form-control form-control-sm col-9">
                        </div>
                        <div class="form-group row">
                            <label for="jam_akhir" class="col-3">Jam Akhir</label>
                            <input id="jam_akhir" name="jam_akhir" type="time" class="form-control form-control-sm col-9">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" id="jadwal_id" name="jadwal_id">
                        <input type="hidden" id="perawat_id" name="perawat_id" value="1">
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
                    <h5 class="modal-title" id="exampleModalLongTitle">Hapus Jadwal Poliklinik</h5>
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
                    <form action="<?= base_url() ?>jadwal-poliklinik/delete" method="POST">
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
                            <button class="btn btn-primary btn-sm" onclick="initBuatJadwalPoliklinik()"> <i class="fas fa-plus"></i> &nbsp;Buat Jadwal Poliklinik Baru</button>
                            <button class="btn btn-secondary btn-sm" onclick="refresh()"> <i class="fas fa-sync"></i> &nbsp; Refresh</button>
                            <table id="tableJadwalPoliklinik" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Polikinik</th>
                                        <th>Dokter</th>
                                        <th>Jam Awal</th>
                                        <th>Jam Akhir</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($jadwalPolikliniks as $key => $item) {
                                        echo '
                                            <tr>
                                                <td class="text-center"> ' . ($key + 1) . '</td>
                                                <td class="text-uppercase">' . $item->poliklinik->nama . '</td>
                                                <td>' . $item->dokter->nama . '</td>
                                                <td>' . $item->jam_awal . '</td>
                                                <td>' . $item->jam_akhir . '</td>
                                                <td style="width:160px;text-align:center;">
                                                    <button value="' . $item->id . '" class="btn-hapusJadwalPoliklinik btn btn-sm btn-danger" onclick="deleteJadwalPoliklinik(' . $item->id . ')">
                                                        <i class="far fa-trash-alt"></i> &nbsp; Hapus
                                                    </button>
                                                    <button value="' . $item->id . '" class="btn-lihatJadwalPoliklinik btn btn-sm btn-info" onclick="showDetailJadwalPoliklinik(' . $item->id . ')">
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
    $('#tableJadwalPoliklinik').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
    });

    function initBuatJadwalPoliklinik() {
        $('#exampleModalLongTitle').html('Buat JadwalPoliklinik');
        $('#kode').val('');
        $('#nama').val('');
        $('#lokasi').val('');
        $('#jadwal_id').val('');
        $('#modal_add').modal('show');
    }

    function refresh() {
        window.location.reload();
    }

    function deleteJadwalPoliklinik(id) {
        $('#delete_id').val(id);
        $('#modal_hapus').modal('show');
    }

    function showDetailJadwalPoliklinik(id) {
        $.ajax({
            url: `<?= base_url() ?>jadwal-poliklinik/get?jadwal_id=${id}`,
            type: 'GET',
            dataType: 'JSON',
            success: function(data) {
                $('#exampleModalLongTitle').html('Update Jadwal Poliklinik');
                $('#poli_id').val(data.poli_id);
                $('#dokter_id').val(data.dokter_id);
                $('#jam_awal').val(data.jam_awal);
                $('#jam_akhir').val(data.jam_akhir);
                $('#jadwal_id').val(data.id);
                $('#modal_add').modal('show');
            },
            error: function(err) {}
        });
    }
</script>