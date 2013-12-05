<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	// Login Form
	public function index()
	{
		$this->mLayout = "empty";
		$this->load->view('login', $this->mViewData);
	}

	// Submission of Login Form
	public function post_login()
	{
		// check login here
		redirect('home');
	}
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */