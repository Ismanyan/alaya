<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Absent_model extends CI_Model {

    // Request absent user
    public function getAbsent($date=null)
    {
        $url = getenv('REST_URL');
        $token = $this->session->userdata('TOKEN');
        if ($date == null) {
            $response = Requests::GET($url . 'admin/absent/get/'.$this->session->userdata('branch_id') . '?token=' . $token);
        } else {
            $response = Requests::GET($url . 'admin/absent/get/'. $this->session->userdata('branch_id').'?date=' . $date . '&token=' . $token);
        }

        return $response;
    }

    // request absent detail
    public function getAbsentDetail(INT $user_id, INT $id)
    {        
        $url = getenv('REST_URL');
        $token = $this->session->userdata('TOKEN');
        $response = Requests::GET($url . 'absent/get/detail/' . $user_id .'/'.$id.'?token=' . $token);

        return $response;
    }

    // Add absent
    public function addAbsent(INT $id)
    {
        $url = getenv('REST_URL');
        $data = array(
            'longitude' => $this->input->post('longitude'),
            'latitude' => $this->input->post('latitude'),
            'location' => $this->input->post('location'),
            'token' => $this->session->userdata('TOKEN')
        );
        $response = Requests::post($url . 'absent/' . $id . '?longitude=' . $data['longitude'] . '&latitude=' . $data['latitude'] . '&location=' . $data['location'] . '&token=' . $data['token']);
        
        return $response;
    }
}