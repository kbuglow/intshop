<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/news_model');
        $this->load->helper('date');
    }

    public function index(){
        $news = $this->news_model->get_news();
        $data = array(
            'news' => $news,
            'logged_user' => $this->session->all_userdata()['user_id'],
            'date' => date('Y-m-d H:i:s')
    );

        $this->load->view('admin/news', $data);
    }
    public function edit($news_id){
        $data = array(
            'news' => $this->news_model->get_single_news($news_id)
        );
        $this->load->view('admin/edit_news', $data);
    }
    public function add_new(){
        $this->news_model->add();
        redirect('admin/news');
    }


}

?>