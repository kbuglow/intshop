<?php

class Orders_model extends CI_Model {
	private $table_name_ = 'orders';

	public function get_orders() {
		return $this->db->get($this->table_name_)->result();
	}

	public function get_order($order_id) {
		return $this->db->get_where($this->table_name_, array('id' => $order_id))->first_row();
	}

	public function edit_order() {
		// UPDATE query for ORDER
	}

}