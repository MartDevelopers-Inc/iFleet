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
    <?php 
        require_once('partials/_staffnav.php');
        $fleet_category_id  = $_GET['fleet_category_id'];
        $ret="SELECT * FROM  iFleet_category WHERE category_id = '$fleet_category_id'"; 
        $stmt= $mysqli->prepare($ret) ;
        $stmt->execute();
        $res=$stmt->get_result();
        $cnt=1;
        while($category=$res->fetch_object())
        {

    ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Fleet  Management</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="subordinate_dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="subordinate_manage_fleet.php">Fleet</a></li>
              <li class="breadcrumb-item active"><?php echo $category->category_name;?></li>
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
                <a class="btn btn-outline-success" href="subordinate_add_fleet.php?fleet_category_id=<?php echo $category->category_id;?>&fleet_category_name=<?php echo $category->category_name;?>">
                    <span>
                        <i class="fas fa-plus"></i>
                    </span>
                    Register New Fleet
                </a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Fleet Number</th>
                  <th>Fleet Name</th>
                  <th>No Of Vehicles</th>
                  <th>Staff Incharge</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                        $fleet_category_id  = $_GET['fleet_category_id'];
                        $ret="SELECT * FROM  iFleet_fleet WHERE fleet_category_id = '$fleet_category_id' AND fleet_staff_name != '' "; 
                        $stmt= $mysqli->prepare($ret) ;
                        $stmt->execute();
                        $res=$stmt->get_result();
                        $cnt=1;
                        while($fleet=$res->fetch_object())
                        {
                    ?>
                        <tr>
                            <td>
                                <a class="text_success" href="subordinate_update_fleet.php?fleet_code=<?php echo $fleet->fleet_code;?>">
                                    <?php echo $fleet->fleet_code;?>
                                </a>
                            </td>
                            <td><?php echo $fleet->fleet_name;?></td>
                            <td><?php echo $fleet->vehicle_numbers;?> Automobiles</td>
                            <th><?php echo $fleet->fleet_staff_name;?></th>
                            <td>
                                <a class="badge badge-success" href="subordinate_view_single_fleet.php?fleet_id=<?php echo $fleet->fleet_id;?>">
                                    <i class="fas fa-eye"></i><i class="fas fa-car"></i>
                                    View Fleet 
                                </a>
                            </td>
                        </tr>
                    <?php }}?>
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
