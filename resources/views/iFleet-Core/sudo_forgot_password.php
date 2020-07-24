<?php
    session_start();
    include('config/config.php');
    require_once('partials/_head.php');
    if(isset($_POST['resetPassword']))
    {
        if(!filter_var($_POST['login_user_email'], FILTER_VALIDATE_EMAIL))
        {
            $err = 'Invalid Email';
        }
        $checkEmail = mysqli_query($mysqli, "SELECT `login_user_email` FROM `iFleet_Login` WHERE `login_user_email` = '".$_POST['login_user_email']."'") or exit(mysqli_error($mysqli));
        if(mysqli_num_rows($checkEmail)) {
            //exit('This email is already being used');
            //Reset Password
            $reset_code = $_POST['reset_code'];
            $token = sha1(md5($_POST['token']));
            $status = $_POST['status'];
            $email = $_POST['email'];
            $query="INSERT INTO iFleet_PasswordResets (email, reset_code, token, status) VALUES (?,?,?,?)";
            $reset = $mysqli->prepare($query);
            $rc=$reset->bind_param('ssss', $email, $reset_code, $token, $status);
            $reset->execute();
            if($reset)
            {
                $success = "Password Reset Instructions Sent To Your Email";
                // && header("refresh:1; url=index.php");
            }
            else
            {
                $err = "Please Try Again Or Try Later";
            }
             
        }
        else 
            {
                $err = "No account with that email";
            }
            
    }
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
