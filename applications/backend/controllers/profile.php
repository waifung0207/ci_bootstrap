<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function index()
	{
		$this->mTitle = "Profile";
		$this->load->view('profile', $this->mViewData);
	}
}

/* End of file profile.php */
/* Location: ./application/controllers/profile.php */