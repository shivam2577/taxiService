<?php
$servername="localhost";
$username = "root";
$password = "";
$dbname = "shivam";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$loc =$_POST['loc'];
$sql = "SELECT * FROM taxidriver WHERE no_plate = (SELECT no_plate FROM contains where location='$loc' limit 1)";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    $data=array();
    $row = $result->fetch_assoc();
    $name=$row["name"];
    $noPlate=$row["no_plate"];
    $phoneNo=$row["phone_no"];
    $driverid=$row["driverid"];
    $driverRating=$row["rating"];
    $data=[$name,$noPlate,$phoneNo,$driverRating];
    session_start();
    $_SESSION["pickup_ts"]=$loc;
    $_SESSION["no_plate"]=$noPlate;
    $_SESSION["driver_id"]=$driverid;
    echo json_encode($data);


} else {

}
$conn->close();

?>
