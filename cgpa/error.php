
<?php 
  session_start();
  
 ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Error</title>

  
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
                    <li class="nav-item" ><a href="home.php" class="nav-link smooth-scroll">Home</a>
                    </li>
                    <li class="nav-item" ><a href="#services" class="nav-link smooth-scroll">Services</a>
                    </li>
                    <li class="nav-item"><a href="#our-works" class="nav-link smooth-scroll">Works</a>
                    </li>
                    <li class="nav-item"><a href="#our-team" class="nav-link smooth-scroll">Team</a>
                    </li>
                    <li class="nav-item"><a href="#contact" class="nav-link smooth-scroll">Contact</a>
                    </li>
                    <li class="nav-item"><a href="blog.html" class="nav-link smooth-scroll">Blog</a>
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


            <div class="container">
             <center><div class="card justify-center" style="background-color: transparent;color: #fff; width: 600px;height: 400px;margin-bottom:100px">
                <div class="card-header">
                  <button type="button"class="close" ><a href="home.php"  style="text-decoration:none;"> <span class="glyphicon glyphicon-remove-circle">&times;</span></a> 
              </button>
                  <h2><span class="glyphicon glyphicon-remove-circle">&nbsp;Error</span></h2></div>
                  <div class="card-body">
                    <p>
                      <?php 
                      if (isset($_SESSION['message']) and !empty($_SESSION['message'])){
                        echo $_SESSION['message'];
                      }
                      else{
                        header("location:portal.php");
                      }
                       ?>
                      
                    </p>
                  </div>
              </div></center>
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
    
  <script src="script.js"></script>
  </body>

</html>