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

    public function index()
    {
        $news = $this->news_model->get_news();
        $data = array(
            'news' => $news,
            'logged_user' => $this->session->all_userdata()['user_id'],
            'date' => date('Y-m-d H:i:s')
        );

        $this->load->view('admin/news', $data);
    }

    public function edit($news_id)
    {
        $data = array(
            'news' => $this->news_model->get_single_news($news_id)
        );
        $this->load->view('admin/edit_news', $data);
    }

    public function edit_news()
    {
        if ($this->form_validation->run() !== FALSE) {
            $this->news_model->edit();
            $this->session->set_flashdata('success_msg', 'The news have been edited successfully!');
            redirect('admin/news');
        } else {
            $this->session->set_flashdata('error_msg', validation_errors(' ', ' '));
            $news_id = $this->input->post()['news_id'];
            redirect("admin/news/edit/{$news_id}");
        }
    }

    public function delete($news_id)
    {
        $data = array('id' => $news_id);
        $this->news_model->delete($data);
        redirect('admin/news');
    }

    public function add_new()
    {
        if ($this->form_validation->run() !== FALSE) {
            $this->news_model->add();
            $this->session->set_flashdata('success_msg', 'The news have been edited successfully!');
        } else {
            $this->session->set_flashdata('error_msg', validation_errors(' ', ' '));
        }
        redirect('admin/news');
    }


}

?>