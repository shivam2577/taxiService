<?php
session_start();
$source=$_SESSION["source"];
$dest=$_SESSION["dest"];
$noPlate=$_SESSION["no_plate"];
$u_id=$_SESSION["u_id"];
$d_id=$_SESSION["driver_id"];
$date=$_SESSION["date"];
$time=$_SESSION["time"];
$fare=$_SESSION["u_fare"];
$pickup_ts=$_SESSION["pickup_ts"];
$drop_ts=$_SESSION["driverDeAllocateLocation"];

$servername="localhost";
$username = "root";
$password = "";
$dbname = "shivam";
$rating =$_POST['rating'];
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
$sql="INSERT INTO ride(pickup,dropdown,userid,no_plate,date,time,rating,driverid,fare,pickup_ts,drop_ts) VALUES('$source','$dest',$u_id,'$noPlate','$date','$time',$rating,$d_id,$fare,'$pickup_ts','$drop_ts')";
if ($conn->multi_query($sql) === TRUE) {

} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql2="SELECT * FROM ride WHERE userid=$u_id";
if ($result=mysqli_query($conn,$sql2))
  {
  // Return the number of rows in result set
  $rowcount=mysqli_num_rows($result);

  }

$sql1="UPDATE user SET no_of_rides=$rowcount WHERE userid=$u_id";
if ($conn->multi_query($sql1) === TRUE) {

} else {
echo "Error: " . $sql1 . "<br>" . $conn->error;
}
?>
