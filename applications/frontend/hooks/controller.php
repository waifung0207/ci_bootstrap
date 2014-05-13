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

		// default values for page output
		$CI->mLayout = "default";

		// load language files
		$CI->mLocale = $this->setup_locale();

		// menu items
		$CI->config->load('menu');
		$CI->mMenu = $CI->config->item('menu');

		// breadcrumb entries
		$CI->mBreadcrumb = $this->setup_breadcrumb($CI->mCtrler, $CI->mAction);
		
		// prepare view data
		$CI->mViewData = array(
			'locale'	=> $CI->mLocale,
			'ctrler'	=> $CI->mCtrler,
			'action'	=> $CI->mAction,
		);
	}

	// add extra information to mViewData
	function add_viewdata()
	{
		$CI =& get_instance();

		// fallback when mTitle is not set / empty
		if ( empty($CI->mTitle) )
		{
			// take controller or action name as title
			if ($CI->mAction=='index')
				$CI->mTitle = ucfirst($CI->mCtrler);
			else
				$CI->mTitle = ucfirst($CI->mAction);
		}

		if ($CI->mTitle!='Home')
		{
			// add an "active" entry at the end of breadcrumb (based on mTitle)
			$CI->mBreadcrumb[] = array('name' => $CI->mTitle);	
		}
		
		// push to mViewData before rendering
		$CI->mViewData['breadcrumb'] = $CI->mBreadcrumb;
		$CI->mViewData['menu'] = $CI->mMenu;

		// render output
		$CI->load->view($CI->mViewFile, $CI->mViewData);
	}

	// setup locale
    private function setup_locale()
    {
        $CI =& get_instance();

        // check locale from session, or default value
        $locale = $CI->session->userdata('locale');

        if ( empty($locale) )
        {
            $locale = $CI->config->item('language');
            $CI->session->set_userdata('locale', $locale);
        }

        // [Optional] load global locale file
        //$CI->lang->load('general', $locale);
        
        /*
        // [Optional] load locale file based on current controller
        if ( file_exists(APPPATH.'language/'.$locale.'/'.$CI->mCtrler.'_lang.php') )
        {
            $CI->lang->load($CI->mCtrler, $locale);    
        }*/
        
        return $locale;
    }

	// setup basic breadcrumb entries
	private function setup_breadcrumb($ctrler, $action)
	{
		$breadcrumb = array();

		// 1st level: home
		$breadcrumb[] = array(
			'name'	=> 'Home',
			'url'	=> site_url(),
			'icon'	=> ICON_HOME,
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