
<?php echo alert_box(); ?>

<div class="row">

	<!-- Account Info -->
	<div class="col-md-6">
		<form role="form" action="<?php echo site_url('account/update_account'); ?>" method="POST">
			<?php echo box_open('Account Info'); ?>
				<div class="form-group">
					<label for="full_name">Full Name</label>
					<input type="text" placeholder="Display Name" id="full_name" class="form-control" name="full_name" value="<?php echo $user['full_name']; ?>">
				</div>
			<?php echo box_close( btn_submit('Update') ); ?>
		</form>
	</div>
	
	<!-- Change Password -->
	<div class="col-md-6">
		<form role="form" action="<?php echo site_url('account/change_password'); ?>" method="POST">
			<?php echo box_open('Change Password'); ?>
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" placeholder="New Password" id="password" name="password" class="form-control">
				</div>
				<div class="form-group">
					<label for="retype_password">Retype Password</label>
					<input type="password" placeholder="Retype Password" id="retype_password" name="retype_password" class="form-control">
				</div>
			<?php echo box_close( btn_submit('Confirm') ); ?>
		</form>
	</div>

</div>