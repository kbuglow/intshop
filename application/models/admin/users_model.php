<?php

class Users_model extends CI_Model {

    private $users_table = 'users',
            $addrs_table = 'user_address';

    public function get_all_users() {
        return $this->db->select('id, username, email, role')->get($this->users_table)->result();
    }

    public function get_user($user_id) {
        return $this->db->select('id, username, email, role')->where('id', $user_id)->get($this->users_table)->first_row();
    }

    public function get_addresses($user_id) {
        return $this->db->get_where($this->addrs_table, array('user_id' => $user_id))->result();
    }

    public function edit() {
        $data = $this->input->post();
        $user_id = $data['user_id'];

        unset($data['submit'], $data['user_id']);
        $this->db->update($this->users_table, $data, array('id' => $user_id));

    }

    public function register() {
        $data = $this->input->post();
        unset($data['submit'], $data['password_again']);
        
        return $this->db->insert($this->users_table, $data) ? TRUE : FALSE;
    }

    public function delete($data) {
        $this->db->delete($this->users_table, $data);
    }
    
}