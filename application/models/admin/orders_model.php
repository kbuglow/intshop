<?php

class Orders_model extends CI_Model {

	private $orders_table 		= 'orders',
			$orders_items_table = 'order_items';

	public function all_orders() {
		return $this->db->get($this->orders_table)->result();
	}

	public function get($order_id) {
		return $this->db->get_where($this->orders_table, array('id' => $order_id))->first_row();
	}

	public function get_items($order_id) {
		return $this->db->get_where($this->orders_items_table, array('order_id' => $order_id))->result();
	}

	public function edit() {
		$data     = $this->input->post();
		$order_id = $data['order_id'];

		unset($data['submit'], $data['order_id']);

		$this->update_items(array_splice($data, 5));

		$data['total'] = $this->total($order_id);
		return $this->db->update($this->orders_table, $data, array('id' => $order_id)) ? TRUE : FALSE;
	}

	private function update_items($items) {
		foreach (array_keys($items) as $key) 
			$items[$key] > 0 
				? $this->db->update($this->orders_items_table, array('quantity' => $items[$key]), array('id' => ltrim($key, '_')))
				: $this->db->delete($this->orders_items_table, array('id' => ltrim($key, '_')));
	}

	private function total($order_id) {
		return $this->db->select('sum(price * quantity) as value', FALSE)->where(array('order_id' => $order_id))->get($this->orders_items_table)->row()->value;
	}

	public function delete($order_id) {
		$this->db->delete($this->orders_table, array('id' => $order_id));
		$this->db->delete($this->orders_items_table, array('order_id' => $order_id));
	}
	public function add_order(){
		$data =$this->input->post();
		$address = $this->address_model->get($data['address']);
		$order = array(
			'client_name' => $address->full_name,
			'phone' 	  => $address->phone,
			'email' 	  => $this->Users_model->get_user($this->session->userdata('user_id'))->email,
			'address' 	  => $this->address_model->get_address_as_string($data['address']),
			'total'		  => $this->cart->total()
		);
		$this->db->insert($this->orders_table, $order);
		$order_id = $this->db->insert_id();

		if($order_id){
			foreach($this->cart->contents() as $item) {
				$products = array(
					'order_id'	 => $order_id,
					'product_id' => $item['id'],
					'price'		 => $item['price'],
					'quantity'	 => $item['qty']
				);
				$this->db->insert($this->orders_items_table, $products);
			}
		}
	}
}