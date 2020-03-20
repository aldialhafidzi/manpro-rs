<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h5 class="m-0 text-dark" style="background-color: #2090d7;
    display: inline-block;
    padding: 1rem;
    border-radius: 0px 30px 30px 0px;
    color: #ffff !important;"><i class="fas fa-ambulance nav-icon"></i> &nbsp;Pendaftaran Rawat Jalan</h5>
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
                                Data Pasien
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="" class="col-sm-12 col-md-3">Nama</label>
                                    <input id="nama" name="nama" required autocomplete="off" type="text" class="form-control col-sm-12 col-md-9" placeholder="Nama lengkap pasien">
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
                                        <input id="nik" name="nik" type="text" class="form-control" placeholder="Nomor KTP pasien">
                                    </div>
                                    <div class="col-6">
                                        <label for="">No. Telp/Hp</label>
                                        <input id="no_telp" name="no_telp" type="text" class="form-control" placeholder="No. Telp/Hp pasien">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-6">
                                        <label for="">Kota</label>
                                        <input id="kota" name="kota" type="text" class="form-control" placeholder="Kota pasien">
                                    </div>
                                    <div class="col-6">
                                        <label for="">Kecamatan</label>
                                        <input id="kecamatan" name="kecamatan" type="text" class="form-control" placeholder="Kecamatan pasien">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-6">
                                        <label for="">Kelurahan</label>
                                        <input id="kelurahan" name="kelurahan" type="text" class="form-control" placeholder="Kelurahan pasien">
                                    </div>
                                    <div class="col-3">
                                        <label for="">RT</label>
                                        <input id="rt" name="rt" type="text" class="form-control" placeholder="Nomor RT">
                                    </div>
                                    <div class="col-3">
                                        <label for="">RW</label>
                                        <input id="rw" name="rw" type="text" class="form-control" placeholder="Nomor RW">
                                    </div>
                                </div>

                                <div class="form-group row mt-3 m-0" style="border:1px dashed #ff6e08; padding:1rem; padding-bottom:0; border-radius:4px;">

                                    <div class="col-12">
                                        <label>Diagnosa Awal</label>
                                        <select name="diagnosa" class="select-diagnosa form-control form-control-sm">
                                            <option>-- Pilih Diagnosa --</option>
                                        </select>
                                    </div>

                                    <div class="col-12 mt-4">
                                        <div id="selected-diagnosa" class="form-group">
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label>Poliklinik</label>
                                        <select name="poliklinik" class="select-poliklinik form-control form-control-sm">
                                            <option>-- Pilih Poliklinik --</option>
                                        </select>
                                    </div>

                                    <div class="col-12 mt-4">
                                        <div id="selected-poliklinik" class="form-group">
                                        </div>
                                    </div>
                                </div>



                                <!-- <div class="form-group row">
                                    <label class="col-3">Dokter</label>
                                    <select name="dokter" class="select-dokter form-control form-control-sm col-9">
                                        <option>-- Pilih Dokter --</option>
                                    </select>
                                </div> -->

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
                                        <input id="nik_pj" name="nik_pj" type="text" class="form-control" placeholder="Nomor KTP penanggung jawab">
                                    </div>
                                    <div class="col-6">
                                        <label for="">Nama</label>
                                        <input id="nama_pj" name="nama_pj" type="text" class="form-control" placeholder="Nama lengkap penanggung jawab">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-6">
                                        <label for="">No. Telp/Hp</label>
                                        <input id="no_telp_pj" name="no_telp_pj" type="text" class="form-control" placeholder="No. Telp/Hp penanggung jawab">
                                    </div>
                                    <div class="col-6">
                                        <label for="">Kota</label>
                                        <input id="kota_pj" name="kota_pj" type="text" class="form-control" placeholder="Kota penanggung jawab">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-6">
                                        <label for="">Kecamatan</label>
                                        <input id="kecamatan_pj" name="kecamatan_pj" type="text" class="form-control" placeholder="Kecamatan penanggung jawab">
                                    </div>
                                    <div class="col-6">
                                        <label for="">Kelurahan</label>
                                        <input id="kelurahan_pj" name="kelurahan_pj" type="text" class="form-control" placeholder="Kelurahan penanggung jawab">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-6">
                                        <label for="">RT</label>
                                        <input id="rt_pj" name="rt_pj" type="text" class="form-control" placeholder="Nomor RT">
                                    </div>
                                    <div class="col-6">
                                        <label for="">RW</label>
                                        <input id="rw_pj" name="rw_pj" type="text" class="form-control" placeholder="Nomor RW">
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
                                    <input id="no_mr" name="no_mr" type="text" disabled class="form-control form-control-sm col-7" value="<?= $nextMR ?>">
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
                                <i class="fas fa-money-bill-alt"></i> &nbsp; Status
                            </div>
                            <div class="card-body">

                                <div class="form-group row">
                                    <small for="" class="col-5">Tipe Pasien </small>
                                    <select name="tipe_pasien" class="select-tipe-pasien form-control form-control-sm col-7">
                                        <option>-- Pilih Tipe Pasien --</option>
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
                                    <button type="button" class="btn btn-default"> <i class="fas fa-sync-alt"></i> &nbsp; Reset</button>
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
            minimumResultsForSearch: -1
        });

        $('.select-tipe-pasien').select2({
            theme: 'bootstrap4',
            minimumResultsForSearch: -1,
            tags: [],
            ajax: {
                url: 'http://localhost/manpro-rs/tipepasien/search',
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

        $('.select-hubungan-keluarga').select2({
            theme: 'bootstrap4',
            minimumResultsForSearch: -1
        });

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

        $('.select-diagnosa').select2({
            theme: 'bootstrap4',
            tags: [],
            templateResult: formatStateDiagnosa,
            templateSelection: formatRepoSelectionDiagnosa,
            ajax: {
                url: 'http://localhost/manpro-rs/penyakit/search',
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
            ajax: {
                url: 'http://localhost/manpro-rs/poliklinik/search',
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

        $("#form_rawat_jalan").submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: 'http://localhost/manpro-rs/pendaftaran/rajal',
                type: 'POST',
                data: $("#form_rawat_jalan").serialize(),
                success: function(data) {
                    toastr.success("Pasien berhasil didaftarkan");
                    $('#form_rawat_jalan').trigger("reset");
                    $('#selected-poliklinik').html('');
                    $('#no_mr').val(data.next_transaction.nextMR);
                    $('#no_bill').val(data.next_transaction.nextBill);
                    $('#no_reg').val(data.next_transaction.nextReg);
                    $('#tanggal_transaksi').val(data.next_transaction.tanggal);

                    var a = document.createElement("a");
                    a.href = data.download_url;
                    a.click();
                    removeChild(link);
                    delete link;
                },
                error: function(err) {
                    toastr.error("Oops! Pasien gagal didaftarkan");
                }
            });
        });

        // $('.select-dokter').select2({
        //     theme: 'bootstrap4',
        //     tags: [],
        //     ajax: {
        //         url: 'http://localhost/manpro-rs/dokter/search',
        //         dataType: 'JSON',
        //         method: 'GET',
        //         data: function(params) {
        //             return {
        //                 search: params.term
        //             }
        //         },
        //         processResults: function(data, page) {
        //             return {
        //                 results: data
        //             };
        //         }
        //     }
        // });
    });
</script>