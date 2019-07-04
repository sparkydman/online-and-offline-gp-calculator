<?php
require 'gpdb.php';
 if(isset($_POST['regnumber'])){
    
    $regnumber = $conn->escape_string($_POST['regnumber']);
$faculty = $conn->escape_string($_POST['faculty']);
$enter_faculty = $conn->escape_string($_POST['faculty1']);
  $department = $conn->escape_string($_POST['department']);
  $enter_dept = $conn->escape_string($_POST['department1']);
  $level = $conn->escape_string($_POST['level']);
  $enter_level = $conn->escape_string($_POST['level1']);
   $enter_semester = $conn->escape_string($_POST['semester1']);
   $semester = $conn->escape_string($_POST['semester']);
  
   $message ='';

    if ( ($department != $enter_dept) OR ($level <= $enter_level) OR ($semester != $enter_semester)) {
    $message .= 'You can not register these courses, go and meet yourr academic advicer';
      }else{
        $result1=mysqli_query($conn,"SELECT * from engineering where department ='$enter_dept' and level = '$enter_level' and semester ='$enter_semester' ");
      if($result1){
   while($row1=$result1->fetch_array()){
       $coursetitle = $row1['courseTittle'];
      $coursecode = $row1['courseCode'];
      $creditload = $row1['creditLoad'];
      $level = $row1['level'];
      $semester = $row1['semester'];
      // $total += (int)$creditload;
     ?>
         
          <strong><tr >

                                 <td id="checkbox"><input type="checkbox" name="tab2_checkbox"></td>
                                 <td id="tittle"><?php echo  $coursetitle ?></td>
                                 <td id="code"><?php echo  $coursecode ?></td>
                                 <td id="credit"><?php echo  $creditload ?></td>
                                 <td id="level"><?php echo  $level ?></td>
                                 <td id="semester"><?php echo  $semester ?></td>
     
                             </tr></strong>
                            
                             <?php
     

}
}else{
  $message .= ("error: ".mysqli_error($conn));
}
}
echo $message;
}
?>