
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



  <title>User Sign In</title>
  <style>
    img.bg{
      height:600px;
      width:100%;
      object-fit: cover;

    }


    div.container-fluid {
    position: relative;
    text-align: center;
    color: white;
    width: 100%;
    left:0;
    padding: 0px;

}

.footer{


  bottom: 0;

  width: 100%;
  background-color: black;
  color: white;

}

/* Top right text */
.top-right {
    position: absolute;
    top: 8px;
    right: 16px;
}
.top-left {
    position: absolute;
    top: 8px;
    left: 16px;
}
input[type=number]::-webkit-inner-spin-button,
input[type=number]::-webkit-outer-spin-button {
-webkit-appearance: none;
margin: 0;
}
  </style>
</head>
<body>



<!-- form -->
<div class="container-fluid">
  <img class="bg"src="img2.jpg">
  <div class="top-left" style="padding-right:100px;padding-top:50px">
    <div class="row">
      <div class="col-8">
        <h1 class="display-4">There's a ride for every price And any occasion</h1>
        <p><section>Whether you're headed to the airport, a </section><section>meeting across town, or home after a late </section><section>
          night at the office, LYFT works just as hard </section><section>as you do.</section></p>
      </div>
      <div class="col-4"></div>
    </div>
  </div>
  <div class="top-right" style="padding-right:100px;padding-top:50px">
    <div class="row">
      <div class="col">
        <div class="jumbotron" style="width:350px ;background-color:#F2F2F2;height:300px; padding:25px">
          <button type="button" onclick="location.href='userSignup.php'" class="btn btn-dark" style="width:100%;height:50px;font-size: 12px;background-color:black">NEW USER?</button>
          <form method="post" action="form_userSignIn.php">
            <input required type="email" class="form-control"placeholder="Email" name="email" style="margin-top:10px" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="Invalid Email Id">
             <input required type="password" class="form-control"placeholder="Password" name="password" style="margin-top:10px" pattern="[A-Za-z0-9]{6,12}" title="Password must contain 6 to 12 characters!">
            <button type="submit" id="btn"class="btn btn-info" style="width:100%;height:40px;font-size: 14px;margin-top:60px"><b>SIGN IN</b></button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>



<br>
<br>
<br>
<br>


<!-- content -->
<div class="container">
  <h1 class="display-4">Always the ride you want</h1>
  <br>
  <div class="row">


    <div class="col-4">
      <h4>Tap a button, get a ride</h4>
      <p><section>Choose your ride and set your location. You'll </section> <section>see your driver's picture and vehicle details, and </section><section>can track their arrival on the map.</section></p>
    </div>
    <div class="col-4">
      <h4>Always on, always available</h4>
      <p><section>No phone calls to make, no pick-ups to schedule. </section> <section>With 24/7 availability, request a ride any time of </section> <section>day, any day of the year.</section></p>
    </div>
    <div class="col-4">
      <h4>You rate, we listen</h4>
       <p><section>Rate your driver and provide anonymous </section><section>feedback about your trip. Your input helps us </section><section>make every ride a 5-star experience.</section></p>
    </div>



 </div>
</div>

<br>
<br>
<br>
<br>
<br>
<br>




</body>
</html>
