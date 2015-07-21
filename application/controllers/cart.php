<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Cart extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('cart');
        $this->load->model('admin/products_model');
    }

    public function index()
    {
        $cart = $this->cart->contents();
//        foreach($cart as $item){
//            $item['photo'] = $this->products_model->get_main_photo($item['id']);
//        }
        $data = array(
            'cart' => $cart
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
            'qty' => 1,
            'photo' => $this->input->post(TRUE, 'photo')
        );

// This function add items into cart.
        $this->cart->insert($insert_data);

// This will show insert data in cart.
        redirect('cart');
    }

    function remove($rowid)
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
// Recieve post values,calcute them and update
        $cart_info = $this->input->post(TRUE);
//        var_dump($cart_info);
        foreach ($cart_info as $id => $cart) {
            $rowid = $cart['rowid'];
            $qty = $cart['qty'];

            $data = array(
                'rowid' => $rowid,
                'qty' => $qty
            );

            $this->cart->update($data);
        }
        redirect('cart');
    }
}
