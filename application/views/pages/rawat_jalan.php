<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-8">
                    <h5 class="m-0 text-dark title-primary"><i class="fas fa-ambulance nav-icon"></i> &nbsp;Pendaftaran Rawat Jalan</h5>
                </div>
                <div class="col-sm-4 d-flex justify-content-end align-items-center position-relative mt-3 mt-sm-0">
                    <div class="form-group mb-0" style="width: 100%;">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text icon-search" style="background-color: #28a745; color:#fff;">
                                    <i class="fas fa-search"></i>
                                </span>
                            </div>
                            <input id="cari_mr" name="cari_mr" type="text" class="form-control float-right" placeholder="Cari Nomor RM">
                        </div>
                    </div>

                    <div id="select-nomor-rm" class="select-nomor-rm"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <form id="form_rawat_jalan" action="" method="POST">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card card-secondary">
                            <div class="card-header">
                                <i class="fas fa-user-injured"></i> &nbsp; Data Pasien
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="" class="col-sm-12 col-md-3">Nama</label>
                                    <input autocomplete="off" id="nama" name="nama" required type="text" class="form-control col-sm-12 col-md-9" placeholder="Nama lengkap pasien">
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-12 col-md-3">Tanggal / Lahir</label>
                                    <div class="input-group col-sm-12 col-md-9 pl-0 pr-0">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="far fa-calendar-alt"></i>
                                            </span>
                                        </div>
                                        <input required id="tanggal_lahir" name="tanggal_lahir" type="text" class="form-control float-right" id="reservation">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-3">Jenis Kelamin</label>
                                    <select required id="jenis_kelamin" name="jenis_kelamin" class="select-gender form-control form-control-sm col-sm-12 col-md-9">
                                        <option value="L">Laki - Laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div>

                                <div class="form-group row">
                                    <div class="col-6">
                                        <label for="">NIK</label>
                                        <input autocomplete="off" id="nik" name="nik" type="number" class="form-control" placeholder="Nomor KTP pasien">
                                    </div>
                                    <div class="col-6">
                                        <label for="">No. Telp/Hp</label>
                                        <input autocomplete="off" id="no_telp" name="no_telp" type="number" class="form-control" placeholder="No. Telp/Hp pasien">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-6">
                                        <label for="">Kota</label>
                                        <input autocomplete="off" id="kota" name="kota" type="text" class="form-control" placeholder="Kota pasien">
                                    </div>
                                    <div class="col-6">
                                        <label for="">Kecamatan</label>
                                        <input autocomplete="off" id="kecamatan" name="kecamatan" type="text" class="form-control" placeholder="Kecamatan pasien">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-6">
                                        <label for="">Kelurahan</label>
                                        <input autocomplete="off" id="kelurahan" name="kelurahan" type="text" class="form-control" placeholder="Kelurahan pasien">
                                    </div>
                                    <div class="col-3">
                                        <label for="">RT</label>
                                        <input autocomplete="off" id="rt" name="rt" type="text" class="form-control" placeholder="Nomor RT">
                                    </div>
                                    <div class="col-3">
                                        <label for="">RW</label>
                                        <input autocomplete="off" id="rw" name="rw" type="text" class="form-control" placeholder="Nomor RW">
                                    </div>
                                </div>

                                <div class="form-group row mt-3 m-0" style="border:1px dashed #ff6e08; padding:1rem; padding-bottom:0; border-radius:4px;">

                                    <div class="col-12">
                                        <label>Diagnosa Awal</label>
                                        <select id="diagnosa_id" name="diagnosa_id" class="select-diagnosa form-control form-control-sm">
                                        </select>
                                    </div>

                                    <div class="col-12 mt-4">
                                        <div id="selected-diagnosa" class="form-group">
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label>Poliklinik</label>
                                        <select required id="poliklinik_id" name="poliklinik_id" class="select-poliklinik form-control form-control-sm">

                                        </select>
                                    </div>

                                    <div class="col-12 mt-4">
                                        <div id="selected-poliklinik" class="form-group">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card card-secondary">
                            <div class="card-header">
                                Penanggung Jawab
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Hubungan Keluarga</label>
                                    <select id="hub" name="hub" class="select-hubungan-keluarga form-control form-control">
                                        <option>-- Pilih Hubungan Keluarga --</option>
                                        <option value="Anak">Anak</option>
                                        <option value="Ibu">Ibuk / Bapak</option>
                                        <option value="Sodara">Sodara</option>
                                        <option value="Teman">Teman</option>
                                    </select>
                                </div>

                                <div class="form-group row">
                                    <div class="col-6">
                                        <label for="">NIK</label>
                                        <input autocomplete="off" id="nik_pj" name="nik_pj" type="number" class="form-control" placeholder="Nomor KTP penanggung jawab">
                                    </div>
                                    <div class="col-6">
                                        <label for="">Nama</label>
                                        <input autocomplete="off" id="nama_pj" name="nama_pj" type="text" class="form-control" placeholder="Nama lengkap penanggung jawab">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-6">
                                        <label for="">No. Telp/Hp</label>
                                        <input autocomplete="off" id="no_telp_pj" name="no_telp_pj" type="number" class="form-control" placeholder="No. Telp/Hp penanggung jawab">
                                    </div>
                                    <div class="col-6">
                                        <label for="">Kota</label>
                                        <input autocomplete="off" id="kota_pj" name="kota_pj" type="text" class="form-control" placeholder="Kota penanggung jawab">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-6">
                                        <label for="">Kecamatan</label>
                                        <input autocomplete="off" id="kecamatan_pj" name="kecamatan_pj" type="text" class="form-control" placeholder="Kecamatan penanggung jawab">
                                    </div>
                                    <div class="col-6">
                                        <label for="">Kelurahan</label>
                                        <input autocomplete="off" id="kelurahan_pj" name="kelurahan_pj" type="text" class="form-control" placeholder="Kelurahan penanggung jawab">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-6">
                                        <label for="">RT</label>
                                        <input autocomplete="off" id="rt_pj" name="rt_pj" type="text" class="form-control" placeholder="Nomor RT">
                                    </div>
                                    <div class="col-6">
                                        <label for="">RW</label>
                                        <input autocomplete="off" id="rw_pj" name="rw_pj" type="text" class="form-control" placeholder="Nomor RW">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-4">
                        <div class="card card-success">
                            <div class="card-header">
                                <i class="fas fa-file-invoice"></i> &nbsp; Info Nota
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <small for="" class="col-5">No. MR</small>
                                    <input id="no_mr" name="no_mr" type="text" disabled class="form-control form-control-sm col-7" form="form_rawat_jalan" value="<?= $nextMR ?>">
                                    <input type="hidden" id="pasien_id" name="pasien_id">
                                </div>
                                <div class="form-group row">
                                    <small for="" class="col-5">No. Bill</small>
                                    <input id="no_bill" name="no_bill" type="text" disabled class="form-control form-control-sm col-7" value="<?= $nextBill ?>">
                                </div>
                                <div class="form-group row">
                                    <small for="" class="col-5">No. Reg</small>
                                    <input id="no_reg" name="no_reg" type="text" disabled class="form-control form-control-sm col-7" value="<?= $nextReg ?>">
                                </div>
                                <div class="form-group row">
                                    <small for="" class="col-5">Tanggal Pendaftaran</small>
                                    <input id="tanggal_transaksi" name="tanggal_transaksi" type="text" disabled class="form-control form-control-sm col-7" value="<?= $tanggal ?>">
                                </div>
                            </div>
                        </div>

                        <div class="card card-success">
                            <div class="card-header">
                                <i class="fas fa-money-bill-alt"></i> &nbsp; Status Pembayaran
                            </div>
                            <div class="card-body">

                                <div class="form-group row">
                                    <small for="" class="col-5">Tipe Pasien </small>
                                    <select required id="tipe_pasien" name="tipe_pasien" class="select-tipe-pasien form-control form-control-sm col-7">
                                        <?php
                                        foreach ($tipe_pasien as $key => $value) {
                                            echo '<option value="' . $value->id . '">' . $value->nama . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group row">
                                    <small for="" class="col-5">Kasir</small>
                                    <input type="text" disabled class="form-control form-control-sm col-7" value="<?= $this->session->userdata('name') ?>">
                                </div>

                                <div class="form-group row">
                                    <small for="" class="col-5">Biaya Pendaftaran</small>
                                    <h4 class="text-primary">Rp. 20.000,-</h4>
                                    <input type="hidden" id="tarif_awal" name="tarif_awal" value="20000">
                                </div>

                                <div class="form-group row mt-4 d-flex justify-content-center mb-0">
                                    <button type="button" class="btn btn-default btn-reset-form"> <i class="fas fa-sync-alt"></i> &nbsp; Reset</button>
                                    <button type="submit" class="btn btn-warning ml-1"> <i class="fas fa-save"></i> &nbsp; Simpan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    var SHOW_LIST_PASIEN = false;

    function clickItemNomorRM(id, nama, no_mr, tanggal_lahir, jenis_kelamin, nik, no_telp, kota, kecamatan, kelurahan, rt, rw, tipe_id, nama_pj, hubungan_pj, nik_pj, no_telp_pj, kota_pj, kecamatan_pj, kelurahan_pj, rt_pj, rw_pj) {
        $('#pasien_id').val(id);
        $('#nama').val(nama);
        $('#no_mr').val(no_mr);
        $('#tanggal_lahir').val(moment(tanggal_lahir).format('DD/MM/YYYY'));
        $("#jenis_kelamin").select2("val", jenis_kelamin);
        $('#nik').val(nik);
        $('#no_telp').val(no_telp);
        $('#kota').val(kota);
        $('#kecamatan').val(kecamatan);
        $('#kelurahan').val(kelurahan);
        $('#rt').val(rt);
        $('#rw').val(rw);
        $("#tipe_pasien").select2("val", tipe_id);
        $('#nama_pj').val(nama_pj);
        $("#hub").val(hubungan_pj);
        $('#nik_pj').val(nik_pj);
        $('#no_telp_pj').val(no_telp_pj);
        $('#kota_pj').val(kota_pj);
        $('#kecamatan_pj').val(kecamatan_pj);
        $('#kelurahan_pj').val(kelurahan_pj);
        $('#rt_pj').val(rt_pj);
        $('#rw_pj').val(rw_pj);
    }

    function cariNomorRekamMedis() {
        SHOW_LIST_PASIEN = true;
        var value = $('#cari_mr').val();
        var html = ``;
        $('#select-nomor-rm').html('');
        $('.icon-search').html('<i class="fas fa-spinner fa-spin"></i>');
        $('.select-nomor-rm').show();
        $.ajax({
            url: `<?= base_url() ?>pasien/search?search=${value}`,
            type: 'GET',
            dataType: 'JSON',
            success: function(data) {
                data.forEach(element => {
                    $('.icon-search').html('<i class="fas fa-search"></i>');
                    html = html + `
                        <div class="item-nomor-rm" onclick="clickItemNomorRM('${element.id}','${element.nama}', '${element.no_mr}', '${element.tanggal_lahir}', '${element.jenis_kelamin}', '${element.nik}', '${element.no_telp}', '${element.kota}', '${element.kecamatan}', '${element.kelurahan}', '${element.rt}', '${element.rw}', '${element.tipe_id}', '${element.nama_pj}', '${element.hubungan_pj}', '${element.nik_pj}', '${element.no_telp_pj}', '${element.kota_pj}', '${element.kecamatan_pj}', '${element.kelurahan_pj}', '${element.rt_pj}', '${element.rw_pj}')">
                            <div class="row">
                                <div class="col-12 text-bold" style="font-size: 18px;">
                                    ${element.nama} - ${element.tipe_pasien.nama}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <small>${element.no_mr}</small>
                                </div>
                                <div class="col-8 text-right font-italic">
                                    <small>${moment(element.created_at).format('YYYY/MM/D')}</small>
                                </div>
                            </div>
                        </div>
                        `;
                });
                $('#select-nomor-rm').html(html);

                $('.item-nomor-rm').click(function() {
                    $('#select-nomor-rm').html('');
                    $('#cari_mr').val('');
                });
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
            var tag_poli = `
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td> Poliklinik </td>
                            <td> Dokter </td>
                            <td> Jadwal </td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td> ${repo.text} </td>
                            <td> ${repo.dokter.nama} </td>
                            <td> ${moment(repo.jam_awal, "HH:mm:ss").format('HH:mm')}  s/d  ${moment(repo.jam_akhir, "HH:mm:ss").format('HH:mm')} </td>
                        </tr>
                    </tbody>
                </table>`;

            $('#selected-poliklinik').html(tag_poli);

            var $repo = $(
                `<span>
                     ${moment(repo.jam_awal, "HH:mm:ss").format('HH:mm')}  s/d  ${moment(repo.jam_akhir, "HH:mm:ss").format('HH:mm')} -
                     ${repo.text} -
                     ${repo.dokter.nama}
                </span>`
            );
            return $repo;
        }
        return `${repo.text}`;
    }

    function formatStateDiagnosa(state) {
        if (!state.id) {
            return state.text;
        }
        var $state = $(
            `<div class="row m-0 p-1">
                    <div class="col-4"> ${state.kode} </div>
                    <div class="col-4"> ${state.text} </div>
                    <div class="col-4"> ${state.type} </div>
                </div>`
        );
        return $state;
    }

    function formatRepoSelectionDiagnosa(repo) {
        if (repo.kode) {
            var tag_poli = `
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td> Kode </td>
                            <td> Nama Penyakit </td>
                            <td> Type </td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td> ${repo.kode} </td>
                            <td> ${repo.text} </td>
                            <td> ${repo.type} </td>
                        </tr>
                    </tbody>
                </table>`;

            $('#selected-diagnosa').html(tag_poli);

            var $repo = $(
                `<span>
                     ${repo.kode} -
                     ${repo.text} -
                     ${repo.type}
                </span>`
            );
            return $repo;
        }
        return `${repo.text}`;
    }

    $(document).ready(function() {

        $('#tanggal_lahir').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            minYear: 1901,
            maxYear: parseInt(moment().format('YYYY'), 10)
        }, function(start, end, label) {
            var years = moment().diff(start, 'years');
            console.log(years);
        });

        $('.select-gender').select2({
            theme: 'bootstrap4',
            minimumResultsForSearch: -1,
            placeholder: "Pilih Jenis Kelamin",
            allowClear: true
        });

        $('.select-tipe-pasien').select2({
            theme: 'bootstrap4',
            minimumResultsForSearch: -1,
            placeholder: "Pilih tipe pasien",
            allowClear: true,
            tags: [],
            ajax: {
                url: '<?= base_url() ?>tipepasien/search',
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

        $('.select-diagnosa').select2({
            theme: 'bootstrap4',
            tags: [],
            templateResult: formatStateDiagnosa,
            templateSelection: formatRepoSelectionDiagnosa,
            placeholder: "Pilih diagnosa awal",
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

        $('.select-poliklinik').select2({
            theme: 'bootstrap4',
            tags: [],
            templateResult: formatState,
            templateSelection: formatRepoSelection,
            placeholder: "Pilih Poliklinik",
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

        $('.btn-reset-form').click(function() {
            $('#form_rawat_jalan').trigger("reset");
            $('#selected-poliklinik').html('');
            $('#selected-diagnosa').html('');
            $('#poliklinik_id').empty();
            $('#tipe_pasien').empty();
            $("#diagnosa_id").empty();
        });

        $("#form_rawat_jalan").submit(function(e) {
            e.preventDefault();
            $(".app").loading();
            var data = $("#form_rawat_jalan").serializeArray();
            data.push({
                name: "no_mr",
                value: $('#no_mr').val()
            });
            $.ajax({
                url: '<?= base_url() ?>pendaftaran/rajal',
                type: 'POST',
                dataType: 'JSON',
                data: data,
                success: function(data) {
                    $(".app").loading('stop');
                    toastr.options = {
                        "closeButton": false,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": true,
                        "positionClass": "toast-bottom-right",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    }
                    toastr.success("Pasien rawat jalan berhasil didaftarkan");

                    $('#form_rawat_jalan').trigger("reset");
                    $('#selected-poliklinik').html('');
                    $('#selected-diagnosa').html('');
                    $('#no_mr').val(data.next_transaction.nextMR);
                    $('#no_bill').val(data.next_transaction.nextBill);
                    $('#no_reg').val(data.next_transaction.nextReg);
                    $('#tanggal_transaksi').val(data.next_transaction.tanggal);
                    $('#poliklinik_id').empty();
                    // $('#tipe_pasien').empty();
                    $("#diagnosa_id").empty();

                    var a = document.createElement("a");
                    a.setAttribute('target', '_blank');
                    a.href = data.download_url;
                    a.click();
                    removeChild(link);
                    delete link;
                },
                error: function(err) {
                    $(".app").loading('stop');
                    toastr.error("Oops! Pasien gagal didaftarkan");
                }
            });
        });

        $('#cari_mr').keyup(function() {
            cariNomorRekamMedis();
        });

        $('#cari_mr').click(function() {
            cariNomorRekamMedis();
        });

        $(document).on('click', function(e) {
            if ($(e.target).closest(".select-nomor-rm").length === 0) {
                if (!SHOW_LIST_PASIEN) {
                    $('.select-nomor-rm').hide();
                } else {
                    SHOW_LIST_PASIEN = false;
                }
            }
        });
    });
</script>