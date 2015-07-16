<html>
	<head>
	</head>
	<body>
		<h1>Adding product</h1>
		<a href="<?php echo base_url('admin/products') ?>">Back to products</a><hr />

		<?php echo validation_errors(); ?>
		<?php echo $this->session->flashdata('error_msg'); ?>
		<?php echo form_open_multipart('admin/products/add_submit'); ?>

		<?php echo form_label('Product name: ', 'name'); ?>
		<?php echo form_input(array(
			'id'          => 'name',
			'name'        => 'name',
			'placeholder' => 'Product name',
			'value'		  => set_value('name')
		)); ?> <br />

		<?php echo form_label('Description: ', 'description'); ?>
		<?php echo form_textarea(array(
			'id'          => 'description',
			'name'        => 'description',
			'placeholder' => 'Product description',
			'value'		  => set_value('description')
		)); ?> <br />

		<?php echo form_label('Choose category: ', 'categories'); ?>
		<?php echo form_multiselect('categories[]', $categories, '', 'style="width: 200px; height: 200px;"'); ?> <br />

		<?php echo form_label('Price: ', 'price'); ?>
		<?php echo form_input(array(
			'id'          => 'price',
			'name'        => 'price',
			'placeholder' => 'Price',
			'value'		  => set_value('price')
		)); ?> <br />

		<?php echo form_label('New Price: ', 'new_price'); ?>
		<?php echo form_input(array(
			'id'          => 'new_price',
			'name'        => 'new_price',
			'placeholder' => 'New Price',
			'value'		  => set_value('new_price')
		)); ?> <br />

		<?php echo form_label('In Stock: ', 'in_stock'); ?>
		<?php echo form_input(array(
			'id'          => 'in_stock',
			'name'        => 'in_stock',
			'placeholder' => 'In Stock',
			'value'		  => set_value('in_stock')
		)); ?> <br />

		<?php echo form_label('Photos', 'photos'); ?>
		<?php echo form_upload(array(
			'id' => 'photos',
			'name' => 'photos[]',
			'multiple' => 'multiple',
			'accept' => 'image/*'
		)); ?> <br />

		<?php echo form_submit('add', 'Add Product'); ?>

		<?php echo form_close(); ?>
		<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-2.1.4.min.js'); ?>"></script>
		<script type="text/javascript">
			$("select").mousedown(function(e){
			    e.preventDefault();
			    
			    var scroll = this.scrollTop;
			    
			    e.target.selected = !e.target.selected;
			    
			    this.scrollTop = scroll;
			    
			    $(this).focus();
			}).mousemove(function(e){e.preventDefault()});
		</script>
	</body>
</html>