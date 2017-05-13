<?php
require_once('../functions.php');
connectdb();
$event_name = $_POST["event_name"];
$subject_id  = $_POST["subject_id"];

$query = "INSERT INTO `event`(`event_name`, `subject_id`) VALUES ('$event_name','$subject_id' )";

$result = mysql_query($query);
echo $query;
header("Location: subject_Container.php");
?>
