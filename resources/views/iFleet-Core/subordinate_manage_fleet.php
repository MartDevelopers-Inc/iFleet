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
            <h1>Fleet  Management</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="subordinate_dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="subordinate_manage_fleet.php">Fleet</a></li>
              <li class="breadcrumb-item active">Fleet Categories</li>
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
                <a class="btn btn-outline-success" href="subordinate_add_fleet_category.php">
                    <span>
                        <i class="fas fa-plus"></i>
                    </span>
                    Register New Fleet Category
                </a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Category Code</th>
                  <th>Category Name</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                        //Fetch all categories
                        $ret="SELECT * FROM  iFleet_category"; 
                        $stmt= $mysqli->prepare($ret) ;
                        $stmt->execute();
                        $res=$stmt->get_result();
                        $cnt=1;
                        while($category=$res->fetch_object())
                        {
                    ?>
                        <tr>
                            <td>
                                <a class="text_success" href="subordinate_update_fleet_category.php?code=<?php echo $category->category_code;?>">
                                    <?php echo $category->category_code;?>
                                </a>
                            </td>
                            <td><?php echo $category->category_name;?></td>
                            <td>
                                <a class="badge badge-success" href="subordinate_add_fleet.php?fleet_category_id=<?php echo $category->category_id;?>&fleet_category_name=<?php echo $category->category_name;?>">
                                    <i class="fas fa-car"></i><i class="fas fa-plus"></i>
                                    Add Fleet 
                                </a>
                                <a class="badge badge-primary" href="subordinate_view_fleets.php?fleet_category_id=<?php echo $category->category_id;?>&fleet_category_name=<?php echo $category->category_name;?>">
                                    <i class="fas fa-eye"></i><i class="fas fa-car"></i>
                                    View Fleets
                                </a>
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
