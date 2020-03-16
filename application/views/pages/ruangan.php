<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">List Ruangan</h1>
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
                            <button class="btn btn-primary btn-sm"> <i class="fas fa-plus"></i> &nbsp;Buat Ruangan Baru</button>
                            <button class="btn btn-secondary btn-sm"> <i class="fas fa-sync"></i> &nbsp; Refresh</button>
                            <table id="tableRuangan" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Kode</th>
                                        <th>Kelas</th>
                                        <th>Nama Ruangan</th>
                                        <th>Status</th>
                                        <th>Harga</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($ruangans as $key => $item) {
                                        echo '
                                            <tr>
                                                <td> ' . ($key + 1) . '</td>
                                                <td class="text-uppercase">' . $item->kode . '</td>
                                                <td>' . $item->kelas . '</td>
                                                <td>' . $item->nama . '</td>
                                                <td>' . $item->status . '</td>
                                                <td>Rp.' . $item->harga . '</td>
                                                <td style="width:100px;text-align:center;">
                                                    <button value="' . $item->id . '" class="btn-lihatRuangan btn btn-sm btn-info">
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
    $('#tableRuangan').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
    });
</script>