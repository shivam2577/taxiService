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
  <title>Sign In</title>

  <style>

    /*nav bar*/
    li.nav-item{
      margin-right: 25px;
    }
    a.navbar-brand{
      margin-left: 50px;
      margin-right: 25px;
    }

    button{
      width: 250px;
      height:50px;
      font-size: 20px
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
  <!-- navbar -->
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
          <a class="nav-link active bg-dark text-white" href="driverSignup.php">BECOME A DRIVER</a>
        </li>
      </ul>

    </form>
  </nav>


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
          <h1 class="display-4"><b>Sign In</b></h1>
        </div>
        <div class="col">

        </div>
      </div>
      <br><br>
      <div class="row">
        <div class="col">
          <h3><small>Driver</small></h3>
          <p>Find everything you need to track your success on the road.</p>
          <button onclick="location.href='driverSignin.php'" type="button" class="btn btn-dark">DRIVER SIGN IN</button>
        </div>
        <div class="col">
          <h3><small>Rider</small></h3>
          <p>Manage your payment options, review trip history, and more.</p>
          <button onclick="location.href='userSignin.php'"type="button" class="btn btn-dark">RIDER SIGN IN</button>
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
