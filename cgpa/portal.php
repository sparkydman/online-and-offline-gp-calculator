<?php require('gpdb.php'); require('getuser.php');require('depart.php');require 'table.php';
if(empty($_SESSION['login_user'])){
  header("location:home.php");

}
$user = $_SESSION['login_username'];
  $qle = "SELECT * from student where username= '$user'";
  $result = mysqli_query($conn,$qle);
  $row= mysqli_fetch_assoc($result);
  $_SESSION['user_regnumber'] = $row['username'];
  $_SESSION['user_surname'] = $row['surname'];
  $_SESSION['user_middlename'] = $row['middlename'];
  $_SESSION['user_lastname'] = $row['lastname'];
  $_SESSION['user_faculty'] = $row['faculty'];
  $_SESSION['user_department'] = $row['department'];
  $_SESSION['user_level'] = $row['level'];
  $_SESSION['user_gender'] = $row['sex'];
  
  $faculty =  $_SESSION['user_faculty'];
  $level =  $_SESSION['user_level'];
  $department =  $_SESSION['user_department'];
 // $enter_semester ='';
            
if ($_SERVER['REQUEST_METHOD']=='POST') {
  if (isset($_POST['chngpass'])) {
    require 'change_password.php';
}

}
$message1 ='';


    

function grade_level($cgpa){
 
 if($cgpa >= 4.50){
  $gradeLevel = 'FIRST CLASS';
 }elseif ($cgpa >= 3.50) {
  $gradeLevel = 'SECOND CLASS UPPER';
 }elseif ($cgpa >= 2.50) {
  $gradeLevel = 'SECOND CLASS LOWER';
 }elseif ($cgpa >= 1.50) {
  $gradeLevel = 'THIRD CLASS';
 }else{
  $gradeLevel = 'PASS';
 }
 return $gradeLevel;
}

