<?php
   include("gpdb.php");
   if(isset($_POST['id'])){
   $id=$_POST['id'];
   $result=mysqli_query($conn,"SELECT*FROM departments WHERE faculty_id='$id'");
   while($row=$result->fetch_array()){?>
    <option value="<?php echo $row['dept'];?>"><?php echo $row['dept'];?></option>
   
   <?php }} ?>
   <?php
    if(isset($_POST['dept'])){
   $id1=$_POST['dept'];
   $result1=mysqli_query($conn,"SELECT*FROM departments WHERE faculty_id='$id1'");
   while($row1=$result1->fetch_array()){?>
    <option value="<?php echo $row1['dept'];?>"><?php echo $row1['dept'];?></option>
   
   <?php }} 


   ?>
   <?php
    if(isset($_POST['dept1'])){
   $id2=$_POST['dept1'];
   $result1=mysqli_query($conn,"SELECT*FROM student WHERE username='$id2'");
  if($result1->num_rows > 0){
   echo "User name Exist";
   
   }} 

   
   ?>
 
   