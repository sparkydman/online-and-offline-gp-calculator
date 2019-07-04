 <?php require('gpdb.php');require('depart.php');
// if(empty($_SESSION['login_user'])){
//   header("location:home.php");

// }
// $user =$_SESSION['login_user'];
//   $qle = "SELECT * from student ";
//   $result = mysqli_query($conn,$qle);
//   $row= mysqli_fetch_assoc($result);
//   $_SESSION['user_regnumber'] = $row['username'];
//   $_SESSION['user_surname'] = $row['surname'];
//   $_SESSION['user_middlename'] = $row['middlename'];
//   $_SESSION['user_lastname'] = $row['lastname'];
//   $_SESSION['user_faculty'] = $row['faculty'];
//   $_SESSION['user_department'] = $row['department'];
//   $_SESSION['user_level'] = $row['level'];
//   $_SESSION['user_gender'] = $row['sex'];
  
//   $faculty =  $_SESSION['user_faculty'];
//   $level =  $_SESSION['user_level'];
//   $department =  $_SESSION['user_department'];


?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Admin</title>

    <!-- Bootstrap CSS CDN -->

   <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/magnific-popup.css">
        <link rel="stylesheet" href="assets/css/font-awesome.css">
        <link rel="stylesheet" href="style1.css">
        <link rel="stylesheet" href="assets/css/responsive.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" >
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="style5.css">
    <link rel="stylesheet" href="styleportal1.css">
    <!-- Font Awesome JS -->
    <script src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"></script>
    <script  src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" ></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    

</head >

