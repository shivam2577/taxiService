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
    <script type = "text/javascript" src = "https://www.gstatic.com/charts/loader.js">
    </script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
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
    <a class="navbar-brand" href="driverSignedIn.php"><b>LYFT</b> DASHBOARD</a>
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
$d_name=$_SESSION["d_name"];
$d_email=$_SESSION["d_email"];
$d_phone=$_SESSION["d_phone"];
$d_bdate=$_SESSION["d_date"];
$d_nplate=$_SESSION["d_noPlate"];
$d_id=$_SESSION["d_id"];
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
  <br>
  <br>
  <div id="driver" class="card" style="width:25%;margin:0 auto;">
  <div class="card-body">
    <p id="id"class="card-text" align="right"><?php echo $d_id ?></p>
    <form method="post" action="editDriver.php">
      <p class="card-text"><b>Name :</b></p>
      <input required type="text" class="form-control" value="<?php echo $d_name ?>" name="name"  pattern="[A-Z\sa-z]{1,25}" title="Must Contain Letters">
      <p class="card-text"style="margin-top:10px"><b>Contact :</b></p>
      <input required type="tel" class="form-control"value="<?php echo $d_phone ?>" name="phone" pattern="[789][0-9]{9}$" title="Invalid contact">
      <p class="card-text"style="margin-top:10px"><b>Date Of Birth :</b></p>
      <input required type="text" class="form-control"value="<?php echo $d_bdate ?>" name="date" style="margin-top:10px">
      <p class="card-text"style="margin-top:10px"><b>Vehicle Number Plate :</b></p>
      <input required type="text" class="form-control"value="<?php echo $d_nplate ?>" name="numberplate" pattern="^[A-Z]{2}[0-9]{2}[A-Z]{2}[0-9]{1,4}$" title="Invalid Number Plate">
      <button type="submit" id="btn"class="btn btn-info" style="width:100%;height:40px;font-size: 14px;margin-top:80px"><b>EDIT</b></button>
    </form>
  </div>
  </div>

</div>

<script>
    $(document).ready(function(){
      var date_input=$('input[name="date"]'); //our date input has the name "date"
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      var options={
        format: 'yyyy-mm-dd',
        container: container,
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);
    })

  //   $('#btn').click(function(){
  //   var _myDate = $('#dateOfBirth').val();
  //   alert(_myDate);
  // });
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
