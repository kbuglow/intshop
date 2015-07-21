<?php
 class Products_list extends CI_Controller{

     public function index(){
         $this->load->model('admin/category_model');
         $this->load->model('admin/products_model');
         $this->load->library("mahana_hierarchy");


         $data = array(
             'categories' => $this->category_model->get_categories(),
             'products' => $this->products_model->all_products()
         );
         foreach ($data['products'] as $data['product']) {
             $data['product']->main_photo = $this->products_model->get_main_photo($data['product']->id);
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
             $data['product']->main_photo = $this->products_model->get_main_photo($data['product']->id);
         }
         if (is_logged_in()) $data['user'] = $this->Users_model->get_user($this->session->userdata('user_id'));


         $this->load->view('shop/ProductsList', $data);
     }

     public function get_category_children($cat_id){
         $this->load->library("mahana_hierarchy");
         $kids = $this->mahana_hierarchy->get_children($cat_id);

     }

     public function get_descendents_name($parent_id)
     {
         $this->load->library("mahana_hierarchy");

         $kids = $this->mahana_hierarchy->get_descendents($parent_id);

         foreach ($kids as $kid) {
             $names[] = $kid['name'];
         }

     }
 }
?>