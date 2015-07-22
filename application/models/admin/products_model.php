<?php

class Products_model extends CI_Model
{

    private $products_table = 'products',
        $photos_table = 'photos',
        $category_table = 'products_cats';

    public function all_products()
    {
        return $this->db->get($this->products_table)->result();
    }

    public function get_photos($product_id)
    {
        return $this->db->get_where($this->photos_table, array('product_id' => $product_id))->result();
    }

    public function get_main_photo($product_id) {
        return $this->db->get_where($this->photos_table, array('id' => $this->get_product($product_id)->main_photo))->first_row()->url;
    }
    public function get_product($product_id)
    {
        return $this->db->get_where($this->products_table, array('id' => $product_id))->first_row();
    }
    public function products_info($products)
    {
        $new_products = array();
        foreach ($products as $product) {
            $product->name = $this->get_product($product->product_id)->name;
            array_push($new_products, $product);
        }
        return $new_products;
    }

    public function add()
    {
        $data = $this->input->post();
        $categories = $data['categories'];
        unset($data['categories'], $data['add']);

        $photos = $this->upload_photo($_FILES['photos']);
        $this->db->insert($this->products_table, $data);
        $this->add_to_cat($categories, $id = $this->db->insert_id());

        return $this->update_main_photo($id, $this->add_photos_db($photos, $id)) ? TRUE : FALSE;
    }

    private function upload_photo($files)
    {
        $formats = array('image/jpeg', 'image/png', 'images/jpg');

        $photos = array();

        foreach ($files['tmp_name'] as $index => $tmp_name) {
            if (!empty($files['error'][$index]) || !in_array($files['type'][$index], $formats)) return FALSE;

            if (!empty($tmp_name) && is_uploaded_file($tmp_name)) {
                $this->load->helper('string');
                $new_name = random_string('unique') . '.' . end((explode('.', $files['name'][$index])));
                move_uploaded_file($tmp_name, "./uploads/{$new_name}");
                array_push($photos, $new_name);
            } else return FALSE;
        }

        return $photos;
    }

    private function add_to_cat($categories, $id)
    {
        foreach ($categories as $category) {
            $this->db->insert($this->category_table, array('product_id' => $id, 'cat_id' => $category));
        }
    }

    private function update_main_photo($id, $main_photo)
    {
        return $this->db->update($this->products_table, array('main_photo' => $main_photo), array('id' => $id)) ? TRUE : FALSE;
    }

    private function add_photos_db($photos, $product_id)
    {
        $i = 0;
        $id = 0;

        foreach ($photos as $photo) {
            $data = array(
                'product_id' => $product_id,
                'url' => base_url('uploads/') . '/' . $photo
            );

            $this->db->insert($this->photos_table, $data);

            if ($i === 0) $id = $this->db->insert_id();
            $i++;
        }

        return $id;
    }

    public function edit()
    {
        $data = $this->input->post(FALSE);
        $product_id = $data['product_id'];
        $categories = $data['categories'];

        unset($data['submit'], $data['product_id'], $data['categories']);

        $this->update_categories($categories, $product_id);

        if (!empty($_FILES['photos']))
            $this->add_photos_db($this->upload_photo($_FILES['photos']), $product_id);

        return $this->db->update($this->products_table, $data, array('id' => $product_id)) ? TRUE : FALSE;
    }

    private function update_categories($categories, $product_id)
    {
        $this->db->delete($this->category_table, array('product_id' => $product_id));
        $this->add_to_cat($categories, $product_id);
    }

    public function delete($product_id) {
        foreach ($this->photos_urls($product_id) as $product) unlink('uploads/' . basename($product->url));
        $this->db->delete($this->products_table, array('id' => $product_id));
        $this->db->delete($this->photos_table, array('product_id' => $product_id));
        $this->db->delete($this->category_table, array('product_id' => $product_id));
    }

    private function photos_urls($product_id) {
        return $this->db->select('url')->from($this->photos_table)->where('product_id', $product_id)->get()->result();
    }


    public function delete_photo($photo_id)
    {
        return $this->db->delete($this->photos_table, array('id' => $photo_id)) ? TRUE : FALSE;
    }

    public function get_products_from_category($cat_id) {
        return $this->db->select('product_id as id, name, price, new_price, main_photo')->from($this->products_table)->join($this->category_table, "{$this->category_table}.product_id = {$this->products_table}.id")->where('cat_id', $cat_id)->get()->result();
    }
    
    public function get_products_for_main_page(){
        $this->db->select('*');
        $this->db->from($this->products_table);
        $this->db->order_by('id', 'DESC');
        $this->db->limit(8);
        return $this->db->get()->result();

    }
}