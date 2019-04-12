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
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <title>Driver Sign Up</title>
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
  <img class="bg"src="img3.jpg">
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
        <div class="jumbotron" style="width:350px ;background-color:#F2F2F2;height:500px; padding:25px">
          <button  type="button" onclick="location.href='driverSignin.php'" class="btn btn-dark" style="width:100%;height:50px;font-size: 12px;background-color:black">ALREADY HAVE AN ACCOUNT?</button>
          <form  method="post" action="form_driverSignUp.php">
            <div class="row" style="margin-top:10px">
              <div class="col">
                <input required type="text" class="form-control"placeholder="First Name" name="fname" pattern="[A-Za-z]{1,15}" title="Must Contain Letters">
              </div>
              <div class="col">
                <input required type="text" class="form-control"placeholder="Last Name" name="lname" pattern="[A-Za-z]{1,15}" title="Must Contain Letters">
              </div>
            </div>
            <input required type="email" class="form-control"placeholder="Email" name="email" style="margin-top:10px" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="Invalid Email Id">
            <input required type="tel" class="form-control"placeholder="Phone" name="phone" style="margin-top:10px" pattern="[789][0-9]{9}$" title="Invalid contact">
            <input required type="text" class="form-control"placeholder="Date Of Birth" name="date" style="margin-top:10px">
            <input required type="password" class="form-control"placeholder="Password" name="password" style="margin-top:10px" pattern="[A-Za-z0-9]{6,12}" title="Password must contain 6 to 12 characters!">
            <input required type="text" class="form-control"placeholder="Vehicle Number Plate" name="numberplate" style="margin-top:10px" pattern="^[A-Z]{2}[0-9]{2}[A-Z]{2}[0-9]{1,4}$" title="Invalid Number Plate">
			      <select required class="custom-select" style="margin-top:10px" name="location">
              <option value="" disabled selected hidden>Location</option>
              <option value="Aundh">AUNDH</option>
              <option value="Camp">CAMP</option>
              <option value="Hadapsar">HADAPSAR</option>
      			  <option value="Katraj">KATRAJ</option>
      			  <option value="Kothrud">KOTHRUD</option>
              <option value="ShivajiNagar">SHIVAJI NAGAR</option>
      			  <option value="Swargate">SWARGATE</option>
      			  <option value="VimanNagar">VIMANNAGAR</option>
            </select>
            <button type="submit" class="btn btn-info" style="width:100%;height:40px;font-size: 14px;margin-top:30px"><b>SUBMIT</b></button>
          </form>
        </div>
      </div>
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

<br>
<br>
<br>
<br>
<br>
<br>

<!-- content -->
<div class="container">
  <div class="row">


    <div class="col-4">
      <img src="png7.png" style="width:150px;height:150px ; margin-bottom:10px" >
      <h4>Make good money.</h4>
      <p><section>Got a car? Turn it into a money machine. The city</section> <section> is buzzing and LYFT makes it easy for you to cash </section><section> in on the action.Plus, you've already got everything you need to get started.</section></p>
    </div>
    <div class="col-4">
      <img src="png5.png" style="width:150px;height:150px ; margin-bottom:10px">
      <h4>Drive when you want.</h4>
      <p><section>Need something outside the 9 to 5? As an</section> <section> independent contractor with LYFT, you’ve got</section> <section> freedom and flexibility to drive whenever you have time. Set your own schedule, so you </section><section>can be there for all of life’s most important moments.</section></p>
    </div>
    <div class="col-4">
      <img src="png6.png" style="width:150px;height:150px; margin-bottom:10px">
      <h4>No office, no boss.</h4>
       <p><section>Whether you’re supporting your family or saving</section><section> for something big, LYFT gives you the freedom</section><section> to get behind the wheel when it makes sense for</section><section> you. Choose when you drive, where you go, and who you pick up.</section></p>
    </div>



 </div>
</div>

<br>
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
