
<ul class="nav navbar-nav navbar-right">
	<?php if ( !empty($user) ) { ?>
		<li><a href="<?php echo site_url('account'); ?>">Welcome, <?php echo $user['first_name']; ?></a></li>
		<li><a href="<?php echo site_url('account/logout'); ?>">Logout</a></li>
	<?php } ?>
	<li class="dropdown">
		<a data-toggle='dropdown' class='dropdown-toggle' href='#'><i class="fa fa-globe"></i></a>
		<ul role='menu' class='dropdown-menu'>
			<li><a href="<?php echo site_url('locale/set/en'); ?>">English</a></li>
			<li><a href="<?php echo site_url('locale/set/zh'); ?>">繁體中文</a></li>
			<li><a href="<?php echo site_url('locale/set/cn'); ?>">简体中文</a></li>
		</ul>
	</li>
</ul>