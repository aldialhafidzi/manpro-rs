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

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_pasien"> <i class="fas fa-plus"></i> &nbsp; Buat Pasien Baru</button>
                            <button class="btn btn-secondary btn-sm"> <i class="fas fa-sync"></i> &nbsp; Refresh</button>
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
                                                    <button value="' . $pasien->id . '" class="btn-hapusPasien btn btn-sm btn-danger">
                                                        <i class="far fa-trash-alt"></i> &nbsp; Hapus
                                                    </button>
                                                    <button value="' . $pasien->id . '" class="btn-lihatPasien btn btn-sm btn-info">
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
</script>