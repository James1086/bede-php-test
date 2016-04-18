<header>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="<?php echo 'http://' . SITE_URL . '/'; ?>">Casino</a>
			</div>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right">
					<?php if($_SESSION['myusername'] != '') { ?>
						<li><p class="navbar-text">Hi, <?php echo $_SESSION['myusername']; ?></p></li>
					<?php } ?>					
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Actions <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="<?php echo 'http://' . SITE_URL . '/'; ?>">Home</a></li>
								<li><a href="<?php echo 'http://' . SITE_URL . '/casinos'; ?>">Casinos</a></li>
							</ul>
						</li>

				
				<?php if($_SESSION['myusername'] != '') { ?>
					<form class="navbar-form navbar-right" id="logoutform" method="post">
						<button type="submit" class="btn btn-default head-login-btn ">Logout</button>
					</form>
				<?php } else { ?>
					<form class="navbar-form navbar-right" id="loginform" method="post">
						<div class="form-group">
							<input type="text" name="username" id="username" class="form-control" placeholder="Username">
							<input type="password" name="password" id="password" class="form-control" placeholder="Password">
						</div>
						<button type="submit" class="btn btn-default head-login-btn ">Login &raquo;</button>
					</form>
				<?php } ?>
			
				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>
</header>