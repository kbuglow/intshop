<?php

class Product extends CI_Controller {

	public function index($product_id) {
		$this->load->model('admin/Products_model');
		
		if (empty($product_id) || !$product = $this->Products_model->get_product($product_id)) redirect('products');

		$data = array(
			'product' => $product,
			'main_photo' => $this->Products_model->get_main_photo($product_id),
			'photos' => $this->Products_model->get_photos($product_id)
		);

		if (is_logged_in()) $data['user'] = $this->Users_model->get_user($this->session->userdata('user_id'));

		$this->load->view('shop/product', $data);
	}

}