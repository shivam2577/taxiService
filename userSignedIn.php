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
  </style>
</head>
<body style="  background-color: #F2F2F2;">

<!-- navbar -->
  <nav class="navbar navbar-expand-sm bg-light navbar-light fixed-top" style=" z-index: 1;">
      <span id=menu-button class="sideButton bg-light" style="font-size:20px;cursor:pointer" onclick="openNav()"><b>&#9776;</b></span>
     <a class="navbar-brand" href="#"><b>LYFT</b> DASHBOARD</a>
     <ul class="navbar-nav mr-auto">
       <li  class="nav-item active">
         <a class="nav-link" href="userHistory.php">HISTORY</a>
       </li>
     </ul>
      <ul class="navbar-nav ml-auto">
        <li  class="nav-item active">
          <form class="form-inline">
            <input required type="text" class="form-control"placeholder="From" id="from" style="margin-right:10px">
            <input required type="text" class="form-control"placeholder="To" id="to" style="margin-right:10px">
          <button id="letsGo" class="btn" type="button" style="color:white; background-color:black">Let's Go</button>
          </form>
        </li>
        <li  class="nav-item active">
          <a class="nav-link" href="userManageAccount.php">MANAGE ACCOUNT</a>
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
          <button id="delete" type="button" class="btn btn-dark" style="background:black;width:100%;bottom:0;left:0;min-width:300px ;position:absolute;">Delete Account</button>
    </div>
  </div>





<!-- main -->
<div id="main">

  <div id="map"></div>
  <div id="driverAlert" class="alert alert-info alert-dismissible fade show" style="margin-top:10px;display:none">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Driver Has Been Alloted!!</strong><a href="#" id="pop"title="Driver Details" data-toggle="modal" data-target="#exampleModalCenter" style="color:black"> see details.</a>
    <strong>Aproximate Fare :</strong><strong id="fare"></strong>
  </div>
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Driver Details</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div id="modalBody" class="modal-body">

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <div id="log"class="jumbotron jumbotron-fluid" style="height:150px; padding:-30px ; margin-top:10px;display:none">
    <div class="container-fluid" style="margin:-30px">
      <div class="row">
        <div class="col">
          <center>
            <p id="taxiStandLocation">Taxi Stand</p>
            </center>
        </div>
        <div class="col">
          <center>
            <p id="dist1">Distance</p>
            <p id="eta1">ETA</p>
          </center>
        </div>
        <div class="col">
          <center>
            <p id="source">Source</p>
            </center>
        </div>
        <div class="col">
          <center>
            <p id="dist2">Distance</p>
            <p id="eta2">ETA</p>
          </center>
        </div>
        <div class="col">
          <center>
              <p id="destination">Destination</p>
          </center>
        </div>
        <div class="col">
          <button id="simulate" type="button" class="btn btn-primary">SIMULATE RIDE</button>
        </div>

    </div>

  </div>
</div>

<script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover({
      html: true
    });
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


