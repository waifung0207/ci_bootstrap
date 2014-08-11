
<div class="row">
	<div class="col-md-6">

		<?php echo alert_box(); ?>

		<?php echo form_open(); ?>
			<?php echo box_open('Reset Password'); ?>
				<p>Set a new password for: <strong><?php echo $target['full_name']; ?></strong></p>
				<?php echo form_group_password('password', 'New Password'); ?>
				<?php echo form_group_password('retype_password'); ?>
			<?php echo box_close( btn_submit('Confirm') ); ?>
		<?php echo form_close(); ?>

	</div>
</div>