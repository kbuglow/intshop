<?php 
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    
    $client_name = array(
        'field' => 'client_name',
        'label' => 'Client Name',
        'rules' => 'trim|required|min_length[3]|max_length[50]'
    );

    $phone = array(
        'field' => 'phone',
        'label' => 'Client Phone',
        'rules' => 'trim|required|numeric'
    );

    $email = array(
        'field' => 'email',
        'label' => 'Client email',
        'rules' => 'trim|required|valid_email'
    );

    $status = array(
        'field' => 'status',
        'label' => 'Order Status',
        'rules' => 'trim|required'
    );

    $username = array(
        'field' => 'username',
        'label' => 'Username',
        'rules' => 'trim|required|min_length[3]',
    );

    $password = array(
        'field' => 'password',
        'label' => 'Password',
        'rules' => 'trim|required|sha1',
    );




$config = array(
    'admin/orders/edit_submit' => array($client_name, $phone, $email, $status),
    'admin/admin/login_submit' => array($username, $password),
    'admin/users/add_new' => array($username, $password, $email)
);