<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index() {
		$this->load->model('admin/products_model');
		$data = array(
			'products' => $this->products_model->get_products_for_main_page()
		);
		foreach ($data['products'] as $data['product']) {
			$data['product']->main_photo = $this->products_model->get_main_photo($data['product']->id);
		}

		if (is_logged_in()) $data['user'] = $this->Users_model->get_user($this->session->userdata('user_id'));

		$this->load->view('shop/MainPage', $data);
	}

}
