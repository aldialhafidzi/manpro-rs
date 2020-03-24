<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0 text-dark title-primary"> <i class="fas fa-ambulance nav-icon"></i> &nbsp; Transaksi Jalan</h5>
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
                            <table id="tableRekamJalan" class="table table-hover text-nowrap table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>No. Bill</th>
                                        <th>No. MR</th>
                                        <th>Nama</th>
                                        <th>No. Telp</th>
                                        <th>Total Tarif</th>
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

<div class="modal fade" id="modal_rekam_jalan" tabindex="-1" role="dialog" aria-labelledby="modal_rekam_jalanTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Rincian Transaksi Rajal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="padding: 1rem;">
                <div class="row mb-3">
                    <div class="col-6">
                        <div class="form-group row">
                            <div class="col-5">
                                Status
                            </div>
                            <div class="col-7 pl-0">
                                <span id="status_transaksi" class="badge badge-info">REGISTERED</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-5">No. Transaksi</label>
                            <input disabled id="no_bill" name="no_bill" type="text" class="form-control form-control-sm col-7">
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-5">Tanggal Transaksi</label>
                            <input disabled id="tanggal_transaksi" name="tanggal_transaksi" type="text" class="form-control form-control-sm col-7">
                        </div>

                        <hr>

                        <div class="form-group row">
                            <label for="" class="col-5">Poliklinik</label>
                            <input disabled id="nama-poliklinik" name="nama-poliklinik" type="text" class="form-control form-control-sm col-7">
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-5">Dokter</label>
                            <input disabled id="nama-dokter" name="nama-dokter" type="text" class="form-control form-control-sm col-7">
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-5">Tarif Dokter</label>
                            <input disabled id="tarif-dokter" name="tarif-dokter" type="text" class="form-control form-control-sm col-7">
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-5">Pendaftaran</label>
                            <input disabled id="tarif-pendaftaran" name="tarif-pendaftaran" type="text" class="form-control form-control-sm col-7">
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group row">
                            <label for="" class="col-4">No. MR</label>
                            <input disabled id="no_mr" name="no_mr" type="text" class="form-control form-control-sm col-8">
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-4">Nama</label>
                            <input disabled id="nama" name="nama" type="text" class="form-control form-control-sm col-8">
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-4">Tanggal Lahir</label>
                            <input disabled id="tanggal_lahir" name="tanggal_lahir" type="text" class="form-control form-control-sm col-8">
                        </div>
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
                <hr>
                <p class="text-bold">Rincian Biaya</p>
                <table id="table_obat" class="table table-sm table-bordered mt-2">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Kode</td>
                            <td>Obat</td>
                            <td>Qty</td>
                            <td>Harga</td>
                            <td>Subtotal</td>
                        </tr>
                    </thead>
                    <tbody id="t_body_obat"></tbody>
                    <tfoot>
                        <tr>
                            <td colspan="5" class="text-center text-bold">Total Obat</td>
                            <td id="total_obat" class="text-bold text-right">IDR ,-</td>
                        </tr>
                    </tfoot>
                </table>
                <p class="text-bold">Diagnosa</p>
                <table id="table_diagnosa" class="table table-sm table-bordered mt-2">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Diagnosa</td>
                        </tr>
                    </thead>
                    <tbody id="t_body_diagnosa">
                    </tbody>
                </table>
                <hr>
                <div class="row">
                    <div class="col-6"></div>
                    <div class="col-6">
                        <h5 class="title-warning-right" style="width: 100%;" id="total_biaya">IDR 100.000.000 ,-</h5>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                <button disabled type="button" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>

