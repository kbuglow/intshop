<?php

class Static_pages_model extends CI_Model
{
    private $static_pages_table = "static_pages";

    public function __construct()
    {
        parent::__construct();

    }

    public function get_static_pages()
    {
        return $this->db->get($this->static_pages_table)->result();
    }

    public function get_single_page($static_id)
    {
        return $this->db->get_where($this->static_pages_table, array('id' => $static_id))->first_row();
    }

    public function delete($data)
    {
        $this->db->delete($this->static_pages_table, $data);
    }

    public function edit()
    {
        $data = $this->input->post();
        $static_id = $data['static_id'];
        $news = array(
            'title'     => $data['title'],
            'content'      => $this->input->post(FALSE,'content')
        );
        $this->db->update($this->static_pages_table, $news, array('id' => $static_id));

    }

}