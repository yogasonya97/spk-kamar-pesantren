<?php

class Tp 
{
    protected $ci;

    function __construct()
    {
        $this->ci =& get_instance();
    }

    function mobile($page, $data=null)
    {
        $d['_content'] = $this->ci->load->view($page, $data, true);
        $this->ci->load->view('mobile/layouts/master_layouts', $d);
    }
}
