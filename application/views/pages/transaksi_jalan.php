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
                                        <th>Status</th>
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

<div class="modal fade" id="modal_tambah_obat" tabindex="-1" role="dialog" aria-labelledby="modal_tambah_obatTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="form_add_obat" action="" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Tambah Obat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="padding: 1rem;">
                    <table id="table_add_obat" class="table table-bordered">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Nama Obat</td>
                                <td>Qty</td>
                                <td>-</td>
                            </tr>
                        </thead>
                        <tbody id="t_body_tambah_obat">
                            <tr class="number-add-obat-0">
                                <td class="numbering-add-obat text-center">1</td>
                                <td class="position-relative">
                                    <input type="hidden" name="obat_id[]" class="obat-id">
                                    <input type="text" name="nama_obat[]" autocomplete="off" oninput="show_list_obat(0)" onclick="show_list_obat(0)" class="show-list-obat form-control form-control-sm">
                                    <div class="select-menu-custom"></div>
                                </td>
                                <td style="width:20%;">
                                    <input type="number" autocomplete="off" name="qty_obat[]" class="qty-obat form-control form-control-sm">
                                </td>
                                <td class="text-center" style="width:5%;">
                                    <button onclick="delete_row_obat(0)" type="button" class="btn btn-sm btn-danger btn-hapus-obat"> <i class="fas fa-times"></i> </button>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4" class="text-center">
                                    <button id="add_row_obat" type="button" class="btn btn-info btn-sm"> <i class="fas fa-plus"></i> Add Row</button>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="transaksi_id" name="transaksi_id">
                    <button type="button" class="btn" data-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_rekam_jalan" tabindex="-1" role="dialog" aria-labelledby="modal_rekam_jalanTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <form action="<?= base_url() ?>transaksi/save" method="POST">
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
                                    <span id="status_transaksi">REGISTERED</span>
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
                    <p class="text-bold position-relative">Biaya Obat
                        <span id="tambah_obat" class="position-absolute text-normal add-items"> <i class="fas fa-plus"></i> Tambah Obat</span>
                    </p>
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
                    <hr>
                    <div class="row">
                        <div class="col-6"></div>
                        <div class="col-6">
                            <h5 class="title-warning-right" style="width: 100%;" id="total_biaya">IDR 100.000.000 ,-</h5>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <input type="hidden" id="cetak_transaksi_id" name="transaksi_id">
                    <button type="button" class="btn" data-dismiss="modal">Kembali</button>
                    <button id="cetak_transaksi" print type="submit" formtarget="_blank" class="btn btn-success"> <i class="fas fa-print"></i> &nbsp; Cetak Transaksi (Bayar)</button>
                </div>
            </form>

        </div>
    </div>
</div>

