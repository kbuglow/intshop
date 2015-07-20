<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('admin/Products_model');
	}

	public function index() {
		$data = array(
			'products' => $this->Products_model->all_products(),
			'main_content' => 'admin/pages/products'
		);
		$this->load->view('admin/main', $data);
	}

	public function add() {
		$this->load->model('admin/Category_model');

		$data = array(
			'categories' => $this->Category_model->print_categories(),
			'main_content' => 'admin/pages/add_product'
		);

		$this->load->view('admin/main', $data);
	}

	public function add_submit() {
		if ($this->form_validation->run() !== FALSE) {
			$this->Products_model->add()
				? $this->session->set_flashdata('success_msg', 'Product added successfully!')
				: $this->session->set_flashdata('error_msg', 'There was a problem while uploading photos!');
			redirect('admin/products');
		} else {
			$this->session->set_flashdata('error_msg', validation_errors());
			redirect('admin/products/add');
		}
	}

	public function edit($product_id) {
		$this->load->model('admin/Category_model');

		$data = array(
			'product'    	=> $this->Products_model->get_product($product_id),
			'photos'     	=> $this->Products_model->get_photos($product_id),
			'categories'	=> $this->Category_model->print_categories(),
			'selected_cats' => $this->Category_model->product_cats($product_id),
			'main_content'	=> 'admin/pages/edit_product'
		);
		
		$this->load->view('admin/main', $data);
	}

	public function edit_submit() {
		if ($this->form_validation->run() !== FALSE) {
			$this->Products_model->edit()
				? $this->session->set_flashdata('success_msg', 'Products has been edited successfully!')
				: $this->session->set_flashdata('error_msg', 'There was a problem while editing!');
		} else $this->session->set_flashdata('error_msg', validation_errors());
		
		redirect("admin/products/edit/{$this->input->post(TRUE, 'product_id')}");
	}

	public function delete($product_id) {
		$this->Products_model->delete($product_id);
		$this->session->set_flashdata('success_msg', "The product with ID <b>{$product_id}</b> has been removed!");
		redirect('admin/products');		
	}

	public function delete_photo($photo_id, $product_id) {
		$this->Products_model->delete_photo($photo_id)
			? $this->session->set_flashdata('success_msg', 'Photo deleted successfully!')
			: $this->session->set_flashdata('error_msg', 'Photo deleted unsuccessfully!');
		redirect("admin/products/edit/{$product_id}");
	}

}