<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function index()
	{
		$this->mTitle = "Profile";
		$this->mViewFile = 'profile';
	}
}

/* End of file profile.php */
/* Location: ./application/controllers/profile.php */