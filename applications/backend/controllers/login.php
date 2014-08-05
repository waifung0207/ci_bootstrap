<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	// Login Form
	public function index()
	{
		$this->mLayout = "empty";
		$this->mTheme = 'bg-black';
		$this->mViewFile = 'login';
	}

	// Submission of Login Form
	public function post_login()
	{
		// authenication login here
		if ($_POST['username']==ADMIN_USERNAME && $_POST['password']==ADMIN_PASSWORD)
		{
			// success
			$user = array(
				'fullname' => ADMIN_FULLNAME,
				'username' => ADMIN_USERNAME
			);
			$this->session->set_userdata('user', $user);
			redirect('home');
		}
		else
		{
			// failed
			set_alert('danger', 'Invalid Login');
			redirect('login');
		}
	}
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */