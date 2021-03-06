<?php
    session_start();
    include('config/config.php');
    include('config/checklogin.php');
    check_login();
    require_once('partials/_head.php');
?>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Navbar -->
    <?php require_once('partials/_nav.php');?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
    <?php require_once('partials/_staffnav.php');?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Advance Reporting - HRM Records</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="subordinate_dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item">Advance Reporting</li>
              <li class="breadcrumb-item">HRM</li>
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
                  <th>Gender</th>
                  <th>DOB</th>
                  <th>Acc. Status</th>
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
                                <a class="text_success" href="subordinate_hrm_view_profile.php?number=<?php echo $staff->staff_number;?>">
                                    <?php echo $staff->staff_number;?>
                                </a>
                            </td>
                            <td><?php echo $staff->staff_name;?></td>
                            <td><?php echo $staff->staff_natid;?></td>
                            <td><?php echo $staff->staff_phone;?></td>
                            <td><?php echo $staff->staff_email;?></td>
                            <td><?php echo $staff->staff_gender;?></td>
                            <td><?php echo $staff->staff_dob;?></td>

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
