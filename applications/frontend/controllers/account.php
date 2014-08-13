<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model', 'users');
		$this->load->helper('email');
	}

	// Account Dashboard / Home
	public function index()
	{
		$this->mTitle = "Account";
		$this->mViewFile = 'account/index';
	}

	// Sign Up
	public function signup()
	{
		$this->mTitle = "Sign Up";
		$this->mViewFile = 'account/signup';

		if ( validate_form() )
		{
			$user_data = elements(['first_name', 'last_name', 'email', 'password'], $this->input->post());
			$user_data['password'] = hash_pw($user_data['password']);
			$user_data['activation_code'] = generate_activation_code();

			// confirm to create user
			$user_id = $this->users->insert($user_data);

			if ( !empty($user_id) )
			{
				// get newly created user (with activation code)
				$user = $this->users->get($user_id);

				// send activation email (make sure config/email.php is properly set first)
				/*
				$to_name = $user['first_name'].' '.$user['last_name'];
				$subject = 'Account Activation';
				send_email($user['email'], $to_name, $subject, 'signup', $user);
				*/

				// redirect with success message
				set_alert('success', 'Thanks for signing up! You will receive a email shortly to activate your account.');
				redirect('account/login');
			}

			// failed
			set_alert('danger', 'Cannot create user');
			redirect('signup');
		}
	}

	// Login
	public function login()
	{
		$this->mTitle = "Login";
		$this->mViewFile = 'account/login';
		
		if ( validate_form() )
		{
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$user = $this->users->get_by([
				'email'		=> $email,
				'active'	=> 1
			]);

			// "remember me"
			if ( $this->input->post('remember') )
			{
				$this->session->sess_expire_on_close = FALSE;
				$this->session->sess_update();
			}

			// check password
			if ( verify_pw($password, $user['password']) )
			{
				// limited fields to store in session
				$fields = array('id', 'role', 'first_name', 'last_name', 'created_at');
				$user_data = elements($fields, $user);
				login_user($user_data);

				// success
				set_alert('success', 'Login success.');
				redirect('home');
				exit;
			}

			// failed
			$this->session->set_flashdata('form_fields', ['email' => $email]);
			set_alert('danger', 'Invalid Login');
			redirect('account/login');
		}
	}

	// Account activation
	public function activate($code)
	{
		$user = $this->users->get_by([
			'activation_code' 	=> $code,
			'active'			=> 0
		]);

		// user found
		if ( !empty($user) )
		{
			// change user status
			$this->users->update($user['id'], ['active' => 1]);

			// (optional) send welcome email
			//$to_name = $user['first_name'].' '.$user['last_name'];
			//$subject = 'Welcome';
			//send_email($user['email'], $to_name, $subject, 'welcome', $user);

			// success
			set_alert('success', 'Account activated! Please login your account to continue.');
			redirect('account/login');
			exit;
		}

		// failed
		set_alert('danger', 'Invalid Code');
		redirect('account/login');
	}

	// Forgot Password
	public function forgot_password()
	{
		$this->mTitle = "Forgot Password";
		$this->mViewFile = 'account/forgot_password';
		
		if ( validate_form() )
		{

		}
	}

	// Reset Password
	public function reset_password($code)
	{
		$this->mTitle = "Reset Password";
		$this->mViewFile = 'account/reset_password';
	}

	// Logout
	public function logout()
	{
		logout_user();
		set_alert('success', 'Successfully logout.');
		redirect('account/login');
		exit;
	}
}