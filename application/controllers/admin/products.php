<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('admin/Products_model');
	}

	public function index() {
		$this->load->view('admin/products', array('products' => $this->Products_model->all_products()));
	}

	public function add() {
		$this->load->view('admin/add_product');
	}

	public function add_submit() {
		if ($this->form_validation->run() !== FALSE) {
			$this->Products_model->add()
				? $this->session->set_flashdata('success_msg', 'Product added successfully!')
				: $this->session->set_flashdata('error_msg', 'There was a problem while uploading photos!');
			redirect('admin/products');
		} else $this->load->view('admin/add_product');
	}

	public function edit($product_id) {
		$data = array(
			'product' => $this->Products_model->get_product($product_id),
			'photos' => $this->Products_model->get_photos($product_id)
		);
		
		$this->load->view('admin/edit_product', $data);
	}

	public function delete($product_id) {
		$this->Products_model->delete($product_id);
		$this->session->set_flashdata('success_msg', "The product with ID <b>{$product_id}</b> has been removed!");
		redirect('admin/products');		
	}

}