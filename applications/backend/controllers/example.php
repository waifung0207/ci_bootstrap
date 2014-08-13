<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Example extends MY_Controller {

	public function index()
	{
		$this->mTitle = "Examples";
		$this->mViewFile = 'example/index';
	}
	
	public function demo($id)
	{
		$this->push_breadcrumb('Examples', 'example');
		$this->mTitle = "Demo ".$id;
		$this->mViewFile = 'example/demo';
		$this->mViewData['back_url'] = 'example';
	}
}