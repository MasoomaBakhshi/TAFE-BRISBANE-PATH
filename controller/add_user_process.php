<?php
/* Masooma Bakhshi u3168789*/

	//retrieve the functions
	include('db_connection.php');
	require('functions_messages.php');
	require('functions.php');
	session_start();
	$admin=find_admin();
	
	//retrieve the data that was entered into the form fields using the $_POST array
	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['passowrd'];
	
	//START SERVER-SIDE VALIDATION
	//check if all required fields have data
	if (empty($name) || empty($email)|| empty($password)) 
	{ 
		//if required fields are empty initialise a session called 'error' with an appropriate user message
		$_SESSION['error'] = 'All * fields are required.'; 
		redirect('..\add_user.php');
		exit();
	}
	$count= get_id_count($name);
		
	    if($count >= 1)
	   { 
			//if there are any matching rows intialise a session called 'error' with an appropriate user message
			$_SESSION['error'] = 'This name is already in database.';
			redirect('..\add_user.php');
			exit();
	     }
		$password= md5($password);	 
	
		$result = add_user($name, $email, $password);
		
		if($result)
		{
			$_SESSION['success'] = $name.' has been added as Admin successfully.';
			redirect('..\add_user.php');
		}
		else
		{
			$_SESSION['error'] = 'An error has occurred. Please try again.';
			redirect('..\add_user.php');
		}
        
?>