<h1>Users</h1>
<a href="<?php echo base_url('admin'); ?>">Back to admin panel</a><hr />
<table border="1">
    <tr>
        <td>Username</td>
        <td>Email</td>
        <td>Role</td>
        <td>Options</td>
    <tr>
        <?php foreach ($users as $user): ?>
    <tr>
        <td><?php echo $user->username; ?></td>
        <td><?php echo $user->email; ?></td>
        <td><?php echo $user->role; ?></td>
        <td>
            <a href="<?php echo base_url("admin/users/edit/{$user->id}"); ?>">Edit</a>
            <a href="<?php echo base_url("admin/users/delete/{$user->id}") ?>">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
<hr>
<?php if ($this->session->flashdata('success_msg')): ?>
    <p style="background: green; border-radius: 5px; color: #FFF; padding: 10px 5px; width: 100%;"><?php echo $this->session->flashdata('success_msg'); ?></p>
<?php endif; ?>

<?php if ($this->session->flashdata('error_msg')): ?>
    <div style="background: red; border-radius: 5px; color: #FFF; padding: 10px 5px; width: 100%;"><?php echo $this->session->flashdata('error_msg'); ?></div>
<?php endif; ?>
<?php
    echo form_open('admin/users/add_new');
    echo form_label('Username', 'username');
    echo form_input(array(
        'id'    => 'username',
        'name'  => 'username',
        )); ?>
<br />
<?php echo form_label('Password: ', 'password'); ?>
<?php echo form_input(array(
    'id'    => 'password',
    'name'  => 'password',
    'type'  => 'password'
)); ?>
<br />

<?php echo form_label('Email: ', 'email'); ?>
<?php echo form_input(array(
    'id'    => 'email',
    'name'  => 'email'
            )); ?>
<br />

<?php echo form_label('User Role: ', 'role'); ?>
<?php
$options = array(
    'Administrator' => 'Administrator',
    'User'          => 'User'
);
echo form_dropdown('role', $options);
?>
<br>
<?php
echo form_submit('submit', 'Register');
echo form_close();
?>
