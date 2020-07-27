<?php
    session_start();
    include('config/config.php');
    include('config/checklogin.php');
    check_login();
    
    if(isset($_POST['update_fuel_record']))
    {
        if ( empty($_POST["f_code"]) || empty($_POST["f_veh_reg_no"]) ||  empty($_POST['f_veh_name']) || empty($_POST['f_type']) || empty($_POST['f_consumed']) ) 
        {
            $err="Empty Fields Not Allowed";
        }
        

            $f_code = $_POST['f_code'];
            $f_veh_reg_no = $_POST['f_veh_reg_no'];
            $f_veh_name = $_POST['f_veh_name'];
            $f_type  = $_POST['f_type'];
            $f_consumed = $_POST['f_consumed'];
            $f_id = $_GET['f_id'];

            //Insert Captured information to a database table
            $postQuery="UPDATE iFleet_fuel_consumption SET f_code =?, f_veh_reg_no =?, f_veh_name =?, f_type =?, f_consumed =? WHERE f_id =?";
            $postStmt = $mysqli->prepare($postQuery);
            //bind paramaters
            $rc=$postStmt->bind_param('sssssi', $f_code, $f_veh_reg_no, $f_veh_name, $f_type, $f_consumed, $f_id);
            $postStmt->execute();
            //declare a varible which will be passed to alert function
            if($postStmt)
            {
                $success = "Fuel Updated" && header("refresh:1; url=sudo_fuel_management.php");
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
    <?php 
        require_once('partials/_sidenav.php');
        $f_id = $_GET['f_id'];
        $ret="SELECT * FROM  iFleet_fuel_consumption WHERE f_id = '$f_id'"; 
        $stmt= $mysqli->prepare($ret) ;
        $stmt->execute();
        $res=$stmt->get_result();
        $cnt=1;
        while($fuel=$res->fetch_object())
        {
    ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Fuel Consumption Records Management</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="sudo_dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="sudo_fuel_management.php">Fuel Consumption</a></li>
              <li class="breadcrumb-item active"><?php echo $fuel->f_code;?></li>
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
                                <label for="exampleInputEmail1">Record Number</label>
                                <input type="text" name="f_code"  value="<?php echo $fuel->f_code;?>" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputPassword1">Fuel Type</label>
                                <input type="text" class="form-control" value="<?php echo $fuel->f_type;?>" name="f_type">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Fuel Consumed <small class="text-danger">*Per Shipment in Litres</small></label>
                                <input type="text" name="f_consumed" value="<?php echo $fuel->f_consumed;?>"  class="form-control">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Vehicle Registration Number</label>
                                <select name="f_veh_reg_no" onChange="getWhipDetails(this.value)" id="shipmentWhipReg"  class="form-control">
                                    <option> Select Registration Number</option>
                                    <?php 
                                        $ret="SELECT * FROM  iFleet_Shipments"; 
                                        $stmt= $mysqli->prepare($ret) ;
                                        $stmt->execute();
                                        $res=$stmt->get_result();
                                        while($whip=$res->fetch_object())
                                        {
                                    ?>
                                        <option><?php echo $whip->vehicle_reg_no;?></option>

                                    <?php }}?>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Vehicle Name</label>
                                <input type="text" name="f_veh_name"   id="VehicleName" class="form-control">
                            </div>
                            
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" name="update_fuel_record" class="btn btn-outline-primary"><i class="fas fa-save"></i> Save</button>
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
