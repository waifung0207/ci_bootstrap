<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Menu
| -------------------------------------------------------------------------
| This file lets you define navigation menu items on sidebar.
|
*/

$config['menu'] = array(

	'home' => array(
		'name'      => lang('home'),
		'url'       => site_url(),
		'icon'      => 'fa fa-home'
	),

	// Example to add sections with subpages
	'example' => array(
		'name'      => lang('example'),
		'url'       => site_url('example'),
		'icon'      => 'fa fa-cog',
		'children'  => array(
			lang('example').'1'		=> site_url('example/demo/1'),
			lang('example').'2'		=> site_url('example/demo/2'),
			lang('example').'3'		=> site_url('example/demo/3'),
		)
	),
	// end of example
);

if (ENABLED_MEMBERSHIP)
{
	$config['menu']['signup'] = array(
		'name'      => lang('sign_up'),
		'url'       => site_url('account/signup'),
		'icon'      => 'fa fa-plus-square',
	);

	$config['menu']['login'] = array(
		'name'      => lang('login'),
		'url'       => site_url('account/login'),
		'icon'      => 'fa fa-sign-in',
	);
}