<?php
/* Masooma Bakhshi u3168789*/
	//retrieve the functions
	include('controller/db_connection.php');
	require('controller/functions_messages.php');
	require('controller/functions.php');
	//start of session
	session_start();
	//run loop for the associative array's result
	foreach($result as $row){  
	?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>TAFE PATH</title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width">
		<link rel="stylesheet" href="styles/css.css">
	</head>
	<body>
		<div id="content">
                <div id="myMaps">
                </div>  
                <div id="controls">
                    <label>Show</label>
                    <button id="floor1">Buildings</button>
                    <button id="floor2">H 1st Floor</button>
                    <label for="beginSelect">Begin Route at</label>
                    <select id="beginSelect">
                        <option value="A">A</option>
                        <option value="H">H</option>
                        <option value="RH1001">RH1001</option>
                    </select>
                    <label for="endSelect">Show Route to</label>
                    <select id="endSelect">
                        <option value="Lobby">lobby</option>
                        <option value="RH1001">RH1001</option>
                        <option value="C">C</option>
                        <option value="H">H</option>
                    </select>
                </div>
		</div>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
		<script src="src/jquery.wayfinding.js"></script>

		<script>
			$(document).ready(function () {
				'use strict';
				$('#myMaps').wayfinding({
					'maps': [
						{'path': 'Maps/buildings.svg', 'id': 'floor1'},
						{'path': 'Maps/Hfloor1.svg', 'id': 'floor2'}
					],
					'path': {
						width: 3,
						color: '#FFFF00',
						radius: 8,
						speed: 8
					},
					'startpoint': function () {
						return 'Translink';
					},
					'defaultMap': 'floor1',
					'showLocation': true
				}, function(){
					console.log('callback reached');
				});

				//make the floor buttons clickable
				$('#controls button').click(function () {
					$('#myMaps').wayfinding('currentMap', $(this).prop('id'));
				});

				$('#controls #beginSelect').change(function () {
					$('#myMaps').wayfinding('startpoint', $(this).val());
					if ($('#endSelect').val() !== '') {
						$('#myMaps').wayfinding('routeTo', $('#endSelect').val());
					}
				});

				$('#controls #endSelect').change(function () {
					$('#myMaps').wayfinding('routeTo', $(this).val());
				});

				$('#controls #accessible').change(function () {
					if ($('#accessible:checked').val() !== undefined) {
						$('#myMaps').wayfinding('accessibleRoute', true);
					} else {
						$('#myMaps').wayfinding('accessibleRoute', false);
					}
					if ($('#endSelect').val() !== '') {
						$('#myMaps').wayfinding('routeTo', $('#endSelect').val());
					}
				});

				$('#myMaps').on('wayfinding:roomClicked', function(e, r) {
					$('#endSelect option[value="' + r.roomId + '"]').attr('selected', true);
				});
				
				$("#A").click(function(){
					$("H1").style.display = "block";
				});

			});
		</script>
 <?php } ?>        
	</body>
</html>
