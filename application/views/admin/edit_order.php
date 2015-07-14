<h1>Order #<?php echo $order->id; ?></h1>
<a href="<?php echo base_url('admin/orders'); ?>">Back to orders</a>
<?php if ($this->session->flashdata('success_msg')): ?>
	<p style="background: green; border-radius: 5px; color: #FFF; padding: 10px 5px; width: 100%;"><?php echo $this->session->flashdata('success_msg'); ?></p>
<?php endif; ?>

<?php if ($this->session->flashdata('error_msg')): ?>
	<div style="background: red; border-radius: 5px; color: #FFF; padding: 10px 5px; width: 100%;"><?php echo $this->session->flashdata('error_msg'); ?></div>
<?php endif; ?>

<?php echo form_open('admin/orders/edit_submit'); ?>
<span>Placed on <b><?php echo $order->date; ?></b> by </span>
<?php echo form_input(array(
	'id'    => 'client_name',
	'name'  => 'client_name',
	'value' => $order->client_name,
)); ?> <br />

<?php echo form_label('Client Phone: ', 'phone'); ?>
<?php echo form_input(array(
	'id'    => 'phone',
	'name'  => 'phone',
	'value' => $order->phone,
)); ?> <br />

<?php echo form_label('Client Email: ', 'email'); ?>
<?php echo form_input(array(
	'id'    => 'email',
	'name'  => 'email',
	'value' => $order->email,
)); ?> <br />

<?php echo form_label('Shipping Address: ', 'address'); ?>
<?php echo form_input(array(
	'id'    => 'address',
	'name'  => 'address',
	'value' => $order->address,
)); ?> <hr />



<?php echo form_label('Order Status: ', 'status'); ?>
<?php 
	$options = array(
		'New'              => 'New',
		'Processing'       => 'Processing',
		'Shipped'          => 'Shipped',
		'Delivered'        => 'Delivered',
		'Will Not Deliver' => 'Will Not Deliver',
		'Returned'         => 'Returned'
	);

	echo form_dropdown('status', $options, $order->status); 
?><br /><br />

<table border="1">
	<tr>
		<td>Product #</td>
		<td>Price</td>
		<td>Quantity</td>
	</tr>
	<?php foreach ($items as $item): ?>
	<tr>
		<td><?php echo $item->product_id; ?></td>
		<td><?php echo $item->price; ?></td>
		<td><?php echo form_input("_{$item->id}", $item->quantity) ?></td>
	</tr>
	<?php endforeach; ?>
	<tr>
		<td><i>TOTAL:</i></td>
		<td><?php echo $order->total; ?></td>
	</tr>
</table><br />

<?php echo form_hidden('order_id', $order->id); ?>
<?php echo form_submit('submit', 'Edit the order'); ?>

<?php echo form_close(); ?>