<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Error extends MY_Controller {

	public function index()
	{
		$this->output->set_status_header('404');
		$this->mTitle = "404 Error Page";
		$this->mViewFile = '404';
	}
}