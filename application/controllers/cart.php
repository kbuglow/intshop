<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Cart extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/products_model');
    }

    public function index()
    {
        $cart = $this->cart->contents();
//        foreach($cart as $item){
//            $item['photo'] = $this->products_model->get_main_photo($item['id']);
//        }
        $data = array(
            'cart' => $cart,
            'total' => $this->cart->total()
        );
        if (is_logged_in()) $data['user'] = $this->Users_model->get_user($this->session->userdata('user_id'));


        $this->load->view('cart', $data);

    }

    function add()
    {
// Set array for send data.
        $insert_data = array(
            'id' => $this->input->post(TRUE, 'id'),
            'name' => $this->input->post(TRUE, 'name'),
            'price' => $this->input->post(TRUE, 'price'),
            'qty' => ($qty = $this->input->post(TRUE, 'quantity')) ? $qty : 1,
            'photo' => $this->input->post(TRUE, 'photo')
        );

// This function add items into cart.
        $this->cart->insert($insert_data);

// This will show insert data in cart.
        redirect('cart');
    }

    function remove($rowid = 'all')
    {
// Check rowid value.
        if ($rowid === "all") {
// Destroy data which store in session.
            $this->cart->destroy();
        } else {
// Destroy selected rowid in session.
            $data = array(
                'rowid' => $rowid,
                'qty' => 0
            );
// Update cart data, after cancel.
            $this->cart->update($data);
        }

// This will show cancel data in cart.
        redirect('cart');
    }

    function update_cart()
    {
        $cart_info = $this->input->post(TRUE);
        $count_items = count($cart_info);

        for ($i = 0; $i <= $count_items; $i++)
            $this->cart->update(array(
                'rowid' => $cart_info['rowid'][$i],
                'qty' => $cart_info['qty'][$i]
            ));

        redirect('cart');
    }
}
