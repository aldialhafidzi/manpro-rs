<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Pendaftaran Rawat Jalan</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card card-info">
                        <div class="card-header">
                            Data Pasien
                        </div>
                        <div class="card-body">
                            <form action="" method="POST">
                                <div class="form-group row">
                                    <label for="" class="col-3">Nama</label>
                                    <input type="text" class="form-control form-control-sm col-9" placeholder="Nama lengkap pasien">
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-3">Umur</label>
                                    <input type="text" class="form-control form-control-sm col-9" placeholder="Umur pasien">
                                </div>
                                <div class="form-group row">
                                    <label class="col-3">Jenis Kelamin</label>
                                    <select class="form-control form-control-sm col-9">
                                        <option>-- --</option>
                                        <option>Pria</option>
                                        <option>Wanita</option>
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-3">Alamat</label>
                                    <textarea type="text" class="form-control form-control-sm col-9" placeholder="Alamat lengkap pasien"></textarea>
                                </div>

                                <br>

                                <div class="form-group row">
                                    <label class="col-3">Klinik</label>
                                    <select class="form-control form-control-sm col-9">
                                        <option>-- --</option>
                                        <option>Klinik Tongfang</option>
                                        <option>Test</option>
                                    </select>
                                </div>

                                <div class="form-group row">
                                    <label class="col-3">Dokter</label>
                                    <select class="form-control form-control-sm col-9">
                                        <option>-- --</option>
                                        <option>Klinik Tongfang</option>
                                        <option>Test</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="card card-info">
                        <div class="card-header">
                            Pengantar
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Hubungan Keluarga</label>
                                <select class="form-control form-control-sm">
                                    <option>-- --</option>
                                    <option>Klinik Tongfang</option>
                                    <option>Test</option>
                                </select>
                            </div>

                            <div class="form-group row">
                                <div class="col-6">
                                    <label for="">NIK</label>
                                    <input type="text" class="form-control form-control-sm" placeholder="Nomor KTP pengantar">
                                </div>
                                <div class="col-6">
                                    <label for="">Nama</label>
                                    <input type="text" class="form-control form-control-sm" placeholder="Nama lengkap pengantar">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-6">
                                    <label for="">No. Telp/Hp</label>
                                    <input type="text" class="form-control form-control-sm" placeholder="No. Telp/Hp pengantar">
                                </div>
                                <div class="col-6">
                                    <label for="">Kota</label>
                                    <input type="text" class="form-control form-control-sm" placeholder="Kota pengantar">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-6">
                                    <label for="">Kecamatan</label>
                                    <input type="text" class="form-control form-control-sm" placeholder="Kecamatan pengantar">
                                </div>
                                <div class="col-6">
                                    <label for="">Kelurahan</label>
                                    <input type="text" class="form-control form-control-sm" placeholder="Kelurahan pengantar">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-6">
                                    <label for="">RT</label>
                                    <input type="text" class="form-control form-control-sm" placeholder="Nomor RT">
                                </div>
                                <div class="col-6">
                                    <label for="">RW</label>
                                    <input type="text" class="form-control form-control-sm" placeholder="Nomor RW">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-4">
                    <div class="card card-info">
                        <div class="card-header">
                            Info Nota
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <small for="" class="col-5">No. MR</small>
                                <input type="text" disabled class="form-control form-control-sm col-7" value="<?= $nextMR ?>">
                            </div>
                            <div class="form-group row">
                                <small for="" class="col-5">No. Bill</small>
                                <input type="text" disabled class="form-control form-control-sm col-7" value="<?= $nextBill ?>">
                            </div>
                            <div class="form-group row">
                                <small for="" class="col-5">No. Reg</small>
                                <input type="text" disabled class="form-control form-control-sm col-7">
                            </div>
                            <div class="form-group row">
                                <small for="" class="col-5">Tanggal Pendaftaran</small>
                                <input type="text" disabled class="form-control form-control-sm col-7" value="<?= $tanggal ?>">
                            </div>
                        </div>
                    </div>

                    <div class="card card-info">
                        <div class="card-header">
                            Pembayaran
                        </div>
                        <div class="card-body">

                            <div class="form-group row">
                                <small for="" class="col-5">Jenis Pembayaran</small>
                                <select class="form-control form-control-sm col-7">
                                    <option>-- --</option>
                                    <option>Klinik Tongfang</option>
                                    <option>Test</option>
                                </select>
                            </div>
                            <div class="form-group row">
                                <small for="" class="col-5">Status Daftar</small>
                                <select class="form-control form-control-sm col-7">
                                    <option>-- --</option>
                                    <option>Klinik Tongfang</option>
                                    <option>Test</option>
                                </select>
                            </div>

                            <div class="form-group row">
                                <small for="" class="col-5">Kasir</small>
                                <input type="text" disabled class="form-control form-control-sm col-7" value="<?= $this->session->userdata('name') ?>">
                            </div>

                            <div class="form-group row">
                                <small for="" class="col-5">Tarif Estimasi</small>
                                <h4 class="text-primary">Rp. 150.000,-</h4>
                            </div>

                            <div class="form-group row mt-4 d-flex justify-content-center mb-0">
                                <button type="button" class="btn btn-secondary">Reset</button>
                                <button type="button" class="btn btn-success ml-1">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>