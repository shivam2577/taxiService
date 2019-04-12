<?php
session_start();
$fare =$_POST['fare'];
$source =$_POST['source'];
$dest =$_POST['dest'];
$_SESSION["u_fare"]=$fare;
$_SESSION["source"]=$source;
$_SESSION["dest"]=$dest;
?>
