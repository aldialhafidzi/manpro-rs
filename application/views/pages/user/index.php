<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> My Profile</h1>
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">

                        <?= $user['nama']; ?>
                    </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <dl>
                        <dt>Email</dt>
                        <dd><?= $user['email']; ?></dd>
                    </dl>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>


    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->