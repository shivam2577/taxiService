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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Home</title>
  <style>

    /*nav bar*/
    li.nav-item{
      margin-right: 25px;
    }
    a.navbar-brand{
      margin-left: 50px;
      margin-right: 25px;
    }
    /*carousel slides*/
    img.carousel-Images{
      height:680px;
      width:100%;
      object-fit: fill;
    }
    div.carousel-caption {
    left: 0;
    right: auto;
  }

        #carousel-h2{
            text-align: left;
        }
        #carousel-p{
            text-align: left;
        }


        .footer{


          bottom: 0;

          width: 100%;
          background-color: black;
          color: white;

        }

        .fa {
            padding: 8px;
            font-size: 25px;
            width: 40px;
            text-align: center;
            text-decoration: none;
            border-radius: 50%;
            background: :black;
        }
        /* Add a hover effect if you want */
        .fa:hover {
            opacity: 0.7;
        }

        /* Set a specific color for each brand */

        /* Facebook */
        .fa-facebook {
            color: white;
        }

        /* Twitter */
        .fa-twitter {
            color: white;
        }
        .fa-google {
            color: white;
        }
        .fa-instagram {
          color: white;
        }

        .fa-pinterest {
          color: white;
        }
</style>
</head>
<body>

  <nav class="navbar navbar-expand-sm bg-light navbar-light fixed-top">
     <a class="navbar-brand" href="home.php"><b>LYFT</b></a>
      <ul class="navbar-nav mr-auto">
          <li #id="navbar" class="nav-item">
            <a class="nav-link" href="#">Ride</a>
          </li>
          <li  class="nav-item">
            <a class="nav-link" href="#">Drive</a>
          </li>

      </ul>
      <ul class="navbar-nav ml-auto">

        <li  class="nav-item active">
          <a class="nav-link" href="#footer">ABOUT</a>
        </li>
        <li  class="nav-item active">
          <a class="nav-link" href="signin.php">SIGN IN</a>
        </li>
      </ul>
      <ul class="nav nav-pills ">
        <li  class="nav-item ">
          <a class="nav-link active bg-dark text-white" href="driverSignup.php" style="background-color:black">BECOME A DRIVER</a>
        </li>
      </ul>

  </nav>

<br>
<br>
  <div id="demo" class="carousel slide" data-ride="carousel">

    <!-- Indicators -->
    <ul class="carousel-indicators">
      <li data-target="#demo" data-slide-to="0" class="active"></li>
      <li data-target="#demo" data-slide-to="1"></li>
      <li data-target="#demo" data-slide-to="2"></li>
    </ul>

    <!-- The slideshow -->
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="carousel-Images" src="img1.jpg" alt="img1">
        <div class="carousel-caption" style="margin-left:15px">
        <h2 id="carousel-h2" class="display-2">Get there</h2>
        <p id="carousel-p"class="display-4">Your day belongs to you</p>
        </div>
      </div>
      <div class="carousel-item">
        <img class="carousel-Images" src="img6.jpg" alt="img2">
        <div class="carousel-caption"style="margin-left:15px">
        <h2 id="carousel-h2" class="display-2">Drive when you want</h2>
        <p id="carousel-p" class="display-4">Make what you need</p>
        </div>
      </div>
      <div class="carousel-item">
        <img class="carousel-Images" src="img2.jpg" alt="img3">
        <div class="carousel-caption"style="margin-left:15px">
        <h2 id="carousel-h2" class="display-2">LYFT for Business</h2>
        <p id="carousel-p" class="display-4">Built for work</p>
        </div>
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="carousel-control-prev" href="#demo" data-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#demo" data-slide="next">
      <span class="carousel-control-next-icon"></span>
    </a>

  </div>

<br>
<br>
<br>
<br>

<br>
<br>
<br>

<!-- middle content  -->
<div class="container">
  <div class="row">


    <div class="col-4">
      <img src="png1.png" >
      <h4>Easiest way around</h4>
      <p><section>One tap and a car comes directly to you.</section> <section>Hop in—your driver knows exactly where</section><section> to go. And when you get there, just step</section><section> out. Payment is completely seamless.</section></p>
    </div>
    <div class="col-4">
      <img src="png2.png">
      <h4>Anywhere, anytime</h4>
      <p><section>Daily commute. Errand across town. Early </section> <section>morning flight. Late night drinks.</section><section> Wherever you’re headed, count on LYFT</section><section> for a ride—no reservations required.</section></p>
    </div>
    <div class="col-4">
      <img src="png3.png">
      <h4>Low-cost to luxury</h4>
       <p><section>Economy cars at everyday prices are </section> <section>always available. For special occasions, no </section><section> occasion at all, or when you just a need a </section><section> bit more room, call a black car or SUV.</section></p>
    </div>



 </div>
</div>


<br>
<br>
<br>
<br>
<br>
<!-- jumbotron -->
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <div class="row">
      <div class="col">
        <h1 class="display-4">Your first ride is minutes away</h1>
        <br>
        <button onclick="location.href='userSignup.php'"type="button" class="btn btn-dark" style="width: 250px; height:50px;font-size: 20px;background-color:black">BOOK NOW</button>
      </div>
      <div class="col">

      </div>
    </div>
  </div>
</div>
<br>
<br>
<br>
<br>
<br>



<img src="png8.png" width="100%"/>

<!-- footer -->
<div id="footer" class="footer">
  <div class="container">

      <br>
      <br>

     <h3 style="display:inline"><b>LYFT</b></h3>
     <a style="display:inline;margin-left:800px;color:white;font-size:18px" href="home.php">HOME</a>&nbsp|&nbsp<a style="display:inline;font-size:18px;color:white" href="signin.php">SIGN IN</a>
     <p style="font-size:20px">GET THERE</p>
     <br>
     <hr style="background:white">
     <br>
     <div class="row">
       <div class="col">
         <h5>Contact Info</h5>
         <p>Phone : 8411863858</p>
         <p>Email&nbsp : lyft@gmail.com</p>
         <p>Addr &nbsp : MITCOE Kothrud</p>
       </div>
       <div align="right"class="col">
         <h5 style="display:inline-block">Follow Us On<h5>
         <a href="#" class="fa fa-facebook"></a>
         <a href="#" class="fa fa-twitter"></a>
         <a href="#" class="fa fa-google"></a>
         <a href="#" class="fa fa-instagram"></a>
         <a href="#" class="fa fa-pinterest"></a>
       </div>
     </div>

 </div>
 <br>
 <br>
</div>



</body>
</html>
