<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Backend_user_model', 'backend_users');
	}

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
		$form_url = 'account';

		if ( validate_form($form_url) )
		{
			// update db
			$data = elements(['full_name'], $this->input->post());
			$result = $this->backend_users->update($this->mUser['id'], $data);

			if ($result)
			{
				// update session user data
				refresh_user($data);
				set_alert('success', 'Account info updated.');
			}
			else
			{
				// unknown database error
				set_alert('danger', 'Update failed.');
			}
		}

		// back to form
		redirect($form_url);
	}

	/**
	 * Submission of Change Password form
	 */
	public function change_password()
	{
		$form_url = 'account';

		if ( validate_form($form_url) )
		{
			// update db
			$password = $this->input->post('password');
			$update_data = ['password' => hash_pw($password)];
			$result = $this->backend_users->update($this->mUser['id'], $update_data);
			
			// success
			set_alert('success', 'Password changed successfully.');
		}

		// back to form
		redirect($form_url);
	}
	
	/**
	 * Logout user
	 */
	public function logout()
	{
		logout_user();
		redirect('login');
	}
}