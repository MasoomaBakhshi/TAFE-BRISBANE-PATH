
$(document).ready(function() {
	'use strict';
	var start="Translink";
	var end="Translink";
	setTimeout(function(){
		$('body').addClass('loader');
	}, 2000);
				$('#myMaps').wayfinding({
					'maps': [
						{'path': '../Maps/buildings.svg', 'id': 'floor1'},
						{'path': '../Maps/Hfloor1.svg', 'id': 'floor2'},
						{'path': '../Maps/Hfloor2.svg', 'id': 'floor3'},
						{'path': '../Maps/Hfloor3.svg', 'id': 'floor4'},
						{'path': '../Maps/Hfloor4.svg', 'id': 'floor5'},
						{'path': '../Maps/Hfloor5.svg', 'id': 'floor6'}
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
					start=$('#beginSelect').val();
										
					$('#myMaps').wayfinding('startpoint', $(this).val());
					if ($('#endSelect').val() !== '') {
						$('#myMaps').wayfinding('routeTo', $('#endSelect').val());
					}
				});

				$('#controls #endSelect').change(function () {
					end=$('#endSelect').val();
					
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
					end=r.roomId;
					
					$('#endSelect option[value="' + r.roomId + '"]').attr('selected', true);
				});
				
				$('#preview1').click(function()
				{
					$.ajax ( {
					type: "POST",
					url: "detail.php",
					data: {
						start: start,
						end:end
						},
					dataType:"text",
					cache: false,
					success: function(data)
					{
						console.log(start+end);
						window.location = "detail.php?start="+start;
					}
					} );
				})
				
				$('#preview2').click(function()
				{
					$.ajax ( {
					type: "POST",
					url: "End-detail.php",
					data: {
						start: start,
						end:end
						},
					dataType:"text",
					cache: false,
					success: function(data)
					{
						console.log(start+end);
						window.location = "End-detail.php?end="+end;
					}
					} );
				})
						
});

