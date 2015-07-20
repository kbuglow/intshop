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
        if (!isset($post_data['parent_id'])) {
            $this->mahana_hierarchy->insert($new_data);
        } else {
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
            'main_content' => 'admin/pages/categories'
        );

        $this->load->view('admin/main', $data);
    }

    function build_tree(&$a)
    {
        $this->tree .= "<ul>";
        foreach ($a as $obj) {
            $active = '';
            $name = $obj["name"];
            if ($obj["active"]) {
                $active = "checked";
            } else {
                $name = '<s>' . $obj["name"] . '</s>';
            }

            $this->tree .= '<li id="list_element-' . $obj["id"] . '" >';
            $this->tree .= '<p class="cat" id="' . $obj["id"] . '">' . $name . '</p>';
            $this->tree .= '<span class="options" style="display: none; padding-left: 5px;"><a><i class="btn btn-warning btn-circle fa fa-pencil fa-lg edit_btn" id="edit-' . $obj["id"] . '"></i></a>';
            $this->tree .= '<a class = "delete_btn" id="delete-' . $obj["id"] . '"><i class="btn btn-danger btn-circle fa fa-trash-o fa-lg" id="delete-' . $obj["id"] . '"></i></a>';
            $this->tree .= '<a><i class="btn btn-circle fa fa-lg btn-success fa-plus-circle add_btn" id="add-' . $obj["id"] . '"></i></a>';
            $this->tree .= '<input type="checkbox" name="active" ' . $active . ' value="active" class="active_check" id="active-' . $obj["id"] . '"></span>';
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

    public function change_active($category_id)
    {
        $ancestors_id = $this->get_ancestors_id($category_id, true);
        $descendents_id = $this->get_descendents_id($category_id);
        $this->category_model->switch_active($category_id);

        $is_active = $this->category_model->get_category($category_id)->active;
        if ($is_active) {
            foreach ($ancestors_id as $id) {
                $is_active = $this->category_model->get_category($id)->active;
                if (!$is_active)
                    $this->category_model->switch_active($id);
            }
            foreach ($descendents_id as $id) {
                $is_active = $this->category_model->get_category($id)->active;
                if ($is_active)
                    $this->category_model->switch_active($id);
            }
        } else {
            foreach ($descendents_id as $id) {
                $is_active = $this->category_model->get_category($id)->active;
                if ($is_active)
                    $this->category_model->switch_active($id);
            }

        }

        redirect('admin/category');
    }

    public function get_ancestors_id($parent_id)
    {
        $kids = $this->mahana_hierarchy->get_ancestors($parent_id);

        foreach ($kids as $kid) {
            $ids[] = $kid['id'];
        }
        return $ids;
    }

    public function get_descendents_id($parent_id)
    {
        $kids = $this->mahana_hierarchy->get_descendents($parent_id);

        foreach ($kids as $kid) {
            $ids[] = $kid['id'];
        }
        return $ids;
    }
}
