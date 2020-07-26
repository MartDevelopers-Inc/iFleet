<?php
    session_start();
    include('config/config.php');
    include('config/checklogin.php');
    check_login();
    
    if(isset($_POST['assign_Fleet']))
    {
          if ( empty($_POST["fleet_staff_name"])) 
          {
              $err="Staff Name Can Not Be Blank, Please Say Something 😬!";
          }
          else
          {                        
            
            $fleet_id = $_GET['fleet_id'];
            $fleet_staff_name = $_POST['fleet_staff_name'];
            $fleet_staff_number = $_POST['fleet_staff_number'];
            $fleet_staff_id = $_POST['fleet_staff_id'];
            
            //Insert Captured information to a database table
            $postQuery="UPDATE  iFleet_Route SET  fleet_staff_name =?, fleet_staff_number =?, fleet_staff_id =? WHERE fleet_id =? ";
            $postStmt = $mysqli->prepare($postQuery);
            //bind paramaters
            $rc=$postStmt->bind_param('sssi', $fleet_staff_name, $fleet_staff_number, $fleet_staff_id, $fleet_id);
            $postStmt->execute();
            //declare a varible which will be passed to alert function
            if($postStmt)
            {
                $success = "Staff Assigned" && header("refresh:1; url=sudo_view_single_fleet.php?fleet_id=$fleet_id");
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
        $fleet_id = $_GET['fleet_id'];
        $ret="SELECT * FROM  iFleet_fleet WHERE fleet_id = '$fleet_id'"; 
        $stmt= $mysqli->prepare($ret) ;
        $stmt->execute();
        $res=$stmt->get_result();
        $cnt=1;
        while($fleet=$res->fetch_object())
        {
    ?>
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
                <li class="breadcrumb-item"><a href="sudo_manage_fleet.php">Fleet</a></li>
                <li class="breadcrumb-item"><a href="sudo_manage_fleet.php"><?php echo $fleet->fleet_category_name;?></a></li>
                <li class="breadcrumb-item active"><?php echo $fleet->fleet_name;?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <?php }?>

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
                <form role="form" method='post'>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Staff Number</label>
                                <select class='form-control' onChange="StaffDetails(this.value);" id="staffNumber" name="fleet_staff_number">
                                    <option> Select Staff Number</option>
                                    <?php 
                                        $ret="SELECT * FROM  iFleet_Staff"; 
                                        $stmt= $mysqli->prepare($ret) ;
                                        $stmt->execute();
                                        $res=$stmt->get_result();
                                        while($staff=$res->fetch_object())
                                        {
                                    ?>
                                        <option value="<?php echo $staff->staff_number;?>" > <?php echo $staff->staff_number;?> </option>
                                    <?php }?>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputPassword1">Staff Name</label>
                                <input type="text" class="form-control" id="staffName"  readonly name="fleet_staff_name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputPassword1">Staff Id</label>
                                <input type="text" class="form-control" id="staffId" readonly name="fleet_staff_id">
                            </div>
                        </div>
                        
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" name="add_route" class="btn btn-outline-primary"><i class="fas fa-save"></i> Save</button>
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
