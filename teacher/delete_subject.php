<?php
require_once('../functions.php');
connectdb();
$subject_id = $_POST["subject_id"];

$query = "DELETE FROM problems1 WHERE event_id in (SELECT event_id FROM subject WHERE subject_id = '$subject_id' )" ;
$query2 = "DELETE FROM `subject` WHERE subject_id = '$subject_id'";
$query1 = "DELETE FROM `event` WHERE subject_id = '$subject_id'";
$result = mysql_query($query);
$result1 = mysql_query($query1);
$result3 = mysql_query($query2);



header("Location: subject_Container.php?delete");

?>
