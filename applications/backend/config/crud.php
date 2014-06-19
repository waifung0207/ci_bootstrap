<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| CRUD
| -------------------------------------------------------------------------
| This file lets you define default parameters to be used in Grocery CRUD
| and Image CRUD.
|
*/


$config['grocery_crud'] = array(

	// [Optional] fields to be omitted from CRUD form
	'unset_fields'	=> array('created_at', 'updated_at')
);


$config['image_crud'] = array(

	// [Required] default field name to store the image path
	'url_field'		=> 'image_url',

	// [Required] base directory of uploaded images (sub-folder to be detected from table name, or set manually afterwards)
	'upload_dir'	=> 'assets/uploads/',

	// [Optional] ordering of images in an album; set empty will disable drag-and-drop ordering
	'order_field'	=> 'pos',

	// [Optional] caption field of each image; set empty will disable the feature
	'title_field'	=> '',
);