$allyear_unit = 0;
$allyear_grade_unit = 0;
$allyear_gp = 0;
$query = mysqli_query($conn, "SELECT * from course where regno ='$user' ");
if($query->num_rows > 0){
  while($row = $query->fetch_array()){
     
    $semester_unit1 = $row['creditLoad']; 
    $semester_grade_unit1 = $row['grade_unit']; 
    
    $allyear_unit  += (int)$semester_unit1;
    $allyear_grade_unit += (int)$semester_grade_unit1;
   
  }
 if($allyear_grade_unit == 0 ){
        $allyear_gp = 0;

      }else{
        $semester_gp2 = number_format((float)$allyear_grade_unit/$allyear_unit,2,'.','');
         $allyear_gp =grade_level($semester_gp2);
          // $allyear_gp =$semester_gp2;
      
      
      }
}
function fillTable($level, $semester, $regnumber)
{
  global $semester_unit,$semester_grade_unit,$conn,$semester_gp ;
 $semester_grade_unit =0; $semester_unit = 0;$semester_gp = 0;
  
   

$query = mysqli_query($conn, "SELECT * from course where regno ='$regnumber' and 
level ='$level' and semester = '$semester'  ");
if($query->num_rows > 0){
  while($row = $query->fetch_array()){
     
    $semester_unit1 = $row['creditLoad']; 
    $semester_grade_unit1 = $row['grade_unit']; 
    
    $semester_unit  += (int)$semester_unit1;
    $semester_grade_unit += (int)$semester_grade_unit1;
  
    ?>
    <tr>
                   <td><?php echo $row['courseTittle']; ?></td>       
                   <td><?php echo $row['courseCode']; ?></td>       
                   <td><?php echo $row['creditLoad']; ?></td>       
                   <td><?php echo $row['grade']; ?></td>       
                   <td><?php echo $row['grade_unit']; ?></td>       

                        </tr>
                        <?php
  }

}


 if($semester_grade_unit == 0 ){
      $semester_gp = 0;
     // $semester_grade_unit =0;
     $semester_unit =0;
    }else{
      $semester_gp  = number_format((float)$semester_grade_unit/$semester_unit,2,'.','');
      
    }
   
}

   

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Dashboard</title>

    <!-- Bootstrap CSS CDN -->

   <!-- <link rel="stylesheet" href="assets/css/bootstrap.min.css"> -->
        <link rel="stylesheet" href="assets/css/magnific-popup.css">
        <link rel="stylesheet" href="assets/css/font-awesome.css">
        <!-- <link rel="stylesheet" href="style1.css"> -->
        <link rel="stylesheet" href="assets/css/responsive.css">
       <!--  <link rel="stylesheet" href="assets/datatables.min.css">
        <link rel="stylesheet" href="assets/datatables.css">
        <link rel="stylesheet" href="assets/css/scroller.dataTables.min.css" -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" >
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="style5.css">
    <link rel="stylesheet" href="styleportal1.css">
     <link rel="stylesheet" href="transcript.css">
    <!-- Font Awesoe JS -->
    <script src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"></script>
    <script  src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" ></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
     <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/b-1.5.2/b-html5-1.5.2/b-print-1.5.2/sc-1.5.0/datatables.min.css"/>
 


</head >

<body style="background: url('image/edu4.jpg') no-repeat; background-size: cover;">

    <div class="wrapper" >
        <!-- Sidebar Holder -->
        <nav id="sidebar" style="background-color: rgba(164,165,167,0.4);">
            <div class="sidebar-header" style="background-color: rgba(164,165,167,0.4);">
            <h3><a href="#">SCHOOL PORTAL</a></h3>
            </div>

            <ul class="list-unstyled components">
                <p><a href="portal.php"><i class="fa fa-user-circle "></i> <?php echo $_SESSION['user_middlename']; ?></a> </p>
                
              <li>
                    <a href="#" class="button" id="registercourse">
                     <i class="fas fa-registered"></i>
                 Register Courses</a>
                </li>
                <li>
                    <a href="#" class="button" id="chkresult">
                     <i class="fas fa-check-square "></i>
                 Check Result</a>
                </li>
                <!-- <li>
                    <a href="#" class="button" id="print_transcript">
                     <i class="fas fa-book"></i>
                 Transcript</a>
                </li> -->
                <li>
                    <a href="#" class="button" id="changepassword">
                     <i class="fas fa-code"></i>
                 Change Password</a>
                </li>
               

                <li>
                    <a href="logout.php" class="button" id="logout">
                     <i class="fa fa-sign-out "></i>
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
            <div style="display: none;" >
             <div style="color: #ffff"><h2><?php echo $_SESSION['user_surname']." ".$_SESSION['user_middlename']." ".$_SESSION['user_lastname'];?></h2></div><div class="hidden" style="display: none;"><input id="hide" type="text" value="<?php echo $user ;?>" ><input id="hide1" type="text" value="<?php echo $faculty ;?>" ><input id="hide2" type="text" value="<?php echo $department ;?>" ><input id="hide3" type="text" value="<?php echo $level ;?>" ></div><br></div>
          
            
          
                <div class="container-fluid" id="emptydiv" >
             <center><div class="card-fluid" >
              <img src="image/edu5.jpg" height="100%" width="100%" >
              </div></center>
            </div>



                <div class="container-fluid" id="registrationcourse" style="display: none;" >
                
              <div class="container" style="width: 60%;margin-bottom: 20px;" id="mainselect">
                <div class="card-body" style="background-color: rgba(164,165,167,0.4);color: #ffff;  margin-top: 0px; ">
                    <h5 style="text-align: center; font-style: bold; font-family: 'aria-label', sans-serif;
                font-weight: 300; text-transform: uppercase; ">course registration</h5>
            </div>
                <div class="card" style="border-color: #a4a5a7;background: rgba(0,0,0,0.2);" >
                  
                  <form  method="post" class="form-horizontal" ">
                    
              <!--   <div class="row"> -->
                <table class="table table-bordered table-responsive">
  
                      <tr>
                        <td><label class="control-label" >Faculty:</label></td>
                      <td class="col-md-4"><select required  class="form-control" name="faculty1" onchange="getdeprt()" id="fac1">
                       
                         <?php
                     
                           $result=mysqli_query($conn,"SELECT*FROM faculty");
              while($row=$result->fetch_array()){?>
               <option value="<?php echo $row['FACULTY'];?>"><?php echo $row['FACULTY'];?></option>
              
            <?php 
          } 

            ?>
                      </select></td>
                      </tr>
                      <tr>
                        <td><label class="control-label">Department:</label></td>
                      <td class="col-md-4"><select class="form-control " name="deptmnt" required id="department2" >
                     
                      </select></td>
                      </tr>
                      <tr>
                        <td><label class="control-label">Level:</label></td>
                      <td class="col-md-4"><select class="form-control " name="lvl" required id="lvl" >
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
                      <td><select class="form-control " name="semest" required id="sem">
                        <option value="">select semester</option>
                        <option value="1">1</option>
                        <option value="2">2</option>

                      </select></td>
                      </tr>
                    </table>
                    

                 
                   <div class="col-md-2" align="center" style="margin:20px auto;">
                    <button type="button" id="search_course" name="getcourse" class="btn btn-md btn-search"   ><i class="fa fa-search "></i> Search</button>
                    <!-- <button name="getcourse" class="btn btn-md btn-search" style="margin-bottom: 20px;"  id="course_search1" onclick="tablevalue()">Search</button> -->
                  </div>
                    </form>
                  </div>
                  
                 </div>

                 <div class="container" >

                  
                <div class="card-body"  style="background-color: rgba(164,165,167,0.4);color: #ffff;  margin-top: 0px; ">
                    <h6 style="text-align: center; font-style: bold; font-family: 'aria-label', sans-serif;
                font-weight: 300;  " id="error"> </h6>
            </div>


             <table class="table table-hover" id="myTable2" style="color: #ffff;">
                             <thead>
                                 <tr>
                                     <th>Selected</th>
                                     <th>Course Title</th>
                                     <th>Course Code</th>
                                    
                                       <th>Credit Load</th>
                                        <th>Level</th>
                                       <th>Semester</th>
                                       
                                       
                                 </tr>
                           </thead>
                           <tbody id="insert_table">
                            
                           </tbody>
                           <tfoot>
 
                           <tr style="color: #fff;">
                       <td></td>
                       <td></td>
                       <td></td>
                       <td></td>
                        <td>
                   
                          <button type="button" name="remove" class="btn btn-xl btn-info" align="right" id="remove"><span class="glyphicon glyphicon-remove-circle "></span> Remove</button>
                        </td>

                        <td> <button type="button" name="back" class="btn btn-xl btn-info " align="right" id="savedata"><i class="fa fa-save "></i> Save</button></td>
                        
                      </tr>
                    </tfoot>
                    
                         </table>
          </div>
         
                 <div class="container" id="subcontainer">
                <div class="card-body" style="background-color: rgba(164,165,167,0.4);color: #ffff;  margin-top: 0px; ">
                 
                 <form class="form-horizontal">
                   <div class="row">
                        <!-- <label class="control-label">Level:</label> -->
                        <div class="col-sm-4">
                      <select class="form-control " name="lvl1" required id="lvl1" >
                        <option value="">Select Level</option>
                         <option value="100">100</option>
                         <option value="200">200</option>
                         <option value="300">300</option>
                         <option value="400">400</option>
                         <option value="500">500</option>

                      </select>
                    </div>
                    <div class="col-sm-4">
                     
                      <select class="form-control " name="semest1" required id="sem1">
                        <option value="">select semester</option>
                        <option value="1">1</option>
                        <option value="2">2</option>

                      </select>
                    </div>
                       <button type="button" name="addcourse1" class="btn btn-xs btn-info" id="addcourse1"><i class="fa fa-search "></i> Search</button>
                       </div>
                    </form>
                  
            </div>
              
                 <table class="table table-hover " id ="subcourse_table"  style="color: #ffff;">
                             <thead>
                                 <tr>
                                     <th>Select</th>
                                     <th>Course Title</th>
                                     <th>Course Code</th>
                                    
                                       <th>Credit Load</th>
                                        <th>Level</th>
                                       <th>Semester</th>
                                       
                                       
                                 </tr>
                           </thead>
                  
          <tbody id="subtable">
             
              
                             </tbody>
                             <tfoot>

 

                     <tr style="color: #fff;">
                       <td></td>
                       <td></td>
                       <td></td>
                       <td></td>
                        

                        <td> </td>
                        <td>
                    <button type="button" name="addcourse" id="addcourse" class="btn btn-xl btn-info" align="right" ><i class="fa fa-plus-circle "></i> Add</button>
                          
                        </td>
                      </tr>
                    
                    </tfoot>
                </table>
              </div>
    

                  </div>
                      
               

                <div class="container-fluid" id="change_password" style="display: none;" align="center">
               
              
              <div class="container" style="width: 40%;margin-bottom: 10%">
                 <div class="card-body" style="background-color: rgba(164,165,167,0.4);color: #ffff; ">
                    <h5 style="text-align: center; font-style: bold; font-family: 'aria-label', sans-serif;
                font-weight: 300; text-transform: uppercase; ">Change Password</h5>
            </div>
                <div class="card cardesign" style="border-color: #a4a5a7; background: rgba(0,0,0,0.2);">
                  <form action="portal.php" method="post" class="form-group" enctype="multipart/form-data">
                    
                    <div class="col-md-4-fluid" style="margin: 20px 20px;" >
                      <label class="control-label" >Old Password:</label>
                      <input required type="password" name="old_password" placeholder="enter old username" class="form-control">
                  </div>
                  <div class="col-md-4-fluid"style="margin: 20px 20px;">
                      <label class="control-label">New Password:</label>
                      <input required type="password" name="new_password" placeholder="enter new password" class="form-control">
                  </div>
                <div class="col-md-4-fluid"style="margin: 20px 20px;">
                      <label class="control-label">Confirm Password:</label>
                      <input required type="password" name="confirm_password" placeholder="confirm password" class="form-control">
                  </div>
                 
                  <center><div class="col-md-2">
                    <input type="submit" name="chngpass" class="btn btn-md btn-primary" value="Save" >
                  </div></center>
                  
                   </form>
                  
                  
                  </div>
                  </div>
                </div>


                 <div class="container-fluid" id="checkresult" style="display: none;">
               <!-- <div class="row"> -->
              
              <div class="container" style="width: 60%;">
                 <div class="card-body" style="background-color: rgba(164,165,167,0.4);color: #ffff; ">
                    <h5 style="text-align: center; font-style: bold; font-family: 'aria-label', sans-serif;
                font-weight: 300; text-transform: uppercase; ">Check Result</h5>
            </div>
            <!-- <div class="row"> -->
                <div class="card cardesign" style="border-color:  rgba(0,0,0,0.0); background: rgba(0,0,0,0.0);">
                 <!--  <div class="row"> -->
                  <form action="" method="post" class="form-group" >
                    
                    <div class="col-md-4-fluid">
                       <label class="control-label"  style="color: #f1f1f1;">Level:</label>
                      <select class="form-control" name="lvl1" required id="level">
                     
                      <option value=""></option>
                      <option value="100">100</option>
                      <option value="200">200</option>
                      <option value="300">300</option>
                      <option value="400">400</option>
                      <option value="500">500</option>

                    </select>
                  </div>
                  <div class="col-md-4-fluid">
                    <label class="control-label" style="color: #f1f1f1;">Semester:</label>
                      <select class="form-control" name="sem" required id="semester">
                      
                      <option value=""></option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                     

                    </select>
                  </div>
                 
                  <div class="col-md-2" style="margin: 20px auto;" align="center">
                    <button type="button" id="chk" name="chk" class="btn btn-md btn-search" ><i class="fa fa-search "></i> Search</button>
                  </div>                  
                   </form>

               <!--    </div> -->
                    </div>
                  </div>
                  <div class="card" style="border-color: #a4a5a7; background: rgba(0,0,0,0.2);">
                    <div class="card-body" style="background-color: rgba(164,165,167,0.4);color: #ffff; ">
                    <h5 style="text-align: center; font-style: bold; font-family: 'aria-label', sans-serif;
                font-weight: 300; text-transform: uppercase; ">Check Result</h5>
            </div>
                   <table class="table table-hover " id="result_table"  style="color: #f1f1f1;" >
                      <thead>
                        <th>Course Tittle</th>
                        <th>Course Code</th>
                        <th>Level</th>
                        <th>Semester</th>
                        <th>Credit Load</th>
                        <th>Score</th>
                        <th>Grade</th>
                        

                      </thead>
                      <tbody id="fetched_table">
                       
                           </tbody>

                       

                    </table>
                    <!-- <p>To calculate this semester GP click <a href="#">here</a></p> -->
                </div>
                <!--   </div> -->
              </div>
             

              <div class="container-fluid" id="transcript" style="display: none;">
               
              
              <div class="container-fluid" style="margin-bottom: 10%">
                 <div class="card-body" style="background-color: #6d7fcc;color: #ffff;">
                   <!--  <h5 style="text-align: left; font-style: bold; font-family: 'aria-label', sans-serif;
                font-weight: 300; text-transform: uppercase; ">Transcript</h5> -->

                <div class="card" style="width: 30%;border: none;" >
                <table >
                  <tr>
                    <td><label>Reg. Number</label></td>
                    <td><span><?php echo $user; ?></span></td>
                  </tr>
                   <tr>
                    <td><label>Level</label></td>
                    <td><span><?php echo $level; ?></span></td>
                  </tr>
                   <tr>
                    <td><label>Credit Load</label></td>
                    <td><span><?php echo $allyear_unit; ?></span></td>
                  </tr>
                  <tr>
                    <td><label>Grade Point</label></td>
                    <td><span><?php echo $allyear_grade_unit; ?></span></td>
                  </tr>
                  <tr>
                    <td><label>Grade</label></td>
                    <td><span><?php echo $allyear_gp; ?></span></td>
                  </tr>
                </table>
                </div>
            </div>
            <!-- <form method="post" action="transcript.php"> -->
                <div class="card-fluid cardesign" style="border-color: #a4a5a7; background: rgba(0,0,0,0.2);">
                  <!-- <form action="" method="post" class="form-group" > -->
                    
                  
      <div class="container-fluid" id="level100">
        <!-- <div class="card " style=""> -->
            <!-- <form class="form-group" method="post" action="manifest.php"> -->
              <div class="row">
            <div class="card work-grid" >
              <div class="card-body" >
                <h2 align="center" >100 LEVEL FIRST SEMESTER</h2>
                
              </div>
               <table class="table table-hover table-responsive"  style="color: #f1f1f1;">
                      <thead>
                        <th>Course Tittle</th>
                        <th>Course Code</th>
                       
                        <th>Credit Load</th>
                        <th>Grade</th>
                         <th>GRade Value</th>

                      </thead>
                      <tbody>
                        <?php fillTable(100,1,$user); ?>
                       

                      </tbody>
                      <tfoot>
                         <strong><tr >
                        <td >Total</td>
                        <td></td>
                        <td><?php echo $semester_unit; ?></td>
                        <td></td>
                        <td ><?php echo $semester_grade_unit; ?></td>
                      
                      </tr></strong>
                         
                      </tfoot>

                    </table>
                   <p>This Semester GP = <?php echo $semester_gp; ?> </p>
                   <!-- </form> -->
            </div>
            <div class="card work-grid1" >
              <div class="card-body" >
                <h2 align="center"  >100 LEVEL SECOND SEMESTER</h2>
                
              </div>
               <table class="table table-hover table-responsive"  style="color: #f1f1f1;">
                      <thead>
                        <th>Course Tittle</th>
                        <th>Course Code</th>
                       
                        <th>Credit Load</th>
                        <th>Grade</th>
                         <th>GRade Value</th>

                      </thead>
                      <tbody>
                        <?php fillTable(100,2,$user); ?>

                      </tbody>
                      <tfoot>
                         <strong><tr >
                        <td >Total</td>
                        <td></td>
                         <td><?php echo $semester_unit; ?></td>
                        <td></td>
                        <td ><?php echo $semester_grade_unit; ?></td>
                      
                      </tr></strong>
                         
                      </tfoot>

                    </table>
                   <p>This Semester GP = <?php echo $semester_gp; ?></p>
                   <!-- </form> -->
            </div>
          </div>
          <!-- </form> -->
        <!-- </div> -->
          
    </div>
    <div class="container-fluid" id="level200">
        <!-- <div class="card " style=""> -->
            <!-- <form class="form-group" method="post" action="manifest.php"> -->
              <div class="row">
            <div class="card work-grid" >
              <div class="card-body">
                <h2 align="center" >200 LEVEL FIRST SEMESTER</h2>
                
              </div>
               <table class="table table-hover table-responsive"  style="color: #f1f1f1;">
                      <thead>
                        <th>Course Tittle</th>
                        <th>Course Code</th>
                       
                        <th>Credit Load</th>
                        <th>Grade</th>
                         <th>GRade Value</th>

                      </thead>
                      <tbody>
                        <?php fillTable(200,1,$user); ?>
                        

                      </tbody>
                      <tfoot>
                         <strong><tr >
                        <td >Total</td>
                        <td></td>
                        <td><?php echo $semester_unit; ?></td>
                        <td></td>
                        <td ><?php echo $semester_grade_unit; ?></td>
                      </tr></strong>
                        
                      </tfoot>

                    </table>
                   <p>This Semester GP =<?php echo $semester_gp; ?> </p>
                   <!-- </form> -->
            </div>
            <div class="card work-grid1" >
              <div class="card-body">
                <h2 align="center" >200 LEVEL SECOND SEMESTER</h2>
                
              </div>
               <table class="table table-hover table-responsive"  style="color: #f1f1f1;">
                      <thead>
                        <th>Course Tittle</th>
                        <th>Course Code</th>
                       
                        <th>Credit Load</th>
                        <th>Grade</th>
                         <th>GRade Value</th>

                      </thead>
                      <tbody>
                        <?php fillTable(200,2,$user); ?>
                      

                      </tbody>
                      <tfoot>
                         <strong><tr >
                        <td >Total</td>
                        <td></td>
                         <td><?php echo $semester_unit; ?></td>
                        <td></td>
                        <td ><?php echo $semester_grade_unit; ?></td>
                      </tr></strong>
                         
                      </tfoot>

                    </table>
                   <p>This Semester GP = <?php echo $semester_gp; ?> </p>
            </div>
          </div>
          <!-- </form> -->
        <!-- </div> -->
          
    </div>
    <div class="container-fluid" id="level300">
        <!-- <div class="card " style=""> -->
            <!-- <form class="form-group" method="post" action="manifest.php"> -->
              <div class="row">
            <div class="card work-grid" >
              <div class="card-body">
                <h2 align="center" >300 LEVEL FIRST SEMESTER</h2>
                
              </div>
               <table class="table table-hover table-responsive"  style="color: #f1f1f1;">
                      <thead>
                        <th>Course Tittle</th>
                        <th>Course Code</th>
                       
                        <th>Credit Load</th>
                        <th>Grade</th>
                         <th>GRade Value</th>

                      </thead>
                      <tbody>
                        <?php fillTable(300,1,$user); ?>
                        
                      </tbody>
                      <tfoot>
                         <strong><tr >
                        <td >Total</td>
                        <td></td>
            <td><?php echo $semester_unit; ?></td>
                        <td></td>
                        <td ><?php echo $semester_grade_unit; ?></td>
                      </tr></strong>
                         
                      </tfoot>

                    </table>
                   <p>This Semester GP = <?php echo $semester_gp; ?> </p>
            </div>
            <div class="card work-grid1" >
              <div class="card-body" >
                <h2 align="center" >300 LEVEL SECOND SEMESTER</h2>
                
              </div>
               <table class="table table-hover table-responsive"  style="color: #f1f1f1;">
                      <thead>
                        <th>Course Tittle</th>
                        <th>Course Code</th>
                       
                        <th>Credit Load</th>
                        <th>Grade</th>
                         <th>GRade Value</th>

                      </thead>
                      <tbody>
                        <?php fillTable(300,2,$user); ?>
                      

                      </tbody>
                      <tfoot>
                         <strong><tr >
                        <td >Total</td>
                        <td></td>
                        <td><?php echo $semester_unit; ?></td>
                        <td></td>
                        <td ><?php echo $semester_grade_unit; ?></td>
                      </tr></strong>
                         
                      </tfoot>

                    </table>
                   <p>This Semester GP = <?php echo $semester_gp; ?> </p>
            </div>
          </div>
          <!-- </form> -->
        <!-- </div> -->
          
    </div>
    <div class="container-fluid" id="level400">
        <!-- <div class="card " style=""> -->
            <!-- <form class="form-group" method="post" action="manifest.php"> -->
              <div class="row">
            <div class="card work-grid" >
              <div class="card-body">
                <h2 align="center" >400 LEVEL FIRST SEMESTER</h2>
                
              </div>
               <table class="table table-hover table-responsive"  style="color: #f1f1f1;">
                      <thead>
                        <th>Course Tittle</th>
                        <th>Course Code</th>
                       
                        <th>Credit Load</th>
                        <th>Grade</th>
                         <th>GRade Value</th>

                      </thead>
                      <tbody>
                        <?php fillTable(400,1,$user); ?>
                     

                      </tbody>
                      <tfoot>
                         <strong><tr >
                        <td >Total</td>
                        <td></td>
                        <td><?php echo $semester_unit; ?></td>
                        <td></td>
                        <td ><?php echo $semester_grade_unit; ?></td>
                      </tr></strong>
                         
                      </tfoot>

                    </table>
                   <p>This Semester GP = <?php echo $semester_gp; ?></p>
            </div>
            <div class="card work-grid1" >
              <div class="card-body" >
                <h2 align="center" >400 LEVEL SECOND SEMESTER</h2>
                
              </div>
               <table class="table table-hover table-responsive"  style="color: #f1f1f1;">
                      <thead>
                        <th>Course Tittle</th>
                        <th>Course Code</th>
                       
                        <th>Credit Load</th>
                        <th>Grade</th>
                         <th>GRade Value</th>

                      </thead>
                      <tbody>
                        <?php fillTable(400,2,$user); ?>
                       

                      </tbody>
                      <tfoot>
                         <strong><tr >
                        <td >Total</td>
                        <td></td>
                        <td><?php echo $semester_unit; ?></td>
                        <td></td>
                        <td ><?php echo $semester_grade_unit; ?></td>
                      </tr></strong>
                         
                      </tfoot>

                    </table>
                   <p>This Semester GP = <?php echo $semester_gp; ?></p>
            </div>
          </div>
          <!-- </form> -->
        <!-- </div> -->
          
    </div>
    <div class="container-fluid" id="level500">
        <!-- <div class="card " style=""> -->
            <!-- <form class="form-group" method="post" action="manifest.php"> -->
              <div class="row">
            <div class="card work-grid" >
              <div class="card-body" >
                <h2 align="center" >500 LEVEL FIRST SEMESTER</h2>
                
              </div>
               <table class="table table-hover table-responsive"  style="color: #f1f1f1;">
                      <thead>
                        <th>Course Tittle</th>
                        <th>Course Code</th>
                       
                        <th>Credit Load</th>
                        <th>Grade</th>
                         <th>GRade Value</th>

                      </thead>
                      <tbody>
                        <?php fillTable(500,1,$user); ?>
                       
                      </tbody>
                      <tfoot>
                         <strong><tr >
                        <td >Total</td>
                        <td></td>
                        <td><?php echo $semester_unit; ?></td>
                        <td></td>
                        <td ><?php echo $semester_grade_unit; ?></td>
                         </tr></strong>
                      </tfoot>

                    </table>
                   <p>This Semester GP = <?php echo $semester_gp; ?> </p>
            </div>
            <div class="card work-grid1" >
              <div class="card-body">
                <h2 align="center" >500 LEVEL SECOND SEMESTER</h2>
                
              </div>
               <table class="table table-hover table-responsive"  style="color: #f1f1f1;">
                      <thead>
                        <th>Course Tittle</th>
                        <th>Course Code</th>
                       
                        <th>Credit Load</th>
                        <th>Grade</th>
                         <th>GRade Value</th>

                      </thead>
                      <tbody>
                        <?php fillTable(500,2,$user); ?>
                        

                      </tbody>
                      <tfoot>
                         <strong><tr >
                        <td >Total</td>
                        <td></td>
                       <td><?php echo $semester_unit; ?></td>
                        <td></td>
                        <td ><?php echo $semester_grade_unit; ?></td>
                      </tr></strong>
                         
                      </tfoot>

                    </table>
                   <p>This Semester GP = <?php echo $semester_gp; ?></p>
            </div>
          </div>

        
          
    </div>

                  
                  </div>
                  <div align="center">
                 <!--  <button type="button" class="btn btn-lg btn-info " id="print" name="print" style="margin: 10px auto;">Print</button> -->

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

     <!--       
            <script type="text/javascript">
              function get_print(){
                $.ajax({
                  url: "print_transcript.php",
                  type: "POST",

                });
                return false;
              };
            </script> -->


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
   $('#chk').click(function(){
    var level = $('#level').val();
    var semester = $('#semester').val();
    var regnumber = $('#hide').val();

     $.ajax({
          url:"fetch.php",
          method: "POST",
          data:{
            regnumber:regnumber, level:level, semester:semester
          },
          success:function(data){
            $('#fetched_table').html(data);
          }
        });

   });
</script>
<script type="text/javascript">
  $('#addcourse1').click(function(){
    $('#subcourse_table').show();

    var regnumber = $('#hide').val();
    var faculty = $('#hide1').val();
    var department = $('#hide2').val();
    var level = $('#lvl').val();
    var faculty1 = $('#fac1').val();
    var department1 = $('#department2').val();
   var semester1 = $('#sem1').val();
   var semester = $('#sem').val();
   var level1 = $('#lvl1').val();

   
        $.ajax({
          url:"fetch_subcourses.php",
          method: "POST",
          data:{
          regnumber:regnumber, faculty:faculty, department:department, level1:level1, faculty1:faculty1, department1:department1, level:level, semester:semester , semester1:semester1
          },
          success:function(data){
            $('#subtable').html(data);
          }
        });
  });
  </script> 

<script type="text/javascript">
  $('#search_course').click(function(){
    $('#error').html('');
    $('#subcourse_table').hide();
    // var regnumber = $('#hide').val();
    var faculty = $('#hide1').val();
    var department = $('#hide2').val();
    var level = $('#hide3').val();
    var faculty1 = $('#fac1').val();
    var department1 = $('#department2').val();
   var semester = $('#sem').val();
   var level1 = $('#lvl').val();

   
        $.ajax({
          url:"display_register_table.php",
          method: "POST",
          data:{
          faculty:faculty, department:department, level1:level1, faculty1:faculty1, department1:department1, level:level, semester:semester
          },
          success:function(data){
            $('#insert_table').html(data);
             disable_subtable();
          }
        });
  });
  </script> 

<script type="text/javascript">
  $('#savedata').click(function(){
    
    var regnumber = $('#hide').val();
    var faculty = $('#hide1').val();
    var department = $('#hide2').val();
    var level1 = $('#hide3').val();
    var level2 = $('#lvl').val();
    var semester1 = $('#sem').val();
    var faculty1 = $('#fac1').val();
    var department1 = $('#department2').val();
    var tittle = new Array();
    var code = new Array();
    var credit = new Array();
    var level = new Array();
    var semester = new Array();
    var table2 = document.getElementById('myTable2'),
     newCredit = parseInt(table2.rows[table2.rows.length-1].cells[3].innerHTML);
  
    $('#myTable2 tr:gt(0)').each(function(){
      tittle.push($('td:eq(1)',this).text());
      code.push($('td:eq(2)',this).text());
      credit.push($('td:eq(3)',this).text());
      level.push($('td:eq(4)',this).text());
      semester.push($('td:eq(5)',this).text());
    });
   
        $.ajax({
          url:"table.php",
          method: "POST",
          data:{
            regnumber:regnumber, faculty:faculty, department:department, level1:level1,level2:level2, faculty1:faculty1, department1:department1, tittle:tittle, code:code, credit:credit, level:level, semester:semester,semester1:semester1, newCredit:newCredit
          },
          success:function(data){
            $('#error').html(data);

          }
        });
  });
  </script>  


  <script type="text/javascript">
  $('#addcourse').click(function(){
    
    var table1 = document.getElementById('subcourse_table'),
        table2 = document.getElementById('myTable2').getElementsByTagName('tbody')[0],
        tab1_checkbox = document.getElementsByName('tab2_checkbox');

       var newCredit = parseInt(table2.rows[table2.rows.length-1].cells[3].innerHTML),
            newCredit1 = null;

       for (var i = 0; i < tab1_checkbox.length; i++) {
        if(newCredit < 24 && (newCredit + newCredit1) < 24){

        if(tab1_checkbox[i].checked){
             
                var newRow = table2.insertRow(table2.rows.length-1),
             cell1 = newRow.insertCell(0),
             cell2 = newRow.insertCell(1),
             cell3 = newRow.insertCell(2),
             cell4 = newRow.insertCell(3),
             cell5 = newRow.insertCell(4),
             cell6 = newRow.insertCell(5);

             
              cell1.innerHTML = "<input type='checkbox' name='tab1_checkbox'>";
             cell2.innerHTML = table1.rows[i + 1].cells[1].innerHTML;
             cell3.innerHTML = table1.rows[i + 1].cells[2].innerHTML;
             cell4.innerHTML = table1.rows[i + 1].cells[3].innerHTML;
             cell5.innerHTML = table1.rows[i + 1].cells[4].innerHTML;
             cell6.innerHTML = table1.rows[i + 1].cells[5].innerHTML;
             newCredit1 = parseInt(table1.rows[i + 1].cells[3].innerHTML);
             newCredit = newCredit + newCredit1;

              var index = table1.rows[i + 1].rowIndex;
             table1.deleteRow(index);


             i--;
        }
         table2.rows[table2.rows.length-1].cells[3].innerHTML = newCredit;
             //console.log(newCredit);
              
         }
       else{
         $('#error').html('You have reach the maxinium credit unit for a semester !');
          // tab1_checkbox[i].disabled = true;
           $('#addcourse').hide();
             }

       }


    });
  </script>
<script type="text/javascript">
  $('#remove').click(function(){
    
    var table1 = document.getElementById('subcourse_table').getElementsByTagName('tbody')[0],
    table3 = document.getElementById('myTable2').getElementsByTagName('tbody')[0],
        table2 = document.getElementById('myTable2'),
        tab2_checkbox = document.getElementsByName('tab1_checkbox');
       
        
        var newCredit = parseInt(table3.rows[table3.rows.length-1].cells[3].innerHTML);
       for (var i = 0; i < tab2_checkbox.length; i++) {
        if(tab2_checkbox[i].checked){
          var newRow = table1.insertRow(table1.rows.length),
             cell1 = newRow.insertCell(0),
             cell2 = newRow.insertCell(1),
             cell3 = newRow.insertCell(2),
             cell4 = newRow.insertCell(3),
             cell5 = newRow.insertCell(4),
             cell6 = newRow.insertCell(5);

             cell1.innerHTML = "<input type='checkbox' name='tab2_checkbox'>";
             cell2.innerHTML = table2.rows[i + 1].cells[1].innerHTML;
             cell3.innerHTML = table2.rows[i + 1].cells[2].innerHTML;
             cell4.innerHTML = table2.rows[i + 1].cells[3].innerHTML;
             cell5.innerHTML = table2.rows[i + 1].cells[4].innerHTML;
             cell6.innerHTML = table2.rows[i + 1].cells[5].innerHTML;

             newCredit = newCredit - parseInt(table2.rows[i + 1].cells[3].innerHTML);

             var index = table2.rows[i + 1].rowIndex;
             table2.deleteRow(index);
             i--;
             //console.log(tab1_checkbox[i]);
        }
        table3.rows[table3.rows.length-1].cells[3].innerHTML = newCredit;
       }
           $('#addcourse').show();



    });
  </script>
    
    
   <script type="text/javascript">
     $(document).ready(function(){
      $(function(){
      $('#add').click(function(){
        $('#mainselect').hide();
        $('#subselect').show();
      });
      $('#save').click(function(){
        $('#subselect').hide();
        $('#mainselect').show();
      });
      $('#print_transcript').click(function(){
        var level = $('#hide3').val();
        switch(level){
          case '100':
          $('#level200').hide();
          $('#level300').hide();
          $('#level400').hide();
          $('#level500').hide();
          break;
           case '200':
    
          $('#level300').hide();
          $('#level400').hide();
          $('#level500').hide();
          break;
           case '300':
         
          $('#level400').hide();
          $('#level500').hide();
          break;
           case '400':
        
          $('#level500').hide();
          break;
        }
      });
    });
     });
   </script>
  <script type="text/javascript">
    function disable_subtable(){
       var level = $('#lvl').val();
    var semester = $('#sem').val();
      if( level == '400' && semester == '2')
      {
        $('#subcontainer').hide();

      }else{
        $('#subcontainer').show();
      }
    }

  </script>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
     <script src="assets/js/jquery.min.js"></script><!-- jQuery -->
        <script src="assets/js/popper.min.js"></script><!-- popper -->
           <!-- <script src="assets/datatables.min.js"></script>
           <script src="assets/datatables.js"></script>
           <script src="assets/js/dataTables.scroller.min.js"></script> -->
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
   
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/b-1.5.2/b-html5-1.5.2/b-print-1.5.2/sc-1.5.0/datatables.min.js"></script>
</body>

</html>