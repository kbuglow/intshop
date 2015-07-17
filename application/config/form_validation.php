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

// PRODUCTS

$name = array(
    'field' => 'name',
    'label' => 'Product Name',
    'rules' => 'trim|required|min_length[5]'
);

$description = array(
    'field' => 'description',
    'label' => 'Description',
    'rules' => 'trim|required|min_length[10]'
);

$price = array(
    'field' => 'price',
    'label' => 'Product Price',
    'rules' => 'trim|required|decimal'
);

$new_price = array(
    'field' => 'new_price',
    'label' => 'Product New Price',
    'rules' => 'trim|required|decimal'
);

$in_stock = array(
    'field' => 'in_stock',
    'label' => 'Product In Stock',
    'rules' => 'trim|required|numeric'
);

$main_photo = array(
    'field' => 'main_photo',
    'label' => 'Main Photo',
    'rules' => 'trim|numeric'
);

//    NEWS
$subject = array(
    'field' => 'subject',
    'label' => 'Subject',
    'rules' => 'trim|required|min_length[4]'
);
$title = array(
    'field' => 'title',
    'label' => 'Title',
    'rules' => 'trim|required|min_length[5]'
);
$text = array(
    'field' => 'text',
    'label' => 'Text',
    'rules' => 'trim|required|min_length[10]'
);
$content = array(
    'field' => 'content',
    'label' => 'Content',
    'rules' => 'trim|required|min_length[10]'
);




$config = array(
    'admin/orders/edit_submit'        => array($client_name, $phone, $email, $status),
    'admin/admin/login_submit'        => array($username, $password),
    'admin/products/add_submit'       => array($name, $description, $price, $new_price, $in_stock),
    'admin/users/add_new'             => array($username, $password, $email),
    'admin/products/edit_submit'      => array($name, $description, $price, $new_price, $in_stock, $main_photo),
    'admin/users/edit_user'           => array($username, $email),
    'admin/news/edit_submit'          => array($subject, $title, $text),
    'admin/news/add_submit'           => array($subject, $title, $text),
    'admin/static_pages/edit_static'  => array($title , $content),
    'admin/static_pages/add_new'      => array($title , $content)
);