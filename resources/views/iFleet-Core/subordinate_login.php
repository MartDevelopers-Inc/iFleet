<?php
   session_start();
   include('config/config.php');

   //login 
   if(isset($_POST['login']))
   {
      $login_user_permission = $_POST['login_user_permission'];
      $login_user_email = $_POST['login_user_email'];
      $login_user_password = sha1(md5($_POST['login_user_password']));//double encrypt to increase security
      $stmt=$mysqli->prepare("SELECT login_user_permission, login_user_email, login_user_password, login_id  FROM iFleet_Login  WHERE login_user_permission =? AND login_user_email =? AND login_user_password =?");//sql to log in user
      $stmt->bind_param('iss',  $login_user_permission, $login_user_email, $login_user_password);//bind fetched parameters
      $stmt->execute();//execute bind 
      $stmt -> bind_result($login_user_permission, $login_user_email, $login_user_password, $login_id);//bind result
      $rs=$stmt->fetch();
      $_SESSION['login_id'] = $login_id;
      if($rs && $login_user_permission == '1')
      {
        //if its sucessfull
        header("location:sudo_dashboard.php");
      }
      elseif($rs  && $login_user_permission == '0' )
      {
        $err ="Permission Access Denied You To Access This Module";
      }
      else
      {
        $err = "Incorrect Authentication Credentials ";
      }
   }

  require_once('partials/_head.php');
?>
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="index.php"><b>i</b>Fleet</a>
      </div>
      <!-- /.login-logo -->
      <div class="card">
        <div class="card-body login-card-body">
          <p class="login-box-msg">Sign in to start your session</p>
          <form  method="post">
            <div class="input-group mb-3">
              <input type="email" name="login_user_email" class="form-control" placeholder="Email">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input type="password" name="login_user_password" class="form-control" placeholder="Password">
              <input style="display:none"  type="text" name="login_user_permission"  class="form-control" value="1">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
            <div class="row">
              <!-- /.col -->
              <div class="col-4">
                <button type="submit" name="login" class="btn btn-primary btn-block">Sign In</button>
              </div>
              <!-- /.col -->
            </div>
          </form>
          <div class="social-auth-links text-center mb-3">
            <p>- OR -</p>
            <a href="index.php" class="btn btn-block btn-primary">
              <i class="fas fa-user-shield mr-2"></i> Login As Administrator
            </a>
          </div>
          <p class="mb-1">
            <a href="subordinate_forgot_password.php">I forgot my password</a>
          </p>
        </div>
        <!-- /.login-card-body -->
      </div>
    </div>
    <!-- /.login-box -->
  <?php require_once('partials/_scripts.php');?>
  </body>
</html>
