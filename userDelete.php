<?php
$servername="localhost";
$username = "root";
$password = "";
$dbname = "shivam";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
session_start();
$u_email=$_SESSION["u_email"];
$sql = "DELETE FROM user WHERE email='$u_email'";
$conn->query($sql);
session_unset();
session_destroy();


$conn->close();

?>
