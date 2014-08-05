
<div class="form-box" id="login-box">
	<div class="header">Sign In</div>
	<form action="<?php echo site_url('login/post_login'); ?>" method="post">
		<div class="body bg-gray">
			<?php echo alert_box(); ?>
			<div class="form-group">
				<input type="text" name="username" class="form-control" placeholder="Username" value="<?php if (ENVIRONMENT=='development') echo ADMIN_USERNAME; ?>" />
			</div>
			<div class="form-group">
				<input type="password" name="password" class="form-control" placeholder="Password" value="<?php if (ENVIRONMENT=='development') echo ADMIN_PASSWORD; ?>" />
			</div>
		</div>
		<div class="footer">
			<button type="submit" class="btn bg-olive btn-block">Sign me in</button>
		</div>
		<hr>
	</form>
</div>

<footer>
	<div class="container">
		<div class="col-lg-12 small text-muted text-center">
			<p>Copyright &copy; 2014</p>
		</div>
	</div>
</footer>