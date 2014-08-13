
<div class="row">
<div class="col-md-9 col-md-offset-1">
	<?php echo alert_box(); ?>
</div>
</div>


<div class="row">

	<div class="well col-md-4 col-md-offset-1">

		<legend>Update Info</legend>

		<?php echo form_open('account/update_info'); ?>

			<?php echo form_group_input('first_name', $user['first_name']); ?>

			<?php echo form_group_input('last_name', $user['last_name']); ?>

			<?php echo form_group_input('email', $user['email']); ?>

			<hr/>

			<?php echo form_submit('Confirm'); ?>

		<?php echo form_close(); ?>

	</div>

	<div class="well col-md-4 col-md-offset-1">

		<legend>Change Password</legend>

		<?php echo form_open('account/change_password'); ?>

			<?php echo form_group_password('current_password'); ?>

			<?php echo form_group_password('new_password'); ?>

			<?php echo form_group_password('retype_password'); ?>

			<hr/>

			<?php echo form_submit('Confirm'); ?>

		<?php echo form_close(); ?>

	</div>

</div>