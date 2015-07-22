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
    'rules' => 'trim|required|valid_email|is_unique[users.email]'
);

$status = array(
    'field' => 'status',
    'label' => 'Order Status',
    'rules' => 'trim|required'
);

$username = array(
    'field' => 'username',
    'label' => 'Username',
    'rules' => 'trim|required|min_length[3]|is_unique[users.username]',
);

$username_login = array(
    'field' => 'username',
    'label' => 'Username',
    'rules' => 'trim|required|min_length[3]',
);

$password = array(
    'field' => 'password',
    'label' => 'Password',
    'rules' => 'trim|required|sha1',
);
$old_password = array(
    'field' => 'old_password',
    'label' => 'Old password',
    'rules' => 'trim|required|sha1',
);

$password_again = array(
    'field' => 'password_again',
    'label' => 'Password',
    'rules' => 'trim|required|sha1|matches[password]',
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
//Address
$full_name = array(
    'field' => 'full_name',
    'label' => 'full_name',
    'rules' => 'trim|required|min_length[5]'
);
$address = array(
    'field' => 'address',
    'label' => 'address',
    'rules' => 'trim|required|min_length[5]'
);
$city = array(
    'field' => 'city',
    'label' => 'city',
    'rules' => 'trim|required|min_length[1]'
);
$state = array(
    'field' => 'state',
    'label' => 'state',
    'rules' => 'trim|required|min_length[1]'
);
$zip_code = array(
    'field' => 'zip_code',
    'label' => 'zip_code',
    'rules' => 'trim|required|min_length[1]|numeric'
);
$phone = array(
    'field' => 'phone',
    'label' => 'phone',
    'rules' => 'trim|required|min_length[4]|numeric'
);





$config = array(
    'admin/orders/edit_submit'        => array($client_name, $phone, $email, $status),

    'admin/admin/login_submit'        => array($username_login, $password),
    'login_register/login'            => array($username_login, $password),

    'admin/products/add_submit'       => array($name, $description, $price, $new_price, $in_stock),
    'admin/products/edit_submit'      => array($name, $description, $price, $new_price, $in_stock, $main_photo),
    
    'admin/users/add_new'             => array($username, $password, $password_again, $email),
    'login_register/register'         => array($username, $password, $password_again, $email),
    
    'admin/users/edit_user'           => array($username, $email),
    
    'admin/news/edit_submit'          => array($subject, $title, $text),
    'admin/news/add_submit'           => array($subject, $title, $text),
    
    'admin/static_pages/edit_static'  => array($title , $content),
    'admin/static_pages/add_new'      => array($title , $content),

    'settings/change_email'           => array($email),
    'settings/change_password'        => array($old_password, $password, $password_again),
    'settings/add_address'            => array($full_name, $address, $city, $state, $zip_code, $phone)
);