<script>
    var INIT_NUMBER_OBAT = 0;
    var SHOW_LIST_OBAT = false;

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
                $('#status_transaksi').html(`<span class="badge ${data.transaksi.status === 'REGISTERED' ? 'badge-secondary': 'badge-success'}">${data.transaksi.status}</span>`);
                $('#transaksi_id').val(data.transaksi.id);
                $('#cetak_transaksi_id').val(data.transaksi.id);
                if (data.transaksi.status === 'PAID') {
                    $('#cetak_transaksi').html('<i class="fas fa-print"></i> &nbsp; Print')
                } else {
                    $('#cetak_transaksi').html('<i class="fas fa-print"></i> &nbsp; Cetak Transaksi (Bayar)');
                }

                var list_obat = '';
                var total_obat = 0;
                var no_obat = 0;
                data.detail_transaksi.forEach((item, i) => {

                    if (item.obat) {
                        no_obat += 1;
                        list_obat = list_obat + `
                            <tr>
                                <td class="text-center" width="5%">${no_obat}</td>
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

                $('#t_body_obat').html(list_obat);
                $('#nama-poliklinik').val(data.detail_transaksi[0].jadwal_dokter.poliklinik.nama);
                $('#nama-dokter').val(data.detail_transaksi[0].jadwal_dokter.dokter.nama);
                $('#tarif-dokter').val(`IDR ${numberWithCommas(data.detail_transaksi[0].tarif_dokter)},-`);
                $('#tarif-pendaftaran').val(`IDR ${numberWithCommas(data.detail_transaksi[0].tarif_pendaftaran)},-`);
                $('#total_obat').html(`IDR ${numberWithCommas(total_obat)},-`);
                $('#total_biaya').html(`IDR ${numberWithCommas(parseInt(total_obat = total_obat || 0) + parseInt(data.transaksi.total_tarif))},- : TOTAL`);

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
            },
        }, {
            targets: 6,
            className: 'text-center',
            "mRender": function(data, type, full) {
                var span = `<span class="badge ${data === 'REGISTERED'? 'badge-secondary' :'badge-success'}">${data}</span>`;
                return span;
            }
        }]
    });

    function delete_row_obat(row) {
        INIT_NUMBER_OBAT = INIT_NUMBER_OBAT - 1;
        $('#t_body_tambah_obat').find('.number-add-obat-' + row).remove();
        $('.numbering-add-obat').each(function(i) {
            $(this).html(i + 1);
            $(this).parent().removeClass();
            $(this).parent().addClass(`number-add-obat-${i}`);
            $(this).parent().find('.btn-hapus-obat').attr('onclick', `delete_row_obat(${i})`);
            $(this).parent().find('.show-list-obat').attr('onclick', `show_list_obat(${i})`);
            $(this).parent().find('.show-list-obat').attr('oninput', `show_list_obat(${i})`);
        });
    }

    function selected_obat(id, nama, row) {
        $('.number-add-obat-' + row).find('.show-list-obat').val(nama);
        $('.number-add-obat-' + row).find('.obat-id').val(id);
        $('.number-add-obat-' + row).find('.qty-obat').val(1);
        $('.select-menu-custom').hide();
    }

    $(document).on('click', function(e) {
        if ($(e.target).closest(".select-menu-custom").length === 0) {
            if (!SHOW_LIST_OBAT) {
                $('.select-menu-custom').hide();
            } else {
                SHOW_LIST_OBAT = false;
            }
        }
    });

    function show_list_obat(row) {
        SHOW_LIST_OBAT = true;
        $('.select-menu-custom').hide();
        $('.number-add-obat-' + row).find('.select-menu-custom').show();
        var value = $('.number-add-obat-' + row).find('.show-list-obat').val();
        $.ajax({
            url: `<?= base_url() ?>obat/search?search=${value}`,
            type: 'GET',
            dataType: 'JSON',
            success: function(data) {
                var html = '';
                data.forEach(element => {
                    $('.icon-search').html('<i class="fas fa-search"></i>');
                    html = html + `
                    <div class="item-menu-custom" onclick="selected_obat('${element.id}', '${element.nama}', '${row}')">
                        <div class="text-bold">${element.nama}</div>
                        <div class="row mt-2">
                            <small class="col-6">Kode : ${element.kode}</small>
                            <small class="col-6">Harga : IDR ${numberWithCommas(element.harga)}</small>
                        </div>
                    </div>`;
                });

                $('.number-add-obat-' + row).find('.select-menu-custom').html(html);
            },
            error: function(err) {
                console.log(err);
            }
        });
    }

    $('#add_row_obat').click(function() {
        INIT_NUMBER_OBAT = INIT_NUMBER_OBAT + 1;
        var html = `
        <tr class="number-add-obat-${INIT_NUMBER_OBAT}">
            <td class="numbering-add-obat text-center">${INIT_NUMBER_OBAT + 1}</td>
            <td class="position-relative">
                <input type="hidden" name="obat_id[]" class="obat-id">
                <input type="text" name="nama_obat[]" autocomplete="off" oninput="show_list_obat(${INIT_NUMBER_OBAT})" onclick="show_list_obat(${INIT_NUMBER_OBAT})" class="show-list-obat form-control form-control-sm">
                <div class="select-menu-custom"></div>
            </td>
            <td style="width:20%;">
                <input type="number" autocomplete="off" name="qty_obat[]" class="qty-obat form-control form-control-sm">
            </td>
            <td class="text-center" style="width:5%;">
                <button type="button" class="btn btn-sm btn-danger btn-hapus-obat" onclick="delete_row_obat(${INIT_NUMBER_OBAT})"> <i class="fas fa-times"></i> </button>
            </td>
        </tr>`;
        $("#table_add_obat > tbody").append(html);

    });

    $('#form_add_obat').submit(function(e) {
        e.preventDefault();
        $(".app").loading();
        $.ajax({
            url: `<?= base_url() ?>transaksi/tambah_obat`,
            method: 'POST',
            data: $('#form_add_obat').serializeArray(),
            dataType: 'JSON',
            success: function(data) {
                showDetailTransaksiByTransaksiID($('#transaksi_id').val());
                $(".app").loading('stop');
                $('#modal_tambah_obat').modal('toggle');
                toastr.success("Obat berhasil ditambahkan");
            },
            error: function(err) {
                toastr.error("Oops! transaksi gagal di update");
                $(".app").loading('stop');
            }
        })
    });

    $('#tambah_obat').click(function() {
        $('#modal_rekam_jalan').modal('toggle');
        $('#modal_tambah_obat').modal('toggle');
        $('#modal_tambah_obat').addClass('modal-open-important');
        $('.app').addClass('modal-open-overflow-hide');
    });

    $("#modal_tambah_obat").on('hide.bs.modal', function() {
        $('#modal_rekam_jalan').modal('toggle');
        $('#modal_rekam_jalan').addClass('modal-open-important');
        $('.app').addClass('modal-open-overflow-hide');
    });

    $("#modal_rekam_jalan").on('hide.bs.modal', function() {
        $('.app').removeClass('modal-open-overflow-hide');
    });
</script>