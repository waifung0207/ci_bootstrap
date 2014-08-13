<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Controller extends CI_Hooks
{
	/**
	 * Hook: post_controller
	 */
	// add extra information to mViewData
	function add_viewdata()
	{
		$CI =& get_instance();
		$ctrler = $CI->router->fetch_class();

		// fallback when mTitle is not set / empty
		if ( empty($CI->mTitle) )
		{
			// take controller or action name as title
			if ($CI->mAction=='index')
				$CI->mTitle = ucfirst($CI->mCtrler);
			else
				$CI->mTitle = ucfirst($CI->mAction);
		}

		if ($ctrler!='home')
		{
			// add an "active" entry at the end of breadcrumb (based on mTitle)
			$CI->mBreadcrumb[] = array('name' => $CI->mTitle);	
		}
		
		// push to mViewData before rendering
		$CI->mViewData['breadcrumb'] = $CI->mBreadcrumb;

		// render output
		$view_data = empty($CI->mViewData) ? NULL : $CI->mViewData;
		$CI->load->view($CI->mViewFile, $CI->mViewData);
	}
}