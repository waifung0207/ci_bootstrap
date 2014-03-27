<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Controller extends CI_Hooks
{
    // set default values
    function setup()
    {
        $CI =& get_instance();

        $CI->mCtrler = $CI->router->fetch_class();
        $CI->mAction = $CI->router->fetch_method();
        $CI->mParam = $CI->uri->segment(3);

        // load language files
        $CI->mLocale = $CI->config->item('language');
        
        // check if user is logged in
        $user = $CI->session->userdata('user');
        if ( empty($user) && $CI->mCtrler!='login' )
        {
            redirect('login');
            return;
        }
        
        // default values for page output
        $CI->mLayout = "default";
        
        // prepare view data
        $CI->mViewData = array(
            'locale'    => $CI->mLocale,
            'ctrler'    => $CI->mCtrler,
            'action'    => $CI->mAction,
            'user'      => $user
        );
    }
}