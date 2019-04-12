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
  $u_fare=$_SESSION["u_fare"];


  ?>




<!-- navbar -->
  <nav class="navbar navbar-expand-sm bg-light navbar-light fixed-top" style=" z-index: 1;">
      <span id=menu-button class="sideButton bg-light" style="font-size:20px;cursor:pointer" onclick="openNav()"><b>&#9776;</b></span>
     <a class="navbar-brand" href="#"><b>LYFT</b></a>
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
        <p name="numberOfRides" style="font-size:18px"><b>0</b></p>
      <hr>
    </div>
  </div>





<!-- main -->
<div id="main">
<br>
<br>
<br>
<center>
<div class="row">
  <div class="col-3"></div>
  <div class="col">
    <h1 id="greeting" class="display-4" style="display:none">Thankyou For Riding With LYFT</h1>
    <br>
    <br>
    <div class="row">
        <div class="col">
          <button onclick="location.href='userSignedIn.php'" id="book"type="button" class="btn  btn-block" style="background-color:black;display:none;color:white">BOOK ANOTHER?</button>
        </div>
        <div class="col">
          <button onclick="location.href='logout.php'" id="logout"type="button" class="btn  btn-block"style="background-color:black;display:none;color:white">SIGN OUT</button>
        </div>
    </div>
  </div>
  <div class="col-3"></div>
</div>
</center>
<div id="bill" class="container-fluid" style="margin:-30px">
  <div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
      <div class="card">
        <div class="row">
          <div class="col-sm-4" style="background-color:#1A84F1">
            <div class="card-body" style="color:white">
              <h5 class="card-title">Your Receipt</h5>
              <br>
              <hr>
              <p class="card-text">Amount :</p>
              <p class="card-text"><b><?php echo $u_fare ?> INR</b></p>
              <hr>
              <p class="card-text">Date :</p>
              <p id="date" class="card-text" style="font-weight:bold"></p>
            </div>
          </div>
          <div class="col-sm-8">
            <div class="card-body" style="color:black">
                <h5 class="card-title" style=" display:inline"><b>LYFT</b></h5>
                <p id="dateTime" class="card-text" style="float: right;color:grey;"></p>
                <br>
                <br>
                <hr style="margin-top:28px">
                <p class="card-text">Rate The Driver :</p>
                <x-star-rating id="rating"value="3"></x-star-rating>
                <hr style="margin-top:-1px">
                <button id="pay"type="button" class="btn btn-block" style="margin-top:50px ;background-color:#1A84F1;color:white">PAY</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-3"></div>
  </div>
</div>
</div>


<!-- Script To Get Date And Time -->
<script>
  const monthNames = ["JAN", "FEB", "MAR", "APR", "MAY", "JUNE",
  "JULY", "AUG", "SEPT", "OCT", "NOV", "DEC"
  ];
  var today = new Date();
  var date = monthNames[today.getMonth()]+' '+today.getDate();
  var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
  var dateTime= monthNames[today.getMonth()]+' '+today.getDate()+','+today.getFullYear()+' '+today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
  document.getElementById("date").innerHTML=date;
  document.getElementById("dateTime").innerHTML=dateTime;
  var ajax= new XMLHttpRequest();
  var method = "POST";
  var url="saveDateTime.php";
  var asynchronous=true;
  ajax.open(method,url,asynchronous);
  ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  ajax.send("date="+date+"&time="+time);
</script>




<script>
  var pay = document.getElementById("pay");
  var greeting = document.getElementById('greeting');
  var bill = document.getElementById('bill');
  var book = document.getElementById('book');
  var logout = document.getElementById('logout');

  pay.addEventListener("click", function(){
  greeting.style.display = "block";
  book.style.display = "block";
  logout.style.display = "block";
  bill.style.display = "none";



  var ajax= new XMLHttpRequest();
  var method = "POST";
  var url="userPay.php";
  var asynchronous=true;
  ajax.open(method,url,asynchronous);
  ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  ajax.send("rating="+rating.value);


  setTimeout(function() {
    deAllocateDriver();
  }, 1000);

  });


function deAllocateDriver(){
  var ajax= new XMLHttpRequest();
  var method = "POST";
  var url="driverDeAllocate.php";
  var asynchronous=false;
  ajax.open(method,url,asynchronous);
  ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  ajax.send();

  ajax.onreadystatechange= function(){
    if(this.readyState == 4 && this.status == 200){
      alert(this.responseText);
    }
  }
}
</script>




<!-- Script For The Rating -->
<script>
  class StarRating extends HTMLElement{
    get value(){
      return this.getAttribute('value');
    }
    set value(val){
      this.setAttribute('value',val);
      this.highlight(this.value-1);
    }

    highlight(index){
      this.stars.forEach((star,i)=>{
        star.classList.toggle('full',i<=index);
      });
    }

    constructor(){
      super();
      this.stars=[];
      for(let i=0;i<5;i++){
        let s = document.createElement('div');
        s.className='star';
        this.appendChild(s);
        this.stars.push(s);
      }
      this.value=this.value;
      this.addEventListener('mousemove',e =>{
        let box = this.getBoundingClientRect(),
        starIndex = Math.floor((e.pageX-box.left)/box.width*this.stars.length);
        this.highlight(starIndex);
      });

      this.addEventListener('mouseout',()=>{
        this.value=this.value;
      });
      this.addEventListener('click',e =>{
        let box = this.getBoundingClientRect(),
        starIndex = Math.floor((e.pageX-box.left)/box.width*this.stars.length);
        this.value=starIndex+1;
        let rateEvent = new Event('rate');
        this.dispatchEvent(rateEvent);
      });

    }
  }

  customElements.define('x-star-rating',StarRating);
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
