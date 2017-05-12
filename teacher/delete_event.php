<?php
require_once('../functions.php');
connectdb();
$event_id = $_POST["event_id"];

$query = "DELETE FROM problems WHERE event_id =$event_id";

$query1 = "DELETE FROM `event` WHERE event_id = $event_id";
/*echo $query."<br>";
echo $query1."<br>";*/
$result = mysql_query($query);
$result1 = mysql_query($query1);





header("Location: subject_Container.php?delete");

?>
