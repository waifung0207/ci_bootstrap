<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Locale switching
 */
class Locale extends CI_Controller {

	public function set($locale)
	{
		if ( in_array($locale, array('en', 'zh', 'cn')) )
		{
			$this->session->set_userdata('locale', $locale);
			
			$this->load->library('user_agent');
			redirect($this->agent->referrer());
		}
	}
}