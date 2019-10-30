<?php
	$servername = "localhost";
	$username = "a61237";
	$password = "oogi0ch";

	$conn = new mysqli($servername, $username, $password, "db_a61237");
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
?>