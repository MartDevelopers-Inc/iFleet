<?php
    session_start();
    include('config/config.php');
    include('config/checklogin.php');
    check_login();
    
    if(isset($_POST['update_route']))
    {
          if ( empty($_POST["route_name"])) 
          {
              $err="Route Name Can Not Be Blank, Please Say Something 😬!";
          }
          else
          {                        
            
            $code = $_GET['code'];
            $route_name = $_POST['route_name'];
            $route_description = $_POST['route_description'];
            
            //Insert Captured information to a database table
            $postQuery="UPDATE iFleet_Route SET  route_name =?, route_description =? WHERE route_code =? ";
            $postStmt = $mysqli->prepare($postQuery);
            //bind paramaters
            $rc=$postStmt->bind_param('sss',  $route_name, $route_description, $route_code);
            $postStmt->execute();
            //declare a varible which will be passed to alert function
            if($postStmt)
            {
                $success = "Route Updated" && header("refresh:1; url=sudo_manage_routes.php");
            }
            else 
            {
                $err = "Please Try Again Or Try Later";
            }
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
    <?php 
        require_once('partials/_sidenav.php');
        $code = $_GET['code'];
        $ret="SELECT * FROM  iFleet_Route WHERE route_code = '$code'"; 
        $stmt= $mysqli->prepare($ret) ;
        $stmt->execute();
        $res=$stmt->get_result();
        $cnt=1;
        while($route=$res->fetch_object())
        {
    ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Fleet Routes Management</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="sudo_dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="sudo_manage_route.php">Fleet Routes</a></li>
              <li class="breadcrumb-item active"><?php echo $route->route_name;?></li>
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
                                <label for="exampleInputEmail1">Route Name</label>
                                <input type="text" name="route_name" value="<?php echo $route->route_name;?>"  class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputPassword1">Route Code |  Number</label>
                                <input type="text" class="form-control" readonly name="route_code" value="<?php echo $route->route_code;?>">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="exampleInputEmail1">Route Description</label>
                                <textarea type="text" rows="5" name="route_description"  class="form-control" ><?php echo $route->route_description;?></textarea>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" name="update_route" class="btn btn-outline-primary"><i class="fas fa-upload"></i> Update</button>
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
  <?php require_once('partials/_footer.php'); }?>
</div>
<?php require_once("partials/_scripts.php");?>
</body>
</html>
