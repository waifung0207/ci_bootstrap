<?php 

/**
 * Config file for form validation
 * Reference: https://ellislab.com/codeigniter/user-guide/libraries/form_validation.html
 * (Under section "Creating Sets of Rules")
 */

$config = array(

	// Login
	'account/login' => array(
		array(
			'field'		=> 'email',
			'label'		=> 'Email',
			'rules'		=> 'required|valid_email',
		),
		array(
			'field'		=> 'password',
			'label'		=> 'Password',
			'rules'		=> 'required',
		),
	),

	// Sign Up
	'account/signup' => array(
		array(
			'field'		=> 'first_name',
			'label'		=> 'First Name',
			'rules'		=> 'required',
		),
		array(
			'field'		=> 'last_name',
			'label'		=> 'Last Name',
			'rules'		=> 'required',
		),
		array(
			'field'		=> 'email',
			'label'		=> 'Email',
			'rules'		=> 'required|valid_email|is_unique[users.email]',
		),
		array(
			'field'		=> 'password',
			'label'		=> 'Password',
			'rules'		=> 'required|matches[retype_password]',
		),
		array(
			'field'		=> 'retype_password',
			'label'		=> 'Retype Password',
			'rules'		=> 'required',
		),
	),

	// Forgot Password
	'account/forgot_password' => array(
		array(
			'field'		=> 'email',
			'label'		=> 'Email',
			'rules'		=> 'required|valid_email',
		),
	),

	// Reset Password
	'account/reset_password' => array(
		array(
			'field'		=> 'password',
			'label'		=> 'Password',
			'rules'		=> 'required|matches[retype_password]',
		),
		array(
			'field'		=> 'retype_password',
			'label'		=> 'Retype Password',
			'rules'		=> 'required',
		),
	),

	// Update Info
	'account/update_info' => array(
		array(
			'field'		=> 'first_name',
			'label'		=> 'First Name',
			'rules'		=> 'required',
		),
		array(
			'field'		=> 'last_name',
			'label'		=> 'Last Name',
			'rules'		=> 'required',
		),
		array(
			'field'		=> 'email',
			'label'		=> 'Email',
			'rules'		=> 'required|valid_email',
		),
	),

	// Change Password
	'account/change_password' => array(
		array(
			'field'		=> 'current_password',
			'label'		=> 'Current Password',
			'rules'		=> 'required',
		),
		array(
			'field'		=> 'new_password',
			'label'		=> 'New Password',
			'rules'		=> 'required|matches[retype_password]',
		),
		array(
			'field'		=> 'retype_password',
			'label'		=> 'Retype Password',
			'rules'		=> 'required',
		),
	),

);