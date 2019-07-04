<?php 
include 'gpdb.php';

if(isset($_POST['department'])){
	$faculty = $_POST['faculty'];
	$department = $_POST['department'];
	$level = $_POST['level'];
	$semester = $_POST['semester'];

	$query = mysqli_query($conn,"SELECT courseTittle FROM engineering where department='$department' and level='$level' and semester ='$semester'");
	if($query){
	while($row = $query->fetch_array()){
		?>
		<option value="<?php echo $row['courseTittle']; ?>"><?php echo $row['courseTittle']; ?></option>
		<?php
	}
}else{
	echo ("Mysql Error: ".mysqli_error($conn));
}
}


if(isset($_POST['course'])){
	$course = $_POST['course'];
	$faculty = $_POST['faculty'];
	$department = $_POST['department'];
	$level = $_POST['level'];
	$semester = $_POST['semester'];

	$query = mysqli_query($conn,"SELECT * FROM student,course
	 where student.regnumber = course.regno and
	student.faculty ='$faculty' and course.department='$department' and course.level='$level' and course.semester ='$semester'");
	if($query){
	while($row = $query->fetch_array()){
		?>
		<tr style="color: #ffff;">
			<td><?php echo $row['surname'] ?></td>
			<td><?php echo $row['middlename'] ?></td>
			<td><?php echo $row['lastname'] ?></td>
			<td><?php echo $row['regnumber'] ?></td>
			<td><?php echo $row['courseTittle'] ?></td>
			<td><?php echo $row['courseCode'] ?></td>
			<td><?php echo $row['creditload'] ?></td>
			<td contenteditable="true"><?php echo $row['score'] ?></td>
			<td><?php echo $row['grade'] ?></td>

		</tr>
		<?php
	}
}else{
	echo ("Mysql Error: ".mysqli_error($conn));
}
}

 ?>