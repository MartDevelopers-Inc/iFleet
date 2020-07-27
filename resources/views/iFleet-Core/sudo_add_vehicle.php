<?php
    session_start();
    include('config/config.php');
    include('config/checklogin.php');
    check_login();
    
    if(isset($_POST['add_vehicle']))
    {
        if ( empty($_POST["v_reg_no"]) || empty($_POST['v_name']) || empty($_POST['v_fuel']) ) 
        {
            $err="Empty Fields Not Allowed";
        }
        else
        {                         
            
            $v_reg_no = $_POST['v_reg_no'];
            $v_name = $_POST['v_name'];
            $v_fleed_id = $_POST['v_fleet_id'];
            $v_fleet_name = $_POST['v_fleet_name'];
            $v_fuel = $_POST['v_fuel'];
            $v_status = $_POST['v_status'];
            $v_desc = $_POST['v_desc'];

            //Insert Captured information to a database table
            $postQuery="INSERT INTO iFleet_Vehicles (v_reg_no, v_name, v_fleet_id, v_fleet_name, v_fuel, v_desc) VALUES (?,?,?,?,?,?) ";
            $postStmt = $mysqli->prepare($postQuery);
            //bind paramaters
            $rc=$postStmt->bind_param('ssssss', $v_reg_no, $v_name, $v_fleed_id, $v_fleet_name, $v_fuel, $v_desc);
            $postStmt->execute();
            //declare a varible which will be passed to alert function
            if($postStmt)
            {
                $success = "Vehicle Added" && header("refresh:1; url=sudo_add_vehicle.php");
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
    <?php require_once('partials/_sidenav.php');?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Vehicle Management</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="sudo_dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="sudo_vehicles.php">Vehicles</a></li>
              <li class="breadcrumb-item active">Add Vehicle</li>
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
                <p>Fill All Required Details</p>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form role="form" method='post' enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Registration Number </label>
                                <input type="text" name="v_reg_no"  class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputPassword1">Vehicle Name</label>
                                <input type="text" class="form-control"  name="v_name">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Fleet Name</label>
                                <select name="v_fleet_name" onChange="getFleetDetails(this.value)" id="FleetName"  class="form-control">
                                    <option> Select Fleet Name</option>
                                    <?php 
                                        $ret="SELECT * FROM  iFleet_fleet"; 
                                        $stmt= $mysqli->prepare($ret) ;
                                        $stmt->execute();
                                        $res=$stmt->get_result();
                                        while($fleet=$res->fetch_object())
                                        {
                                    ?>
                                        <option><?php echo $fleet->fleet_name;?></option>

                                    <?php }?>
                                </select>
                            </div>
                            <div class="form-group col-md-6" style="display:none">
                                <label for="exampleInputEmail1">Fleet ID</label>
                                <input type="text" name="v_fleet_id"  id="FleetID" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputPassword1">Vehicle Fuel Type</label>
                                <input type="text" class="form-control"  name="v_fuel">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="exampleInputEmail1">Vehicle Description</label>
                                <textarea type="text" rows="5" name="v_desc"  class="form-control" ></textarea>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" name="add_vehicle" class="btn btn-outline-primary"><i class="fas fa-save"></i> Save</button>
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
