<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		// Check if user use vpn
		$this->vpn_model->detectVpn();

		$this->API = getenv('REST_URL');
		
		if (!$this->session->userdata('logged_in')) {
			$location = [
				'lat' => $_GET['latitude'],
				'long' => $_GET['longitude']
			];

			$this->session->set_userdata($location);

			redirect(base_url('auth/login'));
		}
	}

	// Dashboard
	public function index() {
		$this->load->view('layouts/header');
		$this->load->view('home/dashboard');
		$this->load->view('layouts/footer');
	}
	
	// Logout
	public function logout() {
		// Remove session
		$logged_in = [
			'user_id',
			'name',
			'logged_in',
			'TOKEN'
		];
		$this->session->unset_userdata($logged_in);
		redirect(base_url('auth/login'));
	}
}
