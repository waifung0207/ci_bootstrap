<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Controller extends CI_Hooks
{
	// set default values
	function setup()
	{
		$CI =& get_instance();

		$CI->mCtrler = $CI->router->fetch_class();
		$CI->mAction = $CI->router->fetch_method();
		$CI->mParam = $CI->uri->segment(3);

		// load language files
		$CI->mLocale = $CI->config->item('language');
		
		// check if user is logged in
		$user = $CI->session->userdata('user');
		if ( empty($user) && $CI->mCtrler!='login' )
		{
			redirect('login');
			return;
		}
		
		// default values for page output
		$CI->mLayout = "default";

		// default theme
		$CI->mTheme = DEFAULT_THEME;
		
		// prepare view data
		$CI->mViewData = array(
			'locale'    => $CI->mLocale,
			'ctrler'    => $CI->mCtrler,
			'action'    => $CI->mAction,
			'user'      => $user,
			'menu'      => $this->setup_menu(),
		);
	}

	// setup menu items
	function setup_menu()
	{
		return array(
			'home' => array(
				'name'      => 'Home',
				'url'       => site_url(),
				'icon'      => 'fa fa-dashboard'
			),

			// Example to add sections with subpages
			'manage' => array(
				'name'      => 'Manage',
				'url'       => site_url('manage'),
				'icon'      => 'fa fa-cog',
				'children'  => array(
					'Users'			=> '#',
					'News'			=> '#',
					'Products'		=> '#',
				)
			),
			// end of example

			'logout' => array(
				'name'      => 'Sign out',
				'url'       => site_url('login/logout'),
				'icon'      => 'fa fa-sign-out'
			),
		);
	}
}