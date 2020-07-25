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
            require_once('partials/_sidenav.php');
            $number = $_GET['number'];
            $ret="SELECT * FROM  iFleet_Staff  WHERE staff_number = '$number' "; 
            $stmt= $mysqli->prepare($ret) ;
            $stmt->execute() ;//ok
            $res=$stmt->get_result();
            while($staff = $res->fetch_object())
            {
        ?>
    <!-- /.navbar -->

    <div class="content-wrapper ">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?php echo $staff->staff_name;?>'s Profile</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="sudo_dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="sudo_hrm.php">HRM</a></li>
                        <li class="breadcrumb-item active"><?php echo $staff->staff_name;?>'s Profile</li>
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
                                <div class="text-center">
                                <img class="img-thumbnail  img-rectangle"
                                    src="assets/dist/img/staff/<?php echo $staff->staff_passport;?>"
                                    alt="<?php echo $staff->staff_name;?> Passport">
                                </div>

                                <h3 class="profile-username text-center"><?php echo $staff->staff_name;?></h3>

                                <p class="text-muted text-center"><?php echo $staff->staff_number;?></p>

                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b> <span class="text-success"> ID Number </span></b> <a class="float-right"><?php echo $staff->staff_natid;?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b><span class="text-success"> Email </span> </b> <a class="float-right"><?php echo $staff->staff_email;?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b> <span class="text-success"> Phone No. </span> </b> <a class="float-right"><?php echo $staff->staff_phone;?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b> <span class="text-success"> Gender </span> </b> <a class="float-right"><?php echo $staff->staff_gender;?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b> <span class="text-success"> D.O.B </span> </b> <a class="float-right"><?php echo $staff->staff_dob;?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b> <span class="text-success"> Account Created At  </span> </b> 
                                        <a class="float-right"><span class="badge badge-success"><?php echo date('d / M / Y g:i', strtotime($staff->created_at));?></span></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b> <span class="text-success"> Account Status </span> </b> 
                                        <a class="float-right">
                                            <?php
                                                if($staff->staff_acc_status == 'Active')
                                                {
                                                    echo 
                                                    "
                                                        <span class='badge badge-success'>$staff->staff_acc_status</span>
                                                    
                                                    ";
                                                }
                                                else if($staff->staff_acc_status == 'Dormant')
                                                {
                                                    echo 
                                                    "
                                                        <span class='badge badge-warning'>$staff->staff_acc_status</span>
                                                    ";
                                                }
                                                else
                                                {
                                                    echo 
                                                    "
                                                        <span class='badge badge-danger'>$staff->staff_acc_status</span>
                                                    ";
                                                }
                                            ?>                                            
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                    <div class="col-md-7">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">About <?php echo $staff->staff_name;?></h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <strong class="text-success"><i class="fas fa-user-check mr-1"></i> Biography</strong>
                                <hr>
                                <p class="text-muted">
                                    <?php echo $staff->staff_bio;?>
                                </p>

                                    <strong class="text-success"><i class="fas fa-map-marker-alt mr-1"></i> Address </strong>
                                <hr>
                                    <p class="text-muted"><?php echo $staff->staff_adr;?></p>
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
