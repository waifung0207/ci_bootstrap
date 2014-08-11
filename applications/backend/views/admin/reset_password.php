
<div class="row">
	<div class="col-md-6">
		<?php echo alert_box(); ?>
		<form role="form" action="<?php echo current_url(); ?>" method="POST">
			<?php echo box_open('Reset Password'); ?>
				<p>
					Set a new password for: 
					<strong><?php echo $target['full_name']; ?></strong>
				</p>
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" placeholder="New Password" id="password" name="password" class="form-control">
				</div>
				<div class="form-group">
					<label for="retype_password">Retype Password</label>
					<input type="password" placeholder="Retype Password" id="retype_password" name="retype_password" class="form-control">
				</div>
			<?php echo box_close( btn_submit() ); ?>
		</form>
	</div>
</div>