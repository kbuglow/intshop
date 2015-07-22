<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Cart extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/products_model');
        $this->load->model('address_model');
        $this->load->helper('country_helper');
        $this->config->load('countries');
    }

    public function index()
    {
        $cart = $this->cart->contents();
        $data = array(
            'cart' => $cart,
            'total' => $this->cart->total()
        );
        if (is_logged_in()) $data['user'] = $this->Users_model->get_user($this->session->userdata('user_id'));


        $this->load->view('shop/cart', $data);

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

    public function order()
    {
        if (is_logged_in()) {

            $data['user'] = $this->Users_model->get_user($this->session->userdata('user_id'));
            $data['addresses'] = $this->address_model->get_addresses_as_string($this->session->userdata('user_id'));

            $this->load->view('shop/order', $data);
        } else {
            $this->load->view('shop/order');
        }

    }

    public function place_order()
    {
        $this->load->model('admin/orders_model');

        $this->orders_model->add_order();
        redirect('');

    }
}
