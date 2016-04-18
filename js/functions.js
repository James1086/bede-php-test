$(document).ready(function() {
	$('#loginform').submit(function() {
		$.ajax({
			type: "POST",
			url: 'admin/login.php',
			data: $(this).serialize(),
			success: function(data)
			{
				if (data === 'Login') {
					location.reload(true);
				}
				else {
					alert('Invalid Credentials');
				}
			}
		});
	});
	
	$('#logoutform').submit(function() {
		$.ajax({
			type: "POST",
			url: 'admin/logout.php',
			success: function(data)
			{
				location.reload(true);
			}
		});
	});

	$('#addcasino').submit(function() {
		$.ajax({
			type: "POST",
			url: 'admin/addcasino.php',
			data: $(this).serialize(),
			success: function(data)
			{
				location.reload(true);
			}
		});
	});
	
	$('#editcasino').submit(function() {
		$.ajax({
			type: "POST",
			url: 'admin/editcasino.php',
			data: $(this).serialize(),
			success: function(data)
			{
				location.reload(true);
			}
		});
	});
	
	$('#deletecasino').submit(function() {
		$.ajax({
			type: "POST",
			url: 'admin/deletecasino.php',
			data: $(this).serialize(),
			success: function(data)
			{
				window.location.assign("http://www.nofussdesign.co.uk/casinos")
			}
		});
	});

});