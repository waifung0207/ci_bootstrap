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
			$user_data['activation_code'] = generate_unique_code();

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
			set_alert('danger', 'Failed to create user.');
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

			if ( !empty($user) )
			{
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
					$fields = array('id', 'role', 'first_name', 'last_name', 'email', 'created_at');
					$user_data = elements($fields, $user);
					login_user($user_data);

					// success
					set_alert('success', 'Login success.');
					redirect('home');
					exit;
				}
			}

			// failed
			$this->session->set_flashdata('form_fields', ['email' => $email]);
			set_alert('danger', 'Invalid Login.');
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
		set_alert('danger', 'Invalid code.');
		redirect('account/login');
	}

	// Forgot Password
	public function forgot_password()
	{
		$this->mTitle = "Forgot Password";
		$this->mViewFile = 'account/forgot_password';
		$this->mViewData['alert'] = get_alert();
		
		if ( validate_form() )
		{
			$email = $this->input->post('email');
			$user = $this->users->get_by([
				'email'		=> $email,
				'active'	=> 1
			]);

			if ( !empty($user) )
			{
				// generate unique code
				$forgot_password_code = generate_unique_code();
				$this->users->update($user['id'], [
					'forgot_password_code'	=> $forgot_password_code,
					'forgot_password_time'	=> date('Y-m-d H:i:s')
				]);

				// send Reset Password email (make sure config/email.php is properly set first)
				/*
				$to_name = $user['first_name'].' '.$user['last_name'];
				$subject = 'Reset Password';
				$user['forgot_password_code'] = $forgot_password_code;
				send_email($user['email'], $to_name, $subject, 'reset_password', $user);
				*/

				// success
				set_alert('success', 'A email is sent to you to reset your password.');
				redirect('account/forgot_password');
				exit;
			}
			else
			{
				// failed
				set_alert('danger', 'No record found.');
				redirect('account/login');
			}
		}
	}

	// Reset Password
	public function reset_password($code)
	{
		$this->mTitle = "Reset Password";
		$this->mViewFile = 'account/reset_password';

		// TODO: check Forgot Password time
		$user = $this->users->get_by([
			'forgot_password_code' 	=> $code,
			'active'				=> 1
		]);

		// invalid Forgot Password code
		if ( empty($user) )
		{
			set_alert('danger', 'Invalid code.');
			redirect('account/login');
			exit;
		}

		// continue form validation
		if ( validate_form('', 'account/reset_password') )
		{
			// change user password
			$password = $this->input->post('password');
			$this->users->update($user['id'], [
				'forgot_password_code'	=> '',
				'forgot_password_time'	=> '',
				'password'				=> hash_pw($password)
			]);

			// (optional) send Password Changed email
			//$to_name = $user['first_name'].' '.$user['last_name'];
			//$subject = 'Password Changed';
			//send_email($user['email'], $to_name, $subject, 'password_changed', $user);

			// success
			set_alert('success', 'Password successfully changed! Please login your account with your new password.');
			redirect('account/login');
		}
	}

	// Update Info (submission from Account Settings page)
	public function update_info()
	{
		if ( validate_form('account') )
		{
			// check POST data
			$update_data = elements(['first_name', 'last_name', 'email'], $this->input->post());

			// check if email is unique (except the login user him/herself)
			$user = $this->users->get_by(['email' => $update_data['email']]);
			if ( !empty($user) && $user['id']!=$this->mUser['id'] )
			{
				set_alert('danger', 'The Email is taken by another user.');
				redirect('account');
				exit;
			}

			// confirm to update account info
			$success = $this->users->update($this->mUser['id'], $update_data);
			if ($success)
			{
				set_alert('success', 'Successfully updated.');
				refresh_user($update_data);
			}
			else
			{
				set_alert('danger', 'Database error.');
			}
		}

		redirect('account');
	}

	// Change Password (submission from Account Settings page)
	public function change_password()
	{
		if ( validate_form('account') )
		{
			// check if current password match the record
			$user = $this->users->get($this->mUser['id']);
			$current_password = $this->input->post('current_password');

			if ( verify_pw($current_password, $user['password']) )
			{
				// change user password
				$new_password = $this->input->post('new_password');
				$success = $this->users->update($this->mUser['id'], ['password' => hash_pw($new_password)]);

				// (optional) send Password Changed email
				//$to_name = $user['first_name'].' '.$user['last_name'];
				//$subject = 'Password Changed';
				//send_email($user['email'], $to_name, $subject, 'password_changed', $user);

				if ($success)
					set_alert('success', 'Password changed successfully.');
				else
					set_alert('danger', 'Database error.');
			}
			else
			{
				set_alert('danger', 'Incorrect current password.');
			}
		}

		redirect('account');
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