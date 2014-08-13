<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {

	public function index()
	{
		$this->mLayout = "home";
		$this->mTitle = "Home";
		$this->mViewFile = 'home';
	}
}