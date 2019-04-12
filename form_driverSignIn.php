<?php
$servername="localhost";
$username = "root";
$password = "";
$dbname = "shivam";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$pass=$_POST["password"];
$email=$_POST["email"];
$sql = "SELECT * FROM taxidriver where email='$email' and password='$pass'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    $row = $result->fetch_assoc();
    $name=$row["name"];
    $phone=$row["phone_no"];
    $bdate=$row["dob"];
    $nplate=$row["no_plate"];
    session_start();
    $_SESSION["d_name"]=$name;
    $_SESSION["d_email"]=$email;
    $_SESSION["d_phone"]=$phone;
    $_SESSION["d_date"]=$bdate;
	  $_SESSION["d_noPlate"]=$nplate;
    header("location:driverSignedIn.php");


} else {
    $message = "Username and/or Password incorrect.\\nTry again.";
    echo "<script type='text/javascript'>alert('$message');window.location.href='userSignin.php'</script>";
}
$conn->close();

?>
