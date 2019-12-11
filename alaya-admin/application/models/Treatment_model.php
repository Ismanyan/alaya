<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Treatment_model extends CI_Model {
    // Request Treatment user
    public function getTreatment(INT $id, $date = null)
    {
        $url = getenv('REST_URL');
        $token = $this->session->userdata('TOKEN');
        if ($date == null) {
            $response = Requests::GET($url . 'admin/treatment/get/' . $this->session->userdata('branch_id') . '?token=' . $token);
        } else {
            $response = Requests::GET($url . 'admin/treatment/get/' . $this->session->userdata('branch_id') . '?date=' . $date . '&token=' . $token);
        }

        return $response;
    }

    public function getDetail(INT $id = null)
    {
        $url = getenv('REST_URL');
        $token = $this->session->userdata('TOKEN');
            $response = Requests::GET($url . 'admin/treatment/get/' . $id  . '&token=' . $token);
        return $response;
    }

}