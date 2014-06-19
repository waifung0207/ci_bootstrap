
<header class="header">

	<a href="<?php echo site_url(); ?>" class="logo">
		Backend System
	</a>

	<nav class="navbar navbar-static-top" role="navigation">
		<a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</a>
		<div class="navbar-right">
			<ul class="nav navbar-nav">
				<li class="dropdown user user-menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="fa fa-user"></i>
						<span><?php echo $user['fullname']; ?> <i class="caret"></i></span>
					</a>
					<ul class="dropdown-menu">
						<li class="user-header bg-light-blue">
							<p><?php echo $user['fullname']; ?></p>
						</li>
						<li class="user-footer">
							<div class="pull-left">
								<a href="<?php echo site_url('account'); ?>" class="btn btn-default btn-flat">Account</a>
							</div>
							<div class="pull-right">
								<a href="<?php echo site_url('account/logout'); ?>" class="btn btn-default btn-flat">Sign out</a>
							</div>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</nav>

</header>