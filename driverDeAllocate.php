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
$noPlate=$_SESSION["no_plate"];
$loc=$_SESSION["driverDeAllocateLocation"];
$sql ="DELETE FROM contains WHERE no_plate='$noPlate';";
if($conn->multi_query($sql)){
}else{
echo "\n Error: \n" . $sql . "<br>" . $conn->error;
}
$sql1 ="INSERT INTO contains VALUES('$noPlate','$loc');";
if($conn->multi_query($sql1)){

}else{
  echo "\n Error: \n" . $sql1 . "<br>" . $conn->error;
}

$conn->close();

?>
