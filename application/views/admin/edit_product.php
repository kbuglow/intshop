<h1>Editing product # <?php echo $product->id; ?></h1>
<a href="<?php echo base_url('admin/products'); ?>">Back to products</a>

<?php if ($this->session->flashdata('success_msg')): ?>
	<p style="background: green; border-radius: 5px; color: #FFF; padding: 10px 5px; width: 100%;"><?php echo $this->session->flashdata('success_msg'); ?></p>
<?php endif; ?>

<?php if ($this->session->flashdata('error_msg')): ?>
	<div style="background: red; border-radius: 5px; color: #FFF; padding: 10px 5px; width: 100%;"><?php echo $this->session->flashdata('error_msg'); ?></div>
<?php endif; ?>

<?php echo validation_errors(); ?>

<?php echo form_open_multipart('admin/products/edit_submit'); ?>

<?php echo form_label('Product name: ', 'name'); ?>
<?php echo form_input(array(
	'id'    => 'name',
	'name'  => 'name',
	'value' => $product->name,
)); ?> <br />

<?php echo form_label('Product description: ', 'description'); ?>
<?php echo form_input(array(
	'id'    => 'description',
	'name'  => 'description',
	'value' => $product->description,
)); ?> <br />

<?php echo form_label('Product category: ', 'category'); ?>
<?php echo form_input(array(
	'id'    => 'category',
	'name'  => 'category',
	'value' => $product->category,
)); ?> <br />

<?php echo form_label('Price: ', 'price'); ?>
<?php echo form_input(array(
	'id'    => 'price',
	'name'  => 'price',
	'value' => $product->price,
)); ?> <br />

<?php echo form_label('New Price: ', 'new_price'); ?>
<?php echo form_input(array(
	'id'    => 'new_price',
	'name'  => 'new_price',
	'value' => $product->new_price,
)); ?> <br />

<?php echo form_label('In Stock: ', 'in_stock'); ?>
<?php echo form_input(array(
	'id'    => 'in_stock',
	'name'  => 'in_stock',
	'value' => $product->in_stock,
)); ?> <br />

<table border="1">
	<tr>
		<td>Photo</td>
		<td>Set as main</td>
		<td>Options</td>
	</tr>
<?php foreach ($photos as $photo): ?>
	<?php $status = ($product->main_photo === $photo->id) ? TRUE : FALSE; ?>
	<tr>
		<td><img src="<?php echo $photo->url; ?>" style="width:150px; height: 150px;" alt="" /></td>
		<td><?php echo form_radio('main_photo', $photo->id, $status); ?></td>
		<td><a href="<?php echo base_url("admin/products/delete_photo/{$photo->id}/{$product->id}") ?>">Delete</a></td>
	</tr>
<?php endforeach; ?>
</table>
<br />

<?php echo form_label('Upload more photos:', 'photos'); ?>
<?php echo form_upload(array(
	'id' => 'photos',
	'name' => 'photos[]',
	'multiple' => 'multiple',
	'accept' => 'image/*'
)); ?> <br />

<?php echo form_hidden('product_id', $product->id); ?>
<?php echo form_submit('submit', 'Edit Product'); ?>

<?php echo form_close(); ?>