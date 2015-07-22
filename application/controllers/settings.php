<?php

class Settings extends CI_Controller {

	function __construct()
	{

		parent::__construct();
		$this->load->model('address_model');
		$this->load->helper('country_helper');
		$this->config->load('countries');
	}
	public function index() {

		$data = array(
			'addresses' => $this->Users_model->get_addresses($user_id = $this->session->userdata('user_id')),
		);
		
		if (is_logged_in()) $data['user'] = $this->Users_model->get_user($user_id);

		$this->load->view('shop/settings', $data);
	}

	public function add_address(){
		if ($this->form_validation->run() !== FALSE) {
			$this->address_model->add_address();
			$this->session->set_flashdata('success_msg', 'The address has been added successfully!');
		} else {
			$this->session->set_flashdata('error_msg', validation_errors(' ', ' '));
		}
		redirect('settings');

	}

	public function	change_email(){
		if ($this->form_validation->run() !== FALSE) {
			$this->Users_model->edit();
			$this->session->set_flashdata('success_msg', 'The email has been changed successfully!');
		} else {
			$this->session->set_flashdata('error_msg', validation_errors(' ', ' '));
		}
		redirect('settings');

	}

	public function change_password(){
		if ($this->form_validation->run() !== FALSE) {
			if($this->Users_model->change_password()) {
				$this->session->set_flashdata('success_msg', 'The password has been changed successfully!');
			}else{
				$this->session->set_flashdata('error_msg', 'The old password is not correct!');
			}
		} else {
			$this->session->set_flashdata('error_msg', validation_errors(' ', ' '));
		}
		redirect('settings');
	}
}