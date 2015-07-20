<?php

class Users_model extends CI_Model
{
    private $users_table = 'users';

    public function get_all_users()
    {
        return $this->db->get($this->users_table)->result();
    }

    public function get_user($user_id)
    {
        return $this->db->get_where($this->users_table, array('id' => $user_id))->first_row();
    }

    public function edit()
    {
        $data = $this->input->post();
        $user_id = $data['user_id'];

        unset($data['submit'], $data['user_id']);
        $this->db->update($this->users_table, $data, array('id' => $user_id));

    }

    public function register()
    {
        $data = $this->input->post();
        unset($data['submit'], $data['password_again']);
        
        return $this->db->insert($this->users_table, $data) ? TRUE : FALSE;
    }

    public function delete($data)
    {
        $this->db->delete($this->users_table, $data);
    }
}

?>