<?php
require_once('../functions.php');
connectdb();
$subject_id_0 = $_POST["subject_id_0"];
$subject_id = $_POST["subject_id"];
$subject_name = $_POST["subject_name"];



$query = "UPDATE `subject` SET `subject_id`='$subject_id_0' ,`subject_name`='$subject_name' WHERE subject_id = '$subject_id' ";
$query1 = "UPDATE `event` SET `subject_id`='$subject_id_0'' WHERE subject_id ='$subject_id'";
$result = mysql_query($query);
$result1 = mysql_query($query1);

echo $query ;
header("Location: subject_Container.php?changed");

?>
