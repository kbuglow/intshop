<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index() {
		$data = array();
		
		if (is_logged_in()) $data['user'] = $this->Users_model->get_user($this->session->userdata('user_id'));

		$this->load->view('shop/MainPage', $data);
	}

}
