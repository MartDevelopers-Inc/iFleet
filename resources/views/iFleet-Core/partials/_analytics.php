<?php
//Perform all analytics here


//1. Staffs
$query ="SELECT COUNT(*) FROM `iFleet_Staff` ";
$stmt = $mysqli->prepare($query);
$stmt ->execute();
$stmt->bind_result($staff);
$stmt->fetch();
$stmt->close();