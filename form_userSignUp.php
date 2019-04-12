<?php
$servername="localhost";
$username = "root";
$password = "";
$dbname = "shivam";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
    $fname=$_POST["fname"];
    $lname=$_POST["lname"];
    $phone=$_POST["phone"];
    $pass=$_POST["password"];
    $email=$_POST["email"];
    $name = $fname." ".$lname;
    $sql = "INSERT INTO user(name,phone_no,no_of_rides,email,password) VALUES ('$name','$phone',0,'$email','$pass')";
    if ($conn->query($sql) === TRUE) {
        session_start();
        $_SESSION["u_name"]=$name;
        $_SESSION["u_email"]=$email;
        $_SESSION["u_phone"]=$phone;
        header("location:userSignedIn.php");

    } else {
	echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>
