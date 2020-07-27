<?php
    session_start();
    include('config/config.php');
    include('config/checklogin.php');
    check_login();
    
    if(isset($_POST['resetPassword']))
    {
            if ( empty($_POST["login_user_password"]) || empty($_POST["login_user_email"]) ) 
            {
                $err="Blank Values Not Accepted";
            }
            else
            {                         
                $login_user_password = sha1(md5($_POST['login_user_password']));
                $reset_status = $_GET['reset_status'];
                $reset_id = $_GET['reset_id'];
                $login_user_email = $_POST['login_user_email'];
                
                //Insert Captured information to a database table
                $postQuery="UPDATE iFleet_Login SET   login_user_password =? WHERE login_user_email = ?";
                $mailQry = "UPDATE iFleet_PasswordResets SET reset_status =? WHERE reset_id =?";
                $postStmt = $mysqli->prepare($postQuery);
                $mailStmt = $mysqli->prepare($mailQry);
                //bind paramaters
                $rc=$postStmt->bind_param('ss',  $login_user_password, $login_user_email);
                $rc = $mailStmt->bind_param('si', $reset_status, $reset_id);
                $postStmt->execute();
                $mailStmt->execute();
                //declare a varible which will be passed to alert function
                if($postStmt && $mailStmt)
                {
                    $success = "Password Reset" && header("refresh:1; url=sudo_password_resets.php");
                }
                else 
                {
                    $err = "Please Try Again Or Try Later";
                }
            } 
        }
    require_once('partials/_head.php');
    require_once('partials/_codeGen.php');
?>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Navbar -->
    <?php require_once('partials/_nav.php');?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
    <?php 
        require_once('partials/_sidenav.php');
        $reset_id = $_GET['reset_id'];
        $ret="SELECT * FROM  iFleet_PasswordResets WHERE reset_id = '$reset_id'"; 
        $stmt= $mysqli->prepare($ret) ;
        $stmt->execute();
        $res=$stmt->get_result();
        while($reset=$res->fetch_object())
        {
    ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Pasword Resets</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="sudo_dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Password Resets</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
                <h3>Fill All Required Details</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form role="form" method='post' enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">User Email</label>
                                <input type="text" name="login_user_email" value="<?php echo $reset ->reset_email;?>"  class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">New Password</label>
                                <input type="text" name="login_user_password" value="<?php echo $reset->reset_code;?>"  class="form-control">
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" name="resetPassword" class="btn btn-outline-primary"><i class="fas fa-save"></i> Save</button>
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
    </section>
  </div>
  <?php require_once('partials/_footer.php'); }?>
</div>
<?php require_once("partials/_scripts.php");?>
</body>
</html>
