<?php
include('config/pdoconfig.php');

if(!empty($_POST["staffNumber"])) 
{
    //get staff name
    $id=$_POST['staffNumber'];
    echo $id;
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


if(!empty($_POST["staffName"])) 
{
    //get staff n
    $id=$_POST['staffName'];
    echo $id;
    $stmt = $DB_con->prepare("SELECT * FROM  iFleet_Staff WHERE staff_name = :id");
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


