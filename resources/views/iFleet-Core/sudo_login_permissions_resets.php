<?php
    session_start();
    include('config/config.php');
    include('config/checklogin.php');
    check_login();
    if(isset($_GET['deny_login']))
   {
     //Deny USer login logic
      //1. Update User table set allow login = 0
      //2. Delete User from Login Table
          $id=intval($_GET['deny_login']);
          $allow_login=$_GET['allow_login'];
          $login_user_email = $_GET['email'];
          $adn="UPDATE  iFleet_Staff SET allow_login =?  WHERE  staff_id= ?";
          $delete = "DELETE FROM iFleet_Login WHERE login_user_email =? ";
          $stmt= $mysqli->prepare($adn);
          $delStmt = $mysqli->prepare($delete);
          $stmt->bind_param('si',$allow_login, $id );
          $delStmt->bind_param('s', $login_user_email);
          $stmt->execute();
          $delStmt->execute();
          $stmt->close();	 
          $delStmt->close();
          if($stmt && $delStmt)
          {
              $success = "Login Disabled" && header("refresh:1; url=sudo_login_permissions_resets.php");
          }
          else
          {
              $err = "Try Again Later";
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
    <?php require_once('partials/_sidenav.php');?>
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
              <li class="breadcrumb-item active">Login Permissions</li>
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
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>Name</th>
                  <th>ID No.</th>
                  <th>Phone</th>
                  <th>Email</th>
                  <th>Account Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                        //Fetch all Staff In created_at.Desc
                        $ret="SELECT * FROM  iFleet_Staff"; 
                        $stmt= $mysqli->prepare($ret) ;
                        $stmt->execute();
                        $res=$stmt->get_result();
                        $cnt=1;
                        while($staff=$res->fetch_object())
                        {
                    ?>
                        <tr>
                            <td>
                                <a class="text_success">
                                    <?php echo $staff->staff_number;?>
                                </a>
                            </td>
                            <td><?php echo $staff->staff_name;?></td>
                            <td><?php echo $staff->staff_natid;?></td>
                            <td><?php echo $staff->staff_phone;?></td>
                            <td><?php echo $staff->staff_email;?></td>
                            <td>
                              <?php
                                  if($staff->staff_acc_status == 'Active')
                                  {
                                      echo 
                                      "
                                          <span class='text-success'>$staff->staff_acc_status</span>
                                      
                                      ";
                                  }
                                  else if($staff->staff_acc_status == 'Dormant')
                                  {
                                      echo 
                                      "
                                          <span class='text-warning'>$staff->staff_acc_status</span>
                                      ";
                                  }
                                  else
                                  {
                                      echo 
                                      "
                                          <span class='text-danger'>$staff->staff_acc_status</span>
                                      ";
                                  }
                              ?>  
                            </td>
                            <td>
                            <?php
                              if($staff->allow_login == '1')
                              {
                                echo 
                                "
                                <a class='badge badge-danger' href='sudo_login_permissions_resets.php?deny_login=$staff->staff_id&email=$staff->staff_email&allow_login=0'>
                                    <i class='fas fa-user-times'></i>
                                    Deny Login
                                </a>
                                ";
                              }
                              else
                              {
                                echo 
                                "
                                <a class='badge badge-success' href='sudo_allow_staff_login.php?staff_id=$staff->staff_id&email=$staff->staff_email&allow_login=1'>
                                    <i class='fas fa-user-check'></i>
                                  Allow Login
                                </a>
                                ";
                              }
                            ?>

                                

                            </td>
                        </tr>
                    <?php }?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
    </section>
  </div>
  <?php require_once('partials/_footer.php');?>
</div>
<?php require_once("partials/_scripts.php");?>
</body>
</html>
