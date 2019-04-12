<?php
$servername="localhost";
$username = "root";
$password = "";
$dbname = "shivam";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['noPlate'])){
  $noPlate =$_POST['noPlate'];
  $sql = "SELECT * FROM taxidriver WHERE no_plate ='$noPlate'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
      // output data of each row
      $data=array();
      $row = $result->fetch_assoc();
      $name=$row["name"];
      $noPlate=$row["no_plate"];
      $phoneNo=$row["phone_no"];
      $driverid=$row["driverid"];
      $dob=$row["dob"];
      $email=$row["email"];
      $rating=$row["rating"];
      $data=[$name,$noPlate,$phoneNo,$driverid,$dob,$email,$rating];
      // session_start();
      // $_SESSION["no_plate"]=$noPlate;
      // $_SESSION["driver_id"]=$driverid;
      echo json_encode($data);


  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}else{
  $sql = "SELECT * FROM taxidriver;";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()){
      $driverid=$row["driverid"];
      $noPlate=$row["no_plate"];
      $d_name=$row["name"];
      $data[] = array("driverid" => $driverid,"noPlate" => $noPlate,"name" => $d_name);
    }
    echo(json_encode($data));
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

$conn->close();

?>
