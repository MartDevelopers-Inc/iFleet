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
    <?php require_once('partials/_sidenav.php');?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Human Resource Management</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="sudo_dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item active">HRM</li>
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
                <a class="btn btn-outline-success" href="sudo_hrm_add_staff.php">
                    <span>
                        <i class="fas fa-user-plus"></i>
                    </span>
                    Add New Staff
                </a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Staff No.</th>
                  <th>Staff Name</th>
                  <th>Staff ID No.</th>
                  <th>Staff Phone</th>
                  <th>Staff Email</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                        //Fetch all Staff In created_at.Desc
                        $ret="SELECT * FROM  iFleet_Staff"; 
                        $stmt= $mysqli->prepare($ret) ;
                        $stmt->execute();
                        $res=$stmt->get_result();
                        $cnt=1;
                        while($staff=$res->fetch_object())
                        {
                    ?>
                        <tr>
                            <td>
                                <a class="text_success" href="sudo_hrm_view_profile.php?number=<?php echo $staff->staff_number;?>">
                                    <?php echo $staff->staff_number;?>
                                </a>
                            </td>
                            <td><?php echo $staff->staff_name;?></td>
                            <td><?php echo $staff->staff_natid;?></td>
                            <td><?php echo $staff->staff_phone;?></td>
                            <td><?php echo $staff->staff_email;?></td>
                            <td>
                                <a class="badge badge-warning" href="sudo_hrm_update_staff.php?number=<?php echo $staff->staff_number;?>">
                                    <i class="fas fa-user-edit"></i>
                                    Update
                                </a>
                                <a class="badge badge-danger" href="sudo_hrm.php?delete=<?php echo $staff->staff_id;?>">
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
