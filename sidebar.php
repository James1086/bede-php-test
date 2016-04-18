<aside class="sidebar-reveal">
<button type="button" data-toggle="offcanvas" data-target=".sidebar-hidden" data-canvas="body">
	<i class="fa fa-chevron-left"></i>
</button>

<div class="sidebar-hidden offcanvas navmenu-fixed-right">
	<form role="form" id="addcasino">
		<h3>Add Casino</h3>
		<div class="form-group">
			<input type="text" class="form-control" id="addcasinoname" name="addcasinoname" placeholder="Casino Name">
		</div>
		<div class="form-group">
			<input type="text" class="form-control" id="addcasinolocation" name="addcasinolocation" placeholder="Postcode">
		</div>
		<div class="form-group">
			<input type="text" class="form-control" id="addcasinoopening" name="addcasinoopening" placeholder="Opening Times">
		</div>
		<button type="submit" class="btn btn-default">Create <i class="fa fa-plus-circle" aria-hidden="true"></i></button>
	</form>
	
<?php
	$paramID = $_GET['id'];
		if( $paramID != '') { ?>
		<form role="form" id="editcasino">
			<h3>Edit Casino</h3>
			<sub>Enter the information you would like to change this casino to.</sub>
			<div class="form-group">
				<input type="text" class="form-control" id="editcasinoname" name="editcasinoname" placeholder="New Casino Name">
			</div>
			<div class="form-group">
				<input type="text" class="form-control" id="editcasinolocation" name="editcasinolocation" placeholder="New Postcode">
			</div>
			<div class="form-group">
				<input type="text" class="form-control" id="editcasinoopening" name="editcasinoopening" placeholder="New Opening Times">
			</div>
			<div class="form-group">
				<input type="hidden" class="form-control" id="casinoidtoedit" name="casinoidtoedit" value="<?php echo $paramID; ?>">
			</div>
			<button type="submit" class="btn btn-default">Edit <i class="fa fa-pencil" aria-hidden="true"></i></button>
		</form>
	<?php } ?>
</div>


</aside>