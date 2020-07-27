<?php
     session_start();
     include('config/config.php');
     include('config/checklogin.php');
     check_login();
     //update profile
     if(isset($_POST['updateUser']))
    {
        if ( empty($_POST["login_username"]) || empty($_POST["login_user_email"])) 
        {
            $err="Empty Fields Not Allowed";
        }
        else
        {
            
            $login_username = $_POST['login_username'];
            $login_user_email = $_POST['login_user_email'];
            $login_id = $_SESSION['login_id'];

            //Insert Captured information to a database table
            $postQuery="UPDATE iFleet_Login SET login_username =?, login_user_email =? WHERE login_id =? ";
            $postStmt = $mysqli->prepare($postQuery);
            //bind paramaters
            $rc=$postStmt->bind_param('ssi', $login_username, $login_user_email, $login_id);
            $postStmt->execute();
            //declare a varible which will be passed to alert function
            if($postStmt)
            {
                $success = "Profile Updated" && header("refresh:1; url=sudo_profile.php");
            }
            else 
            {
                $err = "Please Try Again Or Try Later";
            }
        }
    }
    if(isset($_POST['changePassword']))
    {

        //Change Password
       $error = 0;
       if (isset($_POST['old_password']) && !empty($_POST['old_password'])) {
           $old_password=mysqli_real_escape_string($mysqli,trim(sha1(md5($_POST['old_password']))));
       }else{
           $error = 1;
           $err="Old Password Cannot Be Empty";
       }
       if (isset($_POST['new_password']) && !empty($_POST['new_password'])) {
           $new_password=mysqli_real_escape_string($mysqli,trim(sha1(md5($_POST['new_password']))));
       }else{
           $error = 1;
           $err="New Password Cannot Be Empty";
       }
       if (isset($_POST['confirm_password']) && !empty($_POST['confirm_password'])) {
           $confirm_password=mysqli_real_escape_string($mysqli,trim(sha1(md5($_POST['confirm_password']))));
       }else{
           $error = 1;
           $err="Confirmation Password Cannot Be Empty";
       }

       if(!$error)

           {
               $sql="SELECT * FROM  iFleet_Login WHERE  login_user_password !='$old_password' ";
               $res=mysqli_query($mysqli,$sql);
               if (mysqli_num_rows($res) > 0) {
               $row = mysqli_fetch_assoc($res);
               if ($old_password == $row['login_user_password'])
               {
                   $err =  "Please Enter Correct Old Password";
               }
               elseif($new_password != $new_password)
               {
                   $err = "Confirmation Password Does Not Match";
               }
                       
               $login_id = $_SESSION['login_id'];
               $new_password = sha1(md5($_POST['new_password']));
               //Insert Captured information to a database table
               $query="UPDATE iFleet_Login SET  login_user_password=? WHERE login_id =?";
               $stmt = $mysqli->prepare($query);
               //bind paramaters
               $rc=$stmt->bind_param('si', $new_password, $login_id);
               $stmt->execute();

               //declare a varible which will be passed to alert function
               if($stmt)
               {
                   $success = "Password Changed" && header("refresh:1; url=sudo_profile.php");
               }
               else 
               {
                   $err = "Please Try Again Or Try Later";
               }
            }
        }
    }
    require_once('partials/_head.php');
?>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Navbar -->
    <?php require_once('partials/_nav.php');?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
    <?php 
        require_once('partials/_sidenav.php');
        $login_id = $_SESSION['login_id'];
        $ret="SELECT * FROM  iFleet_Login  WHERE login_id = ? "; 
        $stmt= $mysqli->prepare($ret) ;
        $stmt->bind_param('i', $login_id);
        $stmt->execute() ;//ok
        $res=$stmt->get_result();
        while($user=$res->fetch_object())
        {
    ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="sudo_dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item active"><?php echo $user->login_username;?>'s Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="assets/dist/img/user4-128x128.jpg"
                       alt="User profile picture">
                </div>
                <h3 class="profile-username text-center"><?php echo $user->login_username;?></h3>
                <p class="text-muted text-center"><?php echo $user->login_user_email;?></p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#updateProfile" data-toggle="tab">Change Username</a></li>
                  <li class="nav-item"><a class="nav-link" href="#changePwd" data-toggle="tab">Change Password</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="updateProfile">
                    <form method="post" class="form-horizontal">
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Username</label>
                            <div class="col-sm-10">
                            <input type="username" class="form-control" name="login_username" value="<?php echo $user->login_username;?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                            <input type="email" class="form-control" name="login_user_email" value="<?php echo $user->login_user_email;?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="offset-sm-2 col-sm-10">
                            <button type="submit" name="updateUser" class="btn btn-warning">Submit</button>
                            </div>
                        </div>
                    </form>
                  </div>

                  <div class="tab-pane" id="changePwd">
                    <form method="post" class="form-horizontal">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Old Password</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" name="old_password">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">New Password</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" name="new_password" >
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Confirm New Password</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" name="confirm_password" >
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" name="changePassword" class="btn btn-danger">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php require_once('partials/_footer.php'); }?>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<?php require_once('partials/_scripts.php');?>
</body>

</html>
