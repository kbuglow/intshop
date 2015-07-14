<h1>Products</h1>
<a href="<?php echo base_url('admin'); ?>">Back to admin panel</a><hr />

<?php if ($this->session->flashdata('success_msg')): ?>
	<p style="background: green; border-radius: 5px; color: #FFF; padding: 10px 5px; width: 100%;"><?php echo $this->session->flashdata('success_msg'); ?></p>
<?php endif; ?>

<?php if ($products): ?>
	<a href="<?php echo base_url('admin/products/add') ?>">Add new one</a>
<table border="1">
	<tr>
		<td>Product #</td>
		<td>Name</td>
		<td>Description</td>
		<td>Category</td>
		<td>Price</td>
		<td>New Price</td>
		<td>In Stock</td>
		<td>Options</td>
	</tr>
	<?php foreach ($products as $product): ?>
	<tr>
		<td><?php echo sprintf('#%05d', $product->id); ?></td>
		<td><?php echo $product->name; ?></td>
		<td><?php echo substr($product->description, 0, 25) . ' ...' ?></td>
		<td><?php echo $product->category; ?></td>
		<td><?php echo $product->price; ?></td>
		<td><?php echo $product->new_price; ?></td>
		<td><?php echo $product->in_stock; ?></td>
		<td><a href="<?php echo base_url("admin/products/edit/{$product->id}") ?>">Show & Edit</a> <a href="<?php echo base_url("admin/products/delete/{$product->id}") ?>">Delete</a></td>
	</tr>
	<?php endforeach; ?>
</table>
<?php else: ?>
<p>No products added! <a href="<?php echo base_url('admin/products/add') ?>">Add new one</a></p>
<?php endif; ?>