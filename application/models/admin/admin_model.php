<?php

class Admin_model extends CI_Model {

	public function login() {
		$result = $this->db->get_where('users', array(
			'username' => $this->input->post(TRUE,'username'),
			'password' => $this->input->post(TRUE,'password'),
			'role'     => 'Administrator'
		));

		if ($result->num_rows() === 1) {
			$this->session->set_userdata(array('user_id' => $result->first_row()->id, 'logged_in' => true));
			return TRUE;
		} else return FALSE;
	}

}