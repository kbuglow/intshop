<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('admin/category_model');
        $config = array('table'=>'categories');
        $this->load->library('mahana_hierarchy');
        $this->mahana_hierarchy->initialize($config); 
        $this->mahana_hierarchy->resync();
    }
    
    public function index() {
        $data = array(
            'categories' => $this->mahana_hierarchy->get_grouped_children(),
        );
        
        $this->load->view('admin/categories', $data);
    }
    function build_tree(&$a, $parent=0){
        $tmp_array = array();
        foreach($a as $obj){
            var_dump($obj);
        //    if($obj->parent == $parent){
//                $obj->children = build_tree($a, $obj->term_id);
//                $tmp_array[] = $obj;
//            }
        }
        // You *could* sort the temp array here if you wanted.
        return $tmp_array;
    }

}
