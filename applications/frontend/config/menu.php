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
		'name'      => 'Home',
		'url'       => site_url(),
		'icon'      => ICON_HOME
	),

	// Example to add sections with subpages
	'example' => array(
		'name'      => 'Examples',
		'url'       => site_url('example'),
		'icon'      => 'fa fa-cog',
		'children'  => array(
			'Demo 1'		=> site_url('example/demo/1'),
			'Demo 2'		=> site_url('example/demo/2'),
			'Demo 3'		=> site_url('example/demo/3'),
		)
	),
	// end of example
);