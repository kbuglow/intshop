<?php

class Product extends CI_Controller {

	public function index($product_id) {
		$this->load->model('admin/Products_model');

		$data = array(
			'product' => $this->Products_model->get_product($product_id),
			'main_photo' => $this->Products_model->get_main_photo($product_id)
		);

		if (is_logged_in()) $data['user'] = $this->Users_model->get_user($this->session->userdata('user_id'));

		$this->load->view('shop/product', $data);
	}

}