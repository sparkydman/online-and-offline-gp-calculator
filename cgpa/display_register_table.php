<?php
require 'gpdb.php';
 if(isset($_POST['faculty'])){
    
    // $user = $conn->escape_string($_POST['reg']);
$faculty = $conn->escape_string($_POST['faculty']);
$enter_faculty = $conn->escape_string($_POST['faculty1']);
  $department = $conn->escape_string($_POST['department']);
  $enter_dept = $conn->escape_string($_POST['department1']);
  $level = $conn->escape_string($_POST['level']);
  $enter_level = $conn->escape_string($_POST['level1']);
   $enter_semester = $conn->escape_string($_POST['semester']);
  
   $total =0;
   
    
      $result1=mysqli_query($conn,"SELECT * from engineering where  department ='$enter_dept' and level = '$enter_level' and semester ='$enter_semester' ");
   while($row1=$result1->fetch_array()){
       $coursetitle = $row1['courseTittle'];
      $coursecode = $row1['courseCode'];
      $creditload = $row1['creditLoad'];
      $level = $row1['level'];
      $semester = $row1['semester'];
      $total += (int)$creditload;
     ?>
         
          <strong><tr >

                                 <td ><input type="checkbox" name="tab1_checkbox" disabled></td>
                                 <td ><?php echo  $coursetitle ?></td>
                                 <td ><?php echo  $coursecode ?></td>
                                 <td ><?php echo  $creditload ?></td>
                                 <td ><?php echo  $level ?></td>
                                 <td ><?php echo  $semester ?></td>
     
                             </tr></strong>
                            
                             <?php
     

}
?>
<tr style="color: #fff;"><b>
                        <td>Total Credit Load:</td>
                        <td></td>
                        <td></td>
                        <td id="total_credit"><?php echo $total; ?></td>
                        <td></td>
                        <td></td></b>
                      </tr>
                      <?php
}
?>