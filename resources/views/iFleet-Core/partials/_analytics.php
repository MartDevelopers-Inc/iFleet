<?php
//Perform all analytics here


//1. Staffs
$query ="SELECT COUNT(*) FROM `iFleet_Staff` ";
$stmt = $mysqli->prepare($query);
$stmt ->execute();
$stmt->bind_result($staff);
$stmt->fetch();
$stmt->close();

//2. Fleet Categories
$query ="SELECT COUNT(*) FROM `iFleet_category` ";
$stmt = $mysqli->prepare($query);
$stmt ->execute();
$stmt->bind_result($category);
$stmt->fetch();
$stmt->close();

//3. Fleets
$query ="SELECT COUNT(*) FROM `iFleet_fleet` ";
$stmt = $mysqli->prepare($query);
$stmt ->execute();
$stmt->bind_result($fleet);
$stmt->fetch();
$stmt->close();

//4. Vehicles
$query ="SELECT COUNT(*) FROM `iFleet_Vehicles` ";
$stmt = $mysqli->prepare($query);
$stmt ->execute();
$stmt->bind_result($vehicles);
$stmt->fetch();
$stmt->close();

//5.