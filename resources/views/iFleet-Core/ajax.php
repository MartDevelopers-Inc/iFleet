<?php
include('config/pdoconfig.php');

if(!empty($_POST["staffNumber"])) 
{
    //get staff name
    $id=$_POST['staffNumber'];
    $stmt = $DB_con->prepare("SELECT * FROM  iFleet_Staff WHERE staff_number = :id");
    $stmt->execute(array(':id' => $id));
?>
<?php
    while($row=$stmt->fetch(PDO::FETCH_ASSOC))
{
?>
<?php echo htmlentities($row['staff_name']); ?>
<?php
}
}


if(!empty($_POST["staff_Name"])) 
{
    //get staff n
    $id=$_POST['staff_Name'];
    $stmt = $DB_con->prepare("SELECT * FROM  iFleet_Staff WHERE staff_number = :id");
    $stmt->execute(array(':id' => $id));
?>
<?php
    while($row=$stmt->fetch(PDO::FETCH_ASSOC))
{
?>
<?php echo htmlentities($row['staff_id']); ?>
<?php
}
}

if(!empty($_POST["FleetName"])) 
{
    $id=$_POST['FleetName'];
    $stmt = $DB_con->prepare("SELECT * FROM  iFleet_fleet WHERE fleet_name = :id");
    $stmt->execute(array(':id' => $id));
?>
<?php
    while($row=$stmt->fetch(PDO::FETCH_ASSOC))
{
?>
<?php echo htmlentities($row['fleet_id']); ?>
<?php
}
}

if(!empty($_POST["whipRegNo"])) 
{
    $id=$_POST['whipRegNo'];
    $stmt = $DB_con->prepare("SELECT * FROM  iFleet_Vehicles WHERE v_reg_no = :id");
    $stmt->execute(array(':id' => $id));
?>
<?php
    while($row=$stmt->fetch(PDO::FETCH_ASSOC))
{
?>
<?php echo htmlentities($row['v_name']); ?>
<?php
}
}


if(!empty($_POST["shipmentWhipReg"])) 
{
    $id=$_POST['shipmentWhipReg'];
    $stmt = $DB_con->prepare("SELECT * FROM  iFleet_Shipments WHERE vehicle_reg_no = :id");
    $stmt->execute(array(':id' => $id));
?>
<?php
    while($row=$stmt->fetch(PDO::FETCH_ASSOC))
{
?>
<?php echo htmlentities($row['vehicle_name']); ?>
<?php
}
}

