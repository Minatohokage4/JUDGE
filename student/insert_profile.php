<?php
require_once('../functions.php');
connectdb();
$name = $_POST["name"];
$username = $_POST["username"];
$lastname = $_POST["lastname"];
$email = $_POST["email"];

$query = "INSERT INTO `profile`(`sl`, `name`, `lastname`) VALUES ('".$_SESSION['sl']."','$name','$lastname')";
$result = mysql_query($query);

$query1 = "UPDATE `user` SET `email`='$email'  WHERE sl ='".$_SESSION['sl']."' ";
$result1 = mysql_query($query1);
header("Location: profile.php?changed=1");

?>