<script>
    function hapusDetailTransaksiPaID(id) {
        $('#modal_hapus').modal('show');
        $('#delete_id').val(id);
    }

    function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }

    function showDetailTransaksiByTransaksiID(id) {
        $(".app").loading();
        $.ajax({
            url: '<?= base_url() ?>transaksi/find',
            type: 'GET',
            dataType: 'JSON',
            data: {
                id: id,
                jenis_rawat: 'RAWAT-JALAN'
            },
            success: function(data) {
                $(".app").loading('stop');
                $('#no_mr').val(data.transaksi.pasien.no_mr);
                $('#no_bill').val(data.transaksi.no_bill);
                $('#tanggal_transaksi').val(moment(data.transaksi.created_at).format('D/MM/YYYY  - HH:MM:SS'));
                $('#nama').val(data.transaksi.pasien.nama);
                $('#no_telp').val(data.transaksi.pasien.no_telp);
                $('#tanggal_lahir').val(data.transaksi.pasien.tanggal_lahir);
                $('#kelurahan').val(data.transaksi.pasien.kelurahan);
                $('#rw').val(data.transaksi.pasien.rw);
                $('#rt').val(data.transaksi.pasien.rt);
                $('#status_transaksi').html(data.transaksi.status);

                var list_diagnosa = '';
                var list_obat = '';

                var nama_penyakit = '';
                var qty_diagnosa = 0;
                var total_obat = 0;
                data.detail_transaksi.forEach((item, i) => {

                    if (data.detail_transaksi[i + 1]) {
                        nama_penyakit = item.penyakit.nama;
                        if (nama_penyakit !== data.detail_transaksi[i + 1].penyakit.nama) {
                            qty_diagnosa++;
                            list_diagnosa = list_diagnosa + `
                                <tr>
                                    <td class="text-center" width="5%">${qty_diagnosa}</td>
                                    <td width="40%">${nama_penyakit}</td>
                                </tr>`;
                        }
                    } else {
                        nama_penyakit = item.penyakit.nama;
                        qty_diagnosa++;
                        list_diagnosa = list_diagnosa + `
                                <tr>
                                    <td class="text-center" width="5%">${qty_diagnosa}</td>
                                    <td width="40%">${nama_penyakit}</td>
                                </tr>`;
                    }

                    if (item.obat) {
                        list_obat = list_obat + `
                            <tr>
                                <td class="text-center" width="5%">${i + 1}</td>
                                <td width="10%">${item.obat ? item.obat.kode : ''}</td>
                                <td width="20%">${item.obat ? item.obat.nama : ''}</td>
                                <td width="5%" class="text-center">${item.obat ? item.qty_obat : 1}</td>
                                <td width="20%" class="text-right">${item.obat ? 'IDR '+ numberWithCommas(item.obat.harga) + ',-' : ''}</td>
                                <td width="20%" class="text-right">${item.obat ? 'IDR '+ numberWithCommas(item.obat.harga * item.qty_obat) + ',-' : ''}</td>
                            </tr>
                        `;
                        total_obat = total_obat + item.obat.harga * item.qty_obat;
                    }



                });
                list_obat !== '' ? $('#t_body_obat').html(list_obat) : $('#t_body_obat').html(`<tr> <td class="text-center">-</td> <td class="text-center">-</td><td class="text-center">-</td><td class="text-center">-</td></tr>`);
                list_diagnosa !== '' ? $('#t_body_diagnosa').html(list_diagnosa) : $('#t_body_diagnosa').html(`<tr> <td class="text-center">-</td> <td class="text-center">-</td></tr>`);

                $('#t_body_obat').html(list_obat);
                $('#nama-poliklinik').val(data.detail_transaksi[0].jadwal_dokter.poliklinik.nama);
                $('#nama-dokter').val(data.detail_transaksi[0].jadwal_dokter.dokter.nama);
                $('#tarif-dokter').val(`IDR ${numberWithCommas(data.detail_transaksi[0].tarif_dokter)},-`);
                $('#tarif-pendaftaran').val(`IDR ${numberWithCommas(data.detail_transaksi[0].tarif_pendaftaran)},-`);
                $('#total_obat').html(`IDR ${numberWithCommas(total_obat)},-`);
                $('#total_biaya').html(`IDR ${numberWithCommas(total_obat + parseInt(data.transaksi.total_tarif))},- : TOTAL`);

                $('#modal_rekam_jalan').modal('show');

            },
            error: function(err) {
                toastr.error("Oops! Telah terjadi kesalahan");
                $(".app").loading('stop');
            }
        });
    }
    $('#tableRekamJalan').DataTable({
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
            "url": '<?= base_url() ?>transaksi/transaksi-jalan-all',
            "type": "POST",
        },
        columnDefs: [{
            targets: 1,
            className: 'text-center'
        }, {
            targets: 0,
            className: 'text-center'
        }, {
            targets: 6,
            className: 'text-center'
        }, {
            targets: 5,
            className: 'text-center',
            "mRender": function(data, type, full) {
                var formmatedvalue = 'IDR ' + data.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") + ',-';
                return formmatedvalue;
            }
        }]
    });
</script>