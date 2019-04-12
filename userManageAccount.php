<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <title>USER</title>

  <style>

    .sidenav {
      height: 100%;
      width: 0;
      position: fixed;
      left: 0;
      background-color: white;
      overflow-x: hidden;
      transition: 0.5s;
      padding-top: 60px;
    }


    .textCenter{
      text-align: center;
       min-width:300px;
    }


    #main {
      transition: margin-left .5s;
      padding-top: 50px;
    }

    #map {
      height: 450px;
      width: 100%;
    }
    @media screen and (max-height: 450px) {
    .sidenav {padding-top: 15px;}
    .sidenav a {font-size: 18px;}
}

    li.nav-item{
      margin-right: 25px;
    }
    a.navbar-brand{
      margin-left: 50px;
      margin-right: 25px;
    }
    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
    -webkit-appearance: none;
    margin: 0;
    }
  </style>
</head>
<body style="  background-color: #F2F2F2;">

<!-- navbar -->
  <nav class="navbar navbar-expand-sm bg-light navbar-light fixed-top" style=" z-index: 1;">
      <span id=menu-button class="sideButton bg-light" style="font-size:20px;cursor:pointer" onclick="openNav()"><b>&#9776;</b></span>
     <a class="navbar-brand" href="userSignedIn.php"><b>LYFT</b> DASHBOARD</a>
     <ul class="navbar-nav mr-auto">
       <li  class="nav-item active">
         <a class="nav-link" href="userHistory.php">HISTORY</a>
       </li>
     </ul>
      <ul class="navbar-nav ml-auto">
        <li  class="nav-item active">
          <a class="nav-link" href="#"><b>MANAGE ACCOUNT</b></a>
        </li>
        <li  class="nav-item active">
          <a class="nav-link" href="logout.php">SIGN OUT</a>
        </li>
      </ul>
  </nav>


<?php
$u_name=$_SESSION["u_name"];
$u_email=$_SESSION["u_email"];
$u_phone=$_SESSION["u_phone"];


$servername="localhost";
$username = "root";
$password = "";
$dbname = "shivam";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  $sql = "SELECT * FROM user where email='$u_email'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
      // output data of each row
      $row = $result->fetch_assoc();
      $u_id=$row["userid"];
      $u_noOfRides=$row["no_of_rides"];
      $_SESSION["u_id"]=$u_id;
      $_SESSION["u_noOfRides"]=$u_noOfRides;
  } else {
      $message = "Username and/or Password incorrect.\\nTry again.";
      echo "<script type='text/javascript'>alert('$message');window.location.href='userSignin.php'</script>";
  }
?>

<!-- sidebar -->
  <div id="mySidenav" class="sidenav">
    <br>
      <div class="textCenter">
      <p style="font-size:22px"><b>User Profile</b></p>
      <hr>
        <p name="name" style="font-size:18px"><?php echo $u_name ?></p>
        <p name="email" style="font-size:18px"><?php echo $u_email ?></p>
        <p name="phone" style="font-size:18px"><?php echo $u_phone ?></p>
      <hr>
        <p style="font-size:18px">Number Of Rides</p>
        <p name="numberOfRides" style="font-size:18px"><b><?php echo $u_noOfRides ?></b></p>
      <hr>
          <button id="delete" type="button" class="btn btn-primary" style="background:black;width:100%;bottom:0;left:0;position:absolute;">Delete Account</button>
    </div>
  </div>





<!-- main -->
<div id="main">
<br>
<br>
<br>
<div id="driver" class="card" style="width:25%;margin:0 auto;">
<div class="card-body">
  <p id="id"class="card-text" align="right"><?php echo $u_id ?></p>
  <form method="post" action="editUser.php">
      <p class="card-text"><b>Name :</b></p>
      <input required type="text" class="form-control"value="<?php echo $u_name ?>" name="name"  pattern="[A-Z\sa-z]{1,25}" title="Must Contain Letters">
      <p class="card-text"style="margin-top:10px"><b>Contact :</b></p>
      <input required type="tel" class="form-control"value="<?php echo $u_phone ?>" name="phone" pattern="[789][0-9]{9}$" title="Invalid contact">
      <button type="submit" id="btn"class="btn btn-info" style="width:100%;height:40px;font-size: 14px;margin-top:80px"><b>EDIT</b></button>
  </form>
</div>
</div>


</div>


<script>
  var deleteUser=document.getElementById("delete");
  deleteUser.addEventListener("click",function(){
    var ajax= new XMLHttpRequest();
    var method = "POST";
    var url="userDelete.php";
    var asynchronous=true;
    ajax.open(method,url,asynchronous);
    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    ajax.send();
    document.location.href = "home.php";
  });
</script>

<script>
  //SideBar Code Here
  var open=1;
    function openNav() {
      if(open==1){
      document.getElementById("mySidenav").style.width = "300px";
      document.getElementById("main").style.marginLeft = "300px";
      open=0;
    }else if(open==0){
      document.getElementById("mySidenav").style.width = "0";
      document.getElementById("main").style.marginLeft= "0";
      open=1;
    }

  }

</script>



</body>
</html>
