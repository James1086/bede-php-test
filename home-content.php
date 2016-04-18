<div class="wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="row findcasinowrapper">
				<div class="col-sm-6">
					<h1>Find A Casino Near You</h1>
					<p>Enter your postcode to find your closest casino!</p>
				</div>
				<div class="col-sm-6">
					<div class="col-sm-10 searchformwrap">
						<input type="text" class="form-control" id="findpostcode" name="findpostcode" placeholder="Postcode">
					</div>
					<div class="col-sm-2 searchformwrap">
						<button id="submittedpostcode" class="btn btn-warning"><i class="fa fa-search" aria-hidden="true"></i></button>
					</div>
				</div>
			</div>
			<div id="map"></div>
			<?php
	
				$result = $conn->query("SELECT * FROM casinos");
				$phpcasinos = array();
				
				$index = 0;
				while($row = mysqli_fetch_assoc($result)){
					$postcode = preg_replace('/\s+/', '', $row['location']);
					$url = 'https://api.postcodes.io/postcodes/'.$postcode;
					$content = file_get_contents($url);
					$json = json_decode($content, true);

					$phpLat = $json['result']['latitude'];
					$phpLong = $json['result']['longitude'];

					$phpcasinos[$index] = array($row['name'], $phpLat, $phpLong);
					$index++;
				}
			?>
			<script>
			  var map;
				
			  function initMap() {
				  map = new google.maps.Map(document.getElementById('map'), {
					center: new google.maps.LatLng(54.5545794,-1.2580663),
					zoom: 10
				  });
				  
				  setMarkers(map);
			  }
				var casinos = <?php echo json_encode($phpcasinos); ?>;
				
				function setMarkers(map) {
					var image = 'images/marker.png';
				    for (var i = 0; i < casinos.length; i++) {
						var casino = casinos[i];
						var marker = new google.maps.Marker({
						  position: {lat: casino[1], lng: casino[2]},
						  map: map,
						  icon: image,
						  title: casino[0]
						});
					  }
				  }
			  
			  function newLocation(newLat,newLng)
				{
					map.setCenter({
						lat : newLat,
						lng : newLng
					});
					var homeimage = 'images/home.png';
					new google.maps.Marker({
						position: {lat: newLat, lng: newLng},
						icon: homeimage,
						map: map
					});
				}
			
				google.maps.event.addDomListener(window, 'load', initMap);
			</script>
			<script>
				$(document).ready(function ()
				{
					$("#submittedpostcode").on('click', function ()
					{
						var postcode = $( "#findpostcode" ).val().toLowerCase().replace(/ /g,"");
						var postcodeURL = "https://api.postcodes.io/postcodes/" + postcode;
						$.getJSON( postcodeURL ).then(function(data) {
							var getLat = data.result.latitude;
							var getLng = data.result.longitude;
							newLocation(getLat,getLng);
						});
						
					});
				});
			</script>
			<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDdTYxOkniNFEN3gQnKC5h00JgooTZup0E&callback=initMap" async defer></script>
		</div>
	</div>
</div>