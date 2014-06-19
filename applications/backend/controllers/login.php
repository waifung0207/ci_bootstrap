<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	// Login Form
	public function index()
	{
		$this->mLayout = "empty";
		$this->mTheme = 'bg-black';
		$this->mViewData['error_msg'] = $this->session->flashdata('error_msg');
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
			$this->session->set_flashdata('error_msg', 'Invalid Login');
			redirect('login');
		}
	}
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */