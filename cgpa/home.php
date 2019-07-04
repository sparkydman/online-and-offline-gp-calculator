<?php
require('gpdb.php');


?>

<?php 
  session_start();
  if ($_SERVER['REQUEST_METHOD']=='POST') {
    if(isset($_POST['loginbtn'])){
      require'login.php';
    }
    elseif (isset($_POST['save_reg'])) {
     require 'register.php';
    }
  }
 ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>School Portal</title>

  
    <link rel="stylesheet" href="styleportal1.css">

   <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/magnific-popup.css">
        <link rel="stylesheet" href="assets/css/font-awesome.css">
        <link rel="stylesheet" href="style1.css">
        <link rel="stylesheet" href="assets/css/responsive.css">
        <link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css"  media="screen">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


</head>

<body style="background: url('image/edu4.jpg') no-repeat; background-size: cover;">

    <div class="wrapper">
       

        <!-- Page Content Holder -->
        <div id="content">

           <header id="header">
            <nav class="navbar st-navbar fixed-top navbar-expand-md" >
              <div class="container">
                <h2 class="logo" id="ed1"><a href="#" >MY SCHOOL PORTAL</a></h2>
                <button type="button" class="navbar-toggler  navbar-toggler-right" data-toggle="collapse"
                        data-target="#st-navbar-collapse"><span class="sr-only">Toggle navigation</span>
                  &#x2630;
                </button>

                <div class="collapse navbar-collapse justify-content-end"
                     id="st-navbar-collapse">
                  <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item"><a href="#header" class="nav-link smooth-scroll">Home</a>
                    </li>
                    <li class="nav-item"><a href="#services" class="nav-link smooth-scroll">Faculty</a>
                    </li>
                    <li class="nav-item"><a href="#our-works" class="nav-link smooth-scroll">Academia</a>
                    </li>
                    <li class="nav-item"><a href="#our-team" class="nav-link smooth-scroll">Calendar</a>
                    </li>
                    <li class="nav-item"><a href="#contact" class="nav-link smooth-scroll">Contact</a>
                    </li>
                    <li class="nav-item"><a href="blog.html" class="nav-link smooth-scroll">About Us</a>
                    </li>
                  </ul>
                </div>
                <!-- /.navbar-collapse -->
              </div>
                          <!-- /.container -->
                        </nav>
                      </header>
            <div class="jumbotron" style="background: url('image/edu1.png') no-repeat; height: 300px;background-size: cover">
              
            </div>
           
       
                <div class="container-fluid" id="available" >
               
              
              <div class="container" style="width: 50%;margin-bottom: 10%;  ">
                 <div class="card-body" style="color: #ffff;  margin-top: 0px; ">
                    <h5 style="text-align: center; font-style: bold; font-family: 'aria-label', sans-serif;
                font-weight: 300; text-transform: uppercase; ">login</h5>
            </div>
                <div class="card cardesign" style="border-color: #a4a5a7; background: rgba(0,0,0,0.2);">
                  <form action="home.php" method="post" class="form-group" enctype="multipart/form-data" autocomplete="off">
                    
                    <div class="col-md-4-fluid" style="margin: 20px 20px;">
                      <label class="control-label" style="color: #f1f1f1;">Username:</label>
                      <input type="text" name="username" placeholder="enter your username ex: ESUT/2013/134432" class="form-control" id="used" " maxlength ="16" required="required">
                       <span id="hiden"></span>
                  </div>
                  <div class="col-md-4-fluid" style="margin: 20px 20px;">
                      <label class="control-label" style="color: #f1f1f1;">Password:</label>
                      <input type="password" name="password" placeholder="enter your password" class="form-control" required="required">
                       
                  </div>
                
                 
                 <div  align="center">
                    <input type="submit" name="loginbtn" class="btn btn-md btn-primary" value="Login" >
                  </div>
                     
              </form>
                   <a href="#" class="button"  id="reg_acc">Register if you don't have Account...</a>
                  
                  </div>
                 
                  </div>
                  <div>
                    
                  </div>
                </div>
            


             <div class="container-fluid" id="trip_comp"  style="display: none; margin-bottom: 10%;">
                <div class="card-body" style="color: #ffff;  margin-top: 0px; ">
                    <h5 style="text-align: center; font-style: bold; font-family: 'aria-label', sans-serif;
                font-weight: 300; text-transform: uppercase; ">register</h5>
                </div>
              
                
                   <form class="form-group" action="home.php" method="post" autocomplete="off">  
                   <!--  <div class="card" style="border-color: #a4a5a7; padding: 10px 5px; color: #ffff;"> <hr> -->
                     <div class="row">
                     <div class="col-md-6">
                       <label class="control-label">Surname:</label>
                       <input required type="text" name="surname" class="form-control" placeholder="enter Surname " >
                     </div>
                     <div class="col-md-6">
                       <label class="control-label">Middlename:</label>
                       <input required type="text" name="middlename" class="form-control" placeholder="enter middlename">
                     </div>
                     <div class="col-md-6">
                       <label class="control-label">Lastname:</label>
                       <input required type="text" name="lastname" class="form-control" placeholder="enter lastname">
                     </div>
                      <div class="col-md-2">
                       <label class="control-label">Sex:</label>
                       <select required class="form-control" name="sex">
                         <option value=""></option>
                          <option value="male">Male</option>
                           <option value="female">Female</option>
                       </select>
                     </div>
                     <div class="col-md-4">
                       <label  class="control-label">Reg Number:</label>
                       <input type="text" name="regno" class="form-control" placeholder="enter registration Number ex: ESUT/2013/134432" maxlength="16" required >
                     </div>
                    
                     <div class="col-md-4">
                     
                       <label class="control-label">Faculty:</label>
                       <select required class="form-control" name="faculty" onchange="getdeprt(value)" id="fac">
                      
                       <?php
                        include('gpdb.php');
                           $result=mysqli_query($conn,"SELECT*FROM faculty");
              while($row=$result->fetch_array()){?>
               <option value="<?php echo $row['FACULTY'];?>"><?php echo $row['FACULTY'];?></option>
              
            <?php } ?>
                       </select>
                     </div>
                     <div class="col-md-6">
                       <label class="control-label">Department:</label>
                       <select required class="form-control" name="department" id="department1">
                         <option value=""></option>
                       </select>
                     </div>
                     <div class="col-md-2">
                       <label class="control-label">Level:</label>
                       <select class="form-control" name="level" required>
                         <option value="">Select Level</option>
                         <option value="100">100</option>
                         <option value="200">200</option>
                         <option value="300">300</option>
                         <option value="400">400</option>
                         <option value="500">500</option>

                       </select>
                     </div>
                       
                      <div class="col-md-6">
                       <label class="control-label">Email:</label>
                       <input required type="email" name="email" class="form-control" placeholder="enter email">
                     </div>
                      </div>
                      <div class="col-md-4">
                       <label class="control-label">Password:</label>
                       <input required type="password" name="password" class="form-control" placeholder="enter password">
                     </div>
                      <div class="col-md-4">
                       <label class="control-label">Confirm Password:</label>
                       <input required type="password" name="con_password" class="form-control" placeholder="enter password">
                     </div>

                     <div class="col-md-4">
                       <center><input type="submit" name="save_reg" class="btn btn-md btn-light" value ="Register" style="margin-top: 20px;"></center>
                     </div>
                        
                     <!--  </div> -->
                     <div style="margin-top: 10px;">
                     <p>You Already Have Account? <a href="home.php">Login</a></p>
                     </div>
                   </form>
              
             
            </div>


            </div>
          </div>
       

            
<!-- FOOTER -->
<footer id="footer">
  <div class="container">
    <div class="row">
      <!-- SOCIAL ICONS -->
      <div class="col-md-6 order-sm-2 footer-social-icons"><span>Follow us:</span>
        <a href=""><i class="fa fa-facebook"></i></a>
        <a
          href=""><i class="fa fa-twitter"></i>
        </a> <a href=""><i class="fa fa-google-plus"></i></a>
        <a href=""><i class="fa fa-pinterest-p"></i></a>
      </div>
      <!-- /SOCIAL ICONS -->
      <div class="col-md-6 order-sm-1 copyright">
        <p>&#xA9; 2018 <a href="#">My School Portal</a>. All Rights Reserved.</p>
      </div>
    </div>
  </div>
</footer>
<!-- /FOOTER -->
<!-- Scroll-up -->
<div class="scroll-up">
  <ul>
    <li><a class="smooth-scroll" href="#header"><i class="fa fa-angle-up"></i></a>
    </li>
  </ul>
</div>

  

  <script type="text/javascript">
    
    function checkusername(value) {
      value = document.getElementById('used').value;
     // alert(value);
      document.getElementById("hiden").innerHTML = value;
     $.ajax({
      url:"depart.php",
      type:"POST",
      data:{dept1:value},
      success: function(data){
   $("#hiden").html(data);
 
 }
     });
     return false;
    };

  </script>

           
    <script type="text/javascript">
    
    function getdeprt(value) {
      value = $("#fac")[0].selectedIndex;
      
     $.ajax({
      url:"depart.php",
      type:"POST",
      data:{id:value},
      success: function(data){
  $("#department1").html(data);
 
 }
     });
     return false;
    };

  </script>
  

  <script language="javascript" type="text/javascript">
function randomString() {
  //var chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz";
  var chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZ";
  var string_length = 16;
  var randomstring = '';
  //for(var e=0; e<50; e++){
  for (var i=0; i<string_length; i++) {
    var rnum = Math.floor(Math.random() * chars.length);
    randomstring += chars.substring(rnum,rnum+1);
  }
  var coupon = randomstring.substring(0,4)+"-"+randomstring.substring(4,8)+"-"+randomstring.substring(8,12)+"-"+randomstring.substring(12,16);
  document.randform.randomfield.value = coupon;
}
//}
</script>
<script type="text/javascript">
 
                  $("#reg_acc").click(function () {
                    $('#available').hide();
                    $('#trip_comp').show();
                  })
                
</script>
  <script src="assets/js/jquery.min.js"></script><!-- jQuery -->
        <script src="assets/js/popper.min.js"></script><!-- popper -->
        <script src="assets/js/bootstrap.min.js"></script><!-- Bootstrap -->
       
        <script src="assets/js/jquery.parallax.js"></script><!-- Parallax -->
        <script src="assets/js/jquery.easing.min.js"></script><!-- Easing animation -->
        <script src="assets/js/jquery.fitvids.js"></script><!-- fitvids -->
        <script src="assets/js/jquery.counterup.min.js"></script><!-- CounterUp -->
        <script src="assets/js/waypoints.min.js"></script><!-- waypoints -->
        <script src="assets/js/jquery.isotope.min.js"></script><!-- isotope -->
        <script src="assets/js/jquery.magnific-popup.min.js"></script><!-- magnific-popup -->
    
  <!-- <script src="script.js"></script> -->
  </body>

</html>