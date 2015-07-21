<?php

class Settings extends CI_Controller {

	public function index() {
		$data = array(
			'addresses' => $this->Users_model->get_addresses($user_id = $this->session->userdata('user_id')),
		);
		
		if (is_logged_in()) $data['user'] = $this->Users_model->get_user($user_id);

		$this->load->view('shop/settings', $data);
	}

}