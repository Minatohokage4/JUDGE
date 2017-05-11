<?php
require_once('../functions.php');
connectdb();
$subject_id = $_POST["subject_id"];


$query = "DELETE FROM `subject` WHERE subject_id = '$subject_id'";
$query1 = "DELETE FROM `event` WHERE subject_id = '$subject_id'";
//$result1 = mysql_query($query1);
echo $query;
//$result = mysql_query($query);



//header("Location: subject_Container.php?delete");

?>
