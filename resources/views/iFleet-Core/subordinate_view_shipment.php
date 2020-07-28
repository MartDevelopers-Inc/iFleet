<?php
    session_start();
    include('config/config.php');
    include('config/checklogin.php');
    check_login();
    require_once('partials/_head.php')
?>
<body class="hold-transition sidebar-mini sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
    <!-- Navbar -->
        <?php require_once('partials/_nav.php');?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
        <?php 
            require_once('partials/_staffnav.php');
            $shipment_id = $_GET['shipment_id'];
            $ret="SELECT * FROM  iFleet_Shipments WHERE s_id = '$shipment_id' "; 
            $stmt= $mysqli->prepare($ret) ;
            $stmt->execute() ;//ok
            $res=$stmt->get_result();
            while($shipment= $res->fetch_object())
            {
        ?>
    <!-- /.navbar -->

    <div class="content-wrapper ">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?php echo $shipment->s_name;?> Details</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="subordinate_dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="subordinate_shipments.php">Shipments</a></li>
                        <li class="breadcrumb-item active"><?php echo $shipment->s_name;?></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-5">
                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b> <span class="text-success"> Shipment Number </span></b> <a class="float-right"><?php echo $shipment->s_code;?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b><span class="text-success"> Shipment Name </span> </b> <a class="float-right"><?php echo $shipment->s_name;?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b> <span class="text-success"> Vehicle Shipping Reg No. </span> </b> <a class="float-right"><?php echo $shipment->vehicle_reg_no;?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b> <span class="text-success"> Vehicle Shipping Name </span> </b> <a class="float-right"><?php echo $shipment->vehicle_name;?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b> <span class="text-success"> Shipment Status </span> </b> <a class="float-right"><?php echo $shipment->s_status;?></a>
                                    </li>                                    
                                    <li class="list-group-item">
                                        <b> <span class="text-success"> Record  Created At  </span> </b> 
                                        <a class="float-right"><span class="badge badge-success"><?php echo date('d / M / Y g:i', strtotime($shipment->created_at));?></span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                    <div class="col-md-7">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title"><?php echo $shipment->s_name;?> Description</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <p class="text-muted">
                                    <?php echo $shipment->s_desc;?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
        <?php require_once('partials/_footer.php'); }?>
    </div>
    <!-- ./wrapper -->
    <?php require_once("partials/_scripts.php");?>
</body>
</html>
