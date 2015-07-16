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
		echo '<pre>';
		var_dump($data);

		// array_pop($data);

		// $photos = $this->upload_photo($_FILES['photos']);
		// $this->db->insert($this->products_table, $data);

		// return $this->update_main_photo($id = $this->db->insert_id(), $this->add_photos_db($photos, $id)) ? TRUE : FALSE;
	}

	private function update_main_photo($id, $main_photo) {
		return $this->db->update($this->products_table, array('main_photo' => $main_photo), array('id' => $id)) ? TRUE : FALSE;
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
		$i = 0;
		$id = 0;

		foreach ($photos as $photo) {
			$data = array(
				'product_id' => $product_id,
				'url' => base_url('uploads/') . '/' . $photo
			);

			$this->db->insert($this->photos_table, $data);

			if ($i === 0) $id = $this->db->insert_id();
			$i++;
		}

		return $id;
	}

	public function edit() {
		$data       = $this->input->post();
		$product_id = $data['product_id'];

		unset($data['submit'], $data['product_id']);

		if (!empty($_FILES['photos'])) 
			$this->add_photos_db($this->upload_photo($_FILES['photos']), $product_id);

		return $this->db->update($this->products_table, $data, array('id' => $product_id)) ? TRUE : FALSE;
	}

	public function delete($product_id) {
		$this->db->delete($this->products_table, array('id' => $product_id));
		$this->db->delete($this->photos_table, array('product_id' => $product_id));
	}

	public function delete_photo($photo_id) {
		return $this->db->delete($this->photos_table, array('id' => $photo_id)) ? TRUE : FALSE;
	}

}