<?php
    session_start();
    include('config/config.php');
    require_once('partials/_codeGen.php');

    if(isset($_POST['reset_pwd']))
    {
        if(!filter_var($_POST['reset_email'], FILTER_VALIDATE_EMAIL))
        {
            $err = 'Invalid Email';
        }
        $checkEmail = mysqli_query($mysqli, "SELECT `login_user_email` FROM `iFleet_Login` WHERE `login_user_email` = '".$_POST['reset_email']."'") or exit(mysqli_error($mysqli));
        if(mysqli_num_rows($checkEmail)) {
            //exit('This email is already being used');
            //Reset Password
            $reset_code = $_POST['reset_code'];
            $reset_token = sha1(md5($_POST['reset_token']));
            $reset_status = $_POST['reset_status'];
            $reset_email = $_POST['reset_email'];
            $query="INSERT INTO iFleet_PasswordResets (reset_email, reset_code, reset_token, reset_status) VALUES (?,?,?,?)";
            $reset = $mysqli->prepare($query);
            $rc=$reset->bind_param('ssss', $reset_email, $reset_code, $reset_token, $reset_status);
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
                        <input type="email" name="reset_email" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div style="display:none">
                        <input type="text" value="<?php echo $tk;?>" name="reset_token">
                        <input type="text" value="<?php echo $rc;?>" name="reset_code">
                        <input type="text" value="Pending" name="reset_status">
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
