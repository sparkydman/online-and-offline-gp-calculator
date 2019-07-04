<?php
require('gpdb.php');

?>
<?php
	session_start();
	$check_user_present =$_SESSION['login_user'];

	$qle = "SELECT * from student where username= $check_user_present";
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



	

	

?>

