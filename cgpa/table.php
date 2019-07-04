 <?php 

  require 'gpdb.php';
  

    if(isset($_POST['regnumber'])){

// global $total;
// $enter_faculty = $enter_dept = $enter_level = $enter_semester = '';

       $regnumber = $_POST['regnumber'];
$faculty = $_POST['faculty'];
  $department =  $_POST['department'];
  $level1 =  $_POST['level1'];
  $level2 =  $_POST['level2'];
   $semester1 = $_POST['semester1'];
   $faculty1 = $_POST['faculty1'];
   $department1 = $_POST['department1'];
   $tittle = $_POST['tittle'];
   $code = $_POST['code'];
   $credit = $_POST['credit'];
   $level = $_POST['level'];
   $semester = $_POST['semester'];
   $newCredit = $_POST['newCredit'];

 // echo $department. " selected ".$enter_dept ;
 $message ='';
 // $query = '';
  if ($faculty != $faculty1 OR $department != $department1 OR $level1 < $level2) {
      $message .='You can not register these courses !';
    }else{
      if($newCredit > 24){

        $message .='You cannot register more than 24 credit load for a semester !';
      }else{
       mysqli_query($conn, 'SELECT * FROM  course where regno = "'.$regnumber.'" and level = "'.$level2.'" and semester = "'.$semester1.'" ');
        $affected_row = mysqli_affected_rows($conn);
      
     if($affected_row == count($tittle) OR $affected_row >= (count($tittle) * 0.7)){
      $message .='These courses have been registered !';

     }
     else{
        
     for ($i=0; $i <count($tittle)-2 ; $i++) { 
     $tittle_clear = mysqli_real_escape_string($conn,$tittle[$i]);
     $code_clear = mysqli_real_escape_string($conn,$code[$i]);
     $credit_clear = mysqli_real_escape_string($conn,$credit[$i]);
     $level_clear = mysqli_real_escape_string($conn,$level[$i]);
     $semester_clear = intval($semester[$i]);

     // $message .=count($tittle);
   
      $query = mysqli_multi_query($conn,'INSERT into course(regno,level,courseCode,courseTittle,semester,creditLoad) values ("'.$regnumber.'","'.$level2.'","'.$code_clear.'","'.$tittle_clear.'","'.$semester_clear.'","'.$credit_clear.'")');
      if($query){

      }else{
        $message .= mysqli_error($conn);
      }
     }
 $message .='Registered Successfully';
     
    }
    
     
     
     }
   }
  echo $message;  
  }

 
     ?>
    