<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

// Reference: http://codeboxlabs.com/how-to-create-default-layout-on-codeigniter-using-hook/
class Layout extends CI_Hooks
{
    function show_layout()
    {
        global $OUT;

        $CI =& get_instance();
        $output = $CI->output->get_output();

        if ( isset($CI->mLayout) )
        {
            // load layout (APPPATH = "applications/backend/")
            $layout_name = $CI->mLayout;
            $layout_path = BASEPATH . '../'.APPPATH.'views/_layouts/'.$layout_name.'.php';
            $layout = $CI->load->file($layout_path, true);

            // change string "{body}" from view output
            $layout = str_replace("{body}", $output, $layout);

            // add title, define in controllers
            $title = isset($CI->mTitle) ? $CI->mTitle : NULL;

            // change string "{title}" with paremeter on controller
            $layout = str_replace("{title}", $title, $layout);

            // change string "{theme}" with theme name
            $layout = str_replace("{theme}", $CI->mTheme, $layout);
        }
        else
        {
            // output without layout
            $layout = $output;
        }

        /* @var $OUT <type> */
        $OUT->_display($layout);
    }
}