<?php
$conn = new mysqli('localhost', 'root', '', 'cgpdb');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
