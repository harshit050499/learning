<?php 
	$servername="localhost";
	$username="root";
	$password="";

	$db = new PDO("mysql:host=$servername;dbname=testting",$username,$password);

	$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

	





?>