<?php
include 'gpdb.php';

 if(isset($_POST['regnumber'])){
 	$regnumber = $_POST['regnumber'];
     $level =  $_POST['level'];
   $semester = $_POST['semester'];
    $message='';
      $result1=mysqli_query($conn,"SELECT * from course where regno ='$regnumber' and level ='$level' and semester = '$semester' ");
      if($result1){
   while($row1=$result1->fetch_array()){
   	$coursetitle = $row1['courseTittle'];
      $coursecode = $row1['courseCode'];
      $creditload = $row1['creditLoad'];
      $level = $row1['level'];
      $semester = $row1['semester'];
      $score = $row1['score'];
      $grade = $row1['grade'];
   	?>
    <strong><tr style="color: #fff;">

                                 <td ><?php echo  $coursetitle ?></td>
                                 <td ><?php echo  $coursecode ?></td>
                                  <td ><?php echo  $level ?></td>
                                  <td ><?php echo  $semester ?></td>
                                 <td ><?php echo  $creditload ?></td>
                                 <td ><?php echo  $score ?></td>
                                 <td ><?php echo  $grade ?></td>
                                
                                
     
                             </tr></strong>
                             <?php

}



}else{
$message .='Error'.mysqli_error($conn);
}

}
?>