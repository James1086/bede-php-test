<div class="wrapper">
	<div class="container-fluid">
		<div class="row">
				<h1>Casinos</h1>
				<?php
					$result = $conn->query("SELECT * FROM casinos");
				
					echo "
					<div class='table-responsive'>          
						<table class='table table-hover'>
							<thead>
								<tr>
									<th>Name</th>
									<th>Location</th>
									<th>Opening Hours</th>
									<th class='center-text'>View</th>
								</tr>
							</thead><tbody>";
					while($row = mysqli_fetch_array($result)) {
						echo "<tr>";
						echo "<td>".$row['name']. "</td>";
						echo "<td>".$row['location']. "</td>";
						echo "<td>".$row['opening']. "</td>";
						echo "<td class='center-text'><a href='http://" . SITE_URL . "/casino?id=" . $row['id'] . "'><i class='fa fa-search'></i></a></td>";
						echo "</tr>";
					}
					echo "</tbody></table></div>"; ?>
		</div>
	</div>
</div>