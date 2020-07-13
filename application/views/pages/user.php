<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">List User</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal_add" tabindex="-1" role="dialog" aria-labelledby="modal_addTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="<?= base_url() ?>user/create" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Buat User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="padding: 2rem;">
                        <div class="form-group row">
                            <label for="role_id" class="col-3">Role</label>
                            <select name="role_id" id="role_id" class="form-control form-control-sm col-9">
                                <?php foreach ($roles as $key => $role) {
                                    echo '<option value="' . $role->id . '">' . $role->name . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group row">
                            <label for="username" class="col-3">Username</label>
                            <input id="username" name="username" type="text" class="form-control form-control-sm col-9">
                        </div>
                        <div id="form-change-password">
                            <div class="form-group row">
                                <label for="password" class="col-3">Password</label>
                                <input id="password" name="password" type="password" minLength="6" required class="form-control form-control-sm col-9">
                            </div>
                        </div>

                        <div id="change-password">
                            <a href="#" onclick="initChangePassword()">Ganti Password ?</a> <br> <br>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-3">Nama Lengkap</label>
                            <input id="name" name="name" type="text" class="form-control form-control-sm col-9">
                        </div>
                        <div class="form-group row">
                            <label for="nik" class="col-3">NIK</label>
                            <input id="nik" name="nik" type="number" class="form-control form-control-sm col-9">
                        </div>
                        <div class="form-group row">
                            <label for="no_telp" class="col-3">No. Telepon</label>
                            <input id="no_telp" name="no_telp" type="text" class="form-control form-control-sm col-9">
                        </div>
                        <div class="form-group row">
                            <label for="dob" class="col-3">Tanggal Lahir</label>
                            <input id="dob" name="dob" type="date" class="form-control form-control-sm col-9">
                        </div>
                        <div class="form-group row">
                            <label for="kota" class="col-3">Kota</label>
                            <input id="kota" name="kota" type="text" class="form-control form-control-sm col-9">
                        </div>
                        <div class="form-group row">
                            <label for="kecamatan" class="col-3">Kecamtan</label>
                            <input id="kecamatan" name="kecamatan" type="text" class="form-control form-control-sm col-9">
                        </div>
                        <div class="form-group row">
                            <label for="kelurahan" class="col-3">Kelurahan</label>
                            <input id="kelurahan" name="kelurahan" type="text" class="form-control form-control-sm col-9">
                        </div>
                        <div class="form-group row">
                            <label for="rt" class="col-3">RT</label>
                            <input id="rt" name="rt" type="text" class="form-control form-control-sm col-9">
                        </div>
                        <div class="form-group row">
                            <label for="rw" class="col-3">RW</label>
                            <input id="rw" name="rw" type="text" class="form-control form-control-sm col-9">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" id="user_id" name="user_id">
                        <input type="hidden" id="isChangePassword" name="isChangePassword">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="button" class="btn" data-dismiss="modal">Kembali</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal_hapus" tabindex="-1" role="dialog" aria-labelledby="modal_hapusTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Hapus User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="padding: 1rem;">
                    <div class="row mb-3">
                        <div class="col-12">
                            <p>Apa anda yakin akan menghapus data user ini ? </p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <form action="<?= base_url() ?>user/delete" method="POST">
                        <input type="hidden" id="delete_id" name="delete_id">
                        <button type="submit" class="btn">Konfirmasi</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
                    </form>
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
                            <button class="btn btn-primary btn-sm" onclick="initBuatUser()"> <i class="fas fa-plus"></i> &nbsp; Buat User Baru</button>
                            <button class="btn btn-secondary btn-sm" onclick="refresh()"> <i class="fas fa-sync"></i> &nbsp; Refresh</button>
                            <table id="tableUser" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Role</th>
                                        <th>Username</th>
                                        <th>Name</th>
                                        <th>DoB</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($users as $key => $user) {
                                        $dob = new DateTime($user->dob);
                                        echo '
                                            <tr>
                                                <td class="text-center"> ' . ($key + 1) . '</td>
                                                <td class="text-uppercase">' . $user->roles->name . '</td>
                                                <td>' . $user->username . '</td>
                                                <td>' . $user->name . '</td>
                                                <td>' . $dob->format('d M Y') . '</td>
                                                <td style="width:160px;text-align:center;">
                                                    <button value="' . $user->id . '" class="btn-hapusUser btn btn-sm btn-danger" onclick="deleteUser(' . $user->id . ')">
                                                        <i class="far fa-trash-alt"></i> &nbsp; Hapus
                                                    </button>
                                                    <button value="' . $user->id . '" class="btn-lihatUser btn btn-sm btn-info" onclick="showDetailUser(' . $user->id . ')">
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
    $('#tableUser').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
    });

    function initChangePassword() {
        $('#form-change-password').html(`
                            <div class="form-group row">
                                <label for="password" class="col-3">Password</label>
                                <input id="password" name="password" type="password" minLength="6" required class="form-control form-control-sm col-9">
                            </div>`);
        $('#change-password').html(`<a href="#" onclick="cancelChangePassword()">Batalkan!</a><br><br>`);
        $('#isChangePassword').val(true);
    }

    function cancelChangePassword() {
        $('#form-change-password').html(``);
        $('#change-password').html(`<a href="#" onclick="initChangePassword()">Ganti Password ?</a> <br> <br>`);
        $('#isChangePassword').val(null);
    }

    function initBuatUser() {
        $('#exampleModalLongTitle').html('Buat User');
        $('#change-password').html('');
        $('#form-change-password').html(`
                            <div class="form-group row">
                                <label for="password" class="col-3">Password</label>
                                <input id="password" name="password" type="password" minLength="6" required class="form-control form-control-sm col-9">
                            </div>`);
        $('#role_id').val('');
        $('#username').val('');
        $('#name').val('');
        $('#nik').val('');
        $('#no_telp').val('');
        $('#dob').val('');
        $('#kota').val('');
        $('#kecamatan').val('');
        $('#kelurahan').val('');
        $('#rt').val('');
        $('#rw').val('');
        $('#user_id').val('');
        $('#modal_add').modal('show');
    }

    function refresh() {
        window.location.reload();
    }

    function deleteUser(id) {
        $('#delete_id').val(id);
        $('#modal_hapus').modal('show');
    }

    function showDetailUser(id) {
        $.ajax({
            url: `<?= base_url() ?>user/get?user_id=${id}`,
            type: 'GET',
            dataType: 'JSON',
            success: function(data) {
                $('#form-change-password').html('');
                $('#exampleModalLongTitle').html('Update User');
                $('#change-password').html(`<a href="#" onclick="initChangePassword()">Ganti Password ?</a> <br> <br>`);
                $('#role_id').val(data.role_id);
                $('#username').val(data.username);
                $('#name').val(data.name);
                $('#nik').val(data.nik);
                $('#no_telp').val(data.no_telp);
                $('#dob').val(moment(data.dob).format('YYYY-MM-D'));
                $('#kota').val(data.kota);
                $('#kecamatan').val(data.kecamatan);
                $('#kelurahan').val(data.kelurahan);
                $('#rt').val(data.rt);
                $('#rw').val(data.rw);
                $('#user_id').val(data.id);
                $('#modal_add').modal('show');
            },
            error: function(err) {}
        });
    }
</script>