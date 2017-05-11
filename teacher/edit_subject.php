<?php
require_once('../functions.php');
connectdb();
$subject_id0 = $_POST["subject_id0"];
$subject_id = $_POST["subject_id"];
$subject_name = $_POST["subject_name"];

$query = "UPDATE `subject` SET `subject_id`='$subject_id' ,`subject_name`='$subject_name' WHERE subject_id = '$subject_id0 ' ";
$query1 = "UPDATE `event` SET `subject_id`='$subject_id' WHERE subject_id = '$subject_id0 ' ";
$result = mysql_query($query);
$result1 = mysql_query($query1);

echo $query ;
header("Location: subject_Container.php?changed");

?>
