<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class News_home extends CI_Controller{

    public function index(){
        $this->load->model('admin/news_model');

        $data = array(
            'news' => $this->news_model->get_news()
        );
        if (is_logged_in()) $data['user'] = $this->Users_model->get_user($this->session->userdata('user_id'));

        $this->load->view('shop/news_home', $data);
    }

}