<?php
/* Masooma Bakhshi u3168789*/
	//retrieve the functions
	include('../controller/db_connection.php');
	require('../controller/functions_messages.php');
	require('../controller/functions.php');
	//start of session
	session_start();
	//run loop for the associative array's result
		$start=$_GET['start'];
		$result=get_join($start);			
		foreach($result as $row){
	
	?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml">
<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
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
 			<div class="info">
                  <a href="maps.php" class="btn btn-dark" style="float:left; margin:10px 20px;">Back</a>
                  <h1 class="mb-3 mt-3"><?php echo $row['Name']; ?></h1>
                  <p class="mt-3 mb-3" id="controls"><?php echo $row['Des']; ?></p>
                  <div class="row">
                  	
                     <div class="col-md-6" id="map_canvas" style="height: 400px"></div> 
					 <?php if ($row['VRImage']!="") {?>
                     <img class="col-md-6" src="../images/<?php echo $row['VRImage']; ?>" style="height:400px; width:auto"/>
                     <?php } else {?>
                     <div class="col-md-6" id="pano" style="height: 400px;"></div><?php } ?> 
                  </div>   

   <script type="text/javascript">

	 function initialize() {
	   var fenway = new google.maps.LatLng(<?php echo $row['Lat']; ?>,<?php echo $row['Lng']; ?>);
	var mapOptions = {
	  center: fenway,
	  zoom: 20,
	  mapTypeId: google.maps.MapTypeId.ROADMAP
	};
	var map = new google.maps.Map(
		document.getElementById("map_canvas"), mapOptions);
	var panoramaOptions = {
	  position: fenway,
	  pov: {
		heading: <?php echo $row['Heading']; ?>,
		pitch: <?php echo $row['Pitch']; ?>,
		zoom: 1
	  }
	};
	var panorama = new  google.maps.StreetViewPanorama(document.getElementById("pano"),panoramaOptions);
	map.setStreetView(panorama);
	}
<?php } ?>	
	</script>            
   <script async defer
	src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAYNena30I61HQqTlZvfoBTsM2zTySu-hc&callback=initialize">
	</script>
  
		<script src="../src/jquery.wayfinding.js"></script> 
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="../src/modernscript.js"></script>  
</body>
</html>    
