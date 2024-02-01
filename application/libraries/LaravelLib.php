<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LaravelLib
{
    protected $ci;

    function __construct()
    {
        $this->ci =& get_instance();
    }

    function component($view, $data = array(), $return = FALSE) {
       
        $content = $this->ci->load->view($view, $data, TRUE);

        if ($return) {
            return $content;
        } else {
            echo $content;
        }
    }

    function include_view($view, $data = array()) {
        component($view, $data);
    }
}


