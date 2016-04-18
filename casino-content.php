<div class="wrapper">
	<div class="container-fluid">
			<?php
				$paramID = $_GET['id'];
				$result = $conn->query("SELECT * FROM casinos WHERE id='$paramID'");
				
				while($row = mysqli_fetch_array($result)) { ?>
				
				<div class="row">
					<div class="col-sm-6">
						<?php
							echo "<h1>".$row['name']. "</h1>";
							echo "<p>".$row['location']. "</p>";
							echo "<p>".$row['opening']. "</p>";
						?>
						
						<?php if($_SESSION['mystatus'] == 'admin') { ?>
							<form role="form" id="deletecasino">
								<input type="hidden" id="deleteId" name="deleteId" value="<?php echo $row['id']; ?>">
								<button type="submit" class="btn btn-danger">Delete <i class="fa fa-trash" aria-hidden="true"></i></button>
							</form>
						<?php } ?>
					</div>
					<div class="col-sm-6">
					
					    <?php
	
	$postcode = preg_replace('/\s+/', '', $row['location']);
	$url = 'https://api.postcodes.io/postcodes/'.$postcode;
	$content = file_get_contents($url);
	$json = json_decode($content, true);
	?>
    <div id="map"></div>
	<?php
		$phpLat = $json['result']['latitude'];
		$phpLong = $json['result']['longitude'];
	?>
    <script>
	  var jLat = <?php echo json_encode($phpLat); ?>;
	  var jlong = <?php echo json_encode($phpLong); ?>;
      var map;
      function initMap() {
		var myLatLng = {lat: jLat, lng: jlong};
        map = new google.maps.Map(document.getElementById('map'), {
          center: myLatLng,
          zoom: 10
        });
		setMarkers(map);
      }
	  
	  function setMarkers(map) {
			var marker = new google.maps.Marker({
			  position: {lat: jLat, lng: jlong},
			  map: map,
			});
	  }

	   
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDdTYxOkniNFEN3gQnKC5h00JgooTZup0E&callback=initMap" async defer></script>
	</div>
				</div>
				
				<?php } ?>
	</div>
</div>