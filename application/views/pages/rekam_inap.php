<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0 text-dark title-warning"> <i class="fas fa-procedures nav-icon"></i> &nbsp; Rekam inap</h5>
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
                            <table id="tableRekaminap" class="table table-bordered">
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
            <form action="<?= base_url() ?>rekam-medis/add-inap" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Tambah Rekam Medis</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="padding: 1rem;">
                    <input type="hidden" name="pasien_id" id="pasien_id">
                    <label for="">Dokter</label>
                    <select name="dokter" id="dokter" class="form-control mb-4"></select>

                    <label for="" class="mt-4">Diagnosa</label>
                    <select name="diagnosa[]" multiple="multiple" id="diagnosa" class="form-control"></select>
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
                    <input type="hidden" id="jenis_rawat" name="jenis_rawat" value="RAWAT-INAP">
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
                <div class="row">
                    <div class="col-12">
                        <button class="btn btn-sm btn-info btn-add-rekam-medis"> <i class="fas fa-plus"></i> &nbsp; Tambah Rekam Medis </button>
                    </div>
                </div>
                <table id="table_rincian_rm" class="table table-bordered mt-3">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Tanggal</td>
                            <td>Dokter</td>
                            <td>Rawat</td>
                            <td>Diagnosa</td>
                            <td>-</td>
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
    var CURRENT_ROW = 0;

    // function hapusRekamMedisPasienByID(id) {
    //     $('#modal_hapus').modal('show');
    //     $('#delete_id').val(id);
    // }

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
                var pasien = null;
                data.forEach((element, i) => {
                    CURRENT_ROW++;
                    if (!pasien) {
                        pasien = element.pasien;
                    }
                    let nama_dokter = element.dokter ? element.dokter.nama : '';
                    let jenis_rawat = element.jenis_rawat === 'RAWAT-INAP' ? 'Inap' : 'Jalan';
                    html = html + `
                        <tr>
                            <td class="text-center number" width="5%">${i + 1}</td>
                            <td width="20%">${moment(element.tgl_rekam).format('D/MM/YYYY')}</td>
                            <td width="35%">${nama_dokter}</td>
                            <td class="text-center" width="15%">${jenis_rawat}</td>
                            <td width="40%">${element.penyakit.nama}</td>
                            <td width="5%"> <button class="btn btn-sm btn-danger hapus-row-${i}" onclick="deleteRekamMedis('${element.id}')" id="${element.id}" row="${i}"><i class="fas fa-times"></i></button> </td>
                        </tr>`
                });

                $('#rincian_rekam_medis').html(html);
                data.forEach((element, i) => {
                    if (!element.dokter) {
                        $(`.select-dokter-${i}`).select2({
                            theme: 'bootstrap4',
                            minimumResultsForSearch: -1,
                            placeholder: "Pilih Dokter",
                            allowClear: true
                        });
                    }
                });
                $('#pasien_id').val(pasien.id);
                $('#no_mr').val(pasien.no_mr);
                $('#nama').val(pasien.nama);
                $('#no_telp').val(pasien.no_telp);
                $('#tanggal_lahir').val(pasien.tanggal_lahir);
                $('#kelurahan').val(pasien.kelurahan);
                $('#rw').val(pasien.rw);
                $('#rt').val(pasien.rt);
                $('#modal_rekam_inap').modal('show');
            },
            error: function(err) {
                toastr.error("Oops! Pasien gagal didaftarkan");
                $(".app").loading('stop');
            }
        });
    }

    $('#tableRekaminap').DataTable({
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
            "url": '<?= base_url() ?>rekam-medis/rekam-inap-all',
            "type": "POST",
        },
    });

    $('#dokter').select2({
        theme: 'bootstrap4',
        tags: [],
        placeholder: "Pilih dokter",
        allowClear: true,
        ajax: {
            url: '<?= base_url() ?>dokter/search',
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

    function deleteRekamMedis(id) {
        $('#modal_hapus').modal('show');
        $('#modal_rekam_inap').modal('hide');
        $('#delete_id').val(id);
    }

    $("#modal_hapus").on('hide.bs.modal', function() {
        $('#modal_rekam_inap').modal('show');
    });

    $("#modal_add").on('hide.bs.modal', function() {
        $('#modal_rekam_inap').modal('show');
    });

    $('.btn-add-rekam-medis').click(function() {
        $('#modal_rekam_inap').modal('hide');
        $('#modal_add').modal('show');
    });
</script>