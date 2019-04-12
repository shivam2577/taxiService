<?php
session_start();
$date =$_POST['date'];
$time =$_POST['time'];
$_SESSION["date"]=$date;
$_SESSION["time"]=$time;
?>
