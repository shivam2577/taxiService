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
    margin-bottom: 12px; /* Add some space below the input */
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
        <a class="nav-link" href="adminStats.php">STATISTICS</a>
      </li>
      <li  class="nav-item active">
        <a class="nav-link" href="manageDrivers.php">MANAGE DRIVERS</a>
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
<div id="main" style="padding:20px">
<br>
<br>
<br>
<h4>Records</h4>
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for dates..">
<div class="table-responsive" style="max-height:400px">
<table id="history"class="table table-hover"style="display:none;min-width:100%">
  <thead class="thead-dark">
    <tr>
      <th>Ride ID</th>
      <th>Date</th>
      <th>Time</th>
      <th>PickUp</th>
      <th>DropDown</th>
      <th>User ID</th>
      <th>Driver ID</th>
      <th>Fare</th>
    </tr>
  </thead>
  <tbody>

  </tbody>
</table>
</div>
<br>
<button id="print" onclick="printData()" type="button" class="btn btn-primary" style="background:black;width:100%;">PRINT TABLE</button>
<h1 id="notFound"class="display-4" align="center" style="display:none">No Data Found</h1>
</div>


<script>
    var table = document.getElementById("history").getElementsByTagName('tbody')[0];


    var ajax= new XMLHttpRequest();
    var method = "POST";
    var url="adminHistory.php";
    var asynchronous=true;
    ajax.open(method,url,asynchronous);
    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    ajax.send();
    ajax.onreadystatechange= function(){
      if(this.readyState == 4 && this.status == 200){
      //  alert(this.responseText);
        try{
          var data =JSON.parse(this.responseText);
          var table1 = document.getElementById("history");
          table1.style.display = "block";

        }catch(err){
         alert(err);
        }
        updateTable(data);
      }
    }
    function updateTable(data){
      var rating=0;
      for(let i=0;i<data.length;i++){
        var row = table.insertRow(0);
        var rideid = row.insertCell(0);
        var date = row.insertCell(1);
        var time = row.insertCell(2);
        var pickup = row.insertCell(3);
        var dropdown = row.insertCell(4);
        var userid = row.insertCell(5);
        var driverid = row.insertCell(6);
        var fare = row.insertCell(7);
        rideid.innerHTML = data[i].rideid;
        date.innerHTML = data[i].date;
        time.innerHTML = data[i].time;
        pickup.innerHTML = data[i].pickup;
        dropdown.innerHTML = data[i].dropdown;
        userid.innerHTML = data[i].userID;
        driverid.innerHTML = data[i].driverID;
        userid.innerHTML = data[i].userID;
        fare.innerHTML = data[i].fare;
      }
    }

    function printData() {
        var divToPrint = document.getElementById('history');
        var htmlToPrint = '' +
            '<style type="text/css">' +
            'table th, table td {' +
            'border:1px solid #000;' +
            'padding;0.5em;' +
            '}' +
            '</style>';
        htmlToPrint += divToPrint.outerHTML;
        newWin = window.open("");
        newWin.document.write(htmlToPrint);
        newWin.print();
        newWin.close();
    }
</script>

<!-- Script For The SideBar -->
<script>
  //SideBar Code Here
  var flag=1;
    function openNav() {
      if(flag==1){
      document.getElementById("mySidenav").style.width = "300px";
      document.getElementById("main").style.marginLeft = "300px";
      flag=0;
    }else if(flag==0){
      document.getElementById("mySidenav").style.width = "0";
      document.getElementById("main").style.marginLeft= "0";
      flag=1;
    }

  }

</script>
<script>
function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("history");
  tr = table.getElementsByTagName("tr");
  print=document.getElementById("print");
  notFound=document.getElementById("notFound");
  var count=1;
  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
    if(tr[i].style.display=="none"){
      count ++;
    }
  }
  if(count==tr.length){
    table.style.display="none";
    print.style.display="none";
    notFound.style.display="block";
  }else{
    table.style.display="block";
    print.style.display="block";
    notFound.style.display="none";
  }
}
</script>


</body>
</html>
