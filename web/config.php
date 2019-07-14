<?php 
    session_start();
    $conn = mysqli_connect("localhost", "root", "", "complete-blog-php");
    if (!$conn) {
		die("Error connecting to database: " . mysqli_connect_error());
	}
?>