<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
| EMAIL CONFING
| -------------------------------------------------------------------
| Configuration of outgoing mail server.
| */

$config['protocol'] = 'smtp';
$config['smtp_host'] = 'ssl://smtp.mailgun.org';
$config['smtp_port'] = '465';
$config['smtp_timeout'] = '30';
$config['smtp_user'] = 'postmaster@example.com';
$config['smtp_pass'] = 'password';
$config['charset'] = 'utf-8';
$config['mailtype'] = 'html';
$config['wordwrap'] = TRUE;
$config['newline'] = "\r\n";

// custom values from CodeIgniter Bootstrap
$config['from_email'] = "noreply@example.com";
$config['from_name'] = "CI Bootstrap";
$config['subject_prefix'] = "";

/* End of file email.php */
/* Location: ./system/application/config/email.php */