<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends CI_Controller {

	public function signup()
	{
		$this->mTitle = "Sign Up";
		$this->mViewFile = 'account/signup';

		//$this->load->library('form_validation');
		//$this->form_validation->set_rules('first_name');
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