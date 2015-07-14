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

    public function handle_request()
    {
        $post_data = $this->input->post();
        if (isset($post_data['submit_edit'])) {
            $this->edit_category();
        } elseif (isset($post_data['submit_add'])) {
            $this->add_category();
        }
    }

    public function edit_category()
    {
        $post_data = $this->input->post();
        $this->category_model->edit($post_data);
        redirect('admin/category');
    }

    public function add_category()
    {
        $post_data = $this->input->post();
        $new_data = array('name' => $post_data['new_cat']);
        if(!isset($post_data['parent_id'])) {
            $this->mahana_hierarchy->insert($new_data);
        }else{
            $new_data["parent"] = $post_data['parent_id'];
            $this->mahana_hierarchy->insert($new_data);
        }
        redirect('admin/category');
    }

    public function delete_category($id)
    {
        $this->mahana_hierarchy->delete($id, TRUE);
        redirect('admin/category');
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
            $this->tree .= '<li id="list_element-' . $obj["id"] . '" >';
            $this->tree .= '<a class="cat" id="' . $obj["id"] . '">' . $obj["name"] . '</a>';
            $this->tree .= '<span class="options" style="display: none; padding-left: 5px;"><a class="edit_btn" id ="edit-' . $obj["id"] . '" href="#">Edit</a>';
            $this->tree .= '|';
            $this->tree .= '<a class="delete_btn" id="delete-' . $obj["id"] . '" href="#">Delete</a>';
            $this->tree .= '|';
            $this->tree .= '<a class="add_btn" id="add-' . $obj["id"] . '" href="#">Add</a></span>';
            $this->tree .= "</li>";
            $this->tree .= "<br>";
            if (!empty($obj['children'])) {
                $this->tree .= '<div class="children" id="sub' . $obj["id"] . '"style="display: none;">';
                $this->build_tree($obj['children']);
                $this->tree .= "</div>";
            }
        }
        $this->tree .= "</ul>";

        return $this->tree;
    }
}
