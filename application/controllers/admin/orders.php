<?php

class Orders extends CI_Controller {

	public function index() {
		$this->load->model('admin/Orders_model');

		$data = array(
			'orders' => $this->Orders_model->get_orders(),
		);

		$this->load->view('admin/orders', $data);
	}

	public function edit($order_id) {
		// Load edit view for $order_id
	}

	public function delete($order_id) {
		// Delete order from DB
	}

}