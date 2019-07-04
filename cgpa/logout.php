<?php
require('gpdb.php');
session_start();
if (session_destroy()) {
	$conn->query("UPDATE student set active = '0' where active = '1'") or die($conn->error);
			header("location:home.php");
}
?>