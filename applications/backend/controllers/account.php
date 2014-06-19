<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends CI_Controller {

	public function index()
	{
		$this->mViewData['result_type'] = $this->session->flashdata('result_type');
		$this->mViewData['result_msg'] = $this->session->flashdata('result_msg');

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
		$this->session->set_flashdata('result_type', 'success');
		$this->session->set_flashdata('result_msg', 'Account info updated.');
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
			$this->session->set_flashdata('result_type', 'warning');
			$this->session->set_flashdata('result_msg', 'Password cannot be empty.');
		}
		else if ($password != $retype_password)
		{
			// error
			$this->session->set_flashdata('result_type', 'danger');
			$this->session->set_flashdata('result_msg', 'Passwords not match.');
		}
		else
		{
			// success
			$this->session->set_flashdata('result_type', 'success');
			$this->session->set_flashdata('result_msg', 'Password changed successfully.');
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