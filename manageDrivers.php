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
      #myInput {
        background-position: 10px 12px; /* Position the search icon */
        background-repeat: no-repeat; /* Do not repeat the icon image */
        width: 100%; /* Full-width */
        font-size: 16px; /* Increase font-size */
        padding: 12px 20px 12px 40px; /* Add some padding */
        border: 1px solid #ddd; /* Add a grey border */
       }

  </style>
</head>
<body style="  background-color: #F2F2F2;">

<!-- navbar -->
  <nav class="navbar navbar-expand-sm bg-light navbar-light fixed-top" style=" z-index: 1;">
    <span id=menu-button class="sideButton bg-light" style="font-size:20px;cursor:pointer" onclick="openNav()"><b>&#9776;</b></span>
    <a class="navbar-brand" href="adminSignedIn.php"><b>LYFT</b> DASHBOARD</a>
    <ul class="navbar-nav ml-auto">
      <li  class="nav-item active">
        <a class="nav-link" href="adminStats.php">STATISTICS</a>
      </li>
      <li  class="nav-item active">
        <a class="nav-link" href="#"><b>MANAGE DRIVERS</b></a>
      </li>
     <li  class="nav-item active">
      <a class="nav-link" href="logout.php">SIGN OUT</a>
     </li>
    </ul>
  </nav>


<?php
$u_name=$_SESSION["u_name"];
$u_email=$_SESSION["u_email"];
?>

<!-- sidebar -->
  <div id="mySidenav" class="sidenav">
    <br>
      <div class="textCenter">
      <p style="font-size:22px"><b>User Profile</b></p>
      <hr>
        <p name="name" style="font-size:18px"><?php echo $u_name ?></p>
        <p name="email" style="font-size:18px"><?php echo $u_email ?></p>
      <hr>
    </div>
  </div>





<!-- main -->
<div id="main" style="padding:40px">
<br>
<br>
<br>
<br>
<h4>Search Driver Details...</h4>

<div class="row">
  <div class="col-10">
    <input type="text" id="myInput"  placeholder="Enter Number Plate...">
  </div>
  <div class="col-2">
    <button id="search" type="button" class="btn btn-primary" style="background:black;width:100%;font-size: 20px;height:50px">Search</button>
  </div>
</div>

  <br>
  <br>
  <div id="driver" class="card" style="width:50%;margin:0 auto;display:none">
  <div class="card-body">
    <p id="close" align="right" style="color:black;font-size:20px;margin-top:-20px;cursor: pointer;"><b>&#10005;</b></p>
    <h4 id="name"class="card-title" style="display:inline"><b></b></h4>
    <p id="id"class="card-text" style="display:inline; position: absolute;right: 0px;margin-right:25px"></p>
    <p id="noPlate" class="card-text"></p>
    <hr>
    <div class="row">
      <div class="col">
        <p class="card-text"><b>Email :</b></p>
        <p id="email"class="card-text"></p>
        <p class="card-text"><b>Contact :</b></p>
        <p id="phone"class="card-text"></p>
      </div>
      <div class="col">
        <p class="card-text"><b>Date of Birth :</b></p>
        <p id="dob"class="card-text"></p>
        <p class="card-text"><b>Rating :</b></p>
        <p id="rating"class="card-text"></p>
      </div>
    </div>
    <br>
    <button id="fire" type="button" class="btn btn-primary" style="background:black;width:100%;font-size: 16px">FIRE DRIVER</button>
  </div>
</div>
<h1 id="notFound"class="display-4" align="center" style="display:none">No Data Found</h1>
<h1 id="fired"class="display-4" align="center" style="display:none">Fired!!</h1>
<center>
  <br>
<div class="table-responsive" align="center" style="max-height:320px">
<table id="table"class="table table-hover" align="center"style="width:100%;">
  <thead class="thead-dark">
    <tr>
      <th>Driver ID</th>
      <th>Number Plate</th>
      <th>Driver Name</th>
    </tr>
  </thead>
  <tbody>

  </tbody>
</table>
</div>
</center>
<br>
</div>

<script>
  var input = document.getElementById("myInput");
  input.addEventListener("keyup", function(event) {
      event.preventDefault();
      if (event.keyCode === 13) {
          document.getElementById("search").click();
      }
  });
</script>

<script>
  var search = document.getElementById("search");
  var fire = document.getElementById("fire");
  var driverCard = document.getElementById("driver");
  var notFound = document.getElementById("notFound");
  var fired = document.getElementById("fired");
  var close=document.getElementById("close");
  var driverTable=document.getElementById("table").getElementsByTagName('tbody')[0];
  var driverTable1=document.getElementById("table");
  var noPlateFire;

  var ajax= new XMLHttpRequest();
  var method = "POST";
  var url="getDriver.php";
  var asynchronous=true;
  ajax.open(method,url,asynchronous);
  ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  ajax.send();
  ajax.onreadystatechange= function(){
    if(this.readyState == 4 && this.status == 200){
        try{
          var data =JSON.parse(this.responseText);
        }catch(err){
          alert(this.responseText);
        }
        updateTable(data);

    }
  }

  function updateTable(data){
    for(let i=0;i<data.length;i++){
      var row = driverTable.insertRow(0);
      var driverid= row.insertCell(0);
      var noPlate = row.insertCell(1);
      var name = row.insertCell(2);
      driverid.innerHTML = data[i].driverid;
      noPlate.innerHTML = data[i].noPlate;
      name.innerHTML = data[i].name;
    }
  }

  close.addEventListener("click",function(){
    driverCard.style.display="none";
    driverTable1.style.display="table";
  });
  search.addEventListener("click",function(){
    notFound.style.display="none";
    driverCard.style.display="none";
    fired.style.display="none";
    driverTable1.style.display="none";
    var noPlate=document.getElementById("myInput").value;
    var ajax= new XMLHttpRequest();
    var method = "POST";
    var url="getDriver.php";
    var asynchronous=true;
    ajax.open(method,url,asynchronous);
    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    ajax.send("noPlate="+noPlate);
    ajax.onreadystatechange= function(){
      if(this.readyState == 4 && this.status == 200){
      //  alert(this.responseText);
        try{
          var data =JSON.parse(this.responseText);
          document.getElementById("name").innerHTML=data[0];
          document.getElementById("noPlate").innerHTML=data[1];
          document.getElementById("id").innerHTML=data[3];
          document.getElementById("email").innerHTML=data[5];
          document.getElementById("phone").innerHTML=data[2];
          document.getElementById("dob").innerHTML=data[4];
          document.getElementById("rating").innerHTML=data[6];
          noPlateFire=data[1];
          driverCard.style.display="block";
        }catch(err){
          notFound.style.display="block";
          driverTable1.style.display="table";
        }

      }
    }
  });

  fire.addEventListener("click",function(){
    var ajax= new XMLHttpRequest();
    var method = "POST";
    var url="fireDriver.php";
    var asynchronous=true;
    ajax.open(method,url,asynchronous);
    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    ajax.send("noPlate="+noPlateFire);
    fired.style.display="block";
    driverCard.style.display="none";
    driverTable1.style.display="table";
  });

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
