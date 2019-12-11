<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('asset_url()')) {
    function asset_url()
    {
        return base_url() . 'assets/';
    }
}

if (!function_exists('notif()')) {
    function notif($type, $title, $message = '', $url = '')
    {
        $data['type'] = $type;
        $data['title'] = $title;
        $data['message'] = $message;
        $data['url'] = base_url();

        $CI = &get_instance();
        return $CI->load->view('alert',$data);
    }
}

