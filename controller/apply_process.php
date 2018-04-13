<?php
/* Masooma Bakhshi u3168789*/

	include('db_connection.php');
	require('functions_messages.php');
	require('functions.php');
	session_start();
	
	//retrieve the data that was entered into the form fields using the $_POST array
	$date = $_POST['date'];
	$admin = $_POST['admin'];
	$slider1Video = $_FILES['slider1Video']['name'];
	$slider1Link=$_POST['slider1Link'];
	$slider2Video = $_FILES['slider2Video']['name'];
	$slider2Link=$_POST['slider2Link'];
	$backgroundColor = $_POST['backgroundColor'];
	$backgroundAbout = $_FILES['backgroundAbout']['name'];
	$backgroundWorks = $_FILES['backgroundWorks']['name'];
	$headingColor=$_POST["headingColor"];
	$paragraphColor = $_POST['paragraphColor'];
	$paragraphFont = $_POST['paragraphFont'];
	$contactAddress=$_POST["contactAddress"];
	$contactPhone=$_POST["contactPhone"];
	$contactEmail = $_POST['contactEmail'];
	$aboutText = $_POST['aboutText'];
	$flag=true;
	
	//START SERVER-SIDE VALIDATION
	if(($_FILES["slider1Video"]["type"] == "video/mp4")&& ($_FILES["slider2Video"]["type"] == "video/mp4")&& ($_FILES["backgroundAbout"]["type"] == "jpg") && ($_FILES["backgroundAbout"]["type"] == "png") && ($_FILES["backgroundAbout"]["type"] == "jpeg")&& ($_FILES["backgroundAbout"]["type"] == "gif")&& ($_FILES["backgroundWorks"]["type"] == "jpg") && ($_FILES["backgroundWorks"]["type"] == "png") && ($_FILES["backgroundWorks"]["type"] == "jpeg")&& ($_FILES["backgroundWorks"]["type"] == "gif"))
	{
		$_SESSION['error'] = 'Wrong extensions of files. Videos need to be mp4 and images in jpg,png,gif or jpeg.';
		redirect('..\admin.php');
	}
	
	if ($_FILES["slider1Video"]["type"] == 'video/mp4')
	{
	$randomDigit = rand(0000,9999); //generate a random numerical digit <= 4 characters
	$slider1Video = strtolower($randomDigit . "_" . $slider1Video); //attach the random digit to the front of uploaded images to prevent overriding files with the same name in the images folder and enhance security
	move_uploaded_file($_FILES['slider1Video']['tmp_name'],"../assests/videos/" . $slider1Video);
	}
	
	if ($_FILES["slider2Video"]["type"] == 'video/mp4')
	{
	$randomDigit = rand(0000,9999); //generate a random numerical digit <= 4 characters
	$slider2Video = strtolower($randomDigit . "_" . $slider2Video); //attach the random digit to the front of uploaded images to prevent overriding files with the same name in the images folder and enhance security
	move_uploaded_file($_FILES['slider2Video']["tmp_name"],"../assests/videos/" . $slider2Video);
	}
	
	if (($_FILES["backgroundAbout"]["type"] == 'image/jpg') ||($_FILES["backgroundAbout"]["type"] == 'image/png') ||($_FILES["backgroundAbout"]["type"] == 'image/jpeg')|| ($_FILES["backgroundAbout"]["type"] == 'image/gif'))
	{
	$randomDigit = rand(0000,9999); //generate a random numerical digit <= 4 characters
	$backgroundAbout = strtolower($randomDigit . "_" . $backgroundAbout); //attach the random digit to the front of uploaded images to prevent overriding files with the same name in the images folder and enhance security
	move_uploaded_file($_FILES['backgroundAbout']['tmp_name'],"../assests/images/" . $backgroundAbout);
	}
	
	if (($_FILES["backgroundWorks"]["type"] == 'image/jpg') || ($_FILES["backgroundWorks"]["type"] == 'image/png') || ($_FILES["backgroundWorks"]["type"] == 'image/jpeg') || ($_FILES["backgroundWorks"]["type"] == 'image/gif'))
	{
	$randomDigit = rand(0000,9999); //generate a random numerical digit <= 4 characters
	$backgroundWorks = strtolower($randomDigit . "_" . $backgroundWorks); //attach the random digit to the front of uploaded images to prevent overriding files with the same name in the images folder and enhance security
	move_uploaded_file($_FILES['backgroundWorks']['tmp_name'],"../assests/images/" . $backgroundWorks);
	}
	//if values are blank use old values.
	
	foreach($result as $row)
	{ 
	
	
	//check if all required fields have data
    	
		if (empty($slider1Video)) 
    	
		{ 
    	$slider1Video=$row['slider1Video'];
    	
		}
    	
		if (empty($slider2Video)) 
    	
		{ 
    	$slider2Video=$row['slider2Video'];
    	
		}
    	
		
		//check if all required fields have data
    	
		if (empty($backgroundAbout)) 
    	
		{ 
    	$backgroundAbout=$row['backgroundAbout'];
    	
		}
    	
		if (empty($backgroundWorks)) 
    	
		{ 
    	$backgroundWorks=$row['backgroundWorks'];
    	
		}
	
	    
	
	}
	
	flag_false();//make other styles not to applied
	
	$result = apply($backgroundColor, $backgroundAbout, $backgroundWorks, $paragraphColor, $headingColor, $paragraphFont, $aboutText, $contactAddress, $contactPhone, $contactEmail, $slider1Video, $slider1Link, $slider2Video, $slider2Link, $date , $flag, $admin);
	
		if($result)
		{
			$_SESSION['success'] = 'New Styles has been applied.';
			redirect('..\admin.php');
		}
		else
		{
			$_SESSION['error'] = 'An error has occurred. Please try again.';
			redirect('..\admin.php');
		}
	
?>