<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$this->mTitle = "Home";
		$this->mLayout = "sidebar_left";
		$this->load->view('home', $this->mViewData);
	}
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */