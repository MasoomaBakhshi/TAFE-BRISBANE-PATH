<?php
/* Masooma Bakhshi u3168789*/

	//retrieve the functions
	include('db_connection.php');
	require('functions_messages.php');
	require('functions.php');
	session_start();
	
	//retrieve the username and password entered into the form
	$name = $_POST['name'];
	$password = $_POST['passowrd']; 
	
	
	$password= md5($password);
	 
	
	//call the login() function
	$count = login($name, $password);
	
	//if there is one matching record
	if($count == 1)
	{ 
		//start the admin session to allow authorised access to secured web pages
		$_SESSION['admin'] = $name;
		$result=admin($name, $password);
		 foreach($result as $row){ $_SESSION['admin-id']=$row['id']; }
		$_SESSION['welcome'] = 'Hello ' . $name . '. Have a great day!';
		header('location:../dashboard.php' );
	}	
	else
	{
		//if login not successful, create an error message to display on the login page
		$_SESSION['error'] = 'Incorrect name or password. Please try again.';
		//redirect to login.php
		header('location:../login.php');
	}	
?>