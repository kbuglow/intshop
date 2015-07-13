<h1>Editing order: <?php echo $order->id; ?></h1>
<a href="<?php echo base_url('admin/orders'); ?>">Back to orders</a>
<?php if ($this->session->flashdata('success_msg')): ?>
	<p style="background: green; border-radius: 5px; color: #FFF; padding: 10px 5px; width: 100%;"><?php echo $this->session->flashdata('success_msg'); ?></p>
<?php endif; ?>

<?php if ($this->session->flashdata('error_msg')): ?>
	<div style="background: red; border-radius: 5px; color: #FFF; padding: 10px 5px; width: 100%;"><?php echo $this->session->flashdata('error_msg'); ?></div>
<?php endif; ?>

<?php echo form_open('admin/orders/edit_submit'); ?>
<?php echo form_label('Client Name: ', 'client_name'); ?><br />
<?php echo form_input(array(
	'id'    => 'client_name',
	'name'  => 'client_name',
	'value' => $order->client_name,
)); ?> <br />

<?php echo form_label('Client Phone: ', 'phone'); ?><br />
<?php echo form_input(array(
	'id'    => 'phone',
	'name'  => 'phone',
	'value' => $order->phone,
)); ?> <br />

<?php echo form_label('Client Email: ', 'email'); ?><br />
<?php echo form_input(array(
	'id'    => 'email',
	'name'  => 'email',
	'value' => $order->email,
)); ?> <br />

<?php echo form_label('Address: ', 'address'); ?><br />
<?php echo form_input(array(
	'id'    => 'address',
	'name'  => 'address',
	'value' => $order->address,
)); ?> <br />

<?php echo form_label('Ordered product (id): ', 'product_id'); ?><br />
<?php echo form_input(array(
	'id'    => 'product_id',
	'name'  => 'product_id',
	'value' => $order->product_id,
)); ?> <br />

<?php echo form_label('Order Status: ', 'status'); ?><br />
<?php 
	$options = array(
		'in processing' => 'In Processing',
		'ready but not sent' => 'Ready but not sent',
		'ready and sent' => 'Ready and sent',
		'delivered' => 'Delivered'

	);

	echo form_dropdown('status', $options, $order->status); 
?> <br />

<?php echo form_hidden('order_id', $order->id); ?>
<?php echo form_submit('submit', 'Edit the order'); ?>

<?php echo form_close(); ?>