<script>
var map;
var driverDeAllocateLocation;
var letsGo = document.getElementById("letsGo");
var simulate=document.getElementById("simulate");
var deleteUser=document.getElementById("delete");
var simulateFlag=1;
var taxiStand = {
  "aundh":{lat:18.5580,lng:73.8075},
  "camp":{lat:18.5122,lng:73.8860},
  "hadapsar":{lat:18.5089,lng:73.9260},
  "katraj":{lat:18.4575,lng:73.8677},
  "kothrud":{lat:18.5074,lng:73.8077},
  "shivajiNagar":{lat:18.5308,lng:73.8475},
  "swargate":{lat:18.5018,lng:73.8636},
  "vimanNagar":{lat:18.5679,lng:73.9143},
}
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

  function initMap() {
    var directionsService = new google.maps.DirectionsService;
    var directionsDisplay = new google.maps.DirectionsRenderer;
    map = new google.maps.Map(document.getElementById('map'), {
      center: {lat: 18.5204, lng: 73.8567},
      zoom: 13
    });

    var from = document.getElementById('from');
    var to = document.getElementById('to');
    var autocomplete1 = new google.maps.places.Autocomplete(from);
    var autocomplete2 = new google.maps.places.Autocomplete(to);
    autocomplete1.bindTo('bounds', map);
    autocomplete2.bindTo('bounds', map);

    letsGo.addEventListener("click", function(){
      document.getElementById('taxiStandLocation').style.fontWeight = 'bold'
      document.getElementById('dist1').style.fontWeight = 'bold'
      document.getElementById('eta1').style.fontWeight = 'bold'
      document.getElementById('source').style.fontWeight = 'bold'
      var driverAlert = document.getElementById('driverAlert');
      var log = document.getElementById('log');
      directionsDisplay.setMap(map);

   	  var start=document.getElementById('from').value;
       var end=document.getElementById('to').value;
       if(start!="" && end!=""){
         if(start==end){
           alert("Source and Destination Cannot Be Same!");
         }else{
           calculateDistanceTaxiStand(start,directionsService, directionsDisplay);
           calculateDistance(start,end);
           driverAlert.style.display = "block";
           log.style.display = "block";
         }

      }
    });

    simulate.addEventListener("click",function(){
      document.getElementById('taxiStandLocation').style.fontWeight = 'normal'
      document.getElementById('dist1').style.fontWeight = 'normal'
      document.getElementById('eta1').style.fontWeight = 'normal'
      document.getElementById('source').style.fontWeight = 'bold'
      document.getElementById('dist2').style.fontWeight = 'bold'
      document.getElementById('eta2').style.fontWeight = 'bold'
      document.getElementById('destination').style.fontWeight = 'bold'
      var start=document.getElementById('from').value;
      var end=document.getElementById('to').value;
      if(simulateFlag==1){
        calculateAndDisplayRoute(directionsService, directionsDisplay,start,end);
        calculateDistanceTaxiStand1(end);
        simulateFlag=0;
      }else if(simulateFlag==0){
          document.location.href = "userBilling.php";
        //alert("Billing Page");
      }
    });
  }

  function allocateDriver(location){
    var ajax= new XMLHttpRequest();
    var method = "POST";
    var url="driverAllocate.php";
    var asynchronous=true;
    ajax.open(method,url,asynchronous);
    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    ajax.send("loc="+location);
    ajax.onreadystatechange= function(){
      if(this.readyState == 4 && this.status == 200){

        try{
          var data =JSON.parse(this.responseText);
        }catch(err){
          alert("No Driver In Your Area");
        }

      //  $('#pop').attr('data-content','Driver Name&ensp;&ensp; : '+data[0]+'<br />'+'Plate Number&ensp; : '+data[1]+'<br />'+'Phone Number : '+data[2]);s

      $(document).ready(function () {
       $('#exampleModalCenter').on('show.bs.modal', function (event) { // id of the modal with event


         var content = 'Driver Name&ensp;&ensp; : '+data[0]+'<br />'+'Plate Number&ensp; : '+data[1]+'<br />'+'Phone Number : '+data[2]+'<br />'+'Driver Rating&ensp;&ensp; : '+data[3]

         // Update the modal's content.
         var modal = $(this)
         modal.find('.modal-body').html(content)
         // And if you wish to pass the productid to modal's 'Yes' button for further processing

       })
      })


      }
    }
  }

  function calculateFare(dist,source,dest){
    var n=dist*12;
    var fare = n.toFixed(0);
    var ajax= new XMLHttpRequest();
    var method = "POST";
    var url="userFare.php";
    var asynchronous=true;
    ajax.open(method,url,asynchronous);
    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    ajax.send("fare="+fare+"&source="+source+"&dest="+dest);
    document.getElementById("fare").innerHTML=fare+" INR";
  }


  function calculateAndDisplayRoute(directionsService, directionsDisplay,start,end) {
    directionsService.route({
      origin:start,
      destination:end,
      travelMode: 'DRIVING'
    }, function(response, status) {
      if (status === 'OK') {
        directionsDisplay.setDirections(response);
      } else {
        window.alert('Directions request failed due to ' + status);
      }
    });
  }


  function calculateDistance(start,end){
    var service = new google.maps.DistanceMatrixService;
    service.getDistanceMatrix({
      origins:[start],
      destinations:[end],
      unitSystem:google.maps.UnitSystem.METRIC,
      avoidTolls:false,
      durationInTraffic: true,
      travelMode: google.maps.TravelMode.DRIVING,
      avoidHighways:false
    }, function(response, status) {
        if (status !== 'OK') {
        alert('Error was: ' + status);
      }else{
        document.getElementById("source").innerHTML=document.getElementById('from').value;
        document.getElementById("destination").innerHTML=document.getElementById('to').value;
        document.getElementById("dist2").innerHTML = response.rows[0].elements[0].distance.text;
        document.getElementById("eta2").innerHTML = response.rows[0].elements[0].duration.text;

        calculateFare(parseFloat(response.rows[0].elements[0].distance.text),document.getElementById('from').value,document.getElementById('to').value);
      }
    }
);
}


