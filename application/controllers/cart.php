<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Cart extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('cart');
        $this->load->model('admin/products_model');
    }

    public function index()
    {
        $cart = $this->cart->contents();
//        foreach($cart as $item){
//            $item['photo'] = $this->products_model->get_main_photo($item['id']);
//        }
        $data = array(
            'cart' => $cart
        );
        if (is_logged_in()) $data['user'] = $this->Users_model->get_user($this->session->userdata('user_id'));


        $this->load->view('cart', $data);
    }


}