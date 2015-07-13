<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('admin/category_model');
        $this->load->model('admin/Tree');

    }
    
    public function index() {
      echo "<pre>";
      print_r($this->Tree->getTree());
      echo "</pre>";
        $data = array(
            'categories' => $this->category_model->get_categories(),
        );

//        $this->load->view('admin/categories', $data);
    }
    
    public function get_tree_category(){
      $categories =  $this->category_model->get_categories();
       
        
    }

}
