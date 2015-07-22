<?php
class Address_model extends CI_Model{
    private $address_table = 'user_address';

    function __construct()
    {
        parent::__construct();
    }

    function get_addresses($user_id)
    {
        return $this->db->get_where($this->address_table, array('user_id' => $user_id))->result();
    }

    function get_addresses_as_string($user_id){
        $addresses = $this->get_addresses($user_id);
        foreach($addresses as $address){
            $address_string[$address->id] = "{$address->country}, {$address->city} , {$address->address}, {$address->zip_code}, {$address->phone}";

        }
        return $address_string;
    }

    public function get($address_id) {
        return $this->db->get_where($this->address_table, array('id' => $address_id))->first_row();
    }

    function get_address_as_string($address_id){
        $address = $this->get($address_id);
            $address_string = "{$address->country}, {$address->city} , {$address->address}, {$address->zip_code}";
        return $address_string;
    }

    public function add_address(){
        $data = $this->input->post();

        $address = array(
            'user_id'     => $data['user_id'],
            'full_name'   => $data['full_name'],
            'address'     => $data['address'],
            'city'        => $data['city'],
            'country'     => $data['country'],
            'state'       => $data['state'],
            'zip_code'    => $data['zip_code'],
            'phone'       => $data['phone']
        );

        return $this->db->insert($this->address_table, $address) ? TRUE : FALSE;
    }



}