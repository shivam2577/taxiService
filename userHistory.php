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
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
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

    x-star-rating{
      font-family: 'Ionicons';
      font-size: 38px;
      display:inline-flex;
      cursor: pointer;
      margin-top: -16px;
    }
    x-star-rating > .star::after{
      content: '\f3ae';
      color: black;

    }
      x-star-rating > .star.full::after{
        content: '\f2fc';
        color:#1A84F1;
      }

  </style>
</head>
<body style="  background-color: #F2F2F2;">

  <?php
  $u_name=$_SESSION["u_name"];
  $u_email=$_SESSION["u_email"];
  $u_phone=$_SESSION["u_phone"];
  $u_noOfRides=$_SESSION["u_noOfRides"];
  ?>




<!-- navbar -->
<nav class="navbar navbar-expand-sm bg-light navbar-light fixed-top" style=" z-index: 1;">
    <span id=menu-button class="sideButton bg-light" style="font-size:20px;cursor:pointer" onclick="openNav()"><b>&#9776;</b></span>
   <a class="navbar-brand" href="userSignedIn.php"><b>LYFT</b> DASHBOARD</a>
   <ul class="navbar-nav mr-auto">
     <li  class="nav-item active">
       <a class="nav-link" href="#"><b>HISTORY</b></a>
     </li>
   </ul>
    <ul class="navbar-nav ml-auto">
      <li  class="nav-item active">
        <a class="nav-link" href="userManageAccount.php">MANAGE ACCOUNT</a>
      </li>
      <li  class="nav-item active">
        <a class="nav-link" href="logout.php">SIGN OUT</a>
      </li>
    </ul>
</nav>

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
    </div>
  </div>





<!-- main -->
<div id="main">
<br>
<br>
<div class="table-responsive" style="max-height:600px;">
<table id="history"class="table table-hover">
  <thead class="thead-dark">
    <tr>
      <th>Ride ID</th>
      <th>Date</th>
      <th>Time</th>
      <th>PickUp</th>
      <th>DropDown</th>
      <th>Driver ID</th>
      <th>Fare</th>
    </tr>
  </thead>
  <tbody>

  </tbody>
</table>
</div>
</div>


<script>
  var table = document.getElementById("history").getElementsByTagName('tbody')[0];
  var ajax= new XMLHttpRequest();
  var method = "POST";
  var url="getUserHistory.php";
  var asynchronous=true;
  ajax.open(method,url,asynchronous);
  ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  ajax.send();
  ajax.onreadystatechange= function(){
      if(this.readyState == 4 && this.status == 200){
        try{
          var data =JSON.parse(this.responseText);
        }
        catch(err){
          alert(this.responseText);
        }
          updateTable(data);
      }
  }
  function updateTable(data){
    for(let i=0;i<data.length;i++){
      var row = table.insertRow(0);
      var rideid = row.insertCell(0);
      var date = row.insertCell(1);
      var time = row.insertCell(2);
      var pickup = row.insertCell(3);
      var dropdown = row.insertCell(4);
      var driverid = row.insertCell(5);
      var fare=row.insertCell(6);
      rideid.innerHTML = data[i].rideid;
      date.innerHTML = data[i].date;
      time.innerHTML = data[i].time;
      pickup.innerHTML = data[i].pickup;
      dropdown.innerHTML = data[i].dropdown;
      driverid.innerHTML = data[i].userID;
      fare.innerHTML = data[i].fare;

    }
  }
</script>



<!-- Script For The SideBar -->
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
