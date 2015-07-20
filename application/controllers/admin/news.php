<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/news_model');
    }

    public function index()
    {
        $data = array(
            'news' => $this->news_model->get_news(),
            'main_content' => 'admin/pages/news'
        );

        $this->load->view('admin/main', $data);
    }

    public function edit($news_id)
    {
        $data = array(
            'news' => $this->news_model->get_single_news($news_id),
            'main_content' => 'admin/pages/edit_news'
        );
        $this->load->view('admin/main', $data);
    }

    public function edit_submit()
    {
        if ($this->form_validation->run() !== FALSE) {
            $this->news_model->edit()
                ? $this->session->set_flashdata('success_msg', 'New has been edited successfully!')
                : $this->session->set_flashdata('error_msg', 'There was a problem while editing!');
        } else $this->session->set_flashdata('error_msg', validation_errors('<span>', '</span>'));
        
        redirect("admin/news/edit/{$this->input->post(TRUE, 'news_id')}");
    }

    public function delete($news_id)
    {
        $this->news_model->delete($news_id);
        $this->session->set_flashdata('success_msg', "The new with ID <b>{$news_id}</b> has been removed!");
        redirect('admin/news');
    }

    public function add() {
        $data = array(
            'logged_user'  => $this->session->userdata('user_id'),
            'main_content' => 'admin/pages/add_new'
        );

        $this->load->view('admin/main', $data);
    }

    public function add_submit()
    {
        if ($this->form_validation->run() !== FALSE) {
            $this->news_model->add()
                ? $this->session->set_flashdata('success_msg', 'New added successfully!')
                : $this->session->set_flashdata('error_msg', 'New added unsuccessfully!');
            redirect('admin/news');
        } else {
            $this->session->set_flashdata('error_msg', validation_errors());
            redirect('admin/news/add');
        }
    }


}

?>