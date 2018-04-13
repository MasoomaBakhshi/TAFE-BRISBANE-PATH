<?php
/* Masooma Bakhshi u3168789*/
	//retrieve the functions
	include('../controller/db_connection.php');
	require('../controller/functions_messages.php');
	require('../controller/functions.php');
	//start of session
	session_start();
	?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>TAFE SOUTHBANK MAP</title>
        <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:100,200,300,400,500,600,700,800,900" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="../styles/style.css" type="text/css" rel="stylesheet"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/1.3.4/jquery.fancybox-1.3.4.css" type="text/css" media="screen" 
        
        <!-------------------------favicon------------------->
        <link rel="icon" type="image/png" sizes="192x192"  href="../images/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="../images/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="../images/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="../images/favicon-16x16.png">
        
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	</head>
	<body>
            
		<div class="contain">
                <div id="controls">
                	<h1>GET DIRECTED AROUND TAFE</h1>  
                	<div class="row">
                    	<div class="col-md-6 start">    
                            <label for="beginSelect" class="mt-2"><h3>Start Route at: </h3></label>
                            <select id="beginSelect" name="beginSelect" >
                                    <option value="Translink" selected="selected">Public Transport</option>
								<option disabled="true" class="part">Buildings</option>
                            		<?php $result=get_buildings(); foreach($result as $row) {?>
                                    <option value="<?php echo $row['ID']; ?>"><?php echo $row['Name']; ?></option>
                                    <?php } ?>
                                 <option disabled="true" class="part">Cafes</option>
                            		<?php $result=get_cafes(); foreach($result as $row) {?>
                                    <option value="<?php echo $row['ID']; ?>"><?php echo $row['Name']; ?></option>
                                    <?php } ?>  
                                <option disabled="true" class="part">Class Rooms</option>
                            		<?php $result=get_classes(); foreach($result as $row) {?>
                                    <option value="<?php echo $row['ID']; ?>"><?php echo $row['Name']; ?></option>
                                    <?php } ?> 
                                <option disabled="true" class="part">Offical Locations</option>
                            		<?php $result=get_offices(); foreach($result as $row) {?>
                                    <option value="<?php echo $row['ID']; ?>"><?php echo $row['Name']; ?></option>
                                    <?php } ?>               
                            </select>
                         <button id="preview1" class="btn btn-dark mt-2" ><h4 class="subheading" style="color:#FFFFFF">Start location's detail with VR image</h4></button> 
                        </div>
                        <div class="col-md-6 end">
                            <label for="endSelect" class="mt-2"><h3>End Route at: </h3></label>
                            <select id="endSelect" name="endSelect" >
                                    <option value="Translink" selected="selected">Public Transport</option>
                                <option disabled="true" class="part">Buildings</option>
                            		<?php $result=get_buildings(); foreach($result as $row) {?>
                                    <option value="<?php echo $row['ID']; ?>"><?php echo $row['Name']; ?></option>
                                    <?php } ?> 
                                 <option disabled="true" class="part">Cafes</option>
                            		<?php $result=get_cafes(); foreach($result as $row) {?>
                                    <option value="<?php echo $row['ID']; ?>"><?php echo $row['Name']; ?></option>
                                    <?php } ?> 
                                <option disabled="true" class="part">Class Rooms</option>
                            		<?php $result=get_classes(); foreach($result as $row) {?>
                                    <option value="<?php echo $row['ID']; ?>"><?php echo $row['Name']; ?></option>
                                    <?php } ?> 
                                <option disabled="true" class="part">Offices</option>
                            		<?php $result=get_offices(); foreach($result as $row) {?>
                                    <option value="<?php echo $row['ID']; ?>"><?php echo $row['Name']; ?></option>
                                    <?php } ?> 
                            </select>
                         <button id="preview2" class="btn btn-dark mt-2" ><h4 class="subheading" style="color:#FFFFFF">End location's detail with VR image</h4></button> 
                        </div>    
                    </div>
                    <div class="mapsSec row">
                    	<div class="col-md-2"><H3 style="color:#FFFFFF;">Maps:</H3></div>
                        <div class="col-md-10">
                            <button id="floor1" class="btn btn-dark mt-1"><h4 class="subheading" style="color:#FFFFFF">Buildings</h4></button>
                            <button id="floor2" class="btn btn-dark mt-1"><h4 class="subheading" style="color:#FFFFFF">H 1st Floor</h4></button>
                            <button id="floor3" class="btn btn-dark mt-1"><h4 class="subheading" style="color:#FFFFFF">H 2nd Floor</h4></button>
                            <button id="floor4" class="btn btn-dark mt-1"><h4 class="subheading" style="color:#FFFFFF">H 3rd Floor</h4></button>
                            <button id="floor5" class="btn btn-dark mt-1"><h4 class="subheading" style="color:#FFFFFF">H 4th Floor</h4></button>
                            <button id="floor6" class="btn btn-dark mt-1"><h4 class="subheading" style="color:#FFFFFF">H 5th Floor</h4></button>
                        </div>    
                     </div>     
                </div> 
                <div id="myMaps"> </div>    
            
              </div>                 
</div>
 
      
		<script src="../src/jquery.wayfinding.js"></script> 
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="../src/modernscript.js"></script>
</body>
</html>
