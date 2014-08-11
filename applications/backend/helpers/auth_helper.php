<?php

/**
 * Helper class to handle authentication
 */

// generate random password (e.g. for newly created user)
function random_pw($length = 10)
{
	$CI =& get_instance();
	$CI->load->helper('string');
	return random_string('alnum', $length);
}

// create hashed password
function hash_pw($plain_pw)
{
	// (optional) change logic here for different hash algorithm
	return password_hash($plain_pw, PASSWORD_DEFAULT);
}

// verify password
function verify_pw($plain_pw, $hashed_pw)
{
	// (optional) change logic here for different hash algorithm
	return password_verify($plain_pw, $hashed_pw);
}