<?php 

/**
 * Config file for form validation
 * Reference: https://ellislab.com/codeigniter/user-guide/libraries/form_validation.html
 * (Under section "Creating Sets of Rules")
 */

$config = array(

	// Login form
	'login/index' => array(
		array(
			'field'		=> 'username',
			'label'		=> 'Username',
			'rules'		=> 'required',
		),
		array(
			'field'		=> 'password',
			'label'		=> 'Password',
			'rules'		=> 'required',
		),
	),

	// Update Info form
	'account/update_account' => array(
		array(
			'field'		=> 'full_name',
			'label'		=> 'Full Name',
			'rules'		=> 'required',
		),
	),

	// Change Password form
	'account/change_password' => array(
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
	
	// Reset Password form (for backend users)
	'admin/reset_password' => array(
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
);