<?php
	$servername = "localhost";
	$username = "a61237";
	$password = "0263e9";

	$conn = new mysqli($servername, $username, $password, "db_a61237");
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
?>