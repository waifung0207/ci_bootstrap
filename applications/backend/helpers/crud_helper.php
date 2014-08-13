<?php

// Grocery CRUD
// Reference: http://www.grocerycrud.com/image-crud
function generate_crud($table = '')
{
	// get config file
	$CI =& get_instance();
	$CI->config->load('crud');
	$params = $CI->config->item('grocery_crud');

	// create CRUD object
	$CI->load->library('grocery_CRUD');
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
function generate_image_crud($table = 'photos', $url_field = '', $upload_path = '', $order_field = 'pos', $title_field = '')
{
	// get config file
	$CI =& get_instance();
	$CI->config->load('crud');
	$params = $CI->config->item('image_crud');

	// create CRUD object
	$CI->load->library('image_CRUD');
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

	// other custom logic to be done outside
	return $crud;
}