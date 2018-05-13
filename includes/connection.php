<?php  
	$server_host = "localhost";
	$server_username = "root";
	$server_password = "";
	$database = 'news';

	$conn = mysqli_connect($server_host,$server_username,$server_password,$database) or die("Faiure to connect to database");
	mysqli_query($conn,"SET NAMES 'UTF8'");
?>