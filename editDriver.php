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
	  $bdate=$_POST["date"];
    $nplate=$_POST["numberplate"];
    $d_PreviousNplate=$_SESSION["d_noPlate"];
    $d_id=$_SESSION["d_id"];
	$sql="UPDATE taxi SET no_plate='$nplate' WHERE no_plate='$d_PreviousNplate';";
		$sql1="UPDATE taxidriver SET name='$name',dob='$bdate',phone_no=$phone WHERE driverid=$d_id;";


	if ($conn->multi_query($sql)) {


	  $_SESSION["d_noPlate"]=$nplate;


		} else {
	echo "\n Error: \n" . $sql . "<br>" . $conn->error;
    }
    if ($conn->multi_query($sql1)) {

      $_SESSION["d_name"]=$name;
      $_SESSION["d_phone"]=$phone;
      $_SESSION["d_date"]=$bdate;
  header("location:driverSignedIn.php");
      } else {
    echo "\n Error: \n" . $sql . "<br>" . $conn->error;
      }

    $conn->close();


?>
