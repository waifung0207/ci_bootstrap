<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	// Login Form
	public function index()
	{
		$this->mLayout = "empty";
		$this->mTheme = 'login-page';
		$this->mViewFile = 'login';
		
		if ( validate_form() )
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$this->load->model('Backend_user_model', 'backend_users');
			$user = $this->backend_users->get_by('username', $username);

			// only admin and staff can login
			if ( verify_role(['admin', 'staff'], $user) )
			{
				// password correct
				if ( verify_pw($password, $user['password']) )
				{
					// limited fields to store in session
					$fields = array('id', 'role', 'username', 'full_name', 'created_at');
					$user_data = elements($fields, $user);					
					login_user($user);

					// success
					set_alert('success', 'Login success');
					redirect('home');
					exit;
				}
			}

			// failed
			set_alert('danger', 'Invalid Login');
			redirect('login');
		}
	}
}