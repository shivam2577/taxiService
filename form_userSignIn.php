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

if($email=="admin@gmail.com" && $pass=="qwerty"){
  session_start();
  $_SESSION["u_name"]="admin";
  $_SESSION["u_email"]="admin@gmail.com";
  header("location:adminSignedIn.php");
}else{
  $sql = "SELECT * FROM user where email='$email' and password='$pass'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
      // output data of each row
      $row = $result->fetch_assoc();
      $name=$row["name"];
      $noOfRides=$row["no_of_rides"];
      $phone=$row["phone_no"];
      session_start();
      $_SESSION["u_name"]=$name;
      $_SESSION["u_email"]=$email;
      $_SESSION["u_phone"]=$phone;
      header("location:userSignedIn.php");


  } else {
      $message = "Username and/or Password incorrect.\\nTry again.";
      echo "<script type='text/javascript'>alert('$message');window.location.href='userSignin.php'</script>";
  }
}
$conn->close();

?>
