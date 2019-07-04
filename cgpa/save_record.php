<?php 
require 'gpdb.php';

if(isset($_POST['regnumber'])){
 $regnumber = $_POST['regnumber'];
// $faculty = $_POST['faculty'];
//   $department =  $_POST['department'];
//   $level =  $_POST['level'];
//    $semester = $_POST['semester'];
   $course = $_POST['course'];
   $score = $_POST['score'];
   $grade = $_POST['grade'];
   $grade_unit = $_POST['grade_unit'];

   
    $message='';

    for ($i=0; $i <count($regnumber) ; $i++) { 
     $regnumber_clear = mysqli_real_escape_string($conn,$regnumber[$i]);

    	$score_clear = mysqli_real_escape_string($conn,$score[$i]);
     $grade_clear = mysqli_real_escape_string($conn,$grade[$i]);
     $unit_clear = mysqli_real_escape_string($conn,$grade_unit[$i]);

     $query = mysqli_multi_query($conn,"UPDATE course set score = '".$score_clear."', grade = '".$grade_clear."', grade_unit = '".$unit_clear."' where regno ='".$regnumber_clear."' and courseTittle = '".$course."' ");
   
    }
echo "Saved Successfully!";
    
}

 ?>