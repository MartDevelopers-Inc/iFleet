<?php
    session_start();
    include('config/config.php');
    require_once('partials/_head.php');
?>
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href="index.php"><b>i</b>Fleet</a>
            </div>
            <div class="card">
                <div class="card-body login-card-body">
                <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>

                <form  method="post">
                    <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-12">
                        <button type="submit" name="reset_pwd" class="btn btn-primary btn-block">Request new password</button>
                    </div>
                    <!-- /.col -->
                    </div>
                </form>

                <p class="mt-3 mb-1">
                    <a href="index.php">Login</a>
                </p>
                </div>
                <!-- /.login-card-body -->
            </div>
        </div>
        <?php require_once('partials/_scripts.php');?>
    </body>
</html>
