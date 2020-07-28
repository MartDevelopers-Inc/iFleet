<?php
    session_start();
    include('config/config.php');
    include('config/checklogin.php');
    check_login();
    
    if(isset($_POST['add_shipment']))
    {
        if ( empty($_POST["s_code"]) || empty($_POST["s_name"]) ||  empty($_POST['vehicle_name']) || empty($_POST['vehicle_reg_no']) ) 
        {
            $err="Empty Fields Not Allowed";
        }
        else
        {
            $s_code = $_POST['s_code'];

            //check if a certain vehicle with a reg number exixts
            $sql="SELECT * FROM  iFleet_Shipments WHERE  s_code ='$s_code'";
            $res=mysqli_query($mysqli,$sql);
            if (mysqli_num_rows($res) > 0)
            {
            $row = mysqli_fetch_assoc($res);
            $err =  "Shipment With That Number Exists";
            }
        }

            $s_code = $_POST['s_code'];
            $s_name = $_POST['s_name'];
            $s_status = $_POST['s_status'];
            $vehicle_reg_no  = $_POST['vehicle_reg_no'];
            $vehicle_name = $_POST['vehicle_name'];
            $s_desc = $_POST['s_desc'];

            //Insert Captured information to a database table
            $postQuery="INSERT INTO iFleet_Shipments (s_code, s_name, s_status, vehicle_reg_no, vehicle_name, s_desc) VALUES (?,?,?,?,?,?) ";
            $postStmt = $mysqli->prepare($postQuery);
            //bind paramaters
            $rc=$postStmt->bind_param('ssssss', $s_code, $s_name, $s_status, $vehicle_reg_no, $vehicle_name, $s_desc);
            $postStmt->execute();
            //declare a varible which will be passed to alert function
            if($postStmt)
            {
                $success = "Shipment Added" && header("refresh:1; url=subordinate_shipments.php");
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
    <?php require_once('partials/_staffnav.php');?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Shipments Management</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="subordinate_dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="subordinate_shipments.php">Shipments</a></li>
              <li class="breadcrumb-item active">Add</li>
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
                                <label for="exampleInputEmail1">Shipment Number</label>
                                <input type="text" name="s_code"  value="iFleet-<?php echo $alpha;?>-<?php echo $beta;?>" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputPassword1">Shipment Name</label>
                                <input type="text" class="form-control"  name="s_name">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Vehicle Registration Number</label>
                                <select name="vehicle_reg_no" onChange="getWhipDetails(this.value)" id="whipRegNo"  class="form-control">
                                    <option> Select Registration Number</option>
                                    <?php 
                                        $ret="SELECT * FROM  iFleet_Vehicles"; 
                                        $stmt= $mysqli->prepare($ret) ;
                                        $stmt->execute();
                                        $res=$stmt->get_result();
                                        while($whip=$res->fetch_object())
                                        {
                                    ?>
                                        <option><?php echo $whip->v_reg_no;?></option>

                                    <?php }?>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Vehicle Name</label>
                                <input type="text" name="vehicle_name"  id="whipName" class="form-control">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputPassword1">Shipment Status</label>
                                <select type="text" class="form-control"  name="s_status">
                                    <option>Pending</option>
                                    <option>On Transit</option>
                                    <option>Delivered</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="exampleInputEmail1">Shipment Description <small class="text-danger"> *Include departure time, arrival time, client address and details of the shipment</small></label>
                                <textarea type="text" rows="5" name="s_desc"  class="form-control" ></textarea>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" name="add_shipment" class="btn btn-outline-primary"><i class="fas fa-save"></i> Save</button>
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
