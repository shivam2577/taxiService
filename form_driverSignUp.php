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
	$email=$_POST["email"];
    $phone=$_POST["phone"];
	$bdate=$_POST["date"];
    $pass=$_POST["password"];
    $nplate=$_POST["numberplate"];
	$tslocation=$_POST["location"];
echo($tslocation);
    $name = $fname." ".$lname;

	$sql="insert into taxi(no_plate) values('$nplate');
			insert into contains(no_plate,location) values('$nplate','$tslocation');
			insert into taxidriver(name,dob,phone_no,no_plate,email,password,rating) values('$name','$bdate','$phone','$nplate','$email','$pass',0)";

	if ($conn->multi_query($sql)) {

		session_start();
        $_SESSION["d_name"]=$name;
        $_SESSION["d_email"]=$email;
		$_SESSION["d_phone"]=$phone;
		$_SESSION["d_date"]=$bdate;
	   $_SESSION["d_noPlate"]=$nplate;
      header("location:driverSignedIn.php");

		} else {
	echo "\n Error: \n" . $sql . "<br>" . $conn->error;
    }

    $conn->close();


?>
