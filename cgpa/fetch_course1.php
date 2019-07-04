<?php 
include 'gpdb.php';


if(isset($_POST['course'])){
	$course = $_POST['course'];
	$faculty = $_POST['faculty'];
	$department = $_POST['department'];
	$level = $_POST['level'];
	$semester = $_POST['semester'];

	$query = mysqli_query($conn,"SELECT * FROM student, course where
	 student.regnumber = course.regno and course.courseTittle = '$course'  and course.semester ='$semester'");
	if($query->num_rows > 0){
	while($row = $query->fetch_array()){
		?>
		<tr style="color: #ffff;">
			<td><?php echo $row['surname'] ?></td>
			<td><?php echo $row['middlename'] ?></td>
			<td><?php echo $row['lastname'] ?></td>
			<td><?php echo $row['regnumber'] ?></td>
			<td><?php echo $row['courseTittle'] ?></td>
			<td><?php echo $row['courseCode'] ?></td>
			<td><?php echo $row['creditLoad'] ?></td>
			<td contenteditable="true"><?php echo $row['score'] ?></td>
			<td><?php echo $row['grade'] ?></td>
			<td><?php echo $row['grade_unit'] ?></td>

		</tr>
		<?php
	}
}else{
	echo "<script>alert('No student was registered for this course')</script>";
}
}

 ?>