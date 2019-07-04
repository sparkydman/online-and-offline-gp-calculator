 <?php 

  require 'gpdb.php';
 
$total = 0; 

$enter_faculty = $enter_dept = $enter_level = $enter_semester = '';

    
       $user = $conn->escape_string($_POST['reg']);
$enter_faculty = $conn->escape_string($_POST['faculty']);
  $enter_dept = $conn->escape_string($_POST['department']);
  $enter_level = $conn->escape_string($_POST['level']);
   $enter_semester = $conn->escape_string($_POST['semester']);
   $faculty = $conn->escape_string($_POST['original_faculty']);
   $department = $conn->escape_string($_POST['original_dept']);
   $level = $conn->escape_string($_POST['original_level']);
 //echo $department. " selected ".$enter_dept ;
 $message1 ='';
   
  
    if (($faculty == $enter_faculty) && ($department == $enter_dept) && ($level == $enter_level)) {
    
      $result1=mysqli_query($conn,"SELECT * from engineering where  department ='$enter_dept' and level = '$enter_level' and semester ='$enter_semester' ");
   while($row1=$result1->fetch_array()){
      // $coursetitle = $row1['courseTittle'];
     // $coursecode = $row1['courseCode'];
      // $creditload = $row1['creditLoad'];
       //$level = $row1['level'];
       $semester = $row1['semester'];
      // $total += (int)$creditload;
     ?>
         
          <strong><tr style="color: #fff;">
                                <!--  <td ><?php echo  $coursetitle ?></td> -->
                                <!--  <td ><?php echo  $coursecode ?></td> -->
                              <!--  <td ><?php echo  $creditload ?></td> -->
                                <!--  <td ><?php echo  $level ?></td> -->
                                 <td><?php echo  $semester ?></td> 
     
                             </tr></strong>
                            
                             <?php
     

}

   
     
     }else{
    
    }

     ?>
    <!--  <p> <?php echo $message1; ?> </p> -->