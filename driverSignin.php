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



  <title>Driver Sign In</title>
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
  <img class="bg"src="img1.jpg">
  <div class="top-left" style="padding-right:100px;padding-top:50px">
    <div class="row">
      <div class="col-8">
        <h1 class="display-4">LYFT needs partners like you.</h1>
        <p><section>Drive with LYFT and earn great money as an independent</section><section>contractor. Get paid weekly just for helping our community</section><section>
          of riders get rides around town. Be your own boss and get</section><section> paid in fares for driving on your own schedule.</section></p>
      </div>
      <div class="col-4"></div>
    </div>
  </div>
  <div class="top-right" style="padding-right:100px;padding-top:50px">
    <div class="row">
      <div class="col">
        <div class="jumbotron" style="width:350px ;background-color:#F2F2F2;height:300px; padding:25px">
          <button type="button" onclick="location.href='driverSignup.php'" class="btn btn-dark" style="width:100%;height:50px;font-size: 12px;background-color:black">NEW DRIVER?</button>
          <form method="post" action="form_driverSignIn.php">
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
  <div class="row">


    <div class="col-4">
      <h4>Make good money.</h4>
      <p><section>Got a car? Turn it into a money machine. The city</section> <section> is buzzing and LYFT makes it easy for you to cash </section><section> in on the action.Plus, you've already got everything you need to get started.</section></p>
    </div>
    <div class="col-4">
      <h4>Drive when you want.</h4>
      <p><section>Need something outside the 9 to 5? As an</section> <section> independent contractor with LYFT, you've got</section> <section> freedom and flexibility to drive whenever you have time. Set your own schedule, so you </section><section>can be there for all of life's most important moments.</section></p>
    </div>
    <div class="col-4">
      <h4>No office, no boss.</h4>
       <p><section>Whether you're supporting your family or saving</section><section> for something big, LYFT gives you the freedom</section><section> to get behind the wheel when it makes sense for</section><section> you. Choose when you drive, where you go, and who you pick up.</section></p>
    </div>



 </div>
</div>





</body>
</html>
