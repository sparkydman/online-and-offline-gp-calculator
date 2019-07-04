<?php require('gpdb.php'); ?>


<?php
	

	if (isset($_POST['save_reg'])) {
		$surname = $_POST['surname'];
		$middlename= $_POST['middlename'];
		$lastname= $_POST['lastname'];
		$sex= $_POST['sex'];
		$regnumber=$_POST['regno'];
		$faculty = $_POST['faculty'];
		
		$department = $_POST['department'];
		$level = $_POST['level'];
		try{
		$qle = "INSERT into studentinfo(surname,middlename,lastname,sex,regnumber,faculty,department,level) 
		values('$surname','$middlename','$lastname','$sex','$regnumber','$faculty','$department','$level')";
		
		$result = mysqli_query($conn,$qle);
		

		if($result){
			$qle1 = "INSERT into login(username,password) values('$regnumber','$regnumber')";
			$result1 = mysqli_query($conn,$qle1);
			echo "<script> alert('Registered sucessfully!!!')</script>";
				echo "<script> window.open('home.php','_self')</script>";

		}else{

		}
	}catch(Exception $e){
	 echo $e->getMessage();
	}
	

	}

?>
<?php
	if (isset($_POST['loginbtn'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];


		$myql = "SELECT * from login where username ='$username' and password='$password'";
		$getresult = mysqli_query($conn,$myql);
		if (mysqli_num_rows($getresult)==2) {
			header("Location:portal.php");
		}
	}

?>