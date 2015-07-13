<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller
{
    public $tree = "";

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/category_model');
        $config = array('table' => 'categories');
        $this->load->library('mahana_hierarchy');
        $this->mahana_hierarchy->initialize($config);
        $this->mahana_hierarchy->resync();
    }

    public function index()
    {
        $init_cat = $this->mahana_hierarchy->get_grouped_children();
        $categories = $this->build_tree($init_cat);

        $data = array(
            'categories' => $categories,
        );

        $this->load->view('admin/categories', $data);
    }

    function build_tree(&$a, $deep = 0)
    {
        $this->tree .= "<ul>";
        foreach ($a as $obj) {
            $this->tree .= "<li>";
            $this->tree .= '<a class="cat" id="' . $obj["id"] . ' ">' . $obj["name"] . ' </a><span class="options" style="display: none;"><a href="#">Edit</a> | <a href="#">Delete</a></span>';
            $this->tree .= "</li>";
            $this->tree .= "<br>";
            if (!empty($obj['children'])) {
                $this->tree .= '<div id="sub' . $obj["id"] . '"style="display: none;">';
                $this->build_tree($obj['children'], $deep + 1);
                $this->tree .= "</div>";
            }
        }
        $this->tree .= "</ul>";

        return $this->tree;
    }


}
