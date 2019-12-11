<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Vpnerror extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('logged_in') == true) {
            redirect(base_url());
            exit;
        }
    }

    public function index()
    {
        $this->vpn_model->detectNoVpn();
        $this->load->view('errors/vpn');
    }
}