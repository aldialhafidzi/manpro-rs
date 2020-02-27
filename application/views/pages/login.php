<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>Login</b> Admin</a>
    </div>
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Anda hanya dapat login sebagai admin</p>

            <form action="<?php echo base_url('login/login_as_admin'); ?>" method="post" method="post">
                <div class="input-group mb-3">
                    <input type="text" name="username" class="form-control" placeholder="Username">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember">
                            <label for="remember">
                                Ingat Saya
                            </label>
                        </div>
                    </div>
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Masuk</button>
                    </div>
                </div>
            </form>
            <p class="mb-1">
                <a href="forgot-password.html">Lupa Password</a>
            </p>
        </div>
    </div>
</div>