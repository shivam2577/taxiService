<?php
header("Content-Type: application/json; charset=UTF-8");
$servername="localhost";
$username = "root";
$password = "";
$dbname = "shivam";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM ride;";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()){
    $rideid=$row["rideid"];
    $pickup=$row["pickup"];
    $dropdown=$row["dropdown"];
    $id=$row["userid"];
    $date=$row["date"];
    $time=$row["time"];
    $rating=$row["rating"];
    $driverid=$row["driverid"];
    $fare=$row["fare"];
    $data[] = array("rideid" => $rideid, "pickup" => $pickup,"dropdown" => $dropdown,"userID" => $id,"date" => $date,"time" => $time,"rating" => $rating,"driverID" => $driverid,"fare" => $fare);
  }

  echo(json_encode($data));

} else {
  echo("No Data To Show");
}
$conn->close();

?>
