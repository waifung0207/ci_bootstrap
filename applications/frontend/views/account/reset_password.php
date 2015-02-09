
<div class="well col-md-6">

	<?php echo alert_box(); ?>
	
	<?php echo form_open(); ?>

		<?php echo form_group_password('password', 'New Password'); ?>

		<?php echo form_group_password('retype_password'); ?>

		<hr/>

		<?php echo form_submit('Confirm'); ?>

	<?php echo form_close(); ?>

</div>