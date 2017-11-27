<?php
	// $servername = "localhost";
	// $username = "root";
	// $password = "";
	// $dbname = "sp2344";

	$servername = 'sql2.njit.edu';
	$username = 'sp2344';
	$password = 'NBAeIqjV';
	$database = 'sp2344';
		
	// Create connection
	$conn = new mysqli($servername, $username, $password);
	$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
	$conn->query($sql);

	$DB = new mysqli($servername, $username, $password, $dbname);

	
?>