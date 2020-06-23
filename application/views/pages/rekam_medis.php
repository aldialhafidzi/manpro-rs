<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0 text-dark title-primary"> <i class="fas fa-ambulance nav-icon"></i> &nbsp; Rekam Medis</h5>
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
                            <table id="tableRekam" class="table table-hover text-nowrap table-bordered">
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

<div class="modal fade" id="modal_add" tabindex="-1" role="dialog" aria-labelledby="modal_addTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="<?= base_url() ?>rekam-medis/add" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Tambah Rekam Medis</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="padding: 1rem;">
                    <input type="hidden" name="transaksi_id" id="transaksi_id">
                    <label for="">Dokter</label>
                    <select name="jadwal_dokter_id" id="jadwal_dokter" class="form-control mb-4"></select>

                    <label for="" class="mt-4">Diagnosa</label>
                    <select name="diagnosa[]" multiple="multiple" id="diagnosa" class="form-control"></select>

                    <label for="" class="mt-4">Tindakan</label>
                    <select name="tindakan[]" multiple="multiple" id="tindakan" class="form-control"></select>

                    <label for="" class="mt-4">Tambah Obat</label>
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
                                    <button id="add_row_obat" type="button" class="btn btn-info btn-sm"> <i class="fas fa-plus"></i> Tambah Lagi Obat</button>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
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
                    <input type="hidden" id="jenis_rawat" name="jenis_rawat" value="RAWAT-JALAN">
                    <button type="submit" class="btn">Konfirmasi</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_rekam" tabindex="-1" role="dialog" aria-labelledby="modal_rekamTitle" aria-hidden="true" style="overflow-y: auto;">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Rincian Rekam Medis</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="padding: 1rem;">
                <div class="row mb-3">
                    <div class="col-6">
                        <div class="form-group row">
                            <label for="" class="col-5">No. Rekam Medis</label>
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
                <!-- <div class="row">
                    <div class="col-12">
                        <button class="btn btn-sm btn-info btn-add-rekam-medis"> <i class="fas fa-plus"></i> &nbsp; Tambah Rekam Medis </button>
                    </div>
                </div> -->
                <div class="box-body table-responsive no-padding">
                    <table id="table_rincian_rm" class="table table-bordered mt-3">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Tanggal</td>
                                <td>Dokter</td>
                                <td>Rawat</td>
                                <td>Diagnosa</td>
                                <td>Obat</td>
                                <td>Tindakan</td>
                                <td class="text-center">-</td>
                            </tr>
                        </thead>
                        <tbody id="rincian_rekam_medis">
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                <!-- <button disabled type="button" class="btn btn-primary">Simpan</button> -->
            </div>
        </div>
    </div>
</div>

