<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    // Url Rest Api
    var $API = '';

    public function __construct()
    {
        parent::__construct();
       
        // Check if user use vpn
        $this->vpn_model->detectVpn();

        $this->API = getenv('REST_URL');

        if ($this->session->userdata('logged_in') == true) {
            redirect(base_url());
            exit;   
        }
        
    }

    // Login Page
    public function login()
    {        
        if($this->session->userdata('TOKEN')) {
            $id = $this->session->userdata('user_id');
            redirect(base_url('auth/pin/').$id);
        }

        $this->load->view('layouts/header');
        $this->load->view('auth/login');
        $this->load->view('layouts/footer');
    }

    // Login System
    public function checklogin()
    {
        
        // TODO::VALIDATE THIS
        $username = $this->input->post('username',true);
        $email = $this->input->post('email', true);
        $password = $this->input->post('password', true);

        // TODO:: CHANGE USERNAME TO USER ID
        
        $response = Requests::POST($this->API. 'auth/login?email='.$email.'&password='.$password.'&username='.$username);
        if ($response->status_code === 200) {
            // build token 
            $jwt = json_decode($response->body,true);
            $this->session->set_userdata('TOKEN', $jwt['token']);
            $this->session->set_userdata('user_id',$jwt['user_id']);
            echo json_encode($jwt['user_id'],true);
            // redirect(base_url('auth/pin/').$id);
        } else {
            echo json_encode(false,true);
        }
    }

    public function pin($id = null) {
       
        if (!$this->session->userdata('TOKEN')) {
            redirect(base_url('auth/login'));
            exit;
        }

        if($id == null) {
            $data['user_id'] = $this->session->userdata('user_id');
        } else {
            if ($id != $this->session->userdata('user_id')) {
                $data['user_id'] = $this->session->userdata('user_id');
            } else {
                $data['user_id'] = $id;
            }
        }

        $this->load->view('layouts/header');
        $this->load->view('auth/pin',$data);
        $this->load->view('layouts/footer');
    }

    // Verify Pin
    public function check_pin() {

        // Check if already loggin
        if(!$this->session->userdata('TOKEN')) {
            redirect(base_url('auth/login'));
            exit;
        }

        // TODO:: VALIDATE INPUT
        $pin = $this->input->post('pin',true);
        $id = $this->input->post('id', true);

        $token = $this->session->userdata('TOKEN');
        $response = Requests::GET($this->API . 'users/' . $id . '?token=' . $token);
     
        if ($response->status_code === 200) {
            $result = json_decode($response->body, true);
            if (password_verify($pin , $result['pin'])) {
                $logged_in = [
                    'user_id' => $result['id'], 
                    'name'    => $result['name'],
                    'branch_id' => $result['branch_id'],
                    'logged_in' => true
                ];
                $this->session->set_userdata($logged_in);
                echo json_encode(true,true);
            } else {
                // notif('error', 'Invalid Pin', 'Pin mismatch');
                echo json_encode(false,true);
            } 
        } else {
            echo json_encode(false,true);
            // notif('error', 'Invalid Access', 'Access Denied');
        }
    }


}
