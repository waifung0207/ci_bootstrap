<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Example extends CI_Controller {

	public function demo($num)
	{
		$this->mTitle = "Demo ".$num;
		$this->mViewFile = 'example';
	}
}