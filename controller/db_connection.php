<?php

/* Masooma Bakhshi u3168789*/
		 $host= "localhost";
			$username = "root";
			$password = "";
			$dbname = "TAFE";
			try
	{
		$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password); //connect database
	}
	catch(PDOException $e)
	{
		$_SESSION['error'] = $e->getMessage();// set session error
		exit();
	}
	?>