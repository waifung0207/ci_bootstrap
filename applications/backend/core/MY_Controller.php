<?php

/**
 * Base Controller with functions for CRUD operations
 */
class MY_Controller extends CI_Controller
{
	/**
	 * Constructor with common logic for pages that required login
	 */
	public function __construct()
	{
		parent::__construct();

		// redirect to Login page if user not logged in
		$this->mUser = get_user();
		if ( empty($this->mUser) )
		{
			redirect('login');
			exit;
		}

		// basic URL params
		$this->mCtrler = $this->router->fetch_class();
		$this->mAction = $this->router->fetch_method();
		$this->mParam = $this->uri->segment(3);

		// Use default language if the Backend System only support single locale	
		$this->mLocale = $this->config->item('language');

		// default values for page output
		$this->mLayout = "default";

		// switch theme by login user roles
		$this->mTheme = verify_role('admin') ? THEME_ADMIN : THEME_STAFF;

		// side menu items
		$this->config->load('menu_'.$this->mUser['role']);
		$this->mMenu = $this->config->item('menu');

		// breadcrumb entries
		$this->mBreadcrumb = array();
		$this->push_breadcrumb('Home', '', 'home');

		// setup basic view data
		$this->mViewData = array(
			'locale'    => $this->mLocale,
			'ctrler'    => $this->mCtrler,
			'action'    => $this->mAction,
			'user'      => $this->mUser,
			'menu'		=> $this->mMenu
		);
	}

	/**
	 * Protected function to be called by children
	 */
	// add breadcrumb entry
	protected function push_breadcrumb($name, $url, $icon = '')
	{
		$icon = empty($icon) ? '' : 'fa fa-'.$icon;		
		$this->mBreadcrumb[] = array(
			'name'  => $name,
			'url'   => site_url($url),
			'icon'	=> $icon,
		);
	}

}