<?php
$servername="localhost";
$username = "root";
$password = "";
$dbname = "shivam";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$noPlate=$_POST['noPlate'];
$sql = "DELETE FROM taxi WHERE no_plate ='$noPlate';";

if ( $conn->query($sql)) {
    // output data of each row

} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();

?>
