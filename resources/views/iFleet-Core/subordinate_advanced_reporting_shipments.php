<?php
    session_start();
    include('config/config.php');
    include('config/checklogin.php');
    check_login();
    require_once('partials/_head.php');
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
            <h1>Advanced Reporting - Shipments Management</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="subordinate_dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Advanced Reporting</li>
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
            
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Shipment No.</th>
                  <th>Name</th>
                  <th>Status</th>
                  <th>Shipping Vehicle Name</th>
                  <th>Shipping Vehicle Reg No.</th>
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
                                <a class="text_success" href="subordinate_view_shipment.php?shipment_id=<?php echo $shipment->s_id;?>">
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
                                          <span class='text-success'>$shipment->s_status</span>
                                      
                                      ";
                                  }
                                  elseif($shipment->s_status == 'On Transit')
                                  {
                                      echo 
                                      "
                                          <span class='text-primary'>$shipment->s_status</span>
                                      ";
                                  }
                                  else
                                  {
                                    echo 
                                    "
                                        <span class='text-danger'>$shipment->s_status</span>
                                    ";
                                  }
                              ?>  
                            </td>
                            <td><?php echo $shipment->vehicle_name;?></td>
                            <td><?php echo $shipment->vehicle_reg_no;?></td>
                            
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
