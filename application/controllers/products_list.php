<?php
 class Products_list extends CI_Controller{

     public function index(){
         $this->load->model('admin/category_model');
         $this->load->model('admin/products_model');

         $data = array(
             'categories' => $this->category_model->get_categories(),
             'products' => $this->products_model->all_products()
         );
         foreach ($data['products'] as $data['product']) {
             $data['product']->main_photo = $this->products_model->get_main_photo($data['product']->main_photo);
         }
		if (is_logged_in()) $data['user'] = $this->Users_model->get_user($this->session->userdata('user_id'));
		
         $this->load->view('shop/ProductsList', $data);
     }

     public function get_products_from_category($cat_id){
         $this->load->model("admin/category_model");
         $this->load->model('admin/products_model');

         $products = $this->products_model->get_products_from_category($cat_id);

         $data = array(
             'categories' => $this->category_model->get_categories(),
             'products' => $products
         );
         foreach ($data['products'] as $data['product']) {
             $data['product']->main_photo = $this->products_model->get_main_photo($data['product']->main_photo);
         }
         if (is_logged_in()) $data['user'] = $this->Users_model->get_user($this->session->userdata('user_id'));

         $this->load->view('shop/ProductsList', $data);
     }

 }
?>