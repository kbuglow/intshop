<?php

class Products_model extends CI_Model {

	private $products_table	= 'products',
			$photos_table 	= 'photos';

	public function all_products() {
		return $this->db->get($this->products_table)->result();
	}

	public function get_product($product_id) {
		return $this->db->get_where($this->products_table, array('id' => $product_id))->first_row();
	}

	public function get_photos($product_id) {
		return $this->db->get_where($this->photos_table, array('product_id' => $product_id))->result();
	}

	public function add() {
		$data = $this->input->post();
		unset($data['add']);

		$photos = $this->upload_photo($_FILES['photos']);
		$data['main_photo'] = base_url('uploads'). '/' . $photos[0];
		$this->db->insert($this->products_table, $data);
		$this->add_photos_db($photos, $this->db->insert_id());
	}

	private function upload_photo($files) {
		$formats = array('image/jpeg', 'image/png', 'images/jpg');
		
		$photos = array();

		foreach ($files['tmp_name'] as $index => $tmp_name) {
			if (!empty($files['error'][$index]) || !in_array($files['type'][$index], $formats)) return FALSE;

			if (!empty($tmp_name) && is_uploaded_file($tmp_name)) {
				$this->load->helper('string');
				$new_name = random_string('unique') . '.' . end((explode('.', $files['name'][$index])));
			    move_uploaded_file($tmp_name, "./uploads/{$new_name}");
			    array_push($photos, $new_name);
			} else return FALSE;
		}

		return $photos;
	}

	private function add_photos_db($photos, $product_id) {
		foreach ($photos as $photo) {
			$data = array(
				'product_id' => $product_id,
				'url' => base_url('uploads/') . '/' . $photo
			);
			$this->db->insert($this->photos_table, $data);
		}
	}

	public function delete($product_id) {
		$this->db->delete($this->products_table, array('id' => $product_id));
		$this->db->delete($this->photos_table, array('product_id' => $product_id));
	}
}