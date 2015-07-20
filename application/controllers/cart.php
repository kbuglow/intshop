<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Cart extends CI_Controller{

    public function index(){


        if (is_logged_in()) $data['user'] = $this->Users_model->get_user($this->session->userdata('user_id'));

        $this->load->view('cart', $data);
    }


}