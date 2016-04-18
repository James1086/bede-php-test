<div>
	<?php
		$page_slug = trim($_SERVER['REQUEST_URI'], '/');
		$id = parse_str($page_id);
		if ($page_slug == '') {
			$page_slug = 'home';
		}
		if (isset($_GET['id'])) {
			$page_slug = 'project';
		}
		if ($page_slug == 'dashboard' && $_SESSION['myusername'] == '') {
			require("admin/login.php");
		} else {
			$result = $conn->query("SELECT * FROM pages WHERE slug='$page_slug'");
			if (mysqli_num_rows($result) == 0) {
				// header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");
				include('404.php');;
			} else {
				$row = mysqli_fetch_assoc($result);
				print '<h1>' . $row['title'] . '</h1>';
				print '<p>' . $row['content'] . '</p>';
			};
		}
	?>
</div>