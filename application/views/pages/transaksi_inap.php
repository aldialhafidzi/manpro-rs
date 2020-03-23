<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0 text-dark title-warning"> <i class="fas fa-procedures nav-icon nav-icon"></i> &nbsp; Transaksi Inap</h5>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body table-responsive">
                            <table id="tableRekamInap" class="table table-hover text-nowrap table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>No. MR</th>
                                        <th>Nama</th>
                                        <th>No. Telp</th>
                                        <th>Kecamatan</th>
                                        <th>Kelurahan</th>
                                        <th>RT</th>
                                        <th>RW</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_hapus" tabindex="-1" role="dialog" aria-labelledby="modal_hapusTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Hapus Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="padding: 1rem;">
                <div class="row mb-3">
                    <div class="col-12">
                        <p>Apa anda yakin akan menghapus data rekam medis ini ? </p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <form action="<?= base_url() ?>rekam-medis/delete" method="POST">
                    <input type="hidden" id="delete_id" name="delete_id">
                    <button type="submit" class="btn">Konfirmasi</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_rekam_inap" tabindex="-1" role="dialog" aria-labelledby="modal_rekam_inapTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Rincian Transaksi Medis</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="padding: 1rem;">
                <div class="row mb-3">
                    <div class="col-6">
                        <div class="form-group row">
                            <label for="" class="col-5">No. Transaksi Medis</label>
                            <input disabled id="no_mr" name="no_mr" type="text" class="form-control form-control-sm col-7">
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-5">Nama</label>
                            <input disabled id="nama" name="nama" type="text" class="form-control form-control-sm col-7">
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-5">Tanggal Lahir</label>
                            <input disabled id="tanggal_lahir" name="tanggal_lahir" type="text" class="form-control form-control-sm col-7">
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group row">
                            <label for="" class="col-4">No Telp</label>
                            <input disabled id="no_telp" name="no_telp" type="text" class="form-control form-control-sm col-8">
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-4">Kelurahan</label>
                            <input disabled id="kelurahan" name="kelurahan" type="text" class="form-control form-control-sm col-8">
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-4">RT/RW</label>
                            <input disabled id="rt" name="rt" type="text" class="form-control form-control-sm col-3"> &nbsp;/&nbsp;
                            <input disabled id="rw" name="rw" type="text" class="form-control form-control-sm col-3">
                        </div>

                    </div>
                </div>
                <table id="table_rincian_rm" class="table table-bordered mt-5">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Tanggal</td>
                            <td>Dokter</td>
                            <td>Rawat</td>
                            <td>Diagnosa</td>
                        </tr>
                    </thead>
                    <tbody id="rincian_rekam_medis">

                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                <button disabled type="button" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>

<script>
    function hapusRekamMedisPasienByID(id) {
        $('#modal_hapus').modal('show');
        $('#delete_id').val(id);
    }

    function showRekamMedisByPasienID(id) {
        $(".app").loading();
        $.ajax({
            url: '<?= base_url() ?>transaksi/find',
            type: 'GET',
            dataType: 'JSON',
            data: {
                pasien_id: id,
                jenis_rawat: 'RAWAT-INAP'
            },
            success: function(data) {
                $(".app").loading('stop');
                var html = '';
                var ex_data = null;
                data.forEach((element, i) => {
                    if (!ex_data) {
                        ex_data = element;
                    }
                    let nama_dokter = element.nama_dokter ? element.nama_dokter : '';
                    let jenis_rawat = element.jenis_rawat === 'RAWAT-JALAN' ? 'Jalan' : 'Inap';
                    html = html + `
                        <tr>
                            <td class="text-center" width="5%">${i + 1}</td>
                            <td width="20%">${moment(element.tgl_rekam).format('D/MM/YYYY')}</td>
                            <td width="35%">${nama_dokter}</td>
                            <td class="text-center" width="5%">${jenis_rawat}</td>
                            <td width="40%">${element.diagnosa}</td>
                        </tr>`
                });
                $('#rincian_rekam_medis').html(html);
                $('#no_mr').val(ex_data.no_mr);
                $('#nama').val(ex_data.nama);
                $('#no_telp').val(ex_data.no_telp);
                $('#tanggal_lahir').val(ex_data.tanggal_lahir);
                $('#kelurahan').val(ex_data.kelurahan);
                $('#rw').val(ex_data.rw);
                $('#rt').val(ex_data.rt);
                $('#modal_rekam_inap').modal('show');

            },
            error: function(err) {
                toastr.error("Oops! Pasien gagal didaftarkan");
                $(".app").loading('stop');
            }
        });
    }
    $('#tableRekamInap').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
            "url": '<?= base_url() ?>transaksi/transaksi-inap-all',
            "type": "POST",
        },
    });
</script>