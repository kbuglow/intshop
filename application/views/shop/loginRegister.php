<?php require('HeadAndHeader.php'); ?>
<div id="content">
<h1>Login/Register</h1>
    <style type="text/css">
        input {
            border: 1px solid #000;
            display: block;
            margin: 5px 0;
        }
    </style>
    <?php echo form_open('login_register/register'); ?>
        <?php echo form_input(array(
            'name' => 'username',
            'placeholder' => 'Username'
        )); ?>
        
        <?php echo form_input(array(
            'name' => 'email',
            'placeholder' => 'Email'
        )); ?>
        
        <?php echo form_password(array(
            'name' => 'password',
            'placeholder' => 'Password'
        )); ?>

        <?php echo form_password(array(
            'name' => 'password_again',
            'placeholder' => 'Repeat Password'
        )); ?>

        <?php echo form_submit('submit', 'Register'); ?>
    <?php echo form_close(); ?>

</div>
<?php require('Footer.php'); ?>