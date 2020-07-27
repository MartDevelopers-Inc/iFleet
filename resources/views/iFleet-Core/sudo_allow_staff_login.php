<?php
    session_start();
    include('config/config.php');
    include('config/checklogin.php');
    check_login();
    
    if(isset($_POST['allowLogin']))
    {
            if ( empty($_POST["login_username"]) || empty($_POST["login_user_password"]) || empty($_POST["login_user_email"]) ) 
            {
                $err="Blank Values Not Accepted";
            }
            else
            {                         
                $login_user_password = sha1(md5($_POST['login_user_password']));
                $login_user_email = $_GET['email'];
                $login_username = $_POST['login_username'];
                
                //Insert Captured information to a database table
                $postQuery="INSERT INTO iFleet_Login (login_username, login_user_password, login_user_email) VALUES (?,?,?)";
                $postStmt = $mysqli->prepare($postQuery);
                //bind paramaters
                $rc=$postStmt->bind_param('sss',  $login_username, $login_user_password, $login_user_email);
                $postStmt->execute();
                //declare a varible which will be passed to alert function
                if($postStmt)
                {
                    $success = "Allowed To Log In" && header("refresh:1; url=sudo_allow_staff_login.php");
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
        $staff_id = $_GET['staff_id'];
        $ret="SELECT * FROM  iFleet_Staff WHERE staff_id = '$staff_id'"; 
        $stmt= $mysqli->prepare($ret) ;
        $stmt->execute();
        $res=$stmt->get_result();
        while($staff=$res->fetch_object())
        {
    ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Allow Login</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="sudo_dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Login Permission</li>
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
                            <div class="form-group col-md-12">
                                <label for="exampleInputEmail1">User Name</label>
                                <input type="text" name="login_username" value="<?php echo $staff ->staff_name;?>"  class="form-control">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="text" name="login_user_email" value="<?php echo $staff ->staff_email;?>"  class="form-control">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="exampleInputEmail1">Password</label>
                                <input type="text" name="login_user_password"   class="form-control">
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" name="allowLogin" class="btn btn-outline-primary"><i class="fas fa-save"></i> Save</button>
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
