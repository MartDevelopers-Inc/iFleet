<?php
    session_start();
    include('config/config.php');
    include('config/checklogin.php');
    require_once('partials/_analytics.php');
    check_login();
    require_once('partials/_head.php')
?>
    <body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
        <div class="wrapper">
            <!-- Navbar -->
                <?php require_once('partials/_nav.php');?>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
                <?php require_once('partials/_sidenav.php');?>
            <!--  /. Main Sidebar Container -->

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Main Dashboard</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="sudo_dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item active">Main Dashboard</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Main content -->
            <section class="content">
            <div class="container-fluid">

                <div class="row">
                <!-- Staffs -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Staffs</span>
                            <span class="info-box-number">
                                <?php echo $staff;?>
                            </span>
                        </div>
                    </div>
                </div>
                <!--./  Staffs -->

                <!-- Fleet Categories-->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-car"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Fleet Categories</span>
                            <span class="info-box-number">41,410</span>
                        </div>
                    </div>
                </div>
                <!-- Fleet Categories-->

                <!-- fix for small devices only -->
                <div class="clearfix hidden-md-up"></div>

                <!-- Fleet-->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-truck"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Fleets</span>
                            <span class="info-box-number">760</span>
                        </div>
                    </div>
                </div>
                <!-- Fleet-->

                <!-- Fleet Routes-->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-code-branch"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Fleet Routes</span>
                            <span class="info-box-number">2,000</span>
                        </div>
                    </div>
                </div>
                <!-- ./ Fleet Routes-->

                <!--Total Handled Shipments -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-pallet"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Total Handled Shipments</span>
                            <span class="info-box-number">2,000</span>
                        </div>
                    </div>
                </div>
                <!--Total Handled Shipments -->

                <!-- Pending Shipments -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-dolly-flatbed"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Pending Shipments</span>
                            <span class="info-box-number">2,000</span>
                        </div>
                    </div>
                </div>
                <!-- ./ Pending Shipments -->

                <!-- On Transit-->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-shipping-fast"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">On Transit Shipments</span>
                            <span class="info-box-number">2,000</span>
                        </div>
                    </div>
                </div>
                <!-- ./ On Transit -->

                <!-- Delivered Shipments -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-dolly"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Delivered Shipments</span>
                            <span class="info-box-number">2,000</span>
                        </div>
                    </div>
                </div>
                <!-- ./ Delivered -->
                </div>

                <!-- Main row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Recently Employed Staff</h3>
                                        <div class="card-tools">
                                            <span class="badge badge-success"><?php echo $staff;?> New Members</span>
                                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body p-0">
                                        <ul class="users-list clearfix">
                                            <?php
                                                //Fetch all Staff In created_at.Desc
                                                $ret="SELECT * FROM `iFleet_Staff` ORDER BY `iFleet_Staff`.`created_at` DESC LIMIT 5 "; 
                                                $stmt= $mysqli->prepare($ret) ;
                                                $stmt->execute();
                                                $res=$stmt->get_result();
                                                $cnt=1;
                                                while($staff=$res->fetch_object())
                                                {
                                            ?>
                                                <li>
                                                    <img class="img-thumbnail img-rectangle" src="assets/dist/img/staff/<?php echo $staff->staff_passport;?>" height="150" width="150" alt="Image">
                                                    <a class="users-list-name" href="sudo_hrm_view_profile.php?number=<?php echo $staff->staff_number;?>"><?php echo $staff->staff_name;?></a>
                                                    <span class="users-list-date"><?php echo date('d M Y g:ia', strtotime($staff->created_at));?></span>
                                                </li>
                                            <?php }?>
                                        </ul>
                                    </div>
                                    <div class="card-footer text-center">
                                        <a href="sudo_hrm.php">View All</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Total Fleet By Fleet Categories</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="chart-responsive">
                                            <canvas id="pieChart" height="150"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header border-transparent">
                                <h3 class="card-title">Latest Shipments</h3>

                                <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table m-0">
                                        <thead>
                                        <tr>
                                            <th>Order ID</th>
                                            <th>Item</th>
                                            <th>Status</th>
                                            <th>Popularity</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><a href="pages/examples/invoice.html">OR9842</a></td>
                                                <td>Call of Duty IV</td>
                                                <td><span class="badge badge-success">Shipped</span></td>
                                                <td>
                                                    <div class="sparkbar" data-color="#00a65a" data-height="20">90,80,90,-70,61,-83,63</div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer clearfix">
                                <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Add New Shipment Record</a>
                                <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All Shipments</a>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Recently Added Fleet</h3>
                                    <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <ul class="products-list product-list-in-card pl-2 pr-2">
                                    <li class="item">
                                        <div class="product-img">
                                            <img src="dist/img/default-150x150.png" alt="Product Image" class="img-size-50">
                                        </div>
                                        <div class="product-info">
                                            <a href="javascript:void(0)" class="product-title">Samsung TV
                                                <span class="badge badge-warning float-right">$1800</span></a>
                                            <span class="product-description">
                                                Samsung 32" 1080p 60Hz LED Smart HDTV.
                                            </span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-footer text-center">
                                <a href="javascript:void(0)" class="uppercase">View All Products</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<!-- Main Footer -->
<?php require_once('partials/_footer.php');?>
</div>
<?php require_once('partials/_scripts.php');?>
</body>
</html>
