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
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
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
    select {
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
        <a class="nav-link" href="#"><b>STATISTICS</b></a>
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
<div id="main" style="padding:40px">
<br>
<br>
<br>
<h4>Monthly Analysis</h4>
<div class="row">
  <div class="col-10">
    <select id="select">
      <option value="" disabled selected hidden>Enter Month..</option>
      <option value="JAN">JANUARY</option>
      <option value="FEB">FEBRUARY</option>
      <option value="MAR">MARCH</option>
      <option value="APR">APRIL</option>
      <option value="MAY">MAY</option>
      <option value="JUNE">JUNE</option>
      <option value="JULY">JULY</option>
      <option value="AUG">AUGUST</option>
      <option value="SEPT">SEPTEMBER</option>
      <option value="OCT">OCTOBER</option>
      <option value="NOV">NOVEMBER</option>
      <option value="DEC">DECEMBER</option>
    </select>
  </div>
  <div class="col-2">
    <button id="show" type="button" class="btn btn-primary" style="background:black;width:100%;font-size: 20px;height:50px">Show</button>
  </div>
</div>
<br>
<br>
<div id="curve_chart" style="width: 100%; height: 400px"></div>

</div>

<script>
  var show=document.getElementById("show");
  var select=document.getElementById("select");
  var fare=[];

  show.addEventListener("click",function(){
    for(let j=0;j<=31;j++){
      fare[j]=0;
    }
    var ajax= new XMLHttpRequest();
    var method = "POST";
    var url="adminHistory.php";
    var asynchronous=true;
    ajax.open(method,url,asynchronous);
    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    ajax.send();
    ajax.onreadystatechange= function(){
      if(this.readyState == 4 && this.status == 200){
        try{
          var data =JSON.parse(this.responseText);
        }catch(err){
         alert(err);
        }
        for(let i=0;i<data.length;i++){
           var split=data[i].date.split(/(\s+)/);
          //split[0]=monthName split[2]=dateNumber;
          if(split[0]==select.value){
            for(let j=1;j<=31;j++){
              if(parseInt(split[2])==j){

                if(fare[j]!=null){
                  fare[j]=fare[j]+parseInt(data[i].fare);
                }
              }

            }
          }
        }
       console.log(fare);
       google.charts.load('current', {'packages':['corechart']});
       google.charts.setOnLoadCallback(drawChart);
      }
    }


    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['Date', 'Sales'],
        ['1',fare[1]],
        ['2',fare[2]],
        ['3',fare[3]],
        ['4',fare[4]],
        ['5',fare[5]],
        ['6',fare[6]],
        ['7',fare[7]],
        ['8',fare[8]],
        ['9',fare[9]],
        ['10',fare[10]],
        ['11',fare[11]],
        ['12',fare[12]],
        ['13',fare[13]],
        ['14',fare[14]],
        ['15',fare[15]],
        ['16',fare[16]],
        ['17',fare[17]],
        ['18',fare[18]],
        ['19',fare[19]],
        ['20',fare[20]],
        ['21',fare[21]],
        ['22',fare[22]],
        ['23',fare[23]],
        ['24',fare[24]],
        ['25',fare[25]],
        ['26',fare[26]],
        ['27',fare[27]],
        ['28',fare[28]],
        ['29',fare[29]],
        ['30',fare[30]],
        ['31',fare[31]]
      ]);

      var options = {
        title: 'Company Performance Month - '+select.value,
        curveType: 'function',
        vAxis: { title:"Rupees(₹)" },
        hAxis: { title:"Date" },
        legend: { position: 'bottom' }
      };

      var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

      chart.draw(data, options);
    }
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
