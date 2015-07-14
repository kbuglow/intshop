<h1>Orders</h1>
<a href="<?php echo base_url('admin'); ?>">Back to admin panel</a><hr />

<?php if ($this->session->flashdata('success_msg')): ?>
	<p style="background: green; border-radius: 5px; color: #FFF; padding: 10px 5px; width: 100%;"><?php echo $this->session->flashdata('success_msg'); ?></p>
<?php endif; ?>

<?php if ($orders): ?>
<table border="1">
	<tr>
		<td>Order #</td>
		<td>Date</td>
		<td>Customer</td>
		<td>Status</td>
		<td>Amount</td>
		<td>Options</td>
	<tr>
	<?php foreach ($orders as $order): ?>
		<tr>
			<td><?php echo sprintf('#%05d', $order->id); ?></td>
			<td><?php echo $order->date; ?></td>
			<td><?php echo $order->client_name . "({$order->email})"; ?></td>
			<td><?php echo $order->status; ?></td>
			<td><?php echo $order->total; ?></td>
			<td><a href="<?php echo base_url("admin/orders/edit/{$order->id}"); ?>">Show & Edit</a> <a href="<?php echo base_url("admin/orders/delete/{$order->id}") ?>">Delete</a></td>
		</tr>
	<?php endforeach; ?>
</table>
<?php else : ?>
	<p>No orders!</p>
<?php endif; ?>