<?php

/**
 * Helper class to handle form-related actions
 */

// Shortcut function for validate form
// [Optional] set "form_url" for location of the form page
// [Optional] set "rule_set" for name of rule sets in config/form_validation.php (if empty, CodeIgniter will detect as "controller/method" pattern, e.g. "account/update")
function validate_form($form_url = '', $rule_set = '')
{
	$CI =& get_instance();
	$CI->load->library('form_validation');

	if ( $CI->form_validation->run($rule_set) == FALSE )
	{
		if ( validation_errors() )
		{
			// save error messages to flashdata
			set_alert('danger', validation_errors());

			// refresh or jump page to show error messagees
			$url = empty($form_url) ? current_url() : $form_url;
			redirect($url);
			exit();
		}
		
		// display form
		return FALSE;
	}
	else
	{
		// success
		return TRUE;
	}
}