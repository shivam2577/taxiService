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
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <script type = "text/javascript" src = "https://www.gstatic.com/charts/loader.js">
    </script>
    <script type = "text/javascript">
       google.charts.load('current', {packages: ['corechart']});
    </script>
  <title>DRIVER</title>

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

<!-- navbar -->
  <nav class="navbar navbar-expand-sm bg-light navbar-light fixed-top" style=" z-index: 1;">
    <span id=menu-button class="sideButton bg-light" style="font-size:20px;cursor:pointer" onclick="openNav()"><b>&#9776;</b></span>
    <a class="navbar-brand" href="#"><b>LYFT</b> DASHBOARD</a>
    <ul class="navbar-nav ml-auto">
      <li  class="nav-item active">
        <a class="nav-link" href="driverManageAccount.php">MANAGE ACCOUNT</a>
      </li>
     <li  class="nav-item active">
      <a class="nav-link" href="logout.php">SIGN OUT</a>
     </li>
    </ul>
  </nav>


<?php

  $d_name=$_SESSION["d_name"];
  $d_email=$_SESSION["d_email"];
  $d_phone=$_SESSION["d_phone"];
  $d_bdate=$_SESSION["d_date"];
  $d_nplate=$_SESSION["d_noPlate"];

  $servername="localhost";
  $username = "root";
  $password = "";
  $dbname = "shivam";

  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT * FROM taxidriver where email='$d_email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        $row = $result->fetch_assoc();
        $d_id=$row["driverid"];
        $_SESSION["d_id"]=$d_id;
    } else {

    }

?>

<!-- sidebar -->
  <div id="mySidenav" class="sidenav">
    <br>
      <div class="textCenter">
      <p style="font-size:22px"><b>Driver Profile</b></p>
      <hr>
        <p name="name" style="font-size:18px"><?php echo $d_name ?></p>
        <p name="email" style="font-size:18px"><?php echo $d_email ?></p>
        <p name="phone" style="font-size:18px"><?php echo $d_phone ?></p>
        <p name="dob" style="font-size:18px"><?php echo $d_bdate ?></p>
        <p id="noPlate" style="font-size:18px"><?php echo $d_nplate ?></p>
    </div>
  </div>





<!-- main -->
<div id="main">
<br>
<div class="container">
  <div class="row">
    <div class="col">

      <div class="card" style="width: 520px; height: 320px">
        <div class="card-body">
          <h4 class="card-title"><?php echo $d_name ?></h4>
          <p class="card-text"><?php echo $d_nplate ?></p>
          <hr>
          <center>
            <x-star-rating style="font-size: 108px;"><div class="star full"></div></x-star-rating>
            <p id="rating" style="font-size:30px;font-weight: bold"></p>
          </center>
        </div>
      </div>

    </div>
    <div class="col">
      <div class="card" style="width: 520px; height: 320px">
        <div class="card-body">
          <div id = "container1" style = "width: 500px; height: 300px;"></div>
        </div>
      </div>
    </div>
  </div>
  <br>
  <br>
<div class="table-responsive" style="max-height:300px;">
<table id="history"class="table table-hover"style="display:none">
  <thead class="thead-dark">
    <tr>
      <th>Ride ID</th>
      <th>Date</th>
      <th>Time</th>
      <th>PickUp</th>
      <th>DropDown</th>
      <th>User ID</th>
    </tr>
  </thead>
  <tbody>

  </tbody>
</table>
</div>
</div>
</div>



<script>
  var table = document.getElementById("history").getElementsByTagName('tbody')[0];
  history(document.getElementById("noPlate").innerHTML);
  var rating1=0,rating2=0,rating3=0,rating4=0,rating5=0;

  function history(no_plate){
    var ajax= new XMLHttpRequest();
    var method = "POST";
    var url="driverHistory.php";
    var asynchronous=true;
    ajax.open(method,url,asynchronous);
    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    ajax.send("no_plate="+no_plate);
    ajax.onreadystatechange= function(){
      if(this.readyState == 4 && this.status == 200){
        try{
          var data =JSON.parse(this.responseText);
          var table1 = document.getElementById("history");
          table1.style.display = "block";
        }catch(err){
          alert("No Data To Show");
          document.getElementById("rating").innerHTML=0;
        }
        for(let i=0;i<data.length;i++){
          if(data[i].rating==1)
            rating1++;
          else if(data[i].rating==2)
            rating2++;
          else if(data[i].rating==3)
            rating3++;
          else if(data[i].rating==4)
            rating4++;
          else if(data[i].rating==5)
            rating5++;
        }
        updateTable(data,no_plate);
      }
    }
  }

function updateTable(data,no_plate){
  var rating=0;
  for(let i=0;i<data.length;i++){
    var row = table.insertRow(0);
    var rideid = row.insertCell(0);
    var date = row.insertCell(1);
    var time = row.insertCell(2);
    var pickup = row.insertCell(3);
    var dropdown = row.insertCell(4);
    var userid = row.insertCell(5);
    rideid.innerHTML = data[i].rideid;
    date.innerHTML = data[i].date;
    time.innerHTML = data[i].time;
    pickup.innerHTML = data[i].pickup;
    dropdown.innerHTML = data[i].dropdown;
    userid.innerHTML = data[i].userID;
    rating=rating+parseInt(data[i].rating);
  }
  var n=parseFloat(rating/data.length);
  var rate = n.toFixed(1);
  document.getElementById("rating").innerHTML=rate;

  var ajax= new XMLHttpRequest();
  var method = "POST";
  var url="saveDriverRating.php";
  var asynchronous=true;
  ajax.open(method,url,asynchronous);
  ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  ajax.send("rating="+rate+"&no_plate="+no_plate);
}

function drawChart() {
   // Define the chart to be drawn.
   var data = google.visualization.arrayToDataTable([
      ['Rating', 'Users',{ role: 'style' }],
      ['1 Star',  rating1,'#1A84F1'],
      ['2 Star',  rating2,'#1A84F1'],
      ['3 Star',  rating3,'#1A84F1'],
      ['4 Star',  rating4,'#1A84F1'],
      ['5 Star',  rating5,'#1A84F1']
   ]);

   var options = {title: 'Rating Analysis',
                  vAxis: { title:"Number Of Users" },
                  hAxis: { title:"Rating(Stars)" },
                  legend: { position: "none" }
 };

   // Instantiate and draw the chart.
   var chart = new google.visualization.ColumnChart(document.getElementById('container1'));
   chart.draw(data, options);
}
setTimeout(function() {
  google.charts.setOnLoadCallback(drawChart);
}, 1000);
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
