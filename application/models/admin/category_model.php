<?php

class Category_model extends CI_Model{
    private $category_table = "categories";
    function __construct(){          
        parent::__construct();
    }

    
    function get_categories(){
         return $this->db->get($this->category_table)->result();   
    }
    
    public function get_category($category_id) {
        return $this->db->get_where($this->category_table, array('id' => $category_id))->first_row();
    }

    public function edit($post_data){
        $updateData=array("name"=>$post_data['new_name']);
        $this->db->update($this->category_table, $updateData,array("id"=>$post_data['cat_id']));

    }
}
?>
