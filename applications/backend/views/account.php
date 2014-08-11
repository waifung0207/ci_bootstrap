
<?php echo alert_box(); ?>

<div class="row">

	<!-- Account Info -->
	<div class="col-md-6">
		<?php echo form_open('account/update_account'); ?>
			<?php echo box_open('Account Info'); ?>
				<?php echo form_group_input('full_name', $user['full_name']); ?>
			<?php echo box_close( btn_submit('Update') ); ?>
		<?php echo form_close(); ?>
	</div>
	
	<!-- Change Password -->
	<div class="col-md-6">
		<?php echo form_open('account/change_password'); ?>
			<?php echo box_open('Change Password'); ?>
				<?php echo form_group_password('password', 'New Password'); ?>
				<?php echo form_group_password('retype_password'); ?>
			<?php echo box_close( btn_submit('Confirm') ); ?>
		<?php echo form_close(); ?>
	</div>

</div>