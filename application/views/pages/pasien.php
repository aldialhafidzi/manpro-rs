<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">List Pasien</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal_add" tabindex="-1" role="dialog" aria-labelledby="modal_addTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <form action="<?= base_url() ?>pasien/create" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Buat Pasien</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="padding: 2rem;">
                        <div class="row">
                            <div class="col col-6" style="padding:1rem;">
                                <h5>Data Pasien</h5>
                                <hr>
                                <div class="form-group row">
                                    <label for="no_mr" class="col-3">No. Mr</label>
                                    <input id="no_mr" name="no_mr" type="text" class="form-control form-control-sm col-9">
                                </div>
                                <div class="form-group row">
                                    <label for="tipe_id" class="col-3">Tipe Pasien</label>
                                    <select name="tipe_id" id="tipe_id" class="form-control form-control-sm col-9">
                                        <?php
                                        foreach ($categories as $key => $pas) {
                                            echo '<option value="' . $pas->id . '">' . $pas->nama . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <label for="no_asuransi" class="col-3">No. Asuransi</label>
                                    <input id="no_asuransi" name="no_asuransi" type="text" class="form-control form-control-sm col-9">
                                </div>
                                <div class="form-group row">
                                    <label for="nik" class="col-3">NIK</label>
                                    <input id="nik" name="nik" type="text" class="form-control form-control-sm col-9">
                                </div>
                                <div class="form-group row">
                                    <label for="nama" class="col-3">Nama</label>
                                    <input id="nama" name="nama" type="text" class="form-control form-control-sm col-9">
                                </div>
                                <div class="form-group row">
                                    <label for="jenis_kelamin" class="col-3">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control form-control-sm col-9">
                                        <option value="L">Laki - Laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div>

                                <div class="form-group row">
                                    <label for="no_telp" class="col-3">No. Telp</label>
                                    <input id="no_telp" name="no_telp" type="text" class="form-control form-control-sm col-9">
                                </div>
                                <div class="form-group row">
                                    <label for="kota" class="col-3">Kota</label>
                                    <input id="kota" name="kota" type="text" class="form-control form-control-sm col-9">
                                </div>
                                <div class="form-group row">
                                    <label for="kecamatan" class="col-3">Kecamatan</label>
                                    <input id="kecamatan" name="kecamatan" type="text" class="form-control form-control-sm col-9">
                                </div>
                                <div class="form-group row">
                                    <label for="kelurahan" class="col-3">Kelurahan</label>
                                    <input id="kelurahan" name="kelurahan" type="text" class="form-control form-control-sm col-9">
                                </div>
                                <div class="form-group row">
                                    <label for="rt" class="col-3">RT</label>
                                    <input id="rt" name="rt" type="text" class="form-control form-control-sm col-9">
                                </div>
                                <div class="form-group row">
                                    <label for="rw" class="col-3">RW</label>
                                    <input id="rw" name="rw" type="text" class="form-control form-control-sm col-9">
                                </div>
                            </div>

                            <div class="col col-6" style="padding:1rem;">
                                <h5>Data Penanggung Jawab</h5>
                                <hr>
                                <div class="form-group row">
                                    <label for="nama_pj" class="col-3">Nama</label>
                                    <input id="nama_pj" name="nama_pj" type="text" class="form-control form-control-sm col-9">
                                </div>
                                <div class="form-group row">
                                    <label for="no_telp_pj" class="col-3">No. Telepon</label>
                                    <input id="no_telp_pj" name="no_telp_pj" type="text" class="form-control form-control-sm col-9">
                                </div>
                                <div class="form-group row">
                                    <label for="nik_pj" class="col-3">NIK</label>
                                    <input id="nik_pj" name="nik_pj" type="text" class="form-control form-control-sm col-9">
                                </div>
                                <div class="form-group row">
                                    <label for="hubungan_pj" class="col-3">Hubungan</label>
                                    <input id="hubungan_pj" name="hubungan_pj" type="text" class="form-control form-control-sm col-9">
                                </div>
                                <div class="form-group row">
                                    <label for="kota_pj" class="col-3">Kota</label>
                                    <input id="kota_pj" name="kota_pj" type="text" class="form-control form-control-sm col-9">
                                </div>
                                <div class="form-group row">
                                    <label for="kecamatan_pj" class="col-3">Kecamatan</label>
                                    <input id="kecamatan_pj" name="kecamatan_pj" type="text" class="form-control form-control-sm col-9">
                                </div>
                                <div class="form-group row">
                                    <label for="kelurahan_pj" class="col-3">Kelurahan</label>
                                    <input id="kelurahan_pj" name="kelurahan_pj" type="text" class="form-control form-control-sm col-9">
                                </div>
                                <div class="form-group row">
                                    <label for="rt_pj" class="col-3">RT</label>
                                    <input id="rt_pj" name="rt_pj" type="text" class="form-control form-control-sm col-9">
                                </div>
                                <div class="form-group row">
                                    <label for="rw_pj" class="col-3">RW</label>
                                    <input id="rw_pj" name="rw_pj" type="text" class="form-control form-control-sm col-9">
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <input type="hidden" id="pasien_id" name="pasien_id">
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
                    <h5 class="modal-title" id="exampleModalLongTitle">Hapus Pasien</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="padding: 1rem;">
                    <div class="row mb-3">
                        <div class="col-12">
                            <p>Apa anda yakin akan menghapus data pasien ini ? </p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <form action="<?= base_url() ?>pasien/delete" method="POST">
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
                            <!-- <button class="btn btn-primary btn-sm" onclick="initBuatPasien()" data-toggle="modal" data-target="#modal_pasien"> <i class="fas fa-plus"></i> &nbsp; Buat Pasien Baru</button> -->
                            <button class="btn btn-secondary btn-sm" onclick="refresh()"> <i class="fas fa-sync"></i> &nbsp; Refresh</button>
                            <table id="tablePasien" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>No. MR</th>
                                        <th>Nama</th>
                                        <th>No. Telp</th>
                                        <th>Kecamatan</th>
                                        <th>Kelurahan</th>
                                        <th>RT/RW</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($pasiens as $key => $pasien) {
                                        echo '
                                            <tr>
                                                <td class="text-center"> ' . ($key + 1) . '</td>
                                                <td>' . $pasien->no_mr . '</td>
                                                <td>' . $pasien->nama . '</td>
                                                <td>' . $pasien->no_telp . '</td>
                                                <td>' . $pasien->kecamatan . '</td>
                                                <td>' . $pasien->kelurahan . '</td>
                                                <td class="text-center">' . $pasien->rt . $pasien->rw . '</td>
                                                <td style="width:160px;text-align:center;">
                                                    <button value="' . $pasien->id . '" class="btn-hapusPasien btn btn-sm btn-danger" onclick="deletePasien(' . $pasien->id . ')">
                                                        <i class="far fa-trash-alt"></i> &nbsp; Hapus
                                                    </button>
                                                    <button value="' . $pasien->id . '" class="btn-lihatPasien btn btn-sm btn-info" onclick="showDetailPasien(' . $pasien->id . ')">
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

<div class="modal fade" id="modal_pasien" tabindex="-1" role="dialog" aria-labelledby="modal_pasienTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Pendaftaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row form-group">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                <button type="button" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>

<script>
    $('#tablePasien').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
    });


    function initBuatPasien() {
        $('#exampleModalLongTitle').html('Buat Pasien');
        $('#no_mr').val('');
        $('#nama').val('');
        $('#jenis_kelamin').val('');
        $('#no_telp').val('');
        $('#pasien_id').val('');
        $('#modal_add').modal('show');
    }

    function refresh() {
        window.location.reload();
    }

    function deletePasien(id) {
        $('#delete_id').val(id);
        $('#modal_hapus').modal('show');
    }

    function showDetailPasien(id) {
        $.ajax({
            url: `<?= base_url() ?>pasien/get?pasien_id=${id}`,
            type: 'GET',
            dataType: 'JSON',
            success: function(data) {
                $('#exampleModalLongTitle').html('Update Pasien');
                $('#no_mr').val(data.no_mr);
                $('#nik').val(data.nik);
                $('#tipe_id').val(data.tipe_id);
                $('#no_asuransi').val(data.no_asuransi);
                $('#nama').val(data.nama);
                $('#no_telp').val(data.no_telp);
                $('#jenis_kelamin').val(data.jenis_kelamin);
                $('#kota').val(data.kota);
                $('#kecamatan').val(data.kecamatan);
                $('#kelurahan').val(data.kelurahan);
                $('#rt').val(data.rt);
                $('#rw').val(data.rw);
                $('#nama_pj').val(data.nama_pj);
                $('#nik_pj').val(data.nik_pj);
                $('#no_telp_pj').val(data.no_telp_pj);
                $('#hubungan_pj').val(data.hubungan_pj);
                $('#kota_pj').val(data.kota_pj);
                $('#kecamatan_pj').val(data.kecamatan_pj);
                $('#kelurahan_pj').val(data.kelurahan_pj);
                $('#rt_pj').val(data.rt_pj);
                $('#rw_pj').val(data.rw_pj);
                $('#pasien_id').val(data.id);
                $('#modal_add').modal('show');
            },
            error: function(err) {}
        });
    }
</script>