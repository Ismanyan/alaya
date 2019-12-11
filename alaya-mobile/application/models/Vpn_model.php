<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Vpn_model extends CI_Model {
    public function detectVpn()
    {
        $response = Requests::GET('https://api.ipgeolocation.io/ipgeo');
        $x = json_decode($response->body, true);
  
        if ($x['country_code2'] != 'ID') {
            redirect(base_url('vpnerror'));
            exit;
        }
    }

    public function detectNoVpn()
    {
        $response = Requests::GET('https://api.ipgeolocation.io/ipgeo');
        $x = json_decode($response->body, true);

        if ($x['country_code2'] == 'ID') {
            redirect(base_url());
            exit;
        }
    }
}