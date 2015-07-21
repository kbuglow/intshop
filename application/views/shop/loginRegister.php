<?php require('HeadAndHeader.php'); ?>
    <hr id="header-horizontal-line"/>
    <div id="content">
        <h1 id="log-in-h1">Login/Register</h1>

        <?php if ($this->session->flashdata('success_msg')): ?>
            <?php echo $this->session->flashdata('success_msg'); ?>
        <?php endif; ?>

        <?php if ($this->session->flashdata('error_msg')): ?>
            <?php echo $this->session->flashdata('error_msg'); ?>
        <?php endif; ?>

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

        <hr id="log-in-hr"/>

        <?php echo form_open('login_register/login'); ?>
        <?php echo form_input(array(
            'name' => 'username',
            'placeholder' => 'Username'
        )); ?>

        <?php echo form_password(array(
            'name' => 'password',
            'placeholder' => 'Password'
        )); ?>

        <?php echo form_submit('login', 'Sign In'); ?>
        <?php echo form_close(); ?>

    </div>
<?php require('Footer.php'); ?>