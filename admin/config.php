<?php

	$servername = "localhost";
	$username = "seemap";
	$password = "password";
	$dbname = "seemap_Product_Info";
	$path= dirname(__FILE__);
	$conn = new mysqli($servername, $username, $password,$dbname);

	if ($conn->connect_error) 
	{
	    die("Connection failed");
	}
?>