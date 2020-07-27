<?php
    session_start();
    include('config/config.php');
    include('config/checklogin.php');
    check_login();

    //Delete reset
    if(isset($_GET['delete']))
    {
          $id=intval($_GET['delete']);
          $adn="DELETE FROM  iFleet_PasswordResets  WHERE  reset_id = ?";
          $stmt= $mysqli->prepare($adn);
          $stmt->bind_param('i',$id);
          $stmt->execute();
          $stmt->close();	 
         if($stmt)
         {
             $success = "Deleted" && header("refresh:1; url=sudo_password_resets.php");
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

            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Reset Code</th>
                  <th>Reset Token</th>
                  <th>Reset Email</th>
                  <th>Created At</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                        //Fetch all Password Resets In created_at.Desc
                        $ret="SELECT * FROM  iFleet_PasswordResets"; 
                        $stmt= $mysqli->prepare($ret) ;
                        $stmt->execute();
                        $res=$stmt->get_result();
                        $cnt=1;
                        while($reset=$res->fetch_object())
                        {
                    ?>
                        <tr>
                            <td><?php echo $cnt;?></td>
                            <td>
                                <a class="text_success">
                                    <?php echo $reset->reset_code;?>
                                </a>
                            </td>
                            <td><?php echo $reset->reset_token;?></td>
                            <td><?php echo $reset->reset_email;?></td>
                            <td><?php echo date("d M Y g:i", strtotime($reset->created_at));?></td>
                            <td>
                                <?php
                                if($reset->reset_status == 'Pending')
                                {
                                    echo "
                                <a class='badge badge-success' href='sudo_update_password.php?email=$reset->reset_email&reset_status=Approved'>
                                    <i class='fas fa-user-edit'></i>
                                    Update Password
                                </a>";
                                }
                                else
                                {
                                    echo "
                                <a class='badge badge-success' href='sudo_update_password.php?email=$reset->reset_email'>
                                    <i class='fas fa-envelope'></i>
                                    Send Mail
                                </a> ";
                                }
                                ?>
                                
                                <a class="badge badge-danger" href="sudo_password_resets.php?delete=<?php echo $reset->reset_id;?>">
                                    <i class="fas fa-trash"></i>
                                    Delete
                                </a>
                            </td>

                        </tr>
                    <?php $cnt = $cnt +1; }?>
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
