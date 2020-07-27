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
    <?php require_once('partials/_sidenav.php'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Advance Reporting - Fleet  Management</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="sudo_dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item">Advance Reporting</li>
              <li class="breadcrumb-item active">Fleet</li>
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
                  <th>Fleet Number</th>
                  <th>Fleet Name</th>
                  <th>No Of Vehicles</th>
                  <th>Staff Incharge</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                        $ret="SELECT * FROM  iFleet_fleet "; 
                        $stmt= $mysqli->prepare($ret) ;
                        $stmt->execute();
                        $res=$stmt->get_result();
                        $cnt=1;
                        while($fleet=$res->fetch_object())
                        {
                    ?>
                        <tr>
                            <td>
                                <a class="text_success" href="sudo_update_fleet.php?fleet_code=<?php echo $fleet->fleet_code;?>">
                                    <?php echo $fleet->fleet_code;?>
                                </a>
                            </td>
                            <td><?php echo $fleet->fleet_name;?> Fleet</td>
                            <td><?php echo $fleet->vehicle_numbers;?> Automobiles</td>
                            <th><?php echo $fleet->fleet_staff_name;?></th>                            
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
