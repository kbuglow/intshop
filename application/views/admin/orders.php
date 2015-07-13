<h1>Orders</h1>
<a href="<?php echo base_url('admin/home'); ?>">Back to admin panel home page</a><hr />

<?php if ($this->session->flashdata('success_msg')): ?>
	<p style="background: green; border-radius: 5px; color: #FFF; padding: 10px 5px; width: 100%;"><?php echo $this->session->flashdata('success_msg'); ?></p>
<?php endif; ?>

<?php if ($orders): ?>
<table border="1">
	<tr>
		<td>Client Name</td>
		<td>Client Phone</td>
		<td>Client Email</td>
		<td>Client Address</td>
		<td>Ordered product</td>
		<td>Order status</td>
		<td>Options</td>
	<tr>
	<?php foreach ($orders as $order): ?>
		<tr>
			<td><?php echo $order->client_name; ?></td>
			<td><?php echo $order->phone; ?></td>
			<td><?php echo $order->email; ?></td>
			<td><?php echo $order->address; ?></td>
			<td><?php echo $order->product_id; ?></td>
			<td><?php echo $order->status; ?></td>
			<td><a href="<?php echo base_url("admin/orders/edit/{$order->id}"); ?>">Edit</a>, <a href="<?php echo base_url("admin/orders/delete/{$order->id}") ?>">Delete</a></td>
		</tr>
	<?php endforeach; ?>
</table>
<?php else : ?>
	<p>No orders!</p>
<?php endif; ?>