<script>
    var CURRENT_ROW = 0;

    function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }

    function showRekamMedisByPasienID(id) {
        $(".app").loading();
        CURRENT_ROW = 0;
        $.ajax({
            url: '<?= base_url() ?>rekam-medis/find',
            type: 'GET',
            dataType: 'JSON',
            data: {
                pasien_id: id
            },
            success: function(data) {
                $(".app").loading('stop');
                var html = '';
                var transaksi = data.pasien_transaksi;
                data.rekam.forEach((element, i) => {
                    CURRENT_ROW++;
                    let list_dokter = '<ul class="list-in-table">';
                    let nama_dokter = '-';
                    let nama_penyakit = '-';
                    let jenis_rawat = element.jenis_rawat === 'RAWAT-JALAN' ? 'JALAN' : 'INAP';
                    let list_penyakit = '<ul class="list-in-table">';
                    let obat = '<ul class="list-in-table">';
                    let tindakan = '<ul class="list-in-table">';

                    if (element.detail_transaksi) {
                        element.detail_transaksi.forEach(dt => {
                            if (dt.dokter) {
                                if (nama_dokter !== dt.dokter.nama) {
                                    nama_dokter = dt.dokter.nama;
                                    list_dokter += `<li>${nama_dokter}</li>`;
                                }
                            }

                            if (dt.penyakit) {
                                if (nama_penyakit !== dt.penyakit.nama) {
                                    nama_penyakit = dt.penyakit.nama;
                                    list_penyakit += `<li>${nama_penyakit}</li>`;
                                }
                            }

                            if (dt.obat) {
                                obat += `<li>(${dt.qty_obat}x) ${dt.obat.nama}</li>`;
                            }

                            if (dt.tindakan) {
                                tindakan += `<li>${dt.tindakan.nama}</li>`;
                            }

                        });
                    }

                    list_dokter += '</ul>';
                    obat += '</ul>';
                    tindakan += '</ul>';
                    list_penyakit += '</u;>'

                    html = html + `
                        <tr>
                            <td class="text-center number" width="5%"><small>${i + 1}</small></td>
                            <td width="5%"><small>${moment(element.created_at).format('D/MM/YYYY')}</small></td>
                            <td width="20%"><small>${list_dokter}</small></td>
                            <td class="text-center" width="5%"><small>${jenis_rawat}</small></td>
                            <td width="20%"><small>${list_penyakit}</small></td>
                            <td width="30%"><small>${obat}</small></td>
                            <td width="30%"><small>${tindakan}</small></td>
                            <td width="20%"><button class="btn btn-sm btn-info btn-add-rekam-medis btn-oval" onclick="tambah_rekam_medis('${element.id}', '${jenis_rawat}')"><i class="fas fa-plus"></i></button> <button class="btn btn-sm btn-danger btn-oval hapus-row-${i}" onclick="deleteRekamMedis('${element.id}')" id="${element.id}" row="${i}"><i class="fas fa-times"></i></button></td>
                        </tr>`
                });

                $('#rincian_rekam_medis').html(html);
                $('#transaksi_id').val(transaksi.id);
                $('#no_mr').val(transaksi.pasien.no_mr);
                $('#nama').val(transaksi.pasien.nama);
                $('#no_telp').val(transaksi.pasien.no_telp);
                $('#tanggal_lahir').val(transaksi.pasien.tanggal_lahir);
                $('#kelurahan').val(transaksi.pasien.kelurahan);
                $('#rw').val(transaksi.pasien.rw);
                $('#rt').val(transaksi.pasien.rt);
                $('#modal_rekam').modal('show');
            },
            error: function(err) {
                toastr.error("Oops! Pasien gagal didaftarkan");
                $(".app").loading('stop');
            }
        });
    }

    $('#tableRekam').DataTable({
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
            "url": '<?= base_url() ?>rekam-medis/rekam-all',
            "type": "POST",
        },
    });

    var INIT_NUMBER_OBAT = 0;
    var SHOW_LIST_OBAT = false;

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

    function formatState(state) {
        if (!state.id) {
            return state.text;
        }
        var $state = $(
            `<div class="row m-0 p-1">
                    <div class="col-4"> ${moment(state.jam_awal, "HH:mm:ss").format('HH:mm')}  s/d  ${moment(state.jam_akhir, "HH:mm:ss").format('HH:mm')} </div>
                    <div class="col-4"> ${state.text} </div>
                    <div class="col-4"> ${state.dokter.nama} </div>
                </div>`
        );
        return $state;
    }

    function formatRepoSelection(repo) {
        if (repo.dokter) {
            return `${moment(repo.jam_awal, "HH:mm:ss").format('HH:mm')}  s/d  ${moment(repo.jam_akhir, "HH:mm:ss").format('HH:mm')} - ${repo.text} - ${repo.dokter.nama}`;
        }
        return `${repo.text}`;
    }

    $('#jadwal_dokter').select2({
        theme: 'bootstrap4',
        tags: [],
        templateResult: formatState,
        templateSelection: formatRepoSelection,
        placeholder: "Pilih Dokter",
        allowClear: true,
        ajax: {
            url: '<?= base_url() ?>poliklinik/search',
            dataType: 'JSON',
            method: 'GET',
            data: function(params) {
                return {
                    search: params.term
                }
            },
            processResults: function(data, page) {
                return {
                    results: data
                };
            }
        }
    });

    $('#diagnosa').select2({
        theme: 'bootstrap4',
        tags: [],
        placeholder: "Pilih diagnosa",
        allowClear: true,
        ajax: {
            url: '<?= base_url() ?>penyakit/search',
            dataType: 'JSON',
            method: 'GET',
            data: function(params) {
                return {
                    search: params.term
                }
            },
            processResults: function(data, page) {
                return {
                    results: data
                };
            }
        }
    });

    $('#tindakan').select2({
        theme: 'bootstrap4',
        tags: [],
        placeholder: "Pilih Tindakan",
        allowClear: true,
        ajax: {
            url: '<?= base_url() ?>tindakan/search',
            dataType: 'JSON',
            method: 'GET',
            data: function(params) {
                return {
                    search: params.term
                }
            },
            processResults: function(data, page) {
                return {
                    results: data
                };
            }
        }
    });

    function deleteRekamMedis(id) {
        $('#modal_hapus').modal('show');
        $('#modal_rekam').modal('hide');
        $('#delete_id').val(id);
    }

    $("#modal_hapus").on('hide.bs.modal', function() {
        $('#modal_rekam').modal('show');
    });

    $("#modal_add").on('hide.bs.modal', function() {
        $('#modal_rekam').modal('show');
    });

    function tambah_rekam_medis(id, jenis_rawat) {
        if (jenis_rawat === 'JALAN') {
            $("#tindakan").prop("disabled", true);
        } else {
            $("#tindakan").prop("disabled", false);
        }

        $('#transaksi_id').val(id);
        $('#modal_rekam').modal('toggle');
        $('#modal_add').modal('toggle');
        $('#modal_add').addClass('modal-open-important');
        $('.app').addClass('modal-open-overflow-hide');
    }

    $('.btn-add-rekam-medis').click(function() {
        $('#modal_rekam').modal('toggle');
        $('#modal_add').modal('toggle');
        $('#modal_add').addClass('modal-open-important');
        $('.app').addClass('modal-open-overflow-hide');
    });

    $("#modal_add").on('hide.bs.modal', function() {
        $('#modal_rekam').modal('toggle');
        $('#modal_rekam').addClass('modal-open-important');
        $('.app').addClass('modal-open-overflow-hide');
    });

    $("#modal_rekam").on('hide.bs.modal', function() {
        $('.app').removeClass('modal-open-overflow-hide');
    });
</script>