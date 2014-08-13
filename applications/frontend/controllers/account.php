<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends CI_Controller {

	public function signup()
	{
		$this->mTitle = "Sign Up";
		$this->mViewFile = 'account/signup';
	}

	public function login()
	{
		$this->mTitle = "Login";
		$this->mViewFile = 'account/login';
	}

	public function logout()
	{
		$this->mTitle = "Home";
		$this->mViewFile = 'home';
	}
}