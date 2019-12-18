<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Absent extends CI_Controller
{
    var $API = '';
    public function __construct()
    {
        parent::__construct();
        
        // Check if user use vpn
        $this->vpn_model->detectVpn();

        $this->API = getenv('REST_URL');

        if (!$this->session->userdata('logged_in')) {
            redirect(base_url('auth/login'));
            exit;
        }

        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('absent_model');
    }


    // Absent
    public function index(INT $id = null)
    {
        if ($id != $this->session->userdata('user_id')) {
            redirect(base_url());
            exit;
        } else {
            $response = Requests::GET('http://ip-api.com/json/');
            $response = json_decode($response->body, true);
 
            if ($response['status'] == 'success') {
                $data['geo'] = $response;
                // ADD RANGE BRANCH 
                $data['branch'] = $this->absent_model->getBranch();
                // var_dump($data);
                
                $this->load->view('layouts/header');
                $this->load->view('home/absent',$data);
                $this->load->view('layouts/footer');
            } else {
                redirect(base_url());
                exit;
            }
        }
    }

    // Add Absent
    public function check (INT $id) {
        if ($id != $this->session->userdata('user_id')) {
            redirect(base_url());
            exit;
        } else {
            $response = $this->absent_model->addAbsent($id);
            
            if ($response->status_code == 200) {
                notif('success', 'Absent success', 'Thank you for being absent today');
            } else {
                notif('warning', 'Absent Denied', 'Absent today already done');
            }
        }
    }

    // Detail absent user id / absent id
    public function detail(INT $user_id = null, INT $id = null)
    {
        if ($user_id != $this->session->userdata('user_id') || $id == null) {
            redirect(base_url());
            exit;
        } else {
            $response = $this->absent_model->getAbsentDetail($user_id,$id);
            if ($response->status_code == 200) {
                $data['users'] = json_decode($response->body, true);
                $this->load->view('layouts/header');
                $this->load->view('statistic/detail_absent',$data);
                $this->load->view('layouts/footer');
            }
        }
    }
}