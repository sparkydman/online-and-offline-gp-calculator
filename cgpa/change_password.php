<?php 



		
	$old_password = $conn->escape_string($_POST['old_password']);
		if (empty(trim($_POST['old_password']))) {
				echo "<script>alert('enter old password')</script>";
			header("location:portal.php");
			}else{
			
				
				$user=$_SESSION['user_regnumber'];
			$sql=$conn->query("SELECT * from student where username = '$user'");
		if ($sql->num_rows==0) {
				echo "<script>alert('user with the password don't exist')</script>";
			
			header("location:portal.php");

		}else{
			$retriv =$sql->fetch_assoc();
			
			if (password_verify($_POST['old_password'],$retriv['password'])) {
				if (trim($_POST['new_password']) == trim($_POST['confirm_password'])) {
					if (strlen(trim($_POST['new_password'])) < 8) {
						echo "<script>alert('password must not be less than 8')</script>";
						
			header("location:portal.php");
					}else{
						$new_password = $conn->escape_string(password_hash($_POST['new_password'],PASSWORD_BCRYPT));
						

						$qury =("UPDATE student set password = '$new_password' where username = '$user'") or die($conn->error);
						if ($conn->query($qury)) {
				echo "<script>alert('password changed successfully')</script>";
						
			header("location:portal.php");

						}
				}
			}
			else{
				echo "<script>alert('passwords did not match')</script>";
			
					header("location:portal.php");
				}
				
			}
		}	

			}
		





 ?>