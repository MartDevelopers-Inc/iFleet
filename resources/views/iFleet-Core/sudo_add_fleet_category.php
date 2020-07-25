<?php
    session_start();
    include('config/config.php');
    include('config/checklogin.php');
    check_login();
    
    if(isset($_POST['add_fleet_category']))
    {
            $error = 0;
            if (isset($_POST['category_name']) && !empty($_POST['category_name'])) {
                $category_name=mysqli_real_escape_string($mysqli,trim($_POST['category_name']));
            }else{
                $error = 1;
                $err="Fleet Category Name Cannot Be Empty";
            }                        
            
            $category_name = $_POST['category_name'];
            $category_code = $_POST['category_code'];
            $category_desc = $_POST['category_desc'];
            
            //Insert Captured information to a database table
            $postQuery="INSERT INTO iFleet_category (category_name, category_code, category_desc) VALUES (?,?,?) ";
            $postStmt = $mysqli->prepare($postQuery);
            //bind paramaters
            $rc=$postStmt->bind_param('sss', $category_name, $category_code, $category_desc);
            $postStmt->execute();
            //declare a varible which will be passed to alert function
            if($postStmt)
            {
                $success = "Fleet Category Added" && header("refresh:1; url=sudo_add_fleet_category.php");
            }
            else 
            {
                $err = "Please Try Again Or Try Later";
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
    <?php require_once('partials/_sidenav.php');?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Fleet Management</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="sudo_dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="sudo_add_fleet_category.php">Fleet</a></li>
              <li class="breadcrumb-item active">Register New Fleet Category</li>
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
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Category Name</label>
                                <input type="text" name="category_name"  class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputPassword1">Category Code |  Number</label>
                                <input type="text" class="form-control" readonly name="category_code" value="iFleet-<?php echo $beta;?>-<?php echo $alpha;?>">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="exampleInputEmail1">Category Description</label>
                                <textarea type="text" rows="5" name="category_description"  class="form-control" ></textarea>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" name="add_fleet_category" class="btn btn-outline-primary"><i class="fas fa-save"></i> Save</button>
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
  <?php require_once('partials/_footer.php');?>
</div>
<?php require_once("partials/_scripts.php");?>
</body>
</html>
