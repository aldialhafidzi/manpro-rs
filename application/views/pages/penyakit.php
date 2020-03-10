<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">List Penyakit</h1>
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
                            <button class="btn btn-primary btn-sm"> <i class="fas fa-plus"></i> &nbsp;Buat Penyakit Baru</button>
                            <button class="btn btn-secondary btn-sm"> <i class="fas fa-sync"></i> &nbsp; Refresh</button>
                            <table id="tablePenyakit" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Kode</th>
                                        <th>Nama Penyakit</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($penyakits as $key => $item) {
                                        echo '
                                            <tr>
                                                <td> ' . ($key + 1) . '</td>
                                                <td class="text-uppercase">' . $item->kode . '</td>
                                                <td>' . $item->nama . '</td>
                                                <td>' . $item->created_at . '</td>
                                                <td style="width:160px;text-align:center;">
                                                    <button value="' . $item->id . '" class="btn-hapusPenyakit btn btn-sm btn-danger">
                                                        <i class="far fa-trash-alt"></i> &nbsp; Hapus
                                                    </button>
                                                    <button value="' . $item->id . '" class="btn-lihatPenyakit btn btn-sm btn-info">
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
    $('#tablePenyakit').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
    });
</script>