<?php

/**
 * Helper class to handle alerts
 */

// Alert box
function alert_box()
{
	$alert = get_alert();
	
	if ( !empty($alert) )
	{
		$type = $alert['type'];
		$msg = $alert['msg'];
		return "<div class='alert alert-$type' style='margin-left:0'>$msg</div>";
	}
}

// Callout box
// Remark: AdminLTE has no styling for "success" type
function callout_box()
{
	$alert = get_alert();

	if ( !empty($alert) )
	{
		$type = $alert['type'];
		$msg = $alert['msg'];
		$title = empty($alert['title']) ? '' : "<h4>".$alert['title']."</h4>";
		return "<div class='callout callout-$type'>$title<p>$msg</p></div>";
	}
}

// Save to flashdata
// Remark: title is optional and only display in callout box
function set_alert($type, $msg, $title = '')
{
	$CI =& get_instance();
	$CI->session->set_flashdata('alert_type', $type);
	$CI->session->set_flashdata('alert_title', $title);
	$CI->session->set_flashdata('alert_msg', $msg);
}

// Get from flashdata
function get_alert()
{
	$CI =& get_instance();
	$type = $CI->session->flashdata('alert_type');
	$title = $CI->session->flashdata('alert_title');
	$msg = $CI->session->flashdata('alert_msg');

	if ( !empty($type) && !empty($msg) )
		return array('type' => $type, 'msg' => $msg);
	else
		return NULL;
}