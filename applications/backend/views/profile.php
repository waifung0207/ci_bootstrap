
<?php
	if ( !empty($result_type) )
	{
		$this->load->view('_partial/result_alert');
	}
?>

<div class="row">

	<!-- Account Info -->
	<div class="col-md-6">
		<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title">Account Info</h3>
			</div>
			<form role="form" action="<?php echo site_url('profile/update_account'); ?>" method="POST">
				<div class="box-body">
					<div class="form-group">
						<label for="fullname">Full Name</label>
						<input type="text" placeholder="Display Name" id="fullname" class="form-control" value="<?php echo $user['fullname']; ?>">
					</div>
				</div>
				<div class="box-footer">
					<button class="btn btn-primary" type="submit">Update</button>
				</div>
			</form>
		</div>
	</div>

	<!-- Change Password -->
	<div class="col-md-6">
		<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title">Change Password</h3>
			</div>
			<form role="form" action="<?php echo site_url('profile/change_password'); ?>" method="POST">
				<div class="box-body">
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" placeholder="New Password" id="password" class="form-control">
					</div>
					<div class="form-group">
						<label for="retype_password">Retype Password</label>
						<input type="password" placeholder="Retype Password" id="retype_password" class="form-control">
					</div>
				</div>
				<div class="box-footer">
					<button class="btn btn-primary" type="submit">Confirm</button>
				</div>
			</form>
		</div>
	</div>

</div>