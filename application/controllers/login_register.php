<?php

class Login_register extends CI_Controller {

	public function index() {
		if (is_logged_in()) redirect('home');

		$this->load->view('shop/loginRegister');
	}

	public function register() {
		if ($this->form_validation->run() !== FALSE) {
			$this->load->model('admin/Users_model');

			$this->Users_model->register()
				? $this->session->set_flashdata('success_msg', 'You have been registered successfully!')
				: $this->session->set_flashdata('error_msg', 'Problem while registering!');
		} else $this->session->set_flashdata('error_msg', validation_errors());

		redirect('login_register');
	}

	public function login() {
		if ($this->form_validation->run() !== FALSE) {
			$this->load->model('admin/Admin_model');

			$this->Admin_model->login()
				? $this->session->set_flashdata('success_msg', 'Logged successfully!')
				: $this->session->set_flashdata('error_msg', 'Wrong username or password!');
		} else $this->session->set_flashdata('error_msg', validation_errors());

		redirect('login_register');
	}

}