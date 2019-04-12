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
$no_plate =$_POST['no_plate'];
$sql = "SELECT * FROM ride WHERE no_plate = '$no_plate';";
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
    $data[] = array("rideid" => $rideid, "pickup" => $pickup,"dropdown" => $dropdown,"userID" => $id,"date" => $date,"time" => $time,"rating" => $rating);
  }

  echo(json_encode($data));

} else {
  echo("No Data To Show");
}
$conn->close();

?>
