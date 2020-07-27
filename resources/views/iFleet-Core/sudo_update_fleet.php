<?php
    session_start();
    include('config/config.php');
    include('config/checklogin.php');
    check_login();
    
    if(isset($_POST['update_fleet']))
    {
            if ( empty($_POST["fleet_name"]) || empty($_POST["vehicle_numbers"]) ) 
            {
                $err="Blank Values Not Accepted";
            }
            else
            {                         
                $fleet_code = $_GET['fleet_code'];
                $fleet_name = $_POST['fleet_name'];
                $fleet_desc = $_POST['fleet_desc'];
                $vehicle_numbers= $_POST['vehicle_numbers'];
                //Insert Captured information to a database table
                $postQuery="UPDATE iFleet_fleet SET   fleet_name =?, fleet_desc =?, vehicle_numbers =? WHERE fleet_code = ?";
                $postStmt = $mysqli->prepare($postQuery);
                //bind paramaters
                $rc=$postStmt->bind_param('ssss',  $fleet_name, $fleet_desc, $vehicle_numbers, $fleet_code);
                $postStmt->execute();
                //declare a varible which will be passed to alert function
                if($postStmt)
                {
                    $success = "Fleet Udpated" && header("refresh:1; url=sudo_manage_fleet.php");
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
        $fleet_code = $_GET['fleet_code'];
        $ret="SELECT * FROM  iFleet_fleet WHERE fleet_code = '$fleet_code'"; 
        $stmt= $mysqli->prepare($ret) ;
        $stmt->execute();
        $res=$stmt->get_result();
        while($fleet=$res->fetch_object())
        {
    ?>
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
              <li class="breadcrumb-item"><a href="sudo_get_fleet_categories.php">Fleet</a></li>
              <li class="breadcrumb-item"><?php echo $fleet->fleet_name;?></li>
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
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Fleet Name</label>
                                <input type="text" name="fleet_name" value="<?php echo $fleet ->fleet_name;?>"  class="form-control">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputPassword1">Fleet Code | Number</label>
                                <input type="text" class="form-control" readonly name="fleet_code" value="<?php echo $fleet->fleet_code;?>">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Number Of Vehicles Under This Fleet</label>
                                <input type="text" name="vehicle_numbers" value="<?php echo $fleet->vehicle_numbers;?>" class="form-control">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="exampleInputEmail1">Fleet Description</label>
                                <textarea type="text" rows="5" name="fleet_desc"  class="form-control" ><?php echo $fleet->fleet_desc;?></textarea>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" name="update_fleet" class="btn btn-outline-primary"><i class="fas fa-save"></i> Save</button>
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
