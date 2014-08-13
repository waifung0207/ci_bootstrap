<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	http://codeigniter.com/user_guide/general/hooks.html
|
*/

// for additional viewdata called after controller functions (e.g. add breadcrumb, render output)
$hook['post_controller'][] = array(
	'class'			=> 'controller',
	'function'		=> 'add_viewdata',
	'filename'		=> 'controller.php',
	'filepath'		=> 'hooks'
);

// for rendering layout
$hook['display_override'][] = array(
	'class'			=> 'layout',
	'function'		=> 'show_layout',
	'filename'		=> 'layout.php',
	'filepath'		=> 'hooks'
);


/* End of file hooks.php */
/* Location: ./application/config/hooks.php */