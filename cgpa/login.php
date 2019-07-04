<?php 

//require 'gpdb.php';
$regnumber = $conn->escape_string($_POST['username']);

$result = $conn->query("SELECT * from admin where username ='$regnumber' limit 1");
if($result->num_rows==0){
 	// $_SESSION['message']='user with the username doest not exit';
 	// header("location:error.php");
$result1 = $conn->query("SELECT * from student where regnumber ='$regnumber' limit 1");

 if($result1->num_rows==0){
 	$_SESSION['message']='user with the username doest not exit';
 	header("location:error.php");

 }else{
 	$user1=$result1->fetch_assoc();

 	if(password_verify($_POST['password'],$user1['password'])){
 	

 		$conn->query("UPDATE student set active = '1' where regnumber = '$regnumber'") or die($conn->error);
		$_SESSION['active'] = 1;
 		$_SESSION['login_user']=true;
 		 $_SESSION['login_username'] = $regnumber;
 		
 		header("location:portal.php");
 	}else{
 		$_SESSION['message']='wrong password !!!';
 		header("location:error.php");
 	}

 }
 	}
 // else{
 // 	$user=$result->fetch_assoc();
 // 	if (($conn->escape_string($_POST['password'])==$user['password']) && ($regnumber == $user['username'])) {
 // 		 $_SESSION['login_user'] = true;
 //        header('location:admin.php');
 // 	}else{
 // 		$_SESSION['message']='wrong password !!!';
 // 		header("location:error.php");
 // 	}

 // }


 

 ?>