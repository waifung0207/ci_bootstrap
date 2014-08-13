
<div class="well bs-component col-md-6">

	<?php echo alert_box(); ?>

	<?php echo form_open(); ?>

		<?php echo form_group_input('first_name'); ?>

		<?php echo form_group_input('last_name'); ?>

		<?php echo form_group_input('email'); ?>

		<?php echo form_group_password(); ?>

		<?php echo form_group_password('retype_password'); ?>

		<p>By signing up, you agree to our <a href="#">Terms of Use.</a></p>

		<hr/>
		
		<div class='form-group text-center'>
			Have an Account? <a href='<?php echo site_url('account/login'); ?>'>Log In</a>
		</div>

		<?php echo form_submit('Submit', TRUE); ?>

	<?php echo form_close(); ?>

</div>