<div class="register-box">
    <div class="register-logo">
        <a href="../../index2.html"><b>Rumah</b>Sakit</a>
    </div>

    <div class="card">
        <div class="card-body register-card-body">
            <p class="login-box-msg">Pasien Baru</p>

            <form class="user" action="<?= base_url('home/register'); ?>" method="post" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" value="<?= set_value('nama'); ?>">
                    <?= form_error('nama', '<small class="text-danger pl-1">', '</small>'); ?>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?= set_value('email'); ?>">
                    <?= form_error('email', '<small class="text-danger pl-1">', '</small>'); ?>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?= set_value('username'); ?>">
                    <?= form_error('username', '<small class="text-danger pl-1">', '</small>'); ?>
                </div>

                <div class="form-group">
                    <input type="password" class="form-control" id="password1" name="password1" placeholder="Password">
                    <?= form_error('password', '<small class="text-danger pl-1">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="password2" name="password2" placeholder="Retype password">
                    <!-- <?= form_error('password2', '<small class="text-danger pl-1">', '</small>'); ?> -->
                </div>

                <button type="submit" class="btn btn-primary btn-block">Register</button>

                <!-- /.col -->
                <div class="text-center">
                    <a class="small" href="<?= base_url() ?>home/login" class="text-center">Have a Account? Login!</a>

                </div>

                <!-- /.col -->
        </div>
        </form>



    </div>
    <!-- /.form-box -->
</div><!-- /.card -->
</div>
<!-- /.register-box -->