function calculateDistanceTaxiStand(start,directionsService, directionsDisplay){                                         //change
  var service = new google.maps.DistanceMatrixService;
  service.getDistanceMatrix({
    origins:[start],
    destinations:[taxiStand.aundh,taxiStand.camp,taxiStand.hadapsar,taxiStand.katraj,taxiStand.kothrud,taxiStand.shivajiNagar,
      taxiStand.swargate,taxiStand.vimanNagar],
    unitSystem:google.maps.UnitSystem.METRIC,
    avoidTolls:false,
    durationInTraffic: true,
    travelMode: google.maps.TravelMode.DRIVING,
    avoidHighways:false
  },function(response, status){
      if (status !== 'OK') {
      alert('Error was: ' + status);
      }else{
        var minDistance = parseFloat(response.rows[0].elements[0].distance.text);
        var stand = response.destinationAddresses[0];
        var eta = response.rows[0].elements[0].duration.text;
        var dist = response.rows[0].elements[0].distance.text;
        var check=0;
        var i=0;
        for(i=0;i<8;i++){
          if(parseFloat(response.rows[0].elements[i].distance.text)<minDistance){
            minDistance=parseFloat(response.rows[0].elements[i].distance.text);
            stand = response.destinationAddresses[i];
            eta = response.rows[0].elements[i].duration.text;
            dist = response.rows[0].elements[i].distance.text;
            check=i;

          }
          console.log(response.rows[0].elements[i].distance.text);
        }
        if(check==0){
          document.getElementById("taxiStandLocation").innerHTML="Aundh Taxi Stand"
          allocateDriver("Aundh");
        }else if(check==1){
          document.getElementById("taxiStandLocation").innerHTML="Camp Taxi Stand"
          allocateDriver("Camp");
        }else if(check==2){
          document.getElementById("taxiStandLocation").innerHTML="Hadapsar Taxi Stand"
          allocateDriver("Hadapsar");
        }else if(check==3){
          document.getElementById("taxiStandLocation").innerHTML="Katraj Taxi Stand"
          allocateDriver("Katraj");
        }else if(check==4){
          document.getElementById("taxiStandLocation").innerHTML="Kothrud Taxi Stand"
          allocateDriver("Kothrud");
        }else if(check==5){
          document.getElementById("taxiStandLocation").innerHTML="ShivajiNagar Taxi Stand"
          allocateDriver("ShivajiNagar");
        }else if(check==6){
          document.getElementById("taxiStandLocation").innerHTML="Swargate Taxi Stand"
          allocateDriver("Swargate");
        }else if(check==7){
          document.getElementById("taxiStandLocation").innerHTML="Viman Nagar Taxi Stand"
          allocateDriver("VimanNagar");
        }
          document.getElementById("dist1").innerHTML=dist;
          document.getElementById("eta1").innerHTML=eta;
          calculateAndDisplayRoute(directionsService, directionsDisplay,stand,start);
     }
    });
}

function calculateDistanceTaxiStand1(end){
  var service = new google.maps.DistanceMatrixService;
  service.getDistanceMatrix({
    origins:[end],
    destinations:[taxiStand.aundh,taxiStand.camp,taxiStand.hadapsar,taxiStand.katraj,taxiStand.kothrud,taxiStand.shivajiNagar,
      taxiStand.swargate,taxiStand.vimanNagar],
    unitSystem:google.maps.UnitSystem.METRIC,
    avoidTolls:false,
    durationInTraffic: true,
    travelMode: google.maps.TravelMode.DRIVING,
    avoidHighways:false
  },function(response, status){
      if (status !== 'OK') {
      alert('Error was: ' + status);
      }else{
        var minDistance = parseFloat(response.rows[0].elements[0].distance.text);
        var dist = response.rows[0].elements[0].distance.text;
        var check=0;
        var i=0;
        for(i=0;i<8;i++){
          if(parseFloat(response.rows[0].elements[i].distance.text)<minDistance){
            minDistance=parseFloat(response.rows[0].elements[i].distance.text);
            dist = response.rows[0].elements[i].distance.text;
            check=i;
          }
        }


          if(check==0){
            driverDeAllocateLocation="Aundh";
          }else if(check==1){
            driverDeAllocateLocation="Camp";
          }else if(check==2){
            driverDeAllocateLocation="Hadapsar";
          }else if(check==3){
            driverDeAllocateLocation="Katraj";
          }else if(check==4){
            driverDeAllocateLocation="Kothrud";
          }else if(check==5){
            driverDeAllocateLocation="ShivajiNagar";
          }else if(check==6){
            driverDeAllocateLocation="Swargate";
          }else if(check==7){
            driverDeAllocateLocation="VimanNagar";
          }

          var ajax= new XMLHttpRequest();
          var method = "POST";
          var url="driverDeAllocateLocation.php";
          var asynchronous=false;
          ajax.open(method,url,asynchronous);
          ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          ajax.send("driverDeAllocateLocation="+driverDeAllocateLocation);

     }
    });
}

</script>
<script async defer
 src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE&libraries=places&callback=initMap">
 </script>

</body>
</html>
