<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
    <img src="assets/dist/img/AdminLTELogo.png" alt="iFleet Logo" class="brand-image img-circle elevation-3"
        style="opacity: .8">
    <span class="brand-text font-weight-light">iFleet</span>
    </a>

    <!-- Sidebar with logged in user session -->
    <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <?php
        $login_id = $_SESSION['login_id'];
        $ret="SELECT * FROM  iFleet_Login  WHERE login_id = ? "; 
        $stmt= $mysqli->prepare($ret) ;
        $stmt->bind_param('i', $login_id);
        $stmt->execute() ;//ok
        $res=$stmt->get_result();
        while($row=$res->fetch_object())
        {
            
    ?>
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="sudo_profile.php?login_id=<?php echo $row->login_id;?>" class="d-block"><?php echo $row->login_username;?></a>
        </div>
    </div>
    <?php }?>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
       
            <!--Diffrent Dashboards -->
                <li class="nav-item has-treeview ">
                    <a href="#" class="nav-link ">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboards
                        <i class="right fas fa-angle-left"></i>
                    </p>
                    </a>
                    <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="sudo_dashboard.php" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Main Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="sudo_analytics_dashboad.php" class="nav-link ">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Analytics Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="sudo_hrm_dasboard.php" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>HRM Dashboard</p>
                        </a>
                    </li>
                    </ul>
                </li>
            <!-- ./ End Dashboard -->

            <!--HRM-->
            <li class="nav-item">
                <a href="sudo_hrm.php" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                    HRM
                </p>
                </a>
            </li>
            <!-- ./ HRM -->

            <!--Fleet Routes -->
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                <i class="nav-icon fas fa-code-branch"></i>
                <p>
                    Fleet Routes
                    <i class="right fas fa-angle-left"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="sudo_add_route.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Route</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="sudo_manage_routes.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Manage Routes</p>
                    </a>
                </li>
                </ul>
            </li>
            <!-- ./ Fleet Routes -->

            <!-- Fleet -->
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                <i class="nav-icon fas fa-car"></i>
                <p>
                    Fleet 
                    <i class="fas fa-angle-left right"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="sudo_add_fleet_category.php" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Add Categories</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="sudo_manage_fleet_categories.php" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Manage Categories</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="sudo_get_fleet_categories.php" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Add Fleet</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="sudo_manage_fleet.php" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Manage Fleet </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="sudo_manage_fleet_vehicles.php" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Manage Vehicles</p>
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a href="sudo_assign_fleet_route.php" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Assign Fleet</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="sudo_manage_assign_fleet_route.php" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Manage Assigns</p>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- ./ Fleet -->

            <!-- Shipments -->
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                <i class="nav-icon fas fa-luggage-cart"></i>
                <p>
                    Shipments
                    <i class="fas fa-angle-left right"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="sudo_add_shipment.php" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Add Shipment</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="sudo_manage_shipment.php" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Manage Shipments</p>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- ./ Shipments -->
            
            <!-- Fuel Consumption -->
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                <i class="nav-icon fas fa-gas-pump"></i>
                <p>
                    Fuel Consumption
                    <i class="fas fa-angle-left right"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="sudo_gas_stations.php" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Gas Stations</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="sudo_fuel_consumptions.php" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Consumptions</p>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- ./ Fuel Consumption-->

            <!-- Advanced Reporting -->
            <li class="nav-header">Advanced Reporting</li>
            <li class="nav-item">
                <a href="sudo_advanced_reporting_hrm.php" class="nav-link">
                <i class="nav-icon fas fa-calendar-alt"></i>
                <p>
                    HRM Records
                </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="sudo_advanced_reporting_fleet_routes.php" class="nav-link">
                <i class="nav-icon far fa-image"></i>
                <p>
                    Fleet Routes Records
                </p>
                </a>
            </li>
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-truck"></i>
                    <p>
                        Fleets Records
                        <i class="fas fa-angle-left right"></i>
                    </p>
                    </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="sudo_advanced_reporting_fleet_categories.php" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Fleet Categories</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="sudo_advanced_reporting_fleet_records.php" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Fleet Records </p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-shipping-fast"></i>
                    <p>
                        Shipments Records
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="sudo_advanced_reporting_incomming_shipments.php" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Incomming Shipments</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="sudo_advanced_reporting_outgoing_shipments.php" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>OutGoing Shipments</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-oil-can"></i>
                    <p>
                        Fuel Records 
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="sudo_advanced_reporting_gas_stations.php" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Gas Stations</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="sudo_advanced_reporting_fuel_consumption.php" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Fuel Consumption</p>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- ./ Advanced Reporting -->
            <li class="nav-header">System Settings</li>
            <li class="nav-item">
                <a href="sudo_log_out.php" class="nav-link">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>
                    End Session
                </p>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>