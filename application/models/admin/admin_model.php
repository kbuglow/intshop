<?php

class Admin_model extends CI_Model {

	public function login() {
		$result = $this->db->get_where('users', array(
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'role'     => 'Administrator'
		));

		return $result->num_rows() === 1 
					? $this->session->set_userdata(array('user_id' => $result->first_row()->id, 'logged_in' => true)) 
					: FALSE;
	}

}