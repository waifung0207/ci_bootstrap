
<nav class="navbar navbar-inverse" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="<?php echo site_url(); ?>">Backend System</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse navbar-ex1-collapse">
			<ul class="nav navbar-nav">
				<li class="<?php if ($ctrler=='home') echo 'active' ?>">
					<a href="<?php echo site_url(); ?>">Home</a>
				</li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<a data-toggle="dropdown" class="dropdown-toggle" href="#"><?php echo $user['fullname']; ?> <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li class="dropdown-header">(To be completed)</li>
						<li><a href="#">Profile</a></li>
						<li class="divider"></li>
						<li><a href="<?php echo site_url('login/Logout'); ?>">Logout</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>  
</nav>