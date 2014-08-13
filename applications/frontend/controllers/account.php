<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends MY_Controller {

	public function signup()
	{
		$this->mTitle = "Sign Up";
		$this->mViewFile = 'account/signup';

		if ( validate_form() )
		{
			
		}
	}

	public function login()
	{
		$this->mTitle = "Login";
		$this->mViewFile = 'account/login';
		
		if ( validate_form() )
		{

		}
	}

	public function forgot_password()
	{
		$this->mTitle = "Forgot Password";
		$this->mViewFile = 'account/forgot_password';
		
		if ( validate_form() )
		{

		}
	}

	public function logout()
	{
		set_alert('success', 'Successfully logout.');
		redirect('account/login');
		exit;
	}
}