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
    $name=$_POST["name"];
    $phone=$_POST["phone"];
    $u_id=$_SESSION["u_id"];
    $sql = "UPDATE user SET name='$name',phone_no=$phone WHERE userid=$u_id";
    if ($conn->query($sql) === TRUE) {
        $_SESSION["u_name"]=$name;
        $_SESSION["u_phone"]=$phone;
        header("location:userSignedIn.php");

    } else {
	echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>
