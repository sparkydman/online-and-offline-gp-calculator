
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
    //    function body_data(){
      ?>
     
   
    <div class="card" >
                <div class="card-body" style="background-color: #6d7fcc;color: #ffff;  margin-top: 0px; ">
                    <h5 style="text-align: center; font-style: bold; font-family: 'aria-label', sans-serif;
                font-weight: 300; text-transform: uppercase; ">course registration</h5>
            </div>
    
     <table class="table table-hover table-responsive">
                             <thead>
                                 <tr>
                                     <th>Course Title</th>
                                     <th>Course Code</th>
                                    
                                       <th>Credit Load</th>
                                        <th>Level</th>
                                       <th>Semester</th>
                                       
                                       
                                 </tr>
                           </thead>
                           <?php
      $result1=mysqli_query($conn,"SELECT * from engineering where  department ='$enter_dept' and level = '$enter_level' and semester ='$enter_semester' ");
   while($row1=$result1->fetch_array()){
       $coursetitle = $row1['courseTittle'];
      $coursecode = $row1['courseCode'];
      $creditload = $row1['creditLoad'];
      $level = $row1['level'];
      $semester = $row1['semester'];
      $total += (int)$creditload;
     ?>
          <tbody>
          <strong><tr style="color: #fff;">
                                 <td id="titttle"><?php echo  $coursetitle ?></td>
                                 <td id="code"><?php echo  $coursecode ?></td>
                                 <td id="credit"><?php echo  $creditload ?></td>
                                 <td id="level"><?php echo  $level ?></td>
                                 <td id="semester"><?php echo  $semester ?></td>
     
                             </tr></strong>
                             </tbody>
                             <?php
     

}
// foreach ($conn->query("SELECT SUM(creditLoad) from engineering where  department ='$enter_dept' and level = '$enter_level' and semester ='$enter_semester' ") as  $row) {
//       //echo $row['SUM(semeste)'];
//        $total = $row['SUM(creditLoad)'];
//      }
   
     
     }else{
      $message1 ="You Can't register courses above your level or course not for your department";
    echo "<script> alert($message1)</script>";
    }
    ?>
    <tfoot>

 <strong><strong><tr style="color: #fff;">
                        <td>Total Credit Load</td>
                        <td></td>
                        <td><?php echo $total; ?></td>
                        <td></td>
                        <td></td>
                      </tr></strong></strong>

                     <tr style="color: #fff;">
                        <td class="col-sm-4"> <label>
                          level:
                         <select class="form-control" name="newlevel">
                          <option value=""></option>
                          <option value="100">100</option>
                          <option value="200">200</option>
                          <option value="300">300</option>
                          <option value="400">400</option>
                          <option value="500">500</option>
                        </select> </label></td>
                        <td class="col-sm-4"> <label>
                          Semester:
                        <select class="form-control" name="newsem">
                          <option value=""></option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                    <td><input type="submit" name="search" class="btn btn-xl btn-info" value="Search" align="right"></td>
                          
                        </select> </label></td>
                        <td>
                    <input type="submit" name="addcourse" class="btn btn-xl btn-info" value="+ Add" align="right" onclick="chngstate()">
                          
                        </td>

                        <td> <input type="submit" name="back" class="btn btn-xl btn-info" value="Save" align="right"></td>
                        
                      </tr>
                    
                    </tfoot>
                </table>
                <hr>
            <div>
     <p style="color: yellow; font-weight: 400;"> <?php echo $message1; ?> </p>
   </div>   
            </div>

            <?php 
            if (isset($_POST['search'])) {
              if (($faculty == $enter_faculty) && ($department == $enter_dept) ) {
    $selevel = $_POST['newlevel'];
    $selsem = $_POST['newsem'];
    ?>
    <table class="table table-hover table-responsive">
                             <thead>
                                 <tr>
                                     <th>Course Title</th>
                                     <th>Course Code</th>
                                    
                                       <th>Credit Load</th>
                                        <th>Level</th>
                                       <th>Semester</th>
                                       
                                       
                                 </tr>
                           </thead>
                           <?php
      
           $result=mysqli_query($conn,"SELECT * from engineering where  department ='$enter_dept' and level = '$selevel' and semester ='$selsem' ");
   while($ro=$result->fetch_array()){
       $coursetitle1 = $ro['courseTittle'];
      $coursecode1 = $ro['courseCode'];
      $creditload1 = $ro['creditLoad'];
      $level1 = $ro['level'];
      $semester1 = $ro['semester'];
     // $total += (int)$creditload;
     ?>
     
          <tbody>
          <strong><tr style="color: #fff;">
                                 <td id="titttle"><?php echo  $coursetitle1 ?></td>
                                 <td id="code"><?php echo  $coursecode1 ?></td>
                                 <td id="credit"><?php echo  $creditload1 ?></td>
                                 <td id="level"><?php echo  $level1 ?></td>
                                 <td id="semester"><?php echo  $semester1 ?></td>
     
                             </tr></strong>
                             </tbody>
                             </table>

 <?php
          }
             
            }
          }

    
             ?>
<p id="ch"> </p>

   <script type="text/javascript">
     function search(){
     document.getElementById('ch').innerHTML = document.write('am here today');
     }

   </script>