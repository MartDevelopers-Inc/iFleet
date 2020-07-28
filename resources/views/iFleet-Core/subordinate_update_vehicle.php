<?php
    session_start();
    include('config/config.php');
    include('config/checklogin.php');
    check_login();
    
    if(isset($_POST['update_vehicle']))
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
            $v_id = $_GET['v_id'];

            //Insert Captured information to a database table
            $postQuery="UPDATE iFleet_Vehicles SET v_reg_no =?, v_name =?, v_fleet_id =?, v_fleet_name =?, v_fuel =?, v_desc =?, v_status =? WHERE v_id =? ";
            $postStmt = $mysqli->prepare($postQuery);
            //bind paramaters
            $rc=$postStmt->bind_param('sssssssi', $v_reg_no, $v_name, $v_fleed_id, $v_fleet_name, $v_fuel, $v_desc, $v_status, $v_id);
            $postStmt->execute();
            //declare a varible which will be passed to alert function
            if($postStmt)
            {
                $success = "Vehicle Updated" && header("refresh:1; url=subordinate_vehicles.php");
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
    <?php 
        require_once('partials/_nav.php');
        $v_id = $_GET['v_id'];
        $ret="SELECT * FROM  iFleet_Vehicles WHERE v_id ='$v_id' "; 
        $stmt= $mysqli->prepare($ret) ;
        $stmt->execute();
        $res=$stmt->get_result();
        $cnt=1;
        while($vehicle=$res->fetch_object())
        {
    ?>
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
            <h1>Vehicle Management</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="subordinate_dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="subordinate_vehicles.php">Vehicles</a></li>
              <li class="breadcrumb-item active"><?php echo $vehicle->v_name;?></li>
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
                                <input type="text" name="v_reg_no" value="<?php echo $vehicle->v_reg_no;?>" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputPassword1">Vehicle Name</label>
                                <input type="text" class="form-control" value="<?php echo $vehicle->v_name;?>"  name="v_name">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Fleet Name</label>
                                <select name="v_fleet_name" onChange="getFleetDetails(this.value)" id="FleetName"  class="form-control">
                                    <option>Select Fleet Name</option>
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
                            <div class="form-group col-md-3" style="display:none">
                                <label for="exampleInputEmail1">Fleet ID</label>
                                <input type="text" readonly name="v_fleet_id"  id="FleetID" class="form-control">
                            </div>
                            <?php 
                                $v_id = $_GET['v_id'];
                                $ret="SELECT * FROM  iFleet_Vehicles WHERE v_id ='$v_id' "; 
                                $stmt= $mysqli->prepare($ret) ;
                                $stmt->execute();
                                $res=$stmt->get_result();
                                $cnt=1;
                                while($vehicle=$res->fetch_object())
                                {
                            ?>
                            <div class="form-group col-md-4">
                                <label for="exampleInputPassword1">Vehicle Fuel Type</label>
                                <select type="text" class="form-control"  name="v_fuel">
                                    <option><?php echo $vehicle->v_fuel;?></option>
                                    <option>Diesel</option>
                                    <option>Petrol</option>
                                    <option>Electric</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputPassword1">Vehicle Status</label>
                                <select type="text" class="form-control"  name="v_status">
                                    <option><?php echo $vehicle->v_status;?></option>
                                    <option>Operational</option>
                                    <option>Faulty</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="exampleInputEmail1">Vehicle Description</label>
                                <textarea type="text" rows="5" name="v_desc"  class="form-control" ><?php echo $vehicle->v_desc;?></textarea>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" name="update_vehicle" class="btn btn-outline-primary"><i class="fas fa-save"></i> Save</button>
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
  <?php require_once('partials/_footer.php'); }}?>
</div>
<?php require_once("partials/_scripts.php");?>
</body>
</html>
