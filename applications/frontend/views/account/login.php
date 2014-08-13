
<div class="well bs-component col-md-6">

	<?php echo alert_box(); ?>
	
	<?php echo form_open(); ?>	

		<?php echo form_group_input('email'); ?>

		<?php echo form_group_password(); ?>

		<div class="row">
			<div class="col-sm-6">
				<?php echo form_checkbox('remember', 'Remember Me'); ?>
			</div>
			<div class="col-sm-6 text-right">
				<a href="<?php echo site_url('account/forgot_password'); ?>">Forgot password?</a>
			</div>
		</div>

		<div class='form-group text-center'>
			Don't have Account? <a href='<?php echo site_url('account/signup'); ?>'>Sign Up</a>
		</div>

		<?php echo form_submit('Login', TRUE); ?>

	<?php echo form_close(); ?>

</div>