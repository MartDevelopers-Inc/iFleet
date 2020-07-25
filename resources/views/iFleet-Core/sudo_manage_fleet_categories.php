<?php
    session_start();
    include('config/config.php');
    include('config/checklogin.php');
    check_login();

    //Delete fleet category
    if(isset($_GET['delete']))
    {
          $id=intval($_GET['delete']);
          $adn="DELETE FROM  iFleet_category  WHERE  category_id = ?";
          $stmt= $mysqli->prepare($adn);
          $stmt->bind_param('i',$id);
          $stmt->execute();
          $stmt->close();	 
         if($stmt)
         {
             $success = "Deleted" && header("refresh:1; url=sudo_manage_fleet_categories.php");
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
            <h1>Fleet Categories Management</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="sudo_dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="sudo_manage_fleet_categories.php">Fleet Categories</a></li>
              <li class="breadcrumb-item active">Manage</li>
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
                <a class="btn btn-outline-success" href="sudo_add_fleet_category.php">
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
                                <a class="text_success" href="sudo_update_fleet_category.php?code=<?php echo $category->category_code;?>">
                                    <?php echo $category->category_code;?>
                                </a>
                            </td>
                            <td><?php echo $category->category_name;?></td>
                            <td>
                                <a class="badge badge-warning" href="sudo_update_fleet_category.php?code=<?php echo $category->category_code;?>">
                                    <i class="fas fa-edit"></i>
                                    Update
                                </a>
                                <a class="badge badge-danger" href="sudo_manage_fleet_categories.php?delete=<?php echo $category->category_id;?>">
                                    <i class="fas fa-trash"></i>
                                    Delete
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
