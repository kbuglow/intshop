<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Shopping extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('cart');
    }

    public function index()
    {
//Get all data from database
        $data['products'] = $this->billing_model->get_all();
//send all product data to "shopping_view", which fetch from database.
        $this->load->view('shopping_view', $data);
    }

    function add()
    {
// Set array for send data.
        $insert_data = array(
            'id' => $this->input->post('id'),
            'name' => $this->input->post('name'),
            'price' => $this->input->post('price'),
            'qty' => 1
        );

// This function add items into cart.
        $this->cart->insert($insert_data);

// This will show insert data in cart.
        redirect('shopping');
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
        redirect('shopping');
    }

    function update_cart()
    {
// Recieve post values,calcute them and update
        $cart_info = $_POST['cart'];
        foreach ($cart_info as $id => $cart) {
            $rowid = $cart['rowid'];
            $price = $cart['price'];
            $amount = $price * $cart['qty'];
            $qty = $cart['qty'];

            $data = array(
                'rowid' => $rowid,
                'price' => $price,
                'amount' => $amount,
                'qty' => $qty
            );

            $this->cart->update($data);
        }
        redirect('shopping');
    }

}

?>