<?php
require_once('../functions.php');
connectdb();

$event_name = $_POST["event_name"];
$event_id = $_POST["event_id"];

$query = "UPDATE `event` SET `event_name`='$event_name' WHERE event_id = '$event_id ' ";
//echo $query ; 
$result = mysql_query($query);

header("Location: subject_Container.php?changed");

?>
