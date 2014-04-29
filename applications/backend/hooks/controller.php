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
		$CI->mUser = $CI->session->userdata('user');
		if ( empty($CI->mUser) && $CI->mCtrler!='login' )
		{
			redirect('login');
			return;
		}
		
		// default values for page output
		$CI->mLayout = "default";

		// default theme
		$CI->mTheme = DEFAULT_THEME;

		// only for pages after login
		if ($CI->mCtrler!='login')
		{
			// menu items
			$CI->mMenu = $this->setup_menu();

			// breadcrumb entries
			$CI->mBreadcrumb = $this->setup_breadcrumb($CI->mCtrler, $CI->mAction);

			// setup basic view data
			$CI->mViewData = array(
				'locale'    => $CI->mLocale,
				'ctrler'    => $CI->mCtrler,
				'action'    => $CI->mAction,
				'user'      => $CI->mUser,
				'menu'		=> $CI->mMenu
			);
		}
	}

	// add extra information to mViewData
	function add_viewdata()
	{
		$CI =& get_instance();

		// only for pages after login
		if ($CI->mCtrler!='login')
		{
			if ($CI->mTitle!='Home')
			{
				// add an "active" entry at the end of breadcrumb (based on mTitle)
				$CI->mBreadcrumb[] = array('name' => $CI->mTitle);	
			}

			// push to mViewData before rendering
			$CI->mViewData['breadcrumb'] = $CI->mBreadcrumb;
		}

		// render output
		$CI->load->view($CI->mViewFile, $CI->mViewData);
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

			'logout' => array(
				'name'      => 'Sign out',
				'url'       => site_url('login/logout'),
				'icon'      => 'fa fa-sign-out'
			),
		);
	}

	// setup basic breadcrumb entries
	private function setup_breadcrumb($ctrler, $action)
	{
		$breadcrumb = array();

		// 1st level: home
		$breadcrumb[] = array(
			'name'	=> 'Home',
			'icon'	=> 'fa fa-dashboard',
			'url'	=> site_url()
		);

		// other child entries (non-active): add custom child entries inside controller methods as below
		/*
		$this->mBreadcrumb[] = array(
			'name'	=> 'Setting',
			'icon'	=> 'fa fa-cog',
			'url'	=> site_url('setting')
		);*/

		return $breadcrumb;
	}
}