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
		
		// basic URL params
		$this->mCtrler = $this->router->fetch_class();
		$this->mAction = $this->router->fetch_method();
		$this->mParam = $this->uri->segment(3);

		// default values for page output
		$this->mLayout = "default";

		// locale handling
		$this->setup_locale();

		// get user data from session
		if (ENABLED_MEMBERSHIP) {
			$this->mUser = get_user();
			$menu = empty($this->mUser) ? 'menu' : 'menu_member';
		} else {
			$menu = 'menu';
		}

		// setup menu
		$this->config->load($menu);
		$this->mMenu = $this->config->item('menu');

		// setup breadcrumb
		$this->mBreadcrumb = array();
		$this->push_breadcrumb('Home', '', 'home');

		// setup basic view data
		$this->mViewData = array(
			'locale'    => $this->mLocale,
			'ctrler'    => $this->mCtrler,
			'action'    => $this->mAction,
			'menu'		=> $this->mMenu
		);

		if (ENABLED_MEMBERSHIP) {
			$this->mViewData['user'] = $this->mUser;
		}
	}

	/**
	 * Language handling
	 */
	protected function setup_locale()
	{
		// check locale from session, or default value
		$locale = $this->session->userdata('locale');

		if ( empty($locale) )
		{
			$locale = $this->config->item('language');
			$this->session->set_userdata('locale', $locale);
		}

		// load base locale file
		$this->lang->load('general', $locale);
		
		/*
		// Example: load locale file based on current controller
		if ( file_exists(APPPATH.'language/'.$locale.'/'.$CI->mCtrler.'_lang.php') )
		{
		    $CI->lang->load($CI->mCtrler, $locale);    
		}
		*/

		$this->mLocale = $locale;
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