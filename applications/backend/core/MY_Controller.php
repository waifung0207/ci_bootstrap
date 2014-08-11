<?php

/**
 * Base Controller with functions for CRUD operations
 */
class MY_Controller extends CI_Controller
{
	/**
	 * Constructor with common logic for pages that required login
	 */
	public function __construct()
	{
		parent::__construct();
		
		// redirect to Login page if user not logged in
		$this->mUser = get_user();
		if ( empty($this->mUser) )
		{
			redirect('login');
			exit;
		}

		// basic URL params
		$this->mCtrler = $this->router->fetch_class();
		$this->mAction = $this->router->fetch_method();
		$this->mParam = $this->uri->segment(3);

		// Use default language if the Backend System only support single locale	
		$this->mLocale = $this->config->item('language');

		// default values for page output
		$this->mLayout = "default";

		// switch theme by login user roles
		$this->mTheme = verify_role('admin') ? 'skin-black' : 'skin-blue';

		// side menu items
		$this->config->load('menu');
		$this->mMenu = $this->config->item('menu');

		// breadcrumb entries
		$this->mBreadcrumb = array();
		$this->push_breadcrumb('Home', '', 'home');

		// default page title
		$this->mTitle = 

		// setup basic view data
		$this->mViewData = array(
			'locale'    => $this->mLocale,
			'ctrler'    => $this->mCtrler,
			'action'    => $this->mAction,
			'user'      => $this->mUser,
			'menu'		=> $this->mMenu
		);
	}

	/**
	 * Protected function to be called by children
	 */
	// add breadcrumb entry
	protected function push_breadcrumb($name, $url, $icon = '')
	{
		$icon = empty($icon) ? '' : 'fa fa-'.$icon;		
		$this->mBreadcrumb[] = array(
			'name'  => $name,
			'url'   => site_url($url),
			'icon'	=> $icon,
		);
	}
	
	// Grocery CRUD
	// Reference: http://www.grocerycrud.com/image-crud
	function enable_crud($table = '')
	{
		// get config file
		$this->config->load('crud');
		$params = $this->config->item('grocery_crud');

		// create CRUD object
		$this->load->library('grocery_CRUD');
		$crud = new grocery_CRUD();

		// basic settings
		if ( !empty($table) )
		{
			$crud->set_table($table);
			$crud->set_subject(humanize(singular($table)));
		}

		// general settings
		$crud->unset_jquery();
		$crud->unset_print();
		$crud->unset_export();

		// hide fields from CRUD form
		$crud->unset_fields($params['unset_fields']);
		
		// other custom logic to be done in child controllers
		return $crud;
	}

	// Image CRUD
	// Reference: http://www.grocerycrud.com/image-crud
	function enable_image_crud($table = 'photos', $url_field = '', $upload_path = '', $order_field = 'pos', $title_field = '')
	{
		// get config file
		$this->config->load('crud');
		$params = $this->config->item('image_crud');

		// create CRUD object
		$this->load->library('image_CRUD');
		$crud = new image_CRUD();

		// basic settings
		$crud->set_table($table);

		// [Required] field name of image path (e.g. "image_url")
		$url_field = empty($url_field) ? $params['url_field'] : $url_field;
		$crud->set_url_field($url_field);

		// [Required] if "upload_path" parameter is empty, map to subfolder with <table> name, e.g. "assets/uploads/photos"
		$upload_path = empty($upload_path) ? $params['upload_dir'].$table : $params['upload_dir'].$upload_path;
		$crud->set_image_path($upload_path);

		// [Optional] field name of image order (e.g. "pos")
		if ( !empty($order_field) )
		{
			$crud->set_ordering_field($order_field);
		}
		else if ( empty($order_field) && !empty($params['order_field']) )
		{
			$crud->set_ordering_field($params['order_field']);
		}

		// [Optional] field name of image caption (e.g. "caption")
		if ( !empty($title_field) )
		{
			$crud->set_title_field($title_field);
		}
		else if ( empty($title_field) && !empty($params['title_field']) )
		{
			$crud->set_title_field($params['title_field']);
		}

		// other custom logic to be done in child controllers
		return $crud;
	}
}