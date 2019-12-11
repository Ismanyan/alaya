<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile_model extends CI_Model {
    
    public function getProfile(INT $id) {
        $url = getenv('REST_URL');
        $token = $this->session->userdata('TOKEN');
        $response = Requests::GET($url . 'users/' . $id . '?token=' . $token);

        return $response;
    }
}