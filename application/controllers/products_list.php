<?php
 class Products_list extends CI_Controller{

     public function index(){
		$data = array();
		
		if (is_logged_in()) $data['user'] = $this->Users_model->get_user($this->session->userdata('user_id'));
		
         $this->load->view('shop/ProductsList', $data);
     }


 }