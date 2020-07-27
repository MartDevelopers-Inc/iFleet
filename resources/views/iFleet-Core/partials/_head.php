<!DOCTYPE html>
<html>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>iFleet | Smart And Effective Way To Manage Your Fleet</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
  <!--Side navigation-->
  <link rel="stylesheet" href="assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- DataTables -->
  <link rel="stylesheet" href="assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css">

  <!--Inject Sweet alerts-->
  <script src="assets/dist/js/swal.js"></script>
  <?php if(isset($success)) {?>
    <!--This code for injecting success alert-->
            <script>
                        setTimeout(function () 
                        { 
                            swal("Success","<?php echo $success;?>","success");
                        },
                            100);
                        
            </script>

    <?php } ?>
    <?php if(isset($err)) {?>
    <!--This code for injecting error alert-->
            <script>
                        setTimeout(function () 
                        { 
                            swal("Failed","<?php echo $err;?>","error");
                        },
                            100);
            </script>

    <?php } ?>
    <?php if(isset($info)) {?>
    <!--This code for injecting info alert-->
            <script>
                        setTimeout(function () 
                        { 
                            swal("Success","<?php echo $info;?>","info");
                        },
                            100);
            </script>

    <?php } ?>
    <script>
        function Staff_Details(val)
        {
            $.ajax({

            type: "POST",
            url: "ajax.php",
            data:'staffNumber='+val,
            success: function(data)
            {
            //alert(data);
            $('#StaffName').val(data);
            }
            });

            $.ajax({
                type: "POST",
                url: "ajax.php",
                data:'staff_Name='+val,
                success: function(data)
                {
                    //alert(data);
                    $('#staffId').val(data);
                }
            });
            
        }
        function getFleetDetails(val)
        {
            $.ajax({
                type: "POST",
                url: "ajax.php",
                data: "FleetName="+val,
                success: function(data)
                {
                    $('#FleetID').val(data);
                }
            })
        }
        function getWhipDetails(val)
        {
            $.ajax({
                type: "POST",
                url: "ajax.php",
                data: "whipRegNo="+val,
                success: function(data)
                {
                    $('#whipName').val(data);
                }
            })
            $.ajax({
                type: "POST",
                url: "ajax.php",
                data: "shipmentWhipReg="+val,
                success: function(data)
                {
                    $('#VehicleName').val(data);
                }
            })
        }
    </script>  
</head>