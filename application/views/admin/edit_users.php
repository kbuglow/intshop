<h1>User <?php echo $user->username; ?></h1>
<a href="<?php echo base_url('admin/users'); ?>">Back to users</a>
<hr>



<?php echo form_open('admin/users/edit_user'); ?>

<?php echo form_label('Username', 'username'); ?>
<?php echo form_input(array(
    'id'    => 'username',
    'name'  => 'username',
    'value' => $user->username,
)); ?> <br />

<?php echo form_label('Email: ', 'email'); ?>
<?php echo form_input(array(
    'id'    => 'email',
    'name'  => 'email',
    'value' => $user->email,
)); ?> <br />

<?php echo form_label('User Role: ', 'role'); ?>
<?php
$options = array(
    'Administrator' => 'Administrator',
    'User'          => 'User'
);

echo form_dropdown('role', $options, $user->role);
?><br /><br />


<?php echo form_hidden('user_id', $user->id); ?>
<?php echo form_submit('submit', 'Edit the user'); ?>

<?php echo form_close(); ?>


