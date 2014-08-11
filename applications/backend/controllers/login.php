<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	// Login Form
	public function index()
	{
		$this->mLayout = "empty";
		$this->mTheme = 'bg-black';
		$this->mViewFile = 'login';
		
		if ( validate_form() )
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$this->load->model('Backend_user_model', 'backend_users');
			$user = $this->backend_users->get_by('username', $username);

			// only admin and staff can login
			if ( !empty($user) && (in_array($user['role'], ['admin', 'staff'])) )
			{
				// password correct
				if ( verify_pw($password, $user['password']) )
				{
					// success
					$fields = array('id', 'role', 'username', 'full_name', 'created_at');
					$user_data = elements($fields, $user);
					$this->session->set_userdata('user', $user_data);

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