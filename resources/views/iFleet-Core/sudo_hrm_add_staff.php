<?php
    session_start();
    include('config/config.php');
    include('config/checklogin.php');
    check_login();
    require_once('partials/_head.php');
    require_once('partials/_codeGen.php');
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
              <li class="breadcrumb-item"><a href="sudo_hrm.php">HRM</a></li>
              <li class="breadcrumb-item active">Add New Staff</li>
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
                <h3>Fill All Required Details</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form role="form" >
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Full Name</label>
                                <input type="text" name="staff_name"  class="form-control"  placeholder="Enter Staff Full Names">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputPassword1">Staff Number</label>
                                <input type="text" class="form-control" readonly name="staff_number" value="iFleet-<?php echo $alpha;?>-<?php echo $beta;?>">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">National ID Number</label>
                                <input type="text" name="staff_natid"  class="form-control"  placeholder="Enter Staff National ID Number">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputPassword1">Phone Number</label>
                                <input type="text" class="form-control"  name="staff_phone" placeholder="Enter Staff Phone Number">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputPassword1">Email</label>
                                <input type="text" class="form-control"  name="staff_email" placeholder="Enter Staff Email">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Gender</label>
                                <select name="staff_gender" class="form-control">
                                    <option>Male</option>
                                    <option>Female</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputPassword1">Date Of Birth</label>
                                <input type="text" class="form-control"  name="staff_dob" placeholder="July - 13 - 1998">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Staff Passport</label>
                            <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="staff_passport" class="custom-file-input" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text" id="">Upload</span>
                            </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Biography</label>
                                <textarea type="text" class="form-control" rows="5"  name="staff_bio"></textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputPassword1">Address</label>
                                <textarea type="text" class="form-control" rows="5"  name="staff_address"></textarea>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" name="add_staff" class="btn btn-outline-primary"><i class="fas fa-save"></i> Save</button>
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
