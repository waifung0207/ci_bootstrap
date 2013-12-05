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

// for setting default values
$hook['post_controller_constructor'][] = array(
    'class'			=> 'controller',
    'function'		=> 'setup',
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