<?php



$_SESSION['surname'] = $_POST['username'];
$_SESSION['middlename'] = $_POST['middlename'];
$_SESSION['lastname'] = $_POST['lastname'];
$_SESSION['faculty'] = $_POST['faculty'];
$_SESSION['department'] = $_POST['department'];
$_SESSION['level'] = $_POST['level'];
$_SESSION['regnumber'] = $_POST['regno'];
$_SESSION['email'] = $_POST['email'];


$surname = $conn->escape_string($_POST['surname']);
$firstname = $conn->escape_string($_POST['firstname']);
$middlename = $conn->escape_string($_POST['middlename']);
$lastname = $conn->escape_string($_POST['lastname']);
$sex = $conn->escape_string($_POST['sex']);
$regnumber = $conn->escape_string($_POST['regno']);
$faculty = $conn->escape_string($_POST['faculty']);
$department = $conn->escape_string($_POST['department']);
$level = $conn->escape_string($_POST['level']);
$email = $conn->escape_string($_POST['email']);

	if(trim(strlen($_POST['password'])) < 8 ){
		$_SESSION['message']='password must be at least 8 characters';
		header('location:error.php');
	}elseif(trim($_POST['password']) != trim($_POST['con_password'])){
		$_SESSION['message']='password did not match';
		header('location:error.php');
	}else{
$password = $conn->escape_string(password_hash($_POST['password'],PASSWORD_BCRYPT));

	};
	
$result = $conn->query("SELECT * from student where regnumber= '$regnumber' and email = '$email' limit 1");

	if($result->num_rows > 0){
		$_SESSION['message']='user with registration number or email already exist';
		header('location:error.php');
	}else{
		$qle = "INSERT into student(surname,middlename,lastname,sex,regnumber,faculty,department,level,email,username,password) values('$surname','$middlename','$lastname','$sex','$regnumber','$faculty','$department','$level','$email','$regnumber','$password')";

		if($conn->query($qle)){
	$_SESSION['active'] = 1;
	$_SESSION['login_user']=true;
 		 $_SESSION['login_username'] = $regnumber;
	 header("location:portal.php");
}
else
{
	$_SESSION['message']='Error '.$conn->error();
	header('location:error.php');
}
	}

 

?>