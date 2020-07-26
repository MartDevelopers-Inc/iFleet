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


