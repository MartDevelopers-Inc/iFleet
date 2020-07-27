<?php
    session_start();
    include('config/config.php');
    include('config/checklogin.php');
    check_login();

    //Delete Shipment
    if(isset($_GET['delete']))
    {
          $id=intval($_GET['delete']);
          $adn="DELETE FROM  iFleet_Shipments  WHERE  s_id = ?";
          $stmt= $mysqli->prepare($adn);
          $stmt->bind_param('i',$id);
          $stmt->execute();
          $stmt->close();	 
         if($stmt)
         {
             $success = "Deleted" && header("refresh:1; url=sudo_shipments.php");
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
            <h1>Shipments Management</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="sudo_dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Shipments</li>
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
                <a class="btn btn-outline-success" href="sudo_add_shipment.php">
                    <span>
                        <i class="fas fa-luggage-cart"></i> <i class="fas fa-plus"></i>
                    </span>
                    New Shipment
                </a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Shipment No.</th>
                  <th>Name</th>
                  <th>Status</th>
                  <th>Vehicle Name</th>
                  <th>Vehicle Reg No.</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                        //Fetch all shipments
                        $ret="SELECT * FROM  iFleet_Shipments"; 
                        $stmt= $mysqli->prepare($ret) ;
                        $stmt->execute();
                        $res=$stmt->get_result();
                        $cnt=1;
                        while($shipment=$res->fetch_object())
                        {
                    ?>
                        <tr>
                            <td>
                                <a class="text_success" href="sudo_view_shipment.php?shipment_id=<?php echo $shipment->s_id;?>">
                                    <?php echo $shipment->s_code;?>
                                </a>
                            </td>
                            <td><?php echo $shipment->s_name;?></td>
                            <td>
                              <?php
                                  if($shipment->s_status == 'Delivered')
                                  {
                                      echo 
                                      "
                                          <span class='text-success'>$shipments->s_status</span>
                                      
                                      ";
                                  }
                                  elseif($shipment->s_status == 'On Transit')
                                  {
                                      echo 
                                      "
                                          <span class='text-primary'>$shipments->s_status</span>
                                      ";
                                  }
                                  else
                                  {
                                    echo 
                                    "
                                        <span class='text-danger'>$shipments->s_status</span>
                                    ";
                                  }
                              ?>  
                            </td>
                            <td><?php echo $shipment->vehicle_name;?></td>
                            <td><?php echo $shipment->vehicle_reg_no;?></td>
                            <td>
                                <a class="badge badge-warning" href="sudo_update_shipment.php?s_id=<?php echo $shipment->s_id;?>">
                                    <i class="fas fa-user-edit"></i>
                                    Update Record
                                </a>
                                <a class="badge badge-danger" href="sudo_vehicles.php?delete=<?php echo $shipment->s_id;?>">
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
