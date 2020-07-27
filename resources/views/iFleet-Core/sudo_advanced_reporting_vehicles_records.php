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
    <?php require_once('partials/_sidenav.php');?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Advanced Reporting - Vehicles Management</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="sudo_dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="sudo_dashboard.php">Fleet</a></li>
              <li class="breadcrumb-item active">Vehicles</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Reg No.</th>
                  <th>Vehicle Name</th>
                  <th>Fuel Type</th>
                  <th>Fleet Name</th>
                  <th>Status</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                        //Fetch all vehicles
                        $ret="SELECT * FROM  iFleet_Vehicles"; 
                        $stmt= $mysqli->prepare($ret) ;
                        $stmt->execute();
                        $res=$stmt->get_result();
                        $cnt=1;
                        while($vehicle=$res->fetch_object())
                        {
                    ?>
                        <tr>
                            <td>
                                <a class="text_success" href="sudo_view_vehicle.php?reg=<?php echo $vehicle->v_reg_no;?>">
                                    <?php echo $vehicle->v_reg_no;?>
                                </a>
                            </td>
                            <td><?php echo $vehicle->v_name;?></td>
                            <td><?php echo $vehicle->v_fuel;?></td>
                            <td><?php echo $vehicle->v_fleet_name;?></td>
                            <td>
                              <?php
                                  if($vehicle->v_status == 'Operational')
                                  {
                                      echo 
                                      "
                                          <span class='text-success'>$vehicle->v_status</span>
                                      
                                      ";
                                  }
                                  else
                                  {
                                      echo 
                                      "
                                          <span class='text-danger'>$vehicle->v_status</span>
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
