<?php

class Category_model extends CI_Model
{
    private $category_table     = 'categories',
            $product_cats_table = 'products_cats';

    function __construct()
    {
        parent::__construct();
    }


    function get_categories()
    {
        return $this->db->get($this->category_table)->result();
    }

    public function get_category($category_id)
    {
        return $this->db->get_where($this->category_table, array('id' => $category_id))->first_row();
    }

    public function edit($post_data)
    {
        $updateData = array("name" => $post_data['new_name']);
        $this->db->update($this->category_table, $updateData, array("id" => $post_data['cat_id']));

    }

    public function get() {
        $this->load->library('mahana_hierarchy');

        $config = array('table' => 'categories');
        
        $this->mahana_hierarchy->initialize($config);
        $this->mahana_hierarchy->resync();

        return $this->mahana_hierarchy->get_grouped_children();
    }

    public function product_cats($product_id) {        
        $selected_cats = array();
        
        foreach ($this->db->get_where($this->product_cats_table, array('product_id' => $product_id))->result() as $result) {
            $info = $this->get_category($result->cat_id);
            array_push($selected_cats, $info->id);
        }

        return $selected_cats;
    }

    private function array_categories(&$parent, &$cats) {
        foreach ($parent as $item) {
            $id = count(explode('-', $item['lineage']));
            $cats[$item['id']] = str_repeat("-", $id) . $item['name'];
            if (!empty($item['children'])) 
               $this->array_categories($item['children'], $cats);
        }      
    }

    public function print_categories() {
        $cats = array();
        $result = $this->get();
        $this->array_categories($result, $cats);
        return $cats;
    }
}

?>
