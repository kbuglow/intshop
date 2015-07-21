<?php

class Category_model extends CI_Model
{
    private $category_table = 'categories',
        $product_cats_table = 'products_cats';

    function __construct()
    {
        parent::__construct();
    }


    function get_categories()
    {
        return $this->db->get($this->category_table)->result();
    }

    public function edit($post_data)
    {
        $updateData = array("name" => $post_data['new_name']);
        $this->db->update($this->category_table, $updateData, array("id" => $post_data['cat_id']));

    }

    public function product_cats($product_id)
    {
        $selected_cats = array();

        foreach ($this->db->get_where($this->product_cats_table, array('product_id' => $product_id))->result() as $result) {
            $info = $this->get_category($result->cat_id);
            array_push($selected_cats, $info->id);
        }

        return $selected_cats;
    }

    public function get_category($category_id)
    {
        return $this->db->get_where($this->category_table, array('id' => $category_id))->first_row();
    }

    public function print_categories()
    {
        $cats = array();
        $result = $this->get();
        $this->array_categories($result, $cats);
        return $cats;
    }

    public function get()
    {
        $this->load->library('mahana_hierarchy');

        $config = array('table' => 'categories');

        $this->mahana_hierarchy->initialize($config);
        $this->mahana_hierarchy->resync();

        return $this->mahana_hierarchy->get_grouped_children();
    }

    private function array_categories(&$parent, &$cats)
    {
        foreach ($parent as $item) {
            $cats[$item['id']] = str_repeat("&nbsp;&nbsp;&nbsp;&nbsp;", $item['deep']) . $item['name'];
            if (!empty($item['children']))
                $this->array_categories($item['children'], $cats);
        }
    }

    public function switch_active($category_id)
    {
        $active = $this->get_category($category_id)->active;
        $updateData = array(
            'active' => !$active
        );
        $this->db->update($this->category_table, $updateData, array("id" => $category_id));
    }

}

?>
