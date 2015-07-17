<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/users_model');
    }

    public function index()
    {
        $data = array(
            'users' => $this->users_model->get_all_users(),
            'main_content' => 'admin/pages/users'
        );
        $this->load->view('admin/main', $data);
    }

    public function add()
    {
        $this->load->model('admin/category_model') ;
        $data = array(
            'main_content' => 'admin/pages/add_user'
        );

        $this->load->view('admin/main', $data);
    }

    public function delete($user_id)
    {
        $data = array('id' => $user_id);
        $this->users_model->delete($data);
        redirect('admin/users');
    }

    public function edit($user_id) {
        $data = array(
            'user' => $this->users_model->get_user($user_id),
            'main_content'	=> 'admin/pages/edit_users'
        );

        $this->load->view('admin/main', $data);
    }

    public function edit_user()
    {
        if ($this->form_validation->run() !== FALSE) {
            $this->users_model->edit();
            $this->session->set_flashdata('success_msg', 'The user has been edited successfully!');
            redirect('admin/users');
        } else {
            $this->session->set_flashdata('error_msg', validation_errors(' ', ' '));
            $user_id = $this->input->post()['user_id'];
            redirect("admin/users/edit/{$user_id}");
        }
    }

    public function add_new()
    {
        if ($this->form_validation->run() !== FALSE) {
            $this->users_model->register();
            $this->session->set_flashdata('success_msg', 'The user has been registered successfully!');
        } else $this->session->set_flashdata('error_msg', validation_errors(' ', ' '));

        redirect('admin/users');
    }
}


?>