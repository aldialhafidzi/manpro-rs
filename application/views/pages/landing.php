<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-sm-12 col-md-6 text-center">
            <h1 class="text-center">
                MANPRO-RS
            </h1>
            <p>Modul Pendaftaran (Rawat Jalan - Rawat Inap) & Rekam Medis</p>
            <hr>
            <div>
                <a href="<?php echo base_url() ?>admin/login" class="btn btn-primary">Go To Admin Page</a>

                <?php if ($this->session->userdata('role_id')) { ?>
                    <a class="btn btn-warning" href="<?php echo base_url() ?>logout">LOGOUT</a>
                <?php } else {  ?>
                    <a class="btn btn-warning" href="<?php echo base_url() ?>user/login">Login As User</a>
                <?php } ?>
            </div>
            <?php if ($this->session->userdata('role_id') == '1') { ?>
                <div class="badge badge-danger mt-4">
                    . You are login as Superadmin .
                </div>
            <?php } ?>
            <?php if ($this->session->userdata('role_id') == '2') { ?>
                <div class="badge badge-warning mt-4">
                    . You are login as Admin Pendaftaran.
                </div>
            <?php } ?>
            <?php if ($this->session->userdata('role_id') == '3') { ?>
                <div class="badge badge-warning mt-4">
                    . You are login as Admin Input.
                </div>
            <?php } ?>
            <?php if ($this->session->userdata('role_id') == '4') { ?>
                <div class="badge badge-secondary mt-4">
                    . You are login as User .
                </div>
            <?php } ?>
        </div>
    </div>
</div>