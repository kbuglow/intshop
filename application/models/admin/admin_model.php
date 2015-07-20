<?php

class Admin_model extends CI_Model
{

    public function login($role = 0)
    {
        $data = array(
            'username' => $this->input->post(TRUE, 'username'),
            'password' => $this->input->post(TRUE, 'password'),           
        );

        if ($role === 1) $data['role'] = 1;

        $result = $this->db->get_where('users', $data);

        if ($result->num_rows() === 1) {
            $userdata = array(
                'user_id' => (int)$result->first_row()->id, 
                'logged_in' => true,
                'role' => (int)$result->first_row()->role
            );

            $this->session->set_userdata($userdata);
            return TRUE;
        } else return FALSE;
    }

}