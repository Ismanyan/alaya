<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Statistic extends CI_Controller
{

    var $API = '';
    public function __construct()
    {
        parent::__construct();
        
        // Check if user use vpn
        $this->vpn_model->detectVpn();
        
        $this->API = getenv('REST_URL');

        if (!$this->session->userdata('logged_in') || !$this->session->userdata('admin')) {
            redirect(base_url('auth/login'));
            exit;
        }
    }

    public function index()
    {
        $this->load->view('layouts/header');
        $this->load->view('statistic/statistic');
        $this->load->view('layouts/footer');
    }

    public function absent(INT $id = null)
    {
        if ($id != $this->session->userdata('user_id')) {
            redirect(base_url());
            exit;
        } else {
            // Absent
            $this->load->model('absent_model');
            $date = $this->input->post('date',true);
            if (isset($date)) {
                $response = $this->absent_model->getAbsent($date);
            } else {
                $response = $this->absent_model->getAbsent();
            }

            $response = json_decode($response->body, true);
            $data['absent'] = $response;

            $this->load->view('layouts/header');
            $this->load->view('statistic/statistic_absent',$data);
            $this->load->view('layouts/footer');
        }
    }

    public function treatment(INT $id = null)
    {
        if ($id != $this->session->userdata('user_id')) {
            redirect(base_url());
            exit;
        } else {
            $this->load->model('treatment_model');
            $date = $this->input->post('date', true);
            if (isset($date)) {
                $response = $this->treatment_model->getTreatment($id, $date);
            } else {
                $response = $this->treatment_model->getTreatment($id);
            }
            $response = json_decode($response->body, true);

            $data['treatment'] = $response;

            $this->load->view('layouts/header');
            $this->load->view('statistic/statistic_treatment',$data);
            $this->load->view('layouts/footer');
        }
    }
    

}