<body style="background: url('image/edu4.jpg') no-repeat; background-size: cover;">

    <div class="wrapper">
        <!-- Sidebar Holder -->
        <nav id="sidebar">
            <div class="sidebar-header">
            <h3><a href="#">SCHOOL PORTAL</a></h3>
            </div>

            <ul class="list-unstyled components">
                <p><a href="admin.php">Admin</a> </p>
                
              <li>
                    <a href="#" class="button" id="course_record">
                     <i class="fas fa-registered"></i>
                Courses Record</a>
                </li>
              <!-- 
                <li>
                    <a href="#" class="button" id="print_transcript">
                     <i class="fas fa-book"></i>
                Transcript</a>
                </li> -->
               
               

                <li>
                    <a href="logout.php" class="button" id="logout">
                     &#xf08b;
                 Logout</a>
                </li>

            </ul>

           
        </nav>

        <!-- Page Content Holder -->
        <div id="content" style="background: url('image/edu4.jpg') no-repeat; background-size: cover;">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>


                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
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
                </div>
            </nav>

             
          
            
          
                <div class="container-fluid" id="emptydiv1" >
             <center><div class="card-fluid" >
              <img src="image/edu6.jpg" style="image-resolution: 720px;">
              </div></center>
            </div>



                <div class="container-fluid" id="course_form"  style="display: none;">
                
              <div class="container" style="width: 70%;">
                <div class="card-body" style="background-color: #6d7fcc;color: #ffff;  margin-top: 0px; ">
                    <h5 style="text-align: center; font-style: bold; font-family: 'aria-label', sans-serif;
                font-weight: 300; text-transform: uppercase; ">Result grading</h5>
            </div>
                <div class="card" style="border-color: #a4a5a7;background: rgba(0,0,0,0.2);">
                  
                  <form action="#" method="post" class="form-horizontal" ">
                    
              <!--   <div class="row"> -->
                <table class="table table-bordered table-responsive">
  
                      <tr>
                        <td><label class="control-label" >Faculty:</label></td>
                      <td class="col-md-4"><select required  class="form-control" name="faculty1" onchange="getdeprt(value)" id="fac1">
                       
                         <?php
                     
                           $result=mysqli_query($conn,"SELECT*FROM faculty");
              while($row=$result->fetch_array()){?>
               <option value="<?php echo $row['ID'];?>"><?php echo $row['FACULTY'];?></option>
              
            <?php } 

            ?>
                      </select></td>
                      </tr>
                      <tr>
                        <td><label class="control-label">Department:</label></td>
                      <td class="col-md-4"><select class="form-control " name="deptmnt" required id="department2">
                     
                      </select></td>
                      </tr>
                      <tr>
                        <td><label class="control-label">Level:</label></td>
                      <td class="col-md-4"><select class="form-control " name="lvl" required id="level">
                        <option value="">Select Level</option>
                         <option value="100">100</option>
                         <option value="200">200</option>
                         <option value="300">300</option>
                         <option value="400">400</option>
                         <option value="500">500</option>

                      </select></td>
                    </tr>
                     <tr>
                      <td><label class="control-label">Semester:</label></td>
                      <td><select class="form-control " name="semest" required id="semester">
                        <option value="">select semester</option>
                        <option value="1">1</option>
                        <option value="2">2</option>

                      </select></td>
                      </tr>
                      <tr>
                        <td><label class="control-label">Course</label></td>
                        <td><select class="form-control" id="courseBox">
                          
                        </select></td>
                      </tr>
                   </table>
                   <tr>  
                    <td><div class="col-md-2">
                    <button type="button" name="getcourse" class="btn btn-md btn-search" style="margin: 20px auto;" id="course_search"><i class="fa fa-search "></i> Search</button>
                  </div></td></tr>
                   
                  </form>
                  
                  

                  </div>
                  </div>
                 

                  <div class="container"  >
                 
    
                  <div class="card">
                    <div class="card-body" style="background-color: #6d7fcc;color: #ffff;  margin-top: 0px; " id="rownums">
                    <h5 style="text-align: center; font-style: bold; font-family: 'aria-label', sans-serif;
                font-weight: 300; " ></h5>
            </div>
                    <table class="table table-hover table-responsive" id="score_table">
                    <thead>
                        <tr>
                            <th>Surname</th>
                            <th>Middlename</th>
                           
                              <th>Lastname</th>
                               <th>Reg. No</th>
                              <th>Course Tittle</th>
                              <th>Course Code</th>
                              <th>Credit Load </th>
                              <th>Score</th>
                              <th>Grade</th>
                              <th>Grade Unit</th>
                              
                              
                        </tr>
                    </thead>
                    <tbody id="table_course">
                     
                      
                   </tbody>
                   
                   
                </table>
               <div>
                 <button type="button" class="btn btn-light" id="refresh"><i class="fa fa-refresh ">&#xf021;</i> Refresh</button>
                 <button type="button" class="btn btn-light" id="savedata"><i class="fa fa-save "></i> Save</button>
               </div>
                  </div>
            </div>
            
          </div>


              </div>
            </div>
          </div>
          <!-- 
            </div>
          </div>
        </div> -->
                        
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
    
    function getdeprt(value) {
      value = $("#fac1")[0].selectedIndex;
      
     $.ajax({
      url:"depart.php",
      type:"POST",
      data:{dept:value},
      success: function(data){
  $("#department2").html(data);
 
 }
     });
     return false;
    };

  </script>   
   <script type="text/javascript">
  $('#course_record').click(function(){
    $('#emptydiv1').hide();
    $('#course_form').show();
  });

  </script>   
   <script type="text/javascript">
  $('#semester').on('change',function(){
    var faculty = $('#fac1').val();
    var department = $('#department2').val();
    var level = $('#level').val();
    var semester = $('#semester').val();

    $.ajax({
      url: "fetch_course.php",
      method: "POST",
      data:{department:department,level:level,semester:semester,faculty:faculty},
      success:function(data){
        $('#courseBox').html(data);
      }
    });
    
  });

  </script>  
    <script type="text/javascript">
      
      $('#course_search').click(function(){
       $('#rownums').html('');
        
       var faculty = $('#fac1').val();
    var department = $('#department2').val();
    var level = $('#level').val();
    var semester = $('#semester').val();
    var course = $('#courseBox').val();

    $.ajax({
      url: "fetch_course1.php",
      method: "POST",
      data:{course:course,department:department,level:level,semester:semester,faculty:faculty},
      success:function(data){
        $('#table_course').html(data);
      }
    });
    });
    </script>
   <script type="text/javascript">
     $('#refresh').click(function(){
       $('#rownums').html('');
      
       var table = document.getElementById('score_table');
    for (var r = 1, n = table.rows.length; r < n; r++) {
        // for (var c = 0, m = table.rows[r].cells.length; c < m; c++) {
             var score = calculate_grade(table.rows[r].cells[7].innerHTML);
             // var scor_input = table.rows[r].cells[8].innerHTML;
             // if(scor_input == null){
              table.rows[r].cells[8].innerHTML = score;
             // }else{
             //  scor_input = null;
             //   table.rows[r].cells[8].append(score);
             // }
        // }
        var grade_unit = getgrade_point(table.rows[r].cells[8].innerHTML),
        total_unit = parseInt(table.rows[r].cells[6].innerHTML) * grade_unit;
        table.rows[r].cells[9].innerHTML = total_unit;



    }
     });

   </script>

   <script type="text/javascript">
     function calculate_grade(grade){
      var gradeValue ;
      if(grade >= 70){
        gradeValue = 'A';
      }else if(grade >= 60){
        gradeValue = 'B';
      }else if(grade >= 50){
        gradeValue = 'C';
      }else if(grade >= 45){
        gradeValue = 'D';
      }else {
        gradeValue = 'F';
      }
      return gradeValue;
     }
   </script>

   <script type="text/javascript"> 
    $('#savedata').click(function(){
      var faculty = $('#fac1').val();
    var department = $('#department2').val();
    var level = $('#level').val();
    var semester = $('#semester').val();
    var course = $('#courseBox').val();
    var score = new Array();
    var grade = new Array();
    var grade_unit = new Array();
    var regnumber = new Array();

    // var table = document.getElementById('score_table');
    // for (var i = 1,n = table.rows.length; i < n; i++) {
    //  // for(var c = 0,l = table.cells.length; c<l; c++){
    //     score = table.rows[i].cells[7].innerHTML;
    //     grade = table.rows[i].cells[8].innerHTML;
    //     regnumber = table.rows[i].cells[3].innerHTML;
    //  // }
    //  // alert(regnumber);
    // }
    $('#score_table tr:gt(0)').each(function(){
      regnumber.push($('td:eq(3)',this).text());
      score.push($('td:eq(7)',this).text());
      grade.push($('td:eq(8)',this).text());
      grade_unit.push($('td:eq(9)',this).text());
     
    });

    $.ajax({
      url:"save_record.php",
      method:"POST",
      data:{regnumber:regnumber,course:course,score:score,grade:grade,grade_unit:grade_unit},
      success:function(data){
        $('#rownums').html(data);
      }
    });


    });

   </script>

   <script type="text/javascript">
     function getgrade_point(grade){
      var gradeValue;
      switch(grade){
        case 'A':
        gradeValue = 5;
        break;
        case 'B':
        gradeValue = 4;
        break;
        case 'C':
        gradeValue = 3;
        break;
        case 'D':
        gradeValue = 2;
        break;
        default:
        gradeValue = 0;
        break;
      }
      return gradeValue;
     }

   </script>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
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
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script> -->
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" ></script>
    <script type="text/javascript" src="script.js"></script>
   
    
</body>

</html>