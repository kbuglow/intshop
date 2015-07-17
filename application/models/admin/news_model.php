<?php

class News_model extends CI_Model
{
    private $news_table = "news";

    function __construct()
    {
        parent::__construct();
    }

    public function get_news()
    {
        $this->load->model('admin/users_model');
        $news = $this->db->get($this->news_table)->result();
        foreach($news as $new){
            $new->username = $this->users_model->get_user($new->creator)->username;
        }
        return $news;
    }

    public function get_single_news($news_id){
        return $this->db->get_where($this->news_table, array('id' => $news_id))->first_row();
    }
    public function add(){
        $data = $this->input->post();

        $news = array(
            'title'     => $data['title'],
            'subject'   => $data['subject'],
            'creator'   => $data['creator'],
            'text'      => $this->input->post(FALSE, 'text')
        );

        return $this->db->insert($this->news_table, $news) ? TRUE : FALSE;
    }
    public function delete($new_id)
    {
        $this->db->delete($this->news_table, array('id' => $new_id));
    }
    public function edit()
    {
        $data = $this->input->post();
        $news_id = $data['news_id'];
        $news = array(
            'title'     => $data['title'],
            'subject'   => $data['subject'],
            'text'      => $this->input->post(FALSE,'text')
        );
        
        return $this->db->update($this->news_table, $news, array('id' => $news_id)) ? TRUE : FALSE;
    }
}