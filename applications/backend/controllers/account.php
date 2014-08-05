<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends CI_Controller {

	public function index()
	{
		$this->mTitle = "Account Settings";
		$this->mViewFile = 'account';
	}

	/**
	 * Submission of Account Update form
	 */
	public function update_account()
	{
		$post_data = $this->input->post();

		// custom logic here (e.g. validation, save to database)

		// return with message
		set_alert('success', 'Account info updated.');
		redirect('account');
	}

	/**
	 * Submission of Change Password form
	 */
	public function change_password()
	{
		$post_data = $this->input->post();
		$password = $post_data['password'];
		$retype_password = $post_data['retype_password'];

		// custom logic here (e.g. validation, save to database)
		if (empty($password) || empty($retype_password))
		{
			// warning
			set_alert('warning', 'Password cannot be empty.');
		}
		else if ($password != $retype_password)
		{
			// error
			set_alert('danger', 'Passwords not match.');
		}
		else
		{
			// success
			set_alert('success', 'Password changed successfully.');
		}
		
		redirect('account');
	}
	
	/**
	 * Logout user
	 */
	public function logout()
	{
		$this->session->unset_userdata('user');
		redirect('login');
	}
}

/* End of file account.php */
/* Location: ./application/controllers/account.php */