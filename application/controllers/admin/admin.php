<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index() {
		if (!is_logged_in()) redirect('admin/login');

		$this->load->view('admin/main', array('main_content' => 'admin/pages/home'));
	}
	
	public function login() {
		if (is_logged_in()) redirect('admin');
		
		$this->load->view('admin/login');
	}

	public function login_submit() {
		if ($this->form_validation->run() !== FALSE) {
			$this->load->model('admin/Admin_model');

			if ($this->Admin_model->login()) {
				$this->session->set_flashdata('success_msg', 'You are now logged in!');
				redirect('admin');
			} else $this->session->set_flashdata('error_msg', 'Wrong username/password or not administrator!');
		} else $this->session->set_flashdata('error_msg', validation_errors());

		redirect('admin/login');
	}

	public function logout() {
		$this->session->unset_userdata();
		$this->session->sess_destroy();
		redirect('home');
	}

}