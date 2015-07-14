<?php

class Orders extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('admin/Orders_model');
	}

	public function index() {
		$data = array(
			'orders' => $this->Orders_model->all_orders(),
		);
		$this->load->view('admin/orders', $data);
	}

	/**
	 * Loading edit view and pass information for the product
	 */
	public function edit($order_id) {
		$data = array(
			'order' => $this->Orders_model->get($order_id),
			'items'  => $this->Orders_model->get_items($order_id),
		);
		$this->load->view('admin/edit_order', $data);
	}

	/**
	 * Call to submit edited order and update it
	 */
	public function edit_submit() {
		if ($this->form_validation->run() !== FALSE) {
			$this->Orders_model->edit();
			$this->session->set_flashdata('success_msg', 'The order has been edited successfully!');
		} else $this->session->set_flashdata('error_msg', validation_errors());

		redirect("admin/orders/edit/{$this->input->post('order_id')}");
	}

	/**
	* Deleting order from DB where ID = $order_id
	*/
	public function delete($order_id) {
		$this->Orders_model->delete($order_id);
		$this->session->set_flashdata('success_msg', "The order with ID <b>{$order_id}</b> has been removed!");
		redirect('admin/orders');
	}

}