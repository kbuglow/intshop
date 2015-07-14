<h1>Admin panel login</h1>

<?php echo $this->session->flashdata('error_msg');  ?>

<?php echo form_open('admin/admin/login_submit'); ?>
	<?php echo form_input(array('name' => 'username', 'placeholder' => 'Username')); ?> <br />
	<?php echo form_password(array('name' => 'password', 'placeholder' => 'Password')); ?> <br />
	<?php echo form_submit('login', 'Login'); ?>
<?php echo form_close(); ?>