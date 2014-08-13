
<?php if ( !empty($user) ) { ?>
<ul class="nav navbar-nav navbar-right">
	<li><a href="<?php echo site_url('account'); ?>">Welcome, <?php echo $user['first_name']; ?></a></li>
	<li><a href="<?php echo site_url('account/logout'); ?>">Logout</a></li>
</ul>
<?php } ?>