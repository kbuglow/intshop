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

    public function edit_category()
    {
        $post_data = $this->input->post();
        $this->category_model->edit($post_data);
        $this->index();

    }

    public function delete_category($id){
        $this->mahana_hierarchy->delete($id, TRUE);
        $this->index();
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

    function build_tree(&$a)
    {
        $this->tree .= "<ul>";
        foreach ($a as $obj) {
            $this->tree .= "<li>";
            $this->tree .= '<a class="cat" id="' . $obj["id"] . '">' . $obj["name"] .
                ' </a><span class="options" style="display: none;"><a class="edit_btn" id ="edit-' . $obj["id"]
                . '" href="#">Edit</a> | <a class="delete_btn" id="delete-'.$obj["id"].'" href="#">Delete</a></span>';
            $this->tree .= "</li>";
            $this->tree .= "<br>";
            if (!empty($obj['children'])) {
                $this->tree .= '<div id="sub' . $obj["id"] . '"style="display: none;">';
                $this->build_tree($obj['children']);
                $this->tree .= "</div>";
            }
        }
        $this->tree .= "</ul>";

        return $this->tree;
    }
}
