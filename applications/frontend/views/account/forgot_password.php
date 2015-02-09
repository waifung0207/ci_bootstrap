
<div class="well col-md-6">

	<?php echo alert_box(); ?>

	<?php if ( !empty($alert) && $alert['type']=='success' ) { ?>

		<?php echo btn('Back to Login', 'account/login'); ?>

	<?php } else { ?>
	
		<?php echo form_open(); ?>

			<?php echo form_group_input('email'); ?>

			<hr/>

			<?php echo form_submit('Reset Password'); ?>

		<?php echo form_close(); ?>

	<?php } ?>

</div>