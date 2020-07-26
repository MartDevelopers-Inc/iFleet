<?php
include('config/pdoconfig.php');
if(!empty($_POST["staffNum"])) 
{
    //get staff number
    $id=$_POST['staffNum'];
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

