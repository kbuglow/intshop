<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Static_pages extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/static_pages_model');
    }

    public function index()
    {
        $pages = $this->static_pages_model->get_static_pages();
        $data = array(
            'pages' => $pages,
            'main_content' => 'admin/pages/static_pages'
        );

        $this->load->view('admin/main', $data);
    }

    public function add()
    {
        $data = array(
            'main_content' => 'admin/pages/add_static_page'
        );

        $this->load->view('admin/main', $data);
    }

    public function edit($static_id)
    {
        $data = array(
            'page' => $this->static_pages_model->get_single_page($static_id),
            'main_content' => 'admin/pages/edit_static'
        );
        $this->load->view('admin/main', $data);
    }

    public function edit_static()
    {
        if ($this->form_validation->run() !== FALSE) {
            $this->static_pages_model->edit();
            $this->session->set_flashdata('success_msg', 'The page has been edited successfully!');
            redirect('admin/static_pages');
        } else {
            $this->session->set_flashdata('error_msg', validation_errors(' ', ' '));
            $static_id = $this->input->post()['static_id'];
            redirect("admin/static_pages/edit/{$static_id}");
        }
    }

    public function delete($static_id)
    {
        $this->static_pages_model->delete(array('id' => $static_id));
        redirect('admin/static_pages');
    }

    public function add_new()
    {
        if ($this->form_validation->run() !== FALSE) {
            $this->static_pages_model->add();
            $this->session->set_flashdata('success_msg', 'The static page has been edited successfully!');
        } else {
            $this->session->set_flashdata('error_msg', validation_errors(' ', ' '));
        }
        redirect('admin/static_pages');
    }


}

?>