<?php

class Orders_model extends CI_Model {

	private $table_name_ = 'orders';

	public function all_orders() {
		return $this->db->get($this->table_name_)->result();
	}

	public function get($order_id) {
		return $this->db->get_where($this->table_name_, array('id' => $order_id))->first_row();
	}

	public function edit() {
		$data     = $this->input->post();
		$order_id = $data['order_id'];

		unset($data['submit'], $data['order_id']);
		
		$this->db->update($this->table_name_, $data, array('id' => $order_id));
	}

	public function delete($order_id) {
		$this->db->delete($this->table_name_, array('id' => $order_id